<?php

// File generated from our OpenAPI spec

namespace Stripe\Capital;

/**
 * This is an object representing the details of a transaction on a Capital financing object.
 *
 * @property string $id A unique identifier for the financing transaction object.
 * @property string $object The object type: financing_transaction
 * @property string $account The ID of the merchant associated with this financing transaction.
 * @property int $created_at Time at which the financing transaction was created. Given in seconds since unix epoch.
 * @property \Stripe\StripeObject $details This is an object representing a transaction on a Capital financing offer.
 * @property null|string $financing_offer The Capital financing offer for this financing transaction.
 * @property null|string $legacy_balance_transaction_source The Capital transaction object that predates the Financing Transactions API and corresponds with the balance transaction that was created as a result of this financing transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $type The type of the financing transaction.
 * @property null|string $user_facing_description A human-friendly description of the financing transaction.
 */
class FinancingTransaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'capital.financing_transaction';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const TYPE_PAYMENT = 'payment';
    const TYPE_PAYOUT = 'payout';
    const TYPE_REVERSAL = 'reversal';
}
