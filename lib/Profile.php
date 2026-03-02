<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Stripe profile.
 *
 * @property string $id
 * @property string $object
 * @property null|(object{icon: null|(object{original: string}&StripeObject), logo: null|(object{original: string}&StripeObject), primary_color: null|string, secondary_color: null|string}&StripeObject) $branding
 * @property null|string $description
 * @property string $display_name
 * @property bool $livemode
 * @property null|string $url
 * @property string $username
 */
class Profile extends ApiResource
{
    const OBJECT_NAME = 'profile';
}
