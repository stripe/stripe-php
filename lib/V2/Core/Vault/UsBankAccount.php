<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core\Vault;

/**
 * Use the USBankAccounts API to create and manage US bank accounts objects that you can use to receive funds. Note that these are not interchangeable with v1 Tokens.
 *
 * @property string $id The ID of the USBankAccount object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{id: string, type: string}&\Stripe\StripeObject) $alternative_reference The alternative reference for this payout method, if it's a projected payout method.
 * @property bool $archived Whether this USBankAccount object was archived.
 * @property string $bank_account_type Closed Enum. The type of bank account (checking or savings).
 * @property string $bank_name The name of the bank this bank account belongs to. This field is populated automatically by Stripe based on the routing number.
 * @property int $created Creation time of the object.
 * @property null|string $fedwire_routing_number The fedwire routing number of the bank account.
 * @property null|string $financial_connections_account The ID of the Financial Connections Account used to create the bank account.
 * @property string $last4 The last 4 digits of the account number.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $routing_number The ACH routing number of the bank account.
 * @property (object{microdeposit_verification_details?: (object{expires: int, microdeposit_type: string, sent: int}&\Stripe\StripeObject), status: string}&\Stripe\StripeObject) $verification The bank account verification details.
 */
class UsBankAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.vault.us_bank_account';

    const BANK_ACCOUNT_TYPE_CHECKING = 'checking';
    const BANK_ACCOUNT_TYPE_SAVINGS = 'savings';
}
