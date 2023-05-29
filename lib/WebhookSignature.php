<?php

namespace Stripe;

abstract class WebhookSignature
{
    const EXPECTED_SCHEME = 'v1';

    /**
     * Verifies the signature header sent by Stripe. Throws an
     * Exception\SignatureVerificationException exception if the verification fails for
     * any reason.
     *
     * @param string $payload the payload sent by Stripe
     * @param string $header the contents of the signature header sent by
     *  Stripe
     * @param string $secret secret used to generate the signature
     * @param int $tolerance maximum difference allowed between the header's
     *  timestamp and the current time in seconds, requires a value > 0 to
     *  validate it against the current time
     *
     * @throws Exception\SignatureVerificationException if the verification fails
     *
     * @return bool
     */
    public static function verifyHeader($payload, $header, $secret, $tolerance = null)
    {
        // Extract timestamp and validate header
        if (1 !== \preg_match('/^t=([1-9][0-9]{9})(?:,v[0-9]=[0-9a-z]{64})+$/', $header, $matches)) {
            throw Exception\SignatureVerificationException::factory(
                'Unable to extract timestamp and signatures from header',
                $payload,
                $header
            );
        }

        $timestamp = $matches[1];

        // Check if timestamp is within tolerance
        if (($tolerance > 0) && (\abs(\time() - $timestamp) > $tolerance)) {
            throw Exception\SignatureVerificationException::factory(
                'Timestamp outside the tolerance zone',
                $payload,
                $header
            );
        }

        // Extracts all signatures for the expected scheme
        if (!\preg_match_all('/(?:' . self::EXPECTED_SCHEME . '=([0-9a-z]{64}))+/', $header, $matches)) {
            throw Exception\SignatureVerificationException::factory(
                'No signatures found with expected scheme',
                $payload,
                $header
            );
        }

        // Check if expected signature is found in list of signatures from
        // header
        $signedPayload = "{$timestamp}.{$payload}";
        $expectedSignature = self::computeSignature($signedPayload, $secret);

        foreach ($matches[1] as $signature) {
            if (Util\Util::secureCompare($expectedSignature, $signature)) {
                return true;
            }
        }

        throw Exception\SignatureVerificationException::factory(
            'No signatures found matching the expected signature for payload',
            $payload,
            $header
        );
    }

    /**
     * Computes the signature for a given payload and secret.
     *
     * The current scheme used by Stripe ("v1") is HMAC/SHA-256.
     *
     * @param string $payload the payload to sign
     * @param string $secret the secret used to generate the signature
     *
     * @return string the signature as a string
     */
    private static function computeSignature($payload, $secret)
    {
        return \hash_hmac('sha256', $payload, $secret);
    }
}
