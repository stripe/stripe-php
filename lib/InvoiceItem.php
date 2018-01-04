<?php

namespace Stripe;

/**
 * Class InvoiceItem
 *
 * @package Stripe
 */
class InvoiceItem extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
