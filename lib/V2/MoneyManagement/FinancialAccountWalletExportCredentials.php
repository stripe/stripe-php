<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Credentials exported from a FinancialAccount wallet export.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $credentials_available_until End of the fixed one-hour credentials retrieval window.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{address: string, credentials_encrypted: (object{ciphertext: string, encapsulated_key: string, type: string}&\Stripe\StripeObject), currency_networks: \Stripe\StripeObject, network_type: string}&\Stripe\StripeObject)[] $wallets Exported wallets and credentials encrypted to the supplied recipient public key.
 */
class FinancialAccountWalletExportCredentials extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_account_wallet_export_credentials';
}
