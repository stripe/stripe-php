<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * AccountLinks are the means by which a Merchant grants an Account permission to access Stripe-hosted application, such as Recipient Onboarding.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The ID of the Account the link was created for.
 * @property int $created The timestamp at which this AccountLink was created.
 * @property int $expires_at The timestamp at which this AccountLink will expire.
 * @property string $url The URL for the AccountLink.
 * @property (object{type: string, account_onboarding: null|(object{configurations: string[], refresh_url: string, return_url: null|string}&\stdClass&\Stripe\StripeObject), account_update: null|(object{configurations: string[], refresh_url: string, return_url: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $use_case The use case of AccountLink the user is requesting.
 */
class AccountLink extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_link';
}
