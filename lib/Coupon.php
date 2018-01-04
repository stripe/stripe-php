<?php

namespace Stripe;

/**
 * Class Coupon
 *
 * @package Stripe
 */
class Coupon extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
