<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * AccountLinks are the means by which a Merchant grants an Account permission to access Stripe-hosted applications, such as Recipient Onboarding. This API is only available for users enrolled in the public preview for Accounts v2.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The ID of the Account the link was created for.
 * @property int $created The timestamp at which this AccountLink was created.
 * @property int $expires_at The timestamp at which this AccountLink will expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $url The URL for the AccountLink.
 * @property (object{type: string, account_onboarding: null|(object{collection_options: null|(object{fields: null|string, future_requirements: null|string}&\Stripe\StripeObject), configurations: string[], refresh_url: string, return_url: null|string}&\Stripe\StripeObject), account_update: null|(object{collection_options: null|(object{fields: null|string, future_requirements: null|string}&\Stripe\StripeObject), configurations: string[], refresh_url: string, return_url: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $use_case The use case of AccountLink the user is requesting.
 */
class AccountLink extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_link';
}
