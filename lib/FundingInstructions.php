<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Each customer has a <a href="https://stripe.com/docs/api/customers/object#customer_object-balance"><code>balance</code></a> that is
 * automatically applied to future invoices and payments using the <code>customer_balance</code> payment method.
 * Customers can fund this balance by initiating a bank transfer to any account in the
 * <code>financial_addresses</code> field.
 * Related guide: <a href="https://stripe.com/docs/payments/customer-balance/funding-instructions">Customer balance funding instructions</a>.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{country: string, financial_addresses: ((object{aba?: (object{account_holder_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), account_holder_name: string, account_number: string, account_type: string, bank_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), bank_name: string, routing_number: string}&\Stripe\StripeObject&\stdClass), iban?: (object{account_holder_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), account_holder_name: string, bank_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), bic: string, country: string, iban: string}&\Stripe\StripeObject&\stdClass), sort_code?: (object{account_holder_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), account_holder_name: string, account_number: string, bank_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), sort_code: string}&\Stripe\StripeObject&\stdClass), spei?: (object{account_holder_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), account_holder_name: string, bank_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), bank_code: string, bank_name: string, clabe: string}&\Stripe\StripeObject&\stdClass), supported_networks?: string[], swift?: (object{account_holder_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), account_holder_name: string, account_number: string, account_type: string, bank_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), bank_name: string, swift_code: string}&\Stripe\StripeObject&\stdClass), type: string, zengin?: (object{account_holder_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), account_holder_name: null|string, account_number: null|string, account_type: null|string, bank_address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), bank_code: null|string, bank_name: null|string, branch_code: null|string, branch_name: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass))[], type: string}&\Stripe\StripeObject&\stdClass) $bank_transfer
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $funding_type The <code>funding_type</code> of the returned instructions
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class FundingInstructions extends ApiResource
{
    const OBJECT_NAME = 'funding_instructions';

    const FUNDING_TYPE_BANK_TRANSFER = 'bank_transfer';
}
