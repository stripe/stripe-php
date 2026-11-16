<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Webhook
 * @covers \Stripe\WebhookSignature
 */
final class WebhookTest extends TestCase
{
    use TestHelper;

    const EVENT_PAYLOAD = '{
  "id": "evt_test_webhook",
  "object": "event",
  "data": { "object": { "id": "rdr_123", "object": "terminal.reader" } }
}';
    const SECRET = 'whsec_test_secret';

    public static function generateHeader($opts = [])
    {
        $timestamp = \array_key_exists('timestamp', $opts) ? $opts['timestamp'] : \time();
        $payload = \array_key_exists('payload', $opts) ? $opts['payload'] : self::EVENT_PAYLOAD;
        $secret = \array_key_exists('secret', $opts) ? $opts['secret'] : self::SECRET;
        $scheme = \array_key_exists('scheme', $opts) ? $opts['scheme'] : WebhookSignature::EXPECTED_SCHEME;
        $signature = \array_key_exists('signature', $opts) ? $opts['signature'] : null;
        if (null === $signature) {
            $signedPayload = "{$timestamp}.{$payload}";
            $signature = \hash_hmac('sha256', $signedPayload, $secret);
        }

        $header = "t={$timestamp},{$scheme}={$signature}";
        foreach ($opts['debug_metadata'] ?? [] as $key => $value) {
            if (null !== $value) {
                $header .= ",{$key}={$value}";
            }
        }

        return $header;
    }

    public function testValidJsonAndHeader()
    {
        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET);
        $event = Webhook::constructEvent(self::EVENT_PAYLOAD, $sigHeader, self::SECRET);
        self::assertSame('evt_test_webhook', $event->id);
        self::assertInstanceOf(Terminal\Reader::class, $event->data->__get('object'));
    }

    public function testInvalidJson()
    {
        $this->expectException(Exception\UnexpectedValueException::class);

        $payload = 'this is not valid JSON';
        $sigHeader = WebhookSignature::generateSignatureHeader($payload, self::SECRET);
        Webhook::constructEvent($payload, $sigHeader, self::SECRET);
    }

    public function testValidJsonAndInvalidHeader()
    {
        $this->expectException(Exception\SignatureVerificationException::class);

        $sigHeader = 'bad_header';
        Webhook::constructEvent(self::EVENT_PAYLOAD, $sigHeader, self::SECRET);
    }

    public function testMalformedHeader()
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('Unable to extract timestamp and signatures from header');

        $sigHeader = "i'm not even a real signature header";
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET);
    }

    public function testNoSignaturesWithExpectedScheme()
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('No signatures found with expected scheme');

        $sigHeader = $this->generateHeader(['scheme' => 'v0']);
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET);
    }

    public function testNoValidSignatureForPayload()
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('No signatures found matching the expected signature for payload');

        $sigHeader = $this->generateHeader(['signature' => 'bad_signature']);
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET);
    }

    public function testDiagnoseSecretMismatch()
    {
        $secret = 'whsec_abcdefghijklmnopqrstuvwxyz';
        $maskedSecret = 'whsec_****************************1q84';
        $cases = [
            // A mismatched secret links to the supplied destination.
            [$secret, $maskedSecret, 'we_example', 'wxyz', '/we_example'],
            // A missing destination uses the bare Dashboard URL.
            [$secret, $maskedSecret, null, 'wxyz', ''],
            // A matching suffix is not enough if the lengths differ.
            ['short1q84', $maskedSecret, null, '1q84', ''],
            // A mostly unmasked value still reveals only the last four secret characters.
            [$secret, 'whsec_*bcdefghijklmnopqrstuvwxyZ', null, 'wxyz', ''],
            // A secret shorter than four characters is shown in full.
            ['abc', '*', null, 'abc', ''],
        ];
        foreach ($cases as [$secret, $maskedSecret, $destination, $suffix, $dashboardPath]) {
            $length = \strlen($secret);
            $maskedLength = \strlen($maskedSecret);
            $url = 'https://dashboard.stripe.com/webhooks' . $dashboardPath;
            $header = self::generateHeader(['signature' => 'bad_signature', 'debug_metadata' => [
                'secret' => $maskedSecret,
                'destination' => $destination,
                'payload' => '00000000',
            ]]);
            $expected = "Webhook signature verification failed. This request may not have originated from Stripe.\n\n"
                . "The signing secret you provided is {$length} characters long and ends in `{$suffix}`. "
                . "However, the signing secret for this destination is {$maskedLength} characters long and looks like `{$maskedSecret}`. "
                . "Ensure you're using the signing secret for this destination, as shown on the Dashboard: {$url}\n\n"
                . 'Learn more: https://docs.stripe.com/webhooks/signature';

            try {
                WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $header, $secret);
                self::fail('Expected SignatureVerificationException was not thrown');
            } catch (Exception\SignatureVerificationException $e) {
                self::assertSame($expected, $e->getMessage());
            }
        }
    }

    public function testDiagnosePayloadMismatch()
    {
        // User supplies the original body with an extra trailing space.
        $payload = self::EVENT_PAYLOAD . ' ';
        $expectedHash = \substr(\hash('sha256', self::EVENT_PAYLOAD), -8);
        $actualHash = \substr(\hash('sha256', $payload), -8);
        $expected = "Webhook signature verification failed.\n\n"
            . "The request body you passed to this function differs from the request body sent by Stripe to this webhook destination.\n"
            . "The SHA-256 hash of the body should end in `{$expectedHash}`. "
            . "However, the SHA-256 hash of the body you provided ends in `{$actualHash}`.\n\n"
            . "Make sure your code does not reformat or otherwise alter the raw HTTP request body before passing it to this function.\n\n"
            . 'Learn more: https://docs.stripe.com/webhooks/signature';
        $header = self::generateHeader(['debug_metadata' => [
            'secret' => 'whsec_*******cret',
            'payload' => \strtoupper($expectedHash),
        ]]);

        try {
            WebhookSignature::verifyHeader($payload, $header, self::SECRET);
            self::fail('Expected SignatureVerificationException was not thrown');
        } catch (Exception\SignatureVerificationException $e) {
            self::assertSame($expected, $e->getMessage());
        }
    }

    public function testDebugMetadataFallsBackToExistingMessage()
    {
        $payloadHash = \substr(\hash('sha256', self::EVENT_PAYLOAD), -8);
        $cases = [
            [['secret' => 'whsec_*******cret', 'payload' => $payloadHash], self::SECRET],
            [['secret' => 'other_*******cret', 'payload' => $payloadHash], self::SECRET],
            [['secret' => 'whsec_*bcdefghijklmnopqrstuvwxyz'], 'whsec_abcdefghijklmnopqrstuvwxyz'],
            [['secret' => '*'], '*'],
        ];
        foreach ($cases as [$metadata, $secret]) {
            $header = self::generateHeader(['signature' => 'bad_signature', 'debug_metadata' => $metadata]);

            try {
                WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $header, $secret);
                self::fail('Expected SignatureVerificationException was not thrown');
            } catch (Exception\SignatureVerificationException $e) {
                self::assertSame('No signatures found matching the expected signature for payload', $e->getMessage());
            }
        }
    }

    public function testInvalidSecretMetadataFallsBackToExistingMessage()
    {
        $payloadHash = \substr(\hash('sha256', self::EVENT_PAYLOAD), -8);
        foreach (['unmasked', \str_repeat('*', 101), ',secret=whsec_*******abcd'] as $maskedSecret) {
            $header = self::generateHeader(['signature' => 'bad_signature', 'debug_metadata' => [
                'secret' => $maskedSecret, 'payload' => $payloadHash,
            ]]);

            try {
                WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $header, self::SECRET);
                self::fail('Expected SignatureVerificationException was not thrown');
            } catch (Exception\SignatureVerificationException $e) {
                self::assertSame('No signatures found matching the expected signature for payload', $e->getMessage());
            }
        }
    }

    public function testInvalidPayloadMetadataFallsBackToExistingMessage()
    {
        foreach (['1234567', '123456789', 'not-hex!', \str_repeat('a', 101), "1234567\xFF", ',payload=00000000'] as $payloadHash) {
            $header = self::generateHeader(['signature' => 'bad_signature', 'debug_metadata' => [
                'secret' => 'whsec_*******cret', 'payload' => $payloadHash,
            ]]);

            try {
                WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $header, self::SECRET);
                self::fail('Expected SignatureVerificationException was not thrown');
            } catch (Exception\SignatureVerificationException $e) {
                self::assertSame('No signatures found matching the expected signature for payload', $e->getMessage());
            }
        }
    }

    public function testValidSignatureIgnoresConflictingDebugMetadata()
    {
        $header = self::generateHeader(['debug_metadata' => [
            'secret' => '*abcd', 'destination' => 'clidev_example', 'payload' => '00000000',
        ]]);
        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $header, self::SECRET));
    }

    /**
     * @dataProvider provideBlankSecretRejectedCases
     *
     * @param string $secret
     */
    public function testBlankSecretRejected($secret)
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('No webhook secret value was provided. It should start with `whsec_`');

        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, $secret);
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, $secret);
    }

    public static function provideBlankSecretRejectedCases(): iterable
    {
        return [
            'empty' => [''],
            'space' => [' '],
            'tab' => ["\t"],
            'carriage return' => ["\r"],
            'line feed' => ["\n"],
            'form feed' => ["\f"],
            'vertical tab' => ["\v"],
            'mixed' => [" \t\r\n\f\v"],
        ];
    }

    public function testSecretWithSurroundingWhitespaceIsNotNormalized()
    {
        $secret = " \t" . self::SECRET . "\r\n\f\v";
        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, $secret);

        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, $secret));
    }

    public function testNonAsciiWhitespaceSecretIsNotNormalized()
    {
        // Non-ASCII whitespace is outside the portable blank-secret contract.
        $secret = "\xC2\xA0";
        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, $secret);

        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, $secret));
    }

    public function testNullSecretRejected()
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('No webhook secret value was provided. It should start with `whsec_`');

        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET);
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, null);
    }

    public function testTimestampTooOld()
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('Timestamp outside the tolerance zone');

        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET, \time() - 15);
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET, 10);
    }

    public function testTimestampTooRecent()
    {
        $this->expectException(Exception\SignatureVerificationException::class);
        $this->expectExceptionMessage('Timestamp outside the tolerance zone');

        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET, \time() + 15);
        WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET, 10);
    }

    public function testValidHeaderAndSignature()
    {
        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET);
        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET, 10));
    }

    public function testHeaderContainsValidSignature()
    {
        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET) . ',v1=bad_signature';
        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET, 10));
    }

    public function testTimestampOffButNoTolerance()
    {
        $sigHeader = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET, 12345);
        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $sigHeader, self::SECRET));
    }

    public function testGenerateSignatureHeader()
    {
        $timestamp = 1614000000;
        $header = WebhookSignature::generateSignatureHeader(self::EVENT_PAYLOAD, self::SECRET, $timestamp);

        // Assert the format is t=<timestamp>,v1=<hex>
        self::compatAssertMatchesRegularExpression('/^t=\d+,v1=[0-9a-f]+$/', $header);
        self::assertStringStartsWith("t={$timestamp},v1=", $header);

        // Assert the generated header passes verification
        self::assertTrue(WebhookSignature::verifyHeader(self::EVENT_PAYLOAD, $header, self::SECRET));
    }

    public function testConstructEventRejectsV2Payload()
    {
        $payload = json_encode([
            'id' => 'evt_test_webhook',
            'object' => 'v2.core.event',
            'type' => 'v1.billing.meter.error_report_triggered',
        ]);
        $sigHeader = WebhookSignature::generateSignatureHeader($payload, self::SECRET);

        try {
            Webhook::constructEvent($payload, $sigHeader, self::SECRET);
            self::fail('Expected UnexpectedValueException was not thrown');
        } catch (Exception\UnexpectedValueException $e) {
            self::compatAssertStringContainsString('parseEventNotification', $e->getMessage());
        }
    }

    public function testMaybeExtractPassesThroughV1Event()
    {
        $payload = json_encode([
            'id' => 'evt_test_webhook',
            'object' => 'event',
            'data' => ['object' => ['id' => 'rdr_123', 'object' => 'terminal.reader']],
        ]);

        $result = Webhook::maybeExtractFromCloudProviderEnvelope($payload);

        self::assertSame('event', $result['object']);
        self::assertSame('evt_test_webhook', $result['id']);
    }

    public function testMaybeExtractPassesThroughV2Event()
    {
        $payload = json_encode([
            'id' => 'evt_test_webhook',
            'object' => 'v2.core.event',
            'type' => 'v1.billing.meter.error_report_triggered',
        ]);

        $result = Webhook::maybeExtractFromCloudProviderEnvelope($payload);

        self::assertSame('v2.core.event', $result['object']);
    }

    public function testMaybeExtractThrowsForUnrecognizedFormat()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessage('Unrecognized event format');

        $payload = json_encode(['id' => 'some_unknown_id', 'foo' => 'bar']);

        Webhook::maybeExtractFromCloudProviderEnvelope($payload);
    }
}
