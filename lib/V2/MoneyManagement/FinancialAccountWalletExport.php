<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * The singleton wallet export for a FinancialAccount.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $credentials_available_until End of the fixed one-hour credentials retrieval window. Null until the first successful credential export; remains readable after expiry.
 * @property string $financial_account FinancialAccount whose wallet is being exported.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Current wallet export status. The lifecycle is pending, ready, then complete.
 * @property null|(object{address: string, currency_networks: \Stripe\StripeObject, network_type: string}&\Stripe\StripeObject)[] $wallets Public wallet metadata. Null while pending or ready, and retained after the credential window expires.
 */
class FinancialAccountWalletExport extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_account_wallet_export';

    const STATUS_COMPLETE = 'complete';
    const STATUS_PENDING = 'pending';
    const STATUS_READY = 'ready';
}
