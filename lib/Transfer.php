<?php

namespace Stripe;

class Transfer extends ApiResource
{
    /**
     * @param string $id The ID of the transfer to retrieve.
     * @param string|null $apiKey
     *
     * @return Transfer
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of Transfers.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Transfer The created transfer.
     */
    public static function create($params = null, $apiKey = null)
    {
        $class = get_class();
        return self::_create($params, $apiKey);
    }

    /**
     * @return Transfer The canceled transfer.
     */
    public function cancel()
    {
        $requestor = new ApiRequestor($this->_apiKey);
        $url = $this->instanceUrl() . '/cancel';
        list($response, $apiKey) = $requestor->request('post', $url);
        $this->refreshFrom($response, $apiKey);
        return $this;
    }

    /**
   * @return Transfer The saved transfer.
   */
    public function save()
    {
        return $this->_save();
    }
}
