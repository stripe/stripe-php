<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The Account Signals API provides risk related signals that can be used to better manage risks.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The account for which the signals belong to.
 * @property null|(object{evaluated_at: null|int, indicators: null|(object{description: string, impact: string, indicator: string}&StripeObject)[], probability: null|float, risk_level: string, signal_id: null|string}&StripeObject) $delinquency The delinquency signal of the account.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class AccountSignals extends ApiResource
{
    const OBJECT_NAME = 'account_signals';
}
