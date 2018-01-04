<?php

namespace Stripe;

/**
 * Class Refund
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property mixed $balance_transaction
 * @property string $charge
 * @property int $created
 * @property string $currency
 * @property mixed $metadata
 * @property mixed $reason
 * @property mixed $receipt_number
 * @property string $status
 *
 * @package Stripe
 */
class Refund extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
