<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * The PayoutMethodsBankAccountSpec object.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $countries The list of specs by country.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class PayoutMethodsBankAccountSpec extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'v2.money_management.payout_methods_bank_account_spec';
}
