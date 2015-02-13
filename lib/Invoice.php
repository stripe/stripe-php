<?php

namespace Stripe;

class Invoice extends ApiResource
{
    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Invoice The created invoice.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }

    /**
     * @param string $id The ID of the invoice to retrieve.
     * @param string|null $apiKey
     *
     * @return Invoice
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of Invoices.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Invoice The upcoming invoice.
     */
    public static function upcoming($params = null, $opts = null)
    {
        $url = static::classUrl() . '/upcoming';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @return Invoice The saved invoice.
     */
    public function save()
    {
        return $this->_save();
    }

    /**
     * @return Invoice The paid invoice.
     */
    public function pay()
    {
        $url = $this->instanceUrl() . '/pay';
        list($response, $opts) = $this->_request('post', $url);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
