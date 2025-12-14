<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * Account Links let a platform create a temporary, single-use URL that an account can use to access a Stripe-hosted flow for collecting or updating required information.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The ID of the connected account this Account Link applies to.
 * @property int $created The timestamp at which this Account Link was created.
 * @property int $expires_at The timestamp at which this Account Link will expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $url The URL at which the account can access the Stripe-hosted flow.
 * @property (object{type: string, account_onboarding?: (object{collection_options?: (object{fields?: string, future_requirements?: string}&\Stripe\StripeObject), configurations: string[], refresh_url: string, return_url?: string}&\Stripe\StripeObject), account_update?: (object{collection_options?: (object{fields?: string, future_requirements?: string}&\Stripe\StripeObject), configurations: string[], refresh_url: string, return_url?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $use_case Hash containing usage options.
 */
class AccountLink extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_link';
}
