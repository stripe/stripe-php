<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * Meter events represent actions that customers take in your system. You can use meter events to bill a customer based on their usage. Meter events are associated with billing meters, which define both the contents of the event’s payload and how to aggregate those events.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $event_name The name of the meter event. Corresponds with the <code>event_name</code> field on a meter.
 * @property string $identifier A unique identifier for the event.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $payload The payload of the event. This contains the fields corresponding to a meter's <code>customer_mapping.event_payload_key</code> (default is <code>stripe_customer_id</code>) and <code>value_settings.event_payload_key</code> (default is <code>value</code>). Read more about the <a href="https://stripe.com/docs/billing/subscriptions/usage-based/recording-usage#payload-key-overrides">payload</a>.
 * @property int $timestamp The timestamp passed in when creating the event. Measured in seconds since the Unix epoch.
 */
class MeterEvent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter_event';

    /**
     * Creates a billing meter event.
     *
     * @param null|array{event_name: string, expand?: string[], identifier?: string, payload: \Stripe\StripeObject, timestamp?: int} $params
     * @param null|array|string $options
     *
     * @return MeterEvent the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
