<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Balance transactions represent funds moving through your Stripe account.
 * Stripe creates them for every type of transaction that enters or leaves your Stripe account balance.
 *
 * Related guide: <a href="https://stripe.com/docs/reports/balance-transaction-types">Balance transaction types</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Gross amount of this transaction (in cents (or local equivalent)). A positive value represents funds charged to another party, and a negative value represents funds sent to another party.
 * @property int $available_on The date that the transaction's net funds become available in the Stripe balance.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|float $exchange_rate If applicable, this transaction uses an exchange rate. If money converts from currency A to currency B, then the <code>amount</code> in currency A, multipled by the <code>exchange_rate</code>, equals the <code>amount</code> in currency B. For example, if you charge a customer 10.00 EUR, the PaymentIntent's <code>amount</code> is <code>1000</code> and <code>currency</code> is <code>eur</code>. If this converts to 12.34 USD in your Stripe account, the BalanceTransaction's <code>amount</code> is <code>1234</code>, its <code>currency</code> is <code>usd</code>, and the <code>exchange_rate</code> is <code>1.234</code>.
 * @property int $fee Fees (in cents (or local equivalent)) paid for this transaction. Represented as a positive integer when assessed.
 * @property \Stripe\StripeObject[] $fee_details Detailed breakdown of fees (in cents (or local equivalent)) paid for this transaction.
 * @property int $net Net impact to a Stripe balance (in cents (or local equivalent)). A positive value represents incrementing a Stripe balance, and a negative value decrementing a Stripe balance. You can calculate the net impact of a transaction on a balance by <code>amount</code> - <code>fee</code>
 * @property string $reporting_category Learn more about how <a href="https://stripe.com/docs/reports/reporting-categories">reporting categories</a> can help you understand balance transactions from an accounting perspective.
 * @property null|string|\Stripe\StripeObject $source This transaction relates to the Stripe object.
 * @property string $status The transaction's net funds status in the Stripe balance, which are either <code>available</code> or <code>pending</code>.
 * @property string $type Transaction type: <code>adjustment</code>, <code>advance</code>, <code>advance_funding</code>, <code>anticipation_repayment</code>, <code>application_fee</code>, <code>application_fee_refund</code>, <code>charge</code>, <code>connect_collection_transfer</code>, <code>contribution</code>, <code>issuing_authorization_hold</code>, <code>issuing_authorization_release</code>, <code>issuing_dispute</code>, <code>issuing_transaction</code>, <code>obligation_inbound</code>, <code>obligation_outbound</code>, <code>obligation_reversal_inbound</code>, <code>obligation_reversal_outbound</code>, <code>obligation_payout</code>, <code>obligation_payout_failure</code>, <code>payment</code>, <code>payment_failure_refund</code>, <code>payment_refund</code>, <code>payment_reversal</code>, <code>payout</code>, <code>payout_cancel</code>, <code>payout_failure</code>, <code>refund</code>, <code>refund_failure</code>, <code>reserve_transaction</code>, <code>reserved_funds</code>, <code>stripe_fee</code>, <code>stripe_fx_fee</code>, <code>tax_fee</code>, <code>topup</code>, <code>topup_reversal</code>, <code>transfer</code>, <code>transfer_cancel</code>, <code>transfer_failure</code>, or <code>transfer_refund</code>. Learn more about <a href="https://stripe.com/docs/reports/balance-transaction-types">balance transaction types and what they represent</a>. To classify transactions for accounting purposes, consider <code>reporting_category</code> instead.
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
    const TYPE_OBLIGATION_INBOUND = 'obligation_inbound';
    const TYPE_OBLIGATION_OUTBOUND = 'obligation_outbound';
    const TYPE_OBLIGATION_PAYOUT = 'obligation_payout';
    const TYPE_OBLIGATION_PAYOUT_FAILURE = 'obligation_payout_failure';
    const TYPE_OBLIGATION_REVERSAL_INBOUND = 'obligation_reversal_inbound';
    const TYPE_OBLIGATION_REVERSAL_OUTBOUND = 'obligation_reversal_outbound';
    const TYPE_PAYMENT = 'payment';
    const TYPE_PAYMENT_FAILURE_REFUND = 'payment_failure_refund';
    const TYPE_PAYMENT_REFUND = 'payment_refund';
    const TYPE_PAYMENT_REVERSAL = 'payment_reversal';
    const TYPE_PAYOUT = 'payout';
    const TYPE_PAYOUT_CANCEL = 'payout_cancel';
    const TYPE_PAYOUT_FAILURE = 'payout_failure';
    const TYPE_REFUND = 'refund';
    const TYPE_REFUND_FAILURE = 'refund_failure';
    const TYPE_RESERVED_FUNDS = 'reserved_funds';
    const TYPE_RESERVE_TRANSACTION = 'reserve_transaction';
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
