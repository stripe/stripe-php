<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A Currency Conversion represents a standalone conversion between currencies in a <a href="https://docs.stripe.com/api/v2/money-management/financial-accounts">Financial Account</a> or the payments balance.
 *
 * @property string $id The ID of the Currency Conversion.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created The time the Currency Conversion was created at.
 * @property string $exchange_rate The exchange rate used, excluding applicable fees.
 * @property null|string $financial_account The ID of the Financial Account the Currency Conversion was created in. If <code>null</code>, it was created in the payments balance.
 * @property (object{amount: \Stripe\StripeObject}&\Stripe\StripeObject) $from The amount that was debited from the source currency.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property (object{amount: \Stripe\StripeObject}&\Stripe\StripeObject) $to The amount that was credited to the destination currency.
 */
class CurrencyConversion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.currency_conversion';
}
