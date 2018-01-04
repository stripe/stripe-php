<?php

namespace Stripe;

/**
 * Class Product
 *
 * @package Stripe
 */
class Product extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
