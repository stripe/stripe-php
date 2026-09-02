<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Signals;

/**
 * Account Activity resource for the Signals API.
 *
 * @property string $id Unique identifier for the account activity.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{account?: string, customer?: string, data?: (object{defaults?: (object{profile: (object{business_url: string, doing_business_as?: string, product_description?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), identity?: (object{business_details: (object{registered_name?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $account_details The account, customer, or inline account data associated with the activity.
 * @property null|string $account_evaluation The account evaluation this activity is associated with, when applicable.
 * @property null|(object{reason: string}&\Stripe\StripeObject) $account_restricted Details for the account restriction. Present only when type is account_restricted. The activity requires an existing account_details.account or account_details.customer; inline data is unsupported.
 * @property null|(object{reason: string}&\Stripe\StripeObject) $account_suspended Details for the account suspension. Present only when type is account_suspended. The activity requires an existing account_details.customer; account_details.account and inline data are unsupported.
 * @property string $created Timestamp at which the account activity was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{client_details: (object{data?: (object{ip: string, referrer?: string, user_agent?: string}&\Stripe\StripeObject), radar_session?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $login_attempt Details for the login attempt. Present only when type is login_attempt.
 * @property null|(object{status: string}&\Stripe\StripeObject) $login_decision Details for the login decision. Present only when type is login_decision.
 * @property null|\Stripe\StripeObject $metadata Additional information about the activity.
 * @property string $occurred_at Timestamp at which the activity occurred. Defaults to the created time if not provided.
 * @property null|(object{client_details: (object{data?: (object{ip: string, referrer?: string, user_agent?: string}&\Stripe\StripeObject), radar_session?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $registration_attempt Details for the registration attempt. Present only when type is registration_attempt.
 * @property null|(object{status: string}&\Stripe\StripeObject) $registration_decision Details for the registration decision. Present only when type is registration_decision.
 * @property string $type The type of activity.
 */
class AccountActivity extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.signals.account_activity';

    const TYPE_ACCOUNT_RESTRICTED = 'account_restricted';
    const TYPE_ACCOUNT_SUSPENDED = 'account_suspended';
    const TYPE_LOGIN_ATTEMPT = 'login_attempt';
    const TYPE_LOGIN_DECISION = 'login_decision';
    const TYPE_REGISTRATION_ATTEMPT = 'registration_attempt';
    const TYPE_REGISTRATION_DECISION = 'registration_decision';
}
