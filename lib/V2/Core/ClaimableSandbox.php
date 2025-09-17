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
 * @property (object{mcp?: string, publishable: string, secret: string}&\Stripe\StripeObject) $api_keys Keys that can be used to set up an integration for this sandbox and operate on the account.
 * @property string $claim_url URL for user to claim sandbox into their existing Stripe account.
 * @property int $created When the sandbox is created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{country: string, email: string, name: string}&\Stripe\StripeObject) $prefill Values prefilled during the creation of the sandbox.
 */
class ClaimableSandbox extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.claimable_sandbox';
}
