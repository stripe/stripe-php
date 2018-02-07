<?php

namespace Stripe;

/**
 * Class CountrySpec
 *
 * @property string $id
 * @property string $object
 * @property string $default_currency
 * @property mixed $supported_bank_account_currencies
 * @property string[] $supported_payment_currencies
 * @property string[] $supported_payment_methods
 * @property mixed $verification_fields
 *
 * @package Stripe
 */
class CountrySpec extends ApiResource
{
    /**
     * This is a special case because the country specs endpoint has an
     *    underscore in it. The parent `className` function strips underscores.
     *
     * @return string The name of the class.
     */
    public static function className()
    {
        return 'country_spec';
    }

    /**
     * @param array|string $country The ISO country code of the country we
     *     retrieve the country specfication for, or an options array
     *     containing an `id` containing that code.
     * @param array|string|null $opts
     *
     * @return CountrySpec
     */
    public static function retrieve($country, $opts = null)
    {
        return self::_retrieve($country, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of CountrySpecs
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }
}
