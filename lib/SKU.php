<?php

namespace Stripe;

/**
 * Class SKU
 *
 * @package Stripe
 */
class SKU extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
