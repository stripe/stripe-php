<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Each customer has a [`balance`](https://stripe.com/docs/api/customers/object#customer_object-balance)
 * that is automatically applied to future invoices and payments using the
 * `customer_balance` payment method. Customers can fund this balance by
 * initiating a bank transfer to any account in the
 * `financial_addresses` field. Related guide: [Customer Balance - Funding Instructions](https://stripe.com/docs/payments/customer-balance/funding-instructions) to learn more.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $bank_transfer
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property string $funding_type The `funding_type` of the returned instructions
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 */
class FundingInstructions extends ApiResource
{
    const OBJECT_NAME = 'funding_instructions';

    const FUNDING_TYPE_BANK_TRANSFER = 'bank_transfer';
}
