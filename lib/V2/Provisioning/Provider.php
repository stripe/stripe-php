<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The <code>Provider</code> resource represents a third-party provider available in the
 * provisioning catalog.
 *
 * @property string $id Unique identifier for the provider.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string[] $capabilities Capabilities supported by the provider.
 * @property string[] $categories Categories the provider belongs to.
 * @property \Stripe\StripeObject $configuration_schema Schema describing the configuration accepted by this provider.
 * @property string $created Time at which the provider was created.
 * @property string[] $deep_link_purposes Deep-link purposes supported by the provider.
 * @property string $description Description of the provider.
 * @property bool $development proto3 scalar defaults apply: if unset, this value is <code>false</code>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $llm_context URL of additional context about the provider intended for LLM consumption.
 * @property string $name Human-readable name of the provider.
 * @property null|string $privacy_policy_url URL of the provider's privacy policy.
 * @property null|string $tos_url URL of the provider's terms of service.
 * @property null|string $website_url URL of the provider's website.
 */
class Provider extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.provider';
}
