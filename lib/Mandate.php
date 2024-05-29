<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Mandate is a record of the permission that your customer gives you to debit their payment method.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $customer_acceptance
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $multi_use
 * @property null|string $on_behalf_of The account (if any) that the mandate is intended for.
 * @property string|\Stripe\PaymentMethod $payment_method ID of the payment method associated with this mandate.
 * @property \Stripe\StripeObject $payment_method_details
 * @property null|\Stripe\StripeObject $single_use
 * @property string $status The mandate status indicates whether or not you can use it to initiate a payment.
 * @property string $type The type of the mandate.
 */
class Mandate extends ApiResource
{
    const OBJECT_NAME = 'mandate';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';

    const TYPE_MULTI_USE = 'multi_use';
    const TYPE_SINGLE_USE = 'single_use';

    /**
     * Retrieves a Mandate object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Mandate
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
