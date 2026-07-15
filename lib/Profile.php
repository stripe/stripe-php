<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Stripe profile.
 *
 * @property string $id Unique identifier for the Stripe profile.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{icon: null|(object{original: string}&StripeObject), logo: null|(object{original: string}&StripeObject), primary_color: null|string, secondary_color: null|string}&StripeObject) $branding Branding information for the Stripe profile.
 * @property null|string $description A description of the business or entity represented by the Stripe profile.
 * @property string $display_name The display name shown for the Stripe profile.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $url The external website URL associated with the Stripe profile.
 * @property string $username The unique username for the Stripe profile.
 */
class Profile extends ApiResource
{
    const OBJECT_NAME = 'profile';
}
