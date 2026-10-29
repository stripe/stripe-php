<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FinancialAddress contains information needed to transfer money to a Financial Account. A Financial Account can have more than one Financial Address.
 *
 * @property string $id The ID of the FinancialAddress.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{aba?: (object{account_holder_name?: string, account_number: string, address?: (object{city: string, country: string, line1: string, line2: string, postal_code: string, state: string, town: string}&\Stripe\StripeObject), bank_name?: string, routing_number: string}&\Stripe\StripeObject), country?: string, currency: string, iban?: (object{account_holder_name: string, bank_name: string, iban: string}&\Stripe\StripeObject), sort_code?: (object{account_holder_name: string, account_number: string, sort_code: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $bank_account Bank account details for this FinancialAddress.
 * @property string $created The creation timestamp of the FinancialAddress.
 * @property string $financial_account The ID of the FinancialAccount this FinancialAddress corresponds to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $settlement_currency
 * @property string $status Closed Enum. The status of the FinancialAddress.
 * @property string $type Open Enum. The type of FinancialAddress.
 */
class FinancialAddress extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_address';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';

    const TYPE_BANK_ACCOUNT = 'bank_account';
}
