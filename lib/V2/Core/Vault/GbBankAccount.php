<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core\Vault;

/**
 * Use the GBBankAccounts API to create and manage GB bank account objects.
 *
 * @property string $id The ID of the GBBankAccount object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{id: string, type: string}&\Stripe\StripeObject) $alternative_reference The alternative reference for this payout method, if it's a projected payout method.
 * @property bool $archived Whether this bank account object was archived. Bank account objects can be archived through the /archive API, and they will not be automatically archived by Stripe. Archived bank account objects cannot be used as outbound destinations and will not appear in the outbound destination list.
 * @property string $bank_account_type Closed Enum. The type of the bank account (checking or savings).
 * @property string $bank_name The name of the bank.
 * @property (object{result: (object{created: int, match_result: string, matched: (object{business_type?: string, name?: string}&\Stripe\StripeObject), message: string, provided: (object{business_type: string, name: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string}&\Stripe\StripeObject) $confirmation_of_payee Information around the status of Confirmation of Payee matching done on this bank account. Confirmation of Payee is a name matching service that must be done before making OutboundPayments in the UK.
 * @property int $created Creation time.
 * @property string $last4 The last 4 digits of the account number or IBAN.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $sort_code The Sort Code of the bank account.
 */
class GbBankAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.vault.gb_bank_account';

    const BANK_ACCOUNT_TYPE_CHECKING = 'checking';
    const BANK_ACCOUNT_TYPE_SAVINGS = 'savings';
}
