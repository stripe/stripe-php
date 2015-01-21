<?php

namespace Stripe;

class Charge extends ApiResource
{
    /**
     * @param string $id The ID of the charge to retrieve.
     * @param array|string|null $options
     *
     * @return Charge
     */
    public static function retrieve($id, $options = null)
    {
        return self::_retrieve($id, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return array An array of Charges.
     */
    public static function all($params = null, $options = null)
    {
        return self::_all($params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Charge The created charge.
     */
    public static function create($params = null, $options = null)
    {
        return self::_create($params, $options);
    }

    /**
     * @param array|string|null $options
     *
     * @return Charge The saved charge.
     */
    public function save($options = null)
    {
        return $this->_save($options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Charge The refunded charge.
     */
    public function refund($params = null, $options = null)
    {
        $opts = $this->parseOptions($options);
        $requestor = new ApiRequestor($opts->apiKey);
        $url = $this->instanceUrl() . '/refund';
        list($response, $apiKey) = $requestor->request('post', $url, $params, $opts->headers);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Charge The captured charge.
     */
    public function capture($params = null, $options = null)
    {
        $opts = $this->parseOptions($options);
        $requestor = new ApiRequestor($opts->apiKey);
        $url = $this->instanceUrl() . '/capture';
        list($response, $apiKey) = $requestor->request('post', $url, $params, $opts->headers);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return array The updated dispute.
     */
    public function updateDispute($params = null, $options = null)
    {
        $opts = $this->parseOptions($options);
        $requestor = new ApiRequestor($opts->apiKey);
        $url = $this->instanceUrl() . '/dispute';
        list($response, $apiKey) = $requestor->request('post', $url, $params, $opts->headers);
        $this->refreshFrom(array('dispute' => $response), $apiKey, true);
        return $this->dispute;
    }

    /**
     * @param array|string|null $options
     *
     * @return Charge The updated charge.
     */
    public function closeDispute($options = null)
    {
        $opts = $this->parseOptions($options);
        $requestor = new ApiRequestor($opts->apiKey);
        $url = $this->instanceUrl() . '/dispute/close';
        list($response, $apiKey) = $requestor->request('post', $url, null, $opts->headers);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }

    /**
     * @return Charge The updated charge.
     */
    public function markAsFraudulent()
    {
        $params = array('fraud_details' => array('user_report' => 'fraudulent'));
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl();
        list($response, $apiKey) = $requestor->request('post', $url, $params);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }

    /**
     * @return Charge The updated charge.
     */
    public function markAsSafe()
    {
        $params = array('fraud_details' => array('user_report' => 'safe'));
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl();
        list($response, $apiKey) = $requestor->request('post', $url, $params);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }
}
