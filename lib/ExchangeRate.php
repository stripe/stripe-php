<?php

namespace Stripe;

/**
 * Class ExchangeRate
 *
 * @property string $id Unique identifier for the object. Represented as the three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a> in lowercase.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $rates Hash where the keys are supported currencies and the values are the exchange rate at which the base id currency converts to the key currency.
 *
 * @package Stripe
 */
class ExchangeRate extends ApiResource
{
    const OBJECT_NAME = 'exchange_rate';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
