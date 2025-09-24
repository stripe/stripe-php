<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A claimable sandbox represents a Stripe sandbox that is anonymous.
 * When it is created, it can be prefilled with specific metadata, such as email, name, or country.
 * Claimable sandboxes can be claimed through a URL. When a user claims a sandbox through this URL,
 * it will prompt them to create a new Stripe account. Or, it will allow them to claim this sandbox in their
 * existing Stripe account.
 * Claimable sandboxes have 60 days to be claimed. After this expiration time has passed,
 * if the sandbox is not claimed, it will be deleted.
 *
 * @property string $id Unique identifier for the Claimable sandbox.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $claim_url URL for user to claim sandbox into their existing Stripe account. The value will be null if the sandbox status is <code>claimed</code> or <code>expired</code>.
 * @property null|int $claimed_at The timestamp the sandbox was claimed. The value will be null if the sandbox status is not <code>claimed</code>.
 * @property int $created When the sandbox is created.
 * @property null|int $expires_at The timestamp the sandbox will expire. The value will be null if the sandbox is <code>claimed</code>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{country: string, email: string, name: string}&\Stripe\StripeObject) $prefill Values prefilled during the creation of the sandbox. When a user claims the sandbox, they will be able to update these values.
 * @property (object{account: string, api_keys?: (object{mcp?: string, publishable: string, secret: string}&\Stripe\StripeObject), owner_account?: string}&\Stripe\StripeObject) $sandbox_details Data about the Stripe sandbox object.
 * @property string $status Status of the sandbox. One of <code>unclaimed</code>, <code>expired</code>, <code>claimed</code>.
 */
class ClaimableSandbox extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.claimable_sandbox';

    const STATUS_CLAIMED = 'claimed';
    const STATUS_EXPIRED = 'expired';
    const STATUS_UNCLAIMED = 'unclaimed';
}
