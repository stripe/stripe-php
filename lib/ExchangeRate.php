<?php

namespace Stripe;

/**
 * Class ExchangeRate
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject $rates
 *
 * @package Stripe
 */
class ExchangeRate extends ApiResource
{
    const OBJECT_NAME = 'exchange_rate';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
