<?php

namespace Stripe;

abstract class Webhook
{
    const DEFAULT_TOLERANCE = 300;

    /**
     * Returns a {@link https://docs.stripe.com/event-destinations#snapshot-payload snapshot Event} instance using the provided JSON payload. Throws an
     * Exception\UnexpectedValueException if the payload is not valid JSON, and
     * an Exception\SignatureVerificationException if the signature
     * verification fails for any reason. To work with a webhook that has already been
     * verified (i.e. one from a cloud provider, an asynchronous queue, or during testing),
     * see {@see Webhook::constructEventWithoutVerification()}.
     *
     * @param string $payload the payload sent by Stripe
     * @param string $sigHeader the contents of the signature header sent by
     *  Stripe
     * @param string $secret secret used to generate the signature
     * @param int $tolerance maximum difference allowed between the header's
     *  timestamp and the current time
     *
     * @return Event the Events instance
     *
     * @throws Exception\UnexpectedValueException if the payload is not valid JSON,
     * @throws Exception\SignatureVerificationException if the verification fails
     */
    public static function constructEvent($payload, $sigHeader, $secret, $tolerance = self::DEFAULT_TOLERANCE)
    {
        WebhookSignature::verifyHeader($payload, $sigHeader, $secret, $tolerance);

        return self::buildV1Event($payload);
    }

    /**
     * Constructs a {@link https://docs.stripe.com/event-destinations#snapshot-payload snapshot event} from an incoming webhook without first verifying its authenticity.
     * Should be used after calling {@see WebhookSignature::verifyHeader()} or with input from a trusted source (such as {@link https://docs.stripe.com/event-destinations/eventbridge AWS EventBridge}, or {@link https://docs.stripe.com/event-destinations/eventgrid Azure Event Grid} payload).
     * Or, to verify & construct in a single call, use {@see Webhook::constructEvent()} instead.
     *
     * @param string $payload the JSON payload
     *
     * @return Event
     *
     * @throws Exception\UnexpectedValueException if the payload is not valid JSON or is a v2 thin event
     */
    public static function constructEventWithoutVerification($payload)
    {
        return self::buildV1Event(self::maybeExtractFromCloudProviderEnvelope($payload));
    }

    /**
     * @param array<string, mixed>|string $payload raw JSON string or already-parsed array
     *
     * @return Event
     *
     * @throws Exception\UnexpectedValueException if the payload is not valid JSON or is a v2 thin event
     */
    private static function buildV1Event($payload)
    {
        $data = self::parsePayload($payload);

        if (isset($data['object']) && 'v2.core.event' === $data['object']) {
            throw new Exception\UnexpectedValueException(
                'You passed a thin event notification to a method that expects a webhook body. Use the corresponding parseEventNotification* method instead.'
            );
        }

        return Event::constructFrom($data);
    }

    /**
     * Internal helper for parsing a JSON string into an associative array, or returns the input as-is if already an array.
     *
     * @param array<string, mixed>|string $payload raw JSON string or already-parsed array
     *
     * @return array<string, mixed>
     *
     * @throws Exception\UnexpectedValueException if the payload is a string and not valid JSON
     */
    public static function parsePayload($payload)
    {
        if (\is_array($payload)) {
            return $payload;
        }

        $data = \json_decode($payload, true);
        if (\JSON_ERROR_NONE !== \json_last_error()) {
            throw new Exception\UnexpectedValueException(
                'Invalid JSON payload: ' . \json_last_error_msg()
            );
        }

        return $data;
    }

    /**
     * Internal helper to extract the inner event data from an AWS EventBridge or Azure Event Grid envelope,
     * or returns the parsed payload as-is if it is already a raw Stripe event.
     *
     * @param string $payload the JSON payload
     *
     * @return array the Stripe event, if available
     *
     * @throws Exception\UnexpectedValueException if the payload is not valid JSON or not recognized
     */
    public static function maybeExtractFromCloudProviderEnvelope($payload)
    {
        $data = self::parsePayload($payload);

        // Could add as many checks as we want here, but we'll start simple
        if (\array_key_exists('detail', $data)) {
            // AWS
            // https://docs.stripe.com/event-destinations/eventbridge#event-structure
            return $data['detail'];
        }
        if (\array_key_exists('specversion', $data) && \array_key_exists('data', $data)) {
            // Azure
            // https://docs.stripe.com/event-destinations/eventgrid#event-structure
            return $data['data'];
        }
        if (isset($data['object']) && ('event' === $data['object'] || 'v2.core.event' === $data['object'])) {
            // Raw Stripe event: return as-is
            return $data;
        }

        throw new Exception\UnexpectedValueException(
            'Unrecognized event format. The payload must be an AWS EventBridge/Azure Event Grid event envelope or a Stripe webhook (thin event notification or snapshot).'
        );
    }
}
