<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FinancialAddress contains information needed to transfer money to a Financial Account. A Financial Account can have more than one Financial Address.
 *
 * @property string $id The ID of the FinancialAddress.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{aba?: (object{account_holder_address?: (object{city: string, country: string, line1: string, line2: string, postal_code: string, state: string, town: string}&\Stripe\StripeObject), account_holder_name?: string, account_number?: string, bank_name?: string, last4: string, routing_number: string}&\Stripe\StripeObject), clabe?: (object{account_holder_name: string, clabe: string}&\Stripe\StripeObject), country?: string, cpa?: (object{account_holder_name: string, account_number?: string, bank_name: string, institution_number: string, last4: string, transit_number: string}&\Stripe\StripeObject), currency: string, iban?: (object{account_holder_name: string, bank_name: string, country: string, iban?: string, last4: string}&\Stripe\StripeObject), sort_code?: (object{account_holder_name: string, account_number?: string, last4: string, sort_code: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $bank_account Bank account details for this FinancialAddress.
 * @property string $created The creation timestamp of the FinancialAddress.
 * @property null|(object{address: string, memo?: string, network: string}&\Stripe\StripeObject) $crypto_wallet Crypto wallet details for this FinancialAddress.
 * @property string $financial_account The ID of the FinancialAccount this FinancialAddress corresponds to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $settlement_currency Open Enum. The currency the FinancialAddress settles into the FinancialAccount.
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
    const TYPE_CRYPTO_WALLET = 'crypto_wallet';
}
