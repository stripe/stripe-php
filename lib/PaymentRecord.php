<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Record is a resource that allows you to represent payments that occur on- or off-Stripe.
 * For example, you can create a Payment Record to model a payment made on a different payment processor,
 * in order to mark an Invoice as paid and a Subscription as active. Payment Records consist of one or
 * more Payment Attempt Records, which represent individual attempts made on a payment network.
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
 * @property string $latest_payment_attempt_record ID of the latest Payment Attempt Record attached to this Payment Record.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{billing_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass), custom: null|(object{display_name: string, type: null|string}&\Stripe\StripeObject&\stdClass), payment_method: null|string, type: string}&\Stripe\StripeObject&\stdClass) $payment_method_details Information about the Payment Method debited for this payment.
 * @property null|string $payment_reference An opaque string for manual reconciliation of this payment, for example a check number or a payment processor ID.
 * @property null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass) $shipping_details Shipping information for this payment.
 */
class PaymentRecord extends ApiResource
{
    const OBJECT_NAME = 'payment_record';

    const CUSTOMER_PRESENCE_OFF_SESSION = 'off_session';
    const CUSTOMER_PRESENCE_ON_SESSION = 'on_session';

    /**
     * Retrieves a Payment Record with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord the reported payment record
     */
    public static function reportPayment($params = null, $opts = null)
    {
        $url = static::classUrl() . '/report_payment';
        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord the reported payment record
     */
    public function reportPaymentAttempt($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/report_payment_attempt';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord the reported payment record
     */
    public function reportPaymentAttemptCanceled($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/report_payment_attempt_canceled';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord the reported payment record
     */
    public function reportPaymentAttemptFailed($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/report_payment_attempt_failed';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord the reported payment record
     */
    public function reportPaymentAttemptGuaranteed($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/report_payment_attempt_guaranteed';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
