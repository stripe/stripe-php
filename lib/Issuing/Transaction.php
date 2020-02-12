<?php

namespace Stripe\Issuing;

/**
 * Class Transaction.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The amount of this transaction in your currency. This is the amount that your balance will be updated by.
 * @property null|string|\Stripe\Issuing\Authorization $authorization The <code>Authorization</code> object that led to this transaction.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the <a href="https://stripe.com/docs/api/balance_transactions">balance transaction</a> associated with this transaction.
 * @property string|\Stripe\Issuing\Card $card The card used to make this transaction.
 * @property null|string|\Stripe\Issuing\Cardholder $cardholder The cardholder to whom this transaction belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string|\Stripe\Issuing\Dispute $dispute If you've disputed the transaction, the ID of the <a href="https://stripe.com/docs/api/issuing/disputes/object">dispute object</a>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $merchant_amount The amount that the merchant will receive, denominated in <code>merchant_currency</code>. It will be different from <code>amount</code> if the merchant is taking payment in a different currency.
 * @property string $merchant_currency The currency with which the merchant is taking payment.
 * @property \Stripe\StripeObject $merchant_data
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $type The nature of the transaction.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.transaction';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
