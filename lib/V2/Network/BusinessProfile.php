<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Network;

/**
 * The Stripe profile represents a business' public identity on the Stripe network.
 *
 * @property string $id The ID of the Stripe business profile; also known as the Network ID. This is the ID used to identify the business on the Stripe network.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{icon?: (object{original: string}&\Stripe\StripeObject), logo?: (object{original: string}&\Stripe\StripeObject), primary_color?: string, secondary_color?: string}&\Stripe\StripeObject) $branding Branding data for the business.
 * @property null|string $description The description of the business.
 * @property string $display_name The display name of the Stripe profile.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $url The URL of the business.
 * @property string $username The username of the Stripe profile.
 */
class BusinessProfile extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.network.business_profile';
}
