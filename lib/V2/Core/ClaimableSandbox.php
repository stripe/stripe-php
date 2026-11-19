<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A claimable sandbox is a Stripe sandbox that a user can claim into a new or existing Stripe account
 * through an onboarding link. You can prefill it with an email address, sandbox name, and country.
 * Claimable sandboxes have 60 days to be claimed. After this expiration time has passed,
 * if the sandbox is not claimed, it will be deleted.
 *
 * @property string $id Unique identifier for the claimable sandbox.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $channel The distribution channel used to pre-install your Stripe App on the claimable sandbox. Use <code>testing</code> to install your app's external test version or <code>public</code> to install its published version.
 * @property null|string $claimed_at Time at which the sandbox was claimed. Set when the status is <code>claimed</code> or <code>live</code>. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property string $created Time at which the sandbox was created. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property null|string $expires_at Time at which the unclaimed sandbox expires. Null when the status is <code>claimed</code> or <code>live</code>. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{expires_at: string, refresh_url: string, return_url?: string, url: string}&\Stripe\StripeObject) $onboarding_link_details Details about the onboarding link. Null when the sandbox status is <code>live</code> or <code>expired</code>.
 * @property null|(object{account?: string, app_install_status?: string}&\Stripe\StripeObject) $owner_details Details about the live mode owner account of the sandbox. This will be null until the sandbox is claimed.
 * @property (object{country: string, email: string, name: string}&\Stripe\StripeObject) $prefill Values prefilled during the creation of the sandbox. When a user claims the sandbox, they will be able to update these values.
 * @property (object{account: string, api_keys?: (object{mcp?: (object{created: string, expires_at?: string, id: string, secret_key?: (object{token?: string}&\Stripe\StripeObject), status: string, type: string}&\Stripe\StripeObject), publishable: (object{created: string, expires_at?: string, id: string, publishable_key?: (object{token?: string}&\Stripe\StripeObject), status: string, type: string}&\Stripe\StripeObject), secret: (object{created: string, expires_at?: string, id: string, secret_key?: (object{token?: string}&\Stripe\StripeObject), status: string, type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $sandbox_details Data about the Stripe sandbox object.
 * @property string $status Status of the sandbox.
 */
class ClaimableSandbox extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.claimable_sandbox';

    const CHANNEL_PUBLIC = 'public';
    const CHANNEL_TESTING = 'testing';

    const STATUS_CLAIMED = 'claimed';
    const STATUS_EXPIRED = 'expired';
    const STATUS_LIVE = 'live';
    const STATUS_UNCLAIMED = 'unclaimed';
}
