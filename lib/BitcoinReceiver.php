<?php

namespace Stripe;

/**
 * Class BitcoinReceiver

 * @deprecated Please use sources instead.
 */
class BitcoinReceiver extends ExternalAccount
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;

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
