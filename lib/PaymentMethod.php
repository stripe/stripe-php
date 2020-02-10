<?php

namespace Stripe;

/**
 * Class PaymentMethod
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $au_becs_debit
 * @property \Stripe\StripeObject $billing_details
 * @property \Stripe\StripeObject $card
 * @property \Stripe\StripeObject $card_present
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|\Stripe\Customer|null $customer The ID of the Customer to which this PaymentMethod is saved. This will not be set when the PaymentMethod has not been saved to a Customer.
 * @property \Stripe\StripeObject $fpx
 * @property \Stripe\StripeObject $ideal
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $sepa_debit
 * @property string $type The type of the PaymentMethod. An additional hash is included on the PaymentMethod with a name matching this value. It contains additional information specific to the PaymentMethod type.
 *
 * @package Stripe
 */
class PaymentMethod extends ApiResource
{
    const OBJECT_NAME = 'payment_method';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return PaymentMethod The attached payment method.
     */
    public function attach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/attach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return PaymentMethod The detached payment method.
     */
    public function detach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/detach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
