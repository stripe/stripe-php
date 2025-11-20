<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * The CurrencyConversion object. Contains details such as the amount debited and credited and the FinancialAccount the CurrencyConversion was performed on.
 *
 * @property string $id The id of the CurrencyConversion.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The time the CurrencyConversion was created at.
 * @property string $exchange_rate The exchange rate used when processing the CurrencyConversion.
 * @property string $financial_account The FinancialAccount the CurrencyConversion was performed on.
 * @property (object{amount: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $from The from block containing what was debited.
 * @property bool $livemode If the CurrencyConversion was performed in livemode or not.
 * @property (object{amount: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $to The to block containing what was credited.
 */
class CurrencyConversion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.currency_conversion';
}
