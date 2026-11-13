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
     * timestamp and the current time, in seconds. If null or 0, timestamp validation
     * is skipped
     *
     * @return bool
     *
     * @throws Exception\SignatureVerificationException if the verification fails
     */
    public static function verifyHeader($payload, $header, $secret, $tolerance = null)
    {
        // Extract timestamp and signatures from header
        $timestamp = self::getTimestamp($header);
        $signatures = self::getSignatures($header, self::EXPECTED_SCHEME);
        if (-1 === $timestamp) {
            throw Exception\SignatureVerificationException::factory(
                'Unable to extract timestamp and signatures from header',
                $payload,
                $header
            );
        }
        if (empty($signatures)) {
            throw Exception\SignatureVerificationException::factory(
                'No signatures found with expected scheme',
                $payload,
                $header
            );
        }
        if (empty($secret) || '' === \trim($secret, " \t\r\n\f\v")) {
            throw Exception\SignatureVerificationException::factory(
                'No webhook secret value was provided. It should start with `whsec_`',
                $payload,
                $header
            );
        }

        // Check if expected signature is found in list of signatures from
        // header
        $signedPayload = "{$timestamp}.{$payload}";
        $expectedSignature = self::computeSignature($signedPayload, $secret);
        $signatureFound = false;
        foreach ($signatures as $signature) {
            if (Util\Util::secureCompare($expectedSignature, $signature)) {
                $signatureFound = true;

                break;
            }
        }
        if (!$signatureFound) {
            throw Exception\SignatureVerificationException::factory(
                self::getSignatureErrorMessage($header, $payload, $secret),
                $payload,
                $header
            );
        }

        // Check if timestamp is within tolerance
        if (($tolerance > 0) && (\abs(\time() - $timestamp) > $tolerance)) {
            throw Exception\SignatureVerificationException::factory(
                'Timestamp outside the tolerance zone',
                $payload,
                $header
            );
        }

        return true;
    }

    /**
     * Builds a signature verification error message using optional header metadata.
     *
     * @param string $header the contents of the signature header passed in
     * @param string $payload the payload sent by Stripe
     * @param string $secret secret used to generate the signature
     *
     * @return string the diagnostic or generic error message
     */
    private static function getSignatureErrorMessage($header, $payload, $secret)
    {
        $metadata = self::getSignatureDebugMetadata($header);

        // If metadata has an asterisk-masked secret, compare against its length and last four characters
        $maskedSecret = $metadata['secret'] ?? '';
        $maskedLength = \strlen($maskedSecret);
        $maskedSuffix = \substr($maskedSecret, -4);
        $secretLength = \strlen($secret);
        $secretSuffix = \substr($secret, -4);
        if (false !== \strpos($maskedSecret, '*') && ($secretLength !== $maskedLength || $secretSuffix !== $maskedSuffix)) {
            $dashboardUrl = 'https://dashboard.stripe.com/webhooks';
            if (isset($metadata['destination'])) {
                $dashboardUrl .= '/' . \urlencode($metadata['destination']);
            }

            return "Webhook signature verification failed. This request may not have originated from Stripe.\n\n"
                . "The signing secret you provided is {$secretLength} characters long and ends in `{$secretSuffix}`. "
                . "However, the signing secret for this destination is {$maskedLength} characters long "
                . "and looks like `{$maskedSecret}`. Ensure you're using the signing secret for this "
                . "destination, as shown on the Dashboard: {$dashboardUrl}\n\n"
                . 'Learn more: https://docs.stripe.com/webhooks/signature';
        }

        // If metadata includes the truncated payload hash, compare with the payload passed in
        if (isset($metadata['payload']) && \preg_match('/\A[0-9a-fA-F]{8}\z/', $metadata['payload'])) {
            $expectedHash = \strtolower($metadata['payload']);
            $actualHash = \substr(\hash('sha256', $payload), -8);
            if ($expectedHash !== $actualHash) {
                return "Webhook signature verification failed.\n\n"
                    . 'The request body you passed to this function differs from the request body sent by Stripe '
                    . "to this webhook destination.\n"
                    . "The SHA-256 hash of the body should end in `{$expectedHash}`. However, "
                    . "the SHA-256 hash of the body you provided ends in `{$actualHash}`.\n\n"
                    . 'Make sure your code does not reformat or otherwise alter the raw HTTP request body '
                    . "before passing it to this function.\n\n"
                    . 'Learn more: https://docs.stripe.com/webhooks/signature';
            }
        }

        // Fall back to the generic message if no debug metadata available
        return 'No signatures found matching the expected signature for payload';
    }

    /**
     * Extracts metadata from the stripe-signature header value to help debug verification failures.
     *
     * @param string $header the signature header
     *
     * @return array{secret?: null|string, destination?: null|string, payload?: null|string} recognized fields, with unusable values set to null
     */
    private static function getSignatureDebugMetadata($header)
    {
        // For each metadata key, extract the first value found in the header
        $metadata = [];
        foreach (\preg_split('/,\s*/', $header) as $item) {
            $parts = \explode('=', $item, 2);
            $key = $parts[0];
            if (\in_array($key, ['secret', 'destination', 'payload'], true) && !\array_key_exists($key, $metadata)) {
                $value = $parts[1] ?? null;
                $value = self::isSafeMetadataValue($value) ? \trim($value) : null;
                $metadata[$key] = '' === $value ? null : $value;
            }
        }

        return $metadata;
    }

    private static function isSafeMetadataValue($value)
    {
        // Ignore overly long, potentially attacker-provided metadata values
        return null !== $value && \strlen($value) <= 100;
    }

    /**
     * Extracts the timestamp in a signature header.
     *
     * @param string $header the signature header
     *
     * @return int the timestamp contained in the header, or -1 if no valid
     *  timestamp is found
     */
    private static function getTimestamp($header)
    {
        $items = \explode(',', $header);

        foreach ($items as $item) {
            $itemParts = \explode('=', $item, 2);
            if ('t' === $itemParts[0]) {
                if (!\is_numeric($itemParts[1])) {
                    return -1;
                }

                return (int) $itemParts[1];
            }
        }

        return -1;
    }

    /**
     * Extracts the signatures matching a given scheme in a signature header.
     *
     * @param string $header the signature header
     * @param string $scheme the signature scheme to look for
     *
     * @return array the list of signatures matching the provided scheme
     */
    private static function getSignatures($header, $scheme)
    {
        $signatures = [];
        $items = \explode(',', $header);

        foreach ($items as $item) {
            $itemParts = \explode('=', $item, 2);
            if (\trim($itemParts[0]) === $scheme) {
                $signatures[] = $itemParts[1];
            }
        }

        return $signatures;
    }

    /**
     * Compute the `Stripe-Signature` header for a given webhook body & secret. Useful for signing payloads in unit tests.
     *
     * @param string $payload the webhook body to sign
     * @param string $secret the webhook endpoint's signing secret
     * @param null|int $timestamp unix timestamp to use (defaults to current time)
     *
     * @return string the full `Stripe-Signature` header value
     */
    public static function generateSignatureHeader($payload, $secret, $timestamp = null)
    {
        if (null === $timestamp) {
            $timestamp = \time();
        }
        $scheme = self::EXPECTED_SCHEME;
        $signedPayload = "{$timestamp}.{$payload}";
        $signature = self::computeSignature($signedPayload, $secret);

        return "t={$timestamp},{$scheme}={$signature}";
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
