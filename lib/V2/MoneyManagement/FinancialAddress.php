<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FinancialAddress contains information needed to transfer money to a Financial Account. A Financial Account can have more than one Financial Address.
 *
 * @property string $id The ID of a FinancialAddress.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The creation timestamp of the FinancialAddress.
 * @property null|(object{type: string, gb_bank_account?: (object{account_holder_name: string, account_number?: string, last4: string, sort_code: string}&\Stripe\StripeObject), sepa_bank_account?: (object{account_holder_name: string, bank_name: string, bic: string, country: string, iban: string, last4: string}&\Stripe\StripeObject), us_bank_account?: (object{account_number?: string, bank_name?: string, last4: string, routing_number: string, swift_code?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $credentials Object indicates the type of credentials that have been allocated and attached to the FinancialAddress. It contains all necessary banking details with which to perform money movements with the FinancialAddress. This field is only available for FinancialAddresses with an active status.
 * @property string $currency Open Enum. The currency the FinancialAddress supports.
 * @property string $financial_account A ID of the FinancialAccount this FinancialAddress corresponds to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $settlement_currency Open Enum. The currency the FinancialAddress settles into the FinancialAccount.
 * @property string $status Closed Enum. An enum representing the status of the FinancialAddress. This indicates whether or not the FinancialAddress can be used for any money movement flows.
 */
class FinancialAddress extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_address';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
}
