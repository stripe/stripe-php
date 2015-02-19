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
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             . "has invalid ID: $id";
            throw new Error\InvalidRequest($msg, null);
        }

        $id = ApiRequestor::utf8($id);
        $extn = urlencode($id);

        if (!$this['customer']) {
            $base = BitcoinReceiver::classUrl();
            return "$base/$extn";
        } else {
            $base = Customer::classUrl();
            $parent = ApiRequestor::utf8($this['customer']);
            $parentExtn = urlencode($parent);
            return "$base/$parentExtn/sources/$extn";
        }
    }

    /**
     * @param string $id The ID of the Bitcoin Receiver to retrieve.
     * @param array|string|null $opts
     *
     * @return BitcoinReceiver
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BitcoinReceiver[].
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BitcoinReceiver The created Bitcoin Receiver item.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BitcoinReceiver The deleted Bitcoin Receiver item.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|string|null $opts
     *
     * @return BitcoinReceiver The saved Bitcoin Receiver item.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}
