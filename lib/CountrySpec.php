<?php

namespace Stripe;

/**
 * Class CountrySpec
 *
 * @package Stripe
 */
class CountrySpec extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;

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
}
