<?php

namespace Stripe;

class BitcoinReceiver extends ApiResource
{
    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
      return "/v1/bitcoin/receivers";
    }

    /**
     * @param string $id The ID of the Bitcoin Receiver to retrieve.
     * @param string|null $apiKey
     *
     * @return BitcoinReceiver
     */
    public static function retrieve($id, $apiKey = null)
    {
      return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of BitcoinReceivers.
     */
    public static function all($params = null, $apiKey = null)
    {
      return self::_all($params, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return BitcoinReceiver The created Bitcoin Receiver item.
     */
    public static function create($params = null, $apiKey = null)
    {
      return self::_create($params, $apiKey);
    }

    /**
     * @return BitcoinReceiver The saved Bitcoin Receiver item.
     */
    public function save()
    {
      return self::_save();
    }
}

