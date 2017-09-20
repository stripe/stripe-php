<?php

namespace Stripe;

/**
 * Class BitcoinReceiver

 * @deprecated Please use sources instead.
 */
class BitcoinReceiver extends ExternalAccount
{
    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     *
     * @deprecated Please use sources instead.
     */
    public static function classUrl()
    {
        return "/v1/bitcoin/receivers";
    }

    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     *
     * @deprecated Please use sources instead.
     */
    public function instanceUrl()
    {
        $result = parent::instanceUrl();
        if ($result) {
            return $result;
        } else {
            $id = $this['id'];
            $id = Util\Util::utf8($id);
            $extn = urlencode($id);
            $base = BitcoinReceiver::classUrl();
            return "$base/$extn";
        }
    }

    /**
     * @param array|string $id The ID of the bitcoin receiver to retrieve, or
     *     an options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return BitcoinReceiver
     *
     * @deprecated Please use sources instead.
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of BitcoinReceivers
     *
     * @deprecated Please use sources instead.
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
     *
     * @deprecated Please use sources instead.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return BitcoinReceiver The refunded Bitcoin Receiver item.
     *
     * @deprecated Please use sources instead.
     */
    public function refund($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/refund';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
