<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Each customer has a <a
 * href="https://stripe.com/docs/api/customers/object#customer_object-balance">`balance`</a>
 * that is automatically applied to future invoices and payments using the
 * `customer_balance` payment method. Customers can fund this balance by
 * initiating a bank transfer to any account in the
 * `financial_addresses` field. Related guide: <a
 * href="https://stripe.com/docs/payments/customer-balance/funding-instructions">Customer
 * Balance - Funding Instructions</a> to learn more.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $bank_transfer
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $funding_type The `funding_type` of the returned instructions
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 */
class FundingInstructions extends ApiResource
{
    const OBJECT_NAME = 'funding_instructions';

    const FUNDING_TYPE_BANK_TRANSFER = 'bank_transfer';
}
