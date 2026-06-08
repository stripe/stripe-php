<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Represents third-party gift cards that can be used as a payment method through Stripe.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $brand The brand of the gift card.
 * @property null|int $exp_month The expiration month of the gift card.
 * @property null|int $exp_year The expiration year of the gift card.
 * @property null|GiftCardOperation|string $last_operation The last operation performed on this gift card.
 * @property null|string $last4 The last four digits of the gift card number.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 */
class GiftCard extends ApiResource
{
    const OBJECT_NAME = 'gift_card';

    const BRAND_FISERV_VALUELINK = 'fiserv_valuelink';
    const BRAND_GIVEX = 'givex';
    const BRAND_SVS = 'svs';

    /**
     * Creates a gift card object.
     *
     * @param null|array{brand: string, exp_month?: int, exp_year?: int, expand?: string[], number?: string, pin?: string} $params
     * @param null|array|string $options
     *
     * @return GiftCard the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Retrieves a third-party gift card object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return GiftCard
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return GiftCardOperation the activated gift card operation
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function activate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/activate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return GiftCardOperation the cashouted gift card operation
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function cashout($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cashout';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return GiftCardOperation the checked gift card operation
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function checkBalance($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/check_balance';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return GiftCardOperation the reloaded gift card operation
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function reload($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reload';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return GiftCardOperation the voided gift card operation
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function voidOperation($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/void_operation';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
