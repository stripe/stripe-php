<?php

namespace Stripe;

class ApplicationFee extends ApiResource
{
    /**
     * This is a special case because the application fee endpoint has an
     *    underscore in it. The parent `className` function strips underscores.
     *
     * @return string The name of the class.
     */
    public static function className()
    {
        return 'application_fee';
    }

    /**
     * @param string $id The ID of the application fee to retrieve.
     * @param string|null $apiKey
     *
     * @return ApplicationFee
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param string|null $params
     * @param string|null $apiKey
     *
     * @return array An array of application fees.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }

    /**
     * @param string|null $params
     *
     * @return ApplicationFee The refunded application fee.
     */
    public function refund($params = null)
    {
        $url = $this->instanceUrl() . '/refund';
        list($response, $opts) = $this->_request('post', $url, $params);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
