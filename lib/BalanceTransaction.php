<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Balance transactions represent funds moving through your Stripe account. They're
 * created for every type of transaction that comes into or flows out of your
 * Stripe account balance.
 *
 * Related guide: [Balance Transaction Types](https://stripe.com/docs/reports/balance-transaction-types).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Gross amount of the transaction, in %s.
 * @property int $available_on The date the transaction's net funds will become available in the Stripe balance.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|float $exchange_rate The exchange rate used, if applicable, for this transaction. Specifically, if money was converted from currency A to currency B, then the `amount` in currency A, times `exchange_rate`, would be the `amount` in currency B. For example, suppose you charged a customer 10.00 EUR. Then the PaymentIntent's `amount` would be `1000` and `currency` would be `eur`. Suppose this was converted into 12.34 USD in your Stripe account. Then the BalanceTransaction's `amount` would be `1234`, `currency` would be `usd`, and `exchange_rate` would be `1.234`.
 * @property int $fee Fees (in %s) paid for this transaction.
 * @property \Stripe\StripeObject[] $fee_details Detailed breakdown of fees (in %s) paid for this transaction.
 * @property int $net Net amount of the transaction, in %s.
 * @property string $reporting_category [Learn more](https://stripe.com/docs/reports/reporting-categories) about how reporting categories can help you understand balance transactions from an accounting perspective.
 * @property null|string|\Stripe\StripeObject $source The Stripe object to which this transaction is related.
 * @property string $status If the transaction's net funds are available in the Stripe balance yet. Either `available` or `pending`.
 * @property string $type Transaction type: `adjustment`, `advance`, `advance_funding`, `anticipation_repayment`, `application_fee`, `application_fee_refund`, `charge`, `connect_collection_transfer`, `contribution`, `issuing_authorization_hold`, `issuing_authorization_release`, `issuing_dispute`, `issuing_transaction`, `payment`, `payment_failure_refund`, `payment_refund`, `payout`, `payout_cancel`, `payout_failure`, `refund`, `refund_failure`, `reserve_transaction`, `reserved_funds`, `stripe_fee`, `stripe_fx_fee`, `tax_fee`, `topup`, `topup_reversal`, `transfer`, `transfer_cancel`, `transfer_failure`, or `transfer_refund`. [Learn more](https://stripe.com/docs/reports/balance-transaction-types) about balance transaction types and what they represent. If you are looking to classify transactions for accounting purposes, you might want to consider `reporting_category` instead.
 */
class BalanceTransaction extends ApiResource
{
    const OBJECT_NAME = 'balance_transaction';

    use ApiOperations\All;
    use ApiOperations\Retrieve;

    const TYPE_ADJUSTMENT = 'adjustment';
    const TYPE_ADVANCE = 'advance';
    const TYPE_ADVANCE_FUNDING = 'advance_funding';
    const TYPE_ANTICIPATION_REPAYMENT = 'anticipation_repayment';
    const TYPE_APPLICATION_FEE = 'application_fee';
    const TYPE_APPLICATION_FEE_REFUND = 'application_fee_refund';
    const TYPE_CHARGE = 'charge';
    const TYPE_CONNECT_COLLECTION_TRANSFER = 'connect_collection_transfer';
    const TYPE_CONTRIBUTION = 'contribution';
    const TYPE_ISSUING_AUTHORIZATION_HOLD = 'issuing_authorization_hold';
    const TYPE_ISSUING_AUTHORIZATION_RELEASE = 'issuing_authorization_release';
    const TYPE_ISSUING_DISPUTE = 'issuing_dispute';
    const TYPE_ISSUING_TRANSACTION = 'issuing_transaction';
    const TYPE_PAYMENT = 'payment';
    const TYPE_PAYMENT_FAILURE_REFUND = 'payment_failure_refund';
    const TYPE_PAYMENT_REFUND = 'payment_refund';
    const TYPE_PAYOUT = 'payout';
    const TYPE_PAYOUT_CANCEL = 'payout_cancel';
    const TYPE_PAYOUT_FAILURE = 'payout_failure';
    const TYPE_REFUND = 'refund';
    const TYPE_REFUND_FAILURE = 'refund_failure';
    const TYPE_RESERVE_TRANSACTION = 'reserve_transaction';
    const TYPE_RESERVED_FUNDS = 'reserved_funds';
    const TYPE_STRIPE_FEE = 'stripe_fee';
    const TYPE_STRIPE_FX_FEE = 'stripe_fx_fee';
    const TYPE_TAX_FEE = 'tax_fee';
    const TYPE_TOPUP = 'topup';
    const TYPE_TOPUP_REVERSAL = 'topup_reversal';
    const TYPE_TRANSFER = 'transfer';
    const TYPE_TRANSFER_CANCEL = 'transfer_cancel';
    const TYPE_TRANSFER_FAILURE = 'transfer_failure';
    const TYPE_TRANSFER_REFUND = 'transfer_refund';
}
