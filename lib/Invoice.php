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
    public static function upcoming($params = null, $apiKey = null)
    {
        $requestor = new ApiRequestor($apiKey);
        $url = static::classUrl() . '/upcoming';
        list($response, $apiKey) = $requestor->request('get', $url, $params);
        return Util::convertToStripeObject($response, $apiKey);
    }

    /**
     * @return Invoice The saved invoice.
     */
    public function save()
    {
        return self::_save();
    }

    /**
     * @return Invoice The paid invoice.
     */
    public function pay()
    {
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl() . '/pay';
        list($response, $apiKey) = $requestor->request('post', $url);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }
}
