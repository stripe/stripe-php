<?php

namespace Stripe;

/**
 * Class PaymentMethod
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject $au_becs_debit
 * @property \Stripe\StripeObject $billing_details
 * @property \Stripe\StripeObject $card
 * @property \Stripe\StripeObject $card_present
 * @property int $created
 * @property string|null $customer
 * @property \Stripe\StripeObject $ideal
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property \Stripe\StripeObject $sepa_debit
 * @property string $type
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
