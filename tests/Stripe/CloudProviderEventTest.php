<?php

namespace Stripe;

use Stripe\Events\UnknownEventNotification;

/**
 * @internal
 *
 * @covers \Stripe\BaseStripeClient
 */
final class CloudProviderEventTest extends TestCase
{
    private $eventBridgePayloadV1;
    private $eventGridPayloadV1;
    private $eventBridgePayloadV2;
    private $eventGridPayloadV2;

    protected function setUp(): void
    {
        $this->eventBridgePayloadV1 = \json_encode([
            'version' => '0',
            'id' => '17e8dff5-d6cd-3770-ace9-aeac02b6ac3f',
            'detail-type' => 'customer.created',
            'source' => 'aws.partner/stripe.com/ed_123',
            'account' => '506417113029',
            'time' => '2024-03-07T18:27:56Z',
            'region' => 'us-west-2',
            'resources' => [],
            'detail' => [
                'id' => 'evt_test_123',
                'object' => 'event',
                'api_version' => '2023-10-16',
                'created' => 1709836076,
                'data' => ['object' => ['id' => 'cus_123', 'object' => 'customer']],
                'livemode' => true,
                'pending_webhooks' => 0,
                'request' => ['id' => 'req_123', 'idempotency_key' => null],
                'type' => 'customer.created',
            ],
        ]);

        $this->eventGridPayloadV1 = \json_encode([
            'specversion' => '1.0',
            'type' => 'customer.created',
            'source' => '/providers/stripe/ed_test_123',
            'id' => '9aeb0fdf-c01e-0131-0922-9eb54906e209',
            'time' => '2025-07-11T14:30:00Z',
            'subject' => null,
            'dataContentType' => 'application/cloudevents+json',
            'data' => [
                'id' => 'evt_test_456',
                'object' => 'event',
                'api_version' => '2023-10-16',
                'created' => 1709836076,
                'data' => ['object' => ['id' => 'cus_456', 'object' => 'customer']],
                'livemode' => false,
                'pending_webhooks' => 0,
                'request' => ['id' => 'req_456', 'idempotency_key' => null],
                'type' => 'customer.created',
            ],
        ]);

        $this->eventBridgePayloadV2 = \json_encode([
            'version' => '0',
            'id' => '17e8dff5-d6cd-3770-ace9-aeac02b6ac3f',
            'detail-type' => 'v2.imaginary.event',
            'source' => 'aws.partner/stripe.com/ed_123',
            'account' => '506417113029',
            'time' => '2024-03-07T18:27:56Z',
            'region' => 'us-west-2',
            'resources' => [],
            'detail' => [
                'id' => 'evt_234',
                'object' => 'v2.core.event',
                'type' => 'v2.imaginary.event',
                'created' => '2022-02-15T00:27:45.330Z',
                'livemode' => false,
            ],
        ]);

        $this->eventGridPayloadV2 = \json_encode([
            'specversion' => '1.0',
            'type' => 'v2.imaginary.event',
            'source' => '/providers/stripe/ed_test_123',
            'id' => '9aeb0fdf-c01e-0131-0922-9eb54906e209',
            'time' => '2025-07-11T14:30:00Z',
            'subject' => null,
            'dataContentType' => 'application/cloudevents+json',
            'data' => [
                'id' => 'evt_234',
                'object' => 'v2.core.event',
                'type' => 'v2.imaginary.event',
                'created' => '2022-02-15T00:27:45.330Z',
                'livemode' => true,
            ],
        ]);
    }

    public function testEventBridge()
    {
        $client = new StripeClient('sk_test_fake');
        $event = $client->constructEventWithoutVerification($this->eventBridgePayloadV1);
        self::assertInstanceOf(Event::class, $event);
        self::assertSame('evt_test_123', $event->id);
        self::assertSame('customer.created', $event->type);
    }

    public function testEventGrid()
    {
        $client = new StripeClient('sk_test_fake');
        $event = $client->constructEventWithoutVerification($this->eventGridPayloadV1);
        self::assertInstanceOf(Event::class, $event);
        self::assertSame('evt_test_456', $event->id);
        self::assertSame('customer.created', $event->type);
    }

    public function testInvalidJson()
    {
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $client->constructEventWithoutVerification('not valid json');
    }

    public function testRawEventSucceeds()
    {
        $rawEvent = \json_encode([
            'id' => 'evt_test_123',
            'object' => 'event',
            'type' => 'customer.created',
        ]);
        $client = new StripeClient('sk_test_fake');
        $event = $client->constructEventWithoutVerification($rawEvent);
        self::assertInstanceOf(Event::class, $event);
        self::assertSame('evt_test_123', $event->id);
    }

    public function testUnrecognizedFormat()
    {
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/Unrecognized event format/');
        $client->constructEventWithoutVerification('{"foo":"bar"}');
    }

    public function testConstructEventWithoutVerificationRejectsV2Event()
    {
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/parseEventNotification/');
        $client->constructEventWithoutVerification($this->eventBridgePayloadV2);
    }

    // parseEventNotificationWithoutVerification tests

    public function testParseEventNotificationWithoutVerificationEventBridge()
    {
        $client = new StripeClient('sk_test_fake');
        $event = $client->parseEventNotificationWithoutVerification($this->eventBridgePayloadV2);
        self::assertInstanceOf(UnknownEventNotification::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('v2.imaginary.event', $event->type);
        self::assertFalse($event->livemode);
    }

    public function testParseEventNotificationWithoutVerificationEventGrid()
    {
        $client = new StripeClient('sk_test_fake');
        $event = $client->parseEventNotificationWithoutVerification($this->eventGridPayloadV2);
        self::assertInstanceOf(UnknownEventNotification::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('v2.imaginary.event', $event->type);
        self::assertTrue($event->livemode);
    }

    public function testParseEventNotificationWithoutVerificationRejectsV1Event()
    {
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/constructEvent/');
        $client->parseEventNotificationWithoutVerification($this->eventBridgePayloadV1);
    }

    public function testParseEventNotificationWithoutVerificationInvalidJsonThrows()
    {
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $client->parseEventNotificationWithoutVerification('not valid json');
    }

    public function testParseEventNotificationWithoutVerificationUnrecognizedFormatThrows()
    {
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/Unrecognized event format/');
        $client->parseEventNotificationWithoutVerification(\json_encode(['foo' => 'bar']));
    }

    public function testParseEventNotificationWithoutVerificationRawV2Passthrough()
    {
        $rawV2Payload = \json_encode([
            'id' => 'evt_234',
            'object' => 'v2.core.event',
            'type' => 'v2.imaginary.event',
            'created' => '2022-02-15T00:27:45.330Z',
            'livemode' => false,
        ]);
        $client = new StripeClient('sk_test_fake');
        $event = $client->parseEventNotificationWithoutVerification($rawV2Payload);
        self::assertInstanceOf(V2\Core\EventNotification::class, $event);
        self::assertSame('evt_234', $event->id);
    }

    public function testConstructEventWithoutVerificationViaWebhookStatic()
    {
        $event = Webhook::constructEventWithoutVerification($this->eventBridgePayloadV1);
        self::assertInstanceOf(Event::class, $event);
        self::assertSame('evt_test_123', $event->id);
        self::assertSame('customer.created', $event->type);
    }

    // parseEventNotification tests

    public function testParseEventNotificationValidSignature()
    {
        $secret = 'whsec_test_secret';
        $payload = \json_encode([
            'id' => 'evt_234',
            'object' => 'v2.core.event',
            'type' => 'v2.imaginary.event',
            'created' => '2022-02-15T00:27:45.330Z',
            'livemode' => false,
        ]);
        $sigHeader = WebhookSignature::generateSignatureHeader($payload, $secret);

        $client = new StripeClient('sk_test_fake');
        $event = $client->parseEventNotification($payload, $sigHeader, $secret);

        self::assertInstanceOf(V2\Core\EventNotification::class, $event);
        self::assertSame('evt_234', $event->id);
        self::assertSame('v2.imaginary.event', $event->type);
        self::assertFalse($event->livemode);
    }

    public function testParseEventNotificationRejectsV1Payload()
    {
        $secret = 'whsec_test_secret';
        $payload = \json_encode([
            'id' => 'evt_test_webhook',
            'object' => 'event',
            'data' => ['object' => ['id' => 'rdr_123', 'object' => 'terminal.reader']],
        ]);
        $sigHeader = WebhookSignature::generateSignatureHeader($payload, $secret);

        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/constructEvent/');
        $client->parseEventNotification($payload, $sigHeader, $secret);
    }

    public function testParseEventNotificationBadSignatureThrows()
    {
        $secret = 'whsec_test_secret';
        $payload = \json_encode([
            'id' => 'evt_234',
            'object' => 'v2.core.event',
            'type' => 'v2.imaginary.event',
            'created' => '2022-02-15T00:27:45.330Z',
            'livemode' => false,
        ]);
        $badSigHeader = 't=12345,v1=bad_signature';

        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\SignatureVerificationException::class);
        $client->parseEventNotification($payload, $badSigHeader, $secret);
    }

    public function testEventGridMissingDataFieldThrows()
    {
        $payload = \json_encode([
            'specversion' => '1.0',
            'type' => 'customer.created',
            'source' => '/providers/stripe/ed_test_123',
            'id' => 'test-missing-data',
        ]);
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/Unrecognized event format/i');
        $client->constructEventWithoutVerification($payload);
    }

    public function testEventGridMissingDataFieldThrowsForEventNotification()
    {
        $payload = \json_encode([
            'specversion' => '1.0',
            'type' => 'v2.imaginary.event',
            'source' => '/providers/stripe/ed_test_123',
            'id' => 'test-missing-data',
        ]);
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/Unrecognized event format/i');
        $client->parseEventNotificationWithoutVerification($payload);
    }

    public function testUnexpectedObjectTypeThrows()
    {
        // The inner payload (inside an EventGrid envelope) has an object type
        // that is neither 'event' nor 'v2.core.event'.
        $payload = \json_encode([
            'specversion' => '1.0',
            'type' => 'customer.created',
            'source' => '/providers/stripe/ed_test_123',
            'id' => '9aeb0fdf-c01e-0131-0922-9eb54906e209',
            'data' => [
                'object' => 'customer',
                'type' => 'customer.created',
                'id' => 'cus_123',
            ],
        ]);
        $client = new StripeClient('sk_test_fake');
        $this->expectException(Exception\UnexpectedValueException::class);
        $this->expectExceptionMessageMatches('/Unexpected object type/');
        $client->parseEventNotificationWithoutVerification($payload);
    }
}
