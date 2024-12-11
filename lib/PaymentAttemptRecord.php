<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Attempt Record represents an individual attempt at making a payment, on or off Stripe.
 * Each payment attempt tries to collect a fixed amount of money from a fixed customer and payment
 * method. Payment Attempt Records are attached to Payment Records. Only one attempt per Payment Record
 * can have guaranteed funds.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{currency: string, value: int}&\Stripe\StripeObject&\stdClass) $amount_canceled A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&\Stripe\StripeObject&\stdClass) $amount_failed A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&\Stripe\StripeObject&\stdClass) $amount_guaranteed A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&\Stripe\StripeObject&\stdClass) $amount_requested A representation of an amount of money, consisting of an amount and a currency.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{customer: null|string, email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass) $customer_details Customer information for this payment.
 * @property null|string $customer_presence Indicates whether the customer was present in your checkout flow during this payment.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{billing_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass), custom: null|(object{display_name: string, type: null|string}&\Stripe\StripeObject&\stdClass), payment_method: null|string, type: string}&\Stripe\StripeObject&\stdClass) $payment_method_details Information about the Payment Method debited for this payment.
 * @property string $payment_record ID of the Payment Record this Payment Attempt Record belongs to.
 * @property null|string $payment_reference An opaque string for manual reconciliation of this payment, for example a check number or a payment processor ID.
 * @property null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass) $shipping_details Shipping information for this payment.
 */
class PaymentAttemptRecord extends ApiResource
{
    const OBJECT_NAME = 'payment_attempt_record';

    const CUSTOMER_PRESENCE_OFF_SESSION = 'off_session';
    const CUSTOMER_PRESENCE_ON_SESSION = 'on_session';

    /**
     * List all the Payment Attempt Records attached to the specified Payment Record.
     *
     * @param null|array{expand?: string[], payment_record: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentAttemptRecord> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a Payment Attempt Record with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentAttemptRecord
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
