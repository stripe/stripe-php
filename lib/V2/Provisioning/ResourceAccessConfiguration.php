<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The current provider-issued access configuration for a Provisioning Resource.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $configuration Provider-defined configuration names mapped to their secret string values.
 * @property string $created Time at which this credential generation became current.
 * @property null|string $expires_at Time at which these credentials cease to be valid, when supplied by the Provider.
 * @property bool $livemode Whether the referenced Resource uses Stripe live-mode objects.
 * @property string $resource Provisioning Resource to which this access configuration belongs.
 */
class ResourceAccessConfiguration extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.resource_access_configuration';
}
