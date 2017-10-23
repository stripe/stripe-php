<?php

namespace Stripe;

/**
 * Class ExchangeRate
 *
 * @package Stripe
 */
class ExchangeRate extends ApiResource
{
    /**
     * This is a special case because the exchange rates endpoint has an
     *    underscore in it. The parent `className` function strips underscores.
     *
     * @return string The name of the class.
     */
    public static function className()
    {
        return 'exchange_rate';
    }

    /**
     * @param array|string $currency
     * @param array|string|null $opts
     *
     * @return ExchangeRate
     */
    public static function retrieve($currency, $opts = null)
    {
        return self::_retrieve($currency, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExchangeRate
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }
}
