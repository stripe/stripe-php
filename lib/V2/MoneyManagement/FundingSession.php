<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FundingSession is a hosted funding surface for a customer to fund a FinancialAccount.
 *
 * @property string $id The ID of the FundingSession. ID prefix: <code>fndsess</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The ID of the Account that owns the FinancialAccount.
 * @property string $created The creation timestamp of the FundingSession.
 * @property string $financial_account The ID of the FinancialAccount this FundingSession funds.
 * @property (object{crypto_wallet?: (object{settlement_currency: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $financial_address_options Per-type options used when creating the FinancialAddress.
 * @property string[] $financial_address_types Open Enum. The types of FinancialAddress that can be funded in this session.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $return_url The URL the customer is redirected to after completing (or abandoning) the funding session.
 * @property string $url The short-lived hosted funding URL the customer visits to fund the FinancialAccount.
 */
class FundingSession extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.funding_session';
}
