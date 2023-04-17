<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * Any use of an [issued card](https://stripe.com/docs/issuing) that
 * results in funds entering or leaving your Stripe account, such as a completed
 * purchase or refund, is represented by an Issuing `Transaction`
 * object.
 *
 * Related guide: [Issued Card Transactions](https://stripe.com/docs/issuing/purchases/transactions).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The transaction amount, which will be reflected in your balance. This amount is in your currency and in the [smallest currency unit](https://stripe.com/docs/currencies#zero-decimal).
 * @property null|\Stripe\StripeObject $amount_details Detailed breakdown of amount components. These amounts are denominated in `currency` and in the [smallest currency unit](https://stripe.com/docs/currencies#zero-decimal).
 * @property null|string|\Stripe\Issuing\Authorization $authorization The `Authorization` object that led to this transaction.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction ID of the [balance transaction](https://stripe.com/docs/api/balance_transactions) associated with this transaction.
 * @property string|\Stripe\Issuing\Card $card The card used to make this transaction.
 * @property null|string|\Stripe\Issuing\Cardholder $cardholder The cardholder to whom this transaction belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property null|string|\Stripe\Issuing\Dispute $dispute If you've disputed the transaction, the ID of the dispute.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property int $merchant_amount The amount that the merchant will receive, denominated in `merchant_currency` and in the [smallest currency unit](https://stripe.com/docs/currencies#zero-decimal). It will be different from `amount` if the merchant is taking payment in a different currency.
 * @property string $merchant_currency The currency with which the merchant is taking payment.
 * @property \Stripe\StripeObject $merchant_data
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $purchase_details Additional purchase information that is optionally provided by the merchant.
 * @property null|\Stripe\StripeObject $treasury [Treasury](https://stripe.com/docs/api/treasury) details related to this transaction if it was created on a [FinancialAccount](/docs/api/treasury/financial_accounts
 * @property string $type The nature of the transaction.
 * @property null|string $wallet The digital wallet used for this transaction. One of `apple_pay`, `google_pay`, or `samsung_pay`.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.transaction';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
