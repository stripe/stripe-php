<?php

namespace Stripe\Issuing;

/**
 * Class Transaction
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string|\Stripe\Issuing\Authorization|null $authorization
 * @property string|\Stripe\BalanceTransaction|null $balance_transaction
 * @property string|\Stripe\Issuing\Card $card
 * @property string|\Stripe\Issuing\Cardholder|null $cardholder
 * @property int $created
 * @property string $currency
 * @property string|\Stripe\Issuing\Dispute|null $dispute
 * @property bool $livemode
 * @property int $merchant_amount
 * @property string $merchant_currency
 * @property \Stripe\StripeObject $merchant_data
 * @property \Stripe\StripeObject $metadata
 * @property string $type
 *
 * @package Stripe\Issuing
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.transaction';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
