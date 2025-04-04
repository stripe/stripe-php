<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Customers with certain payments enabled have a cash balance, representing funds that were paid
 * by the customer to a merchant, but have not yet been allocated to a payment. Cash Balance Transactions
 * represent when funds are moved into or out of this balance. This includes funding by the customer, allocation
 * to payments, and refunds to the customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{balance_transaction: BalanceTransaction|string, linked_transaction: CustomerCashBalanceTransaction|string}&StripeObject) $adjusted_for_overdraft
 * @property null|(object{payment_intent: PaymentIntent|string}&StripeObject) $applied_to_payment
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property Customer|string $customer The customer whose available cash balance changed as a result of this transaction.
 * @property int $ending_balance The total available cash balance for the specified currency after this transaction was applied. Represented in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>.
 * @property null|(object{bank_transfer: (object{eu_bank_transfer?: (object{bic: null|string, iban_last4: null|string, sender_name: null|string}&StripeObject), gb_bank_transfer?: (object{account_number_last4: null|string, sender_name: null|string, sort_code: null|string}&StripeObject), jp_bank_transfer?: (object{sender_bank: null|string, sender_branch: null|string, sender_name: null|string}&StripeObject), reference: null|string, type: string, us_bank_transfer?: (object{network?: string, sender_name: null|string}&StripeObject)}&StripeObject)}&StripeObject) $funded
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $net_amount The amount by which the cash balance changed, represented in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>. A positive value represents funds being added to the cash balance, a negative value represents funds being removed from the cash balance.
 * @property null|(object{refund: Refund|string}&StripeObject) $refunded_from_payment
 * @property null|(object{balance_transaction: BalanceTransaction|string}&StripeObject) $transferred_to_balance
 * @property string $type The type of the cash balance transaction. New types may be added in future. See <a href="https://stripe.com/docs/payments/customer-balance#types">Customer Balance</a> to learn more about these types.
 * @property null|(object{payment_intent: PaymentIntent|string}&StripeObject) $unapplied_from_payment
 */
class CustomerCashBalanceTransaction extends ApiResource
{
    const OBJECT_NAME = 'customer_cash_balance_transaction';

    const TYPE_ADJUSTED_FOR_OVERDRAFT = 'adjusted_for_overdraft';
    const TYPE_APPLIED_TO_PAYMENT = 'applied_to_payment';
    const TYPE_FUNDED = 'funded';
    const TYPE_FUNDING_REVERSED = 'funding_reversed';
    const TYPE_REFUNDED_FROM_PAYMENT = 'refunded_from_payment';
    const TYPE_RETURN_CANCELED = 'return_canceled';
    const TYPE_RETURN_INITIATED = 'return_initiated';
    const TYPE_TRANSFERRED_TO_BALANCE = 'transferred_to_balance';
    const TYPE_UNAPPLIED_FROM_PAYMENT = 'unapplied_from_payment';
}
