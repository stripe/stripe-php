<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * A Transaction represents a real transaction that affects a Financial Connections Account balance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The ID of the Financial Connections Account this transaction belongs to.
 * @property int $amount The amount of this transaction, in cents (or local equivalent).
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $description The description of this transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the transaction.
 * @property \Stripe\StripeObject $status_transitions
 * @property int $transacted_at Time at which the transaction was transacted. Measured in seconds since the Unix epoch.
 * @property string $transaction_refresh The token of the transaction refresh that last updated or created this transaction.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.transaction';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const STATUS_PENDING = 'pending';
    const STATUS_POSTED = 'posted';
    const STATUS_VOID = 'void';
}
