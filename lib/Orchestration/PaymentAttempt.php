<?php

// File generated from our OpenAPI spec

namespace Stripe\Orchestration;

/**
 * Represents orchestration information for a payment attempt record (e.g. return url).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $return_url If present, the return URL for this payment attempt.
 */
class PaymentAttempt extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'orchestration.payment_attempt';

    /**
     * Retrieves orchestration information for the given payment attempt record (e.g.
     * return url).
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentAttempt
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
