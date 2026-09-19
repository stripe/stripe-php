<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * Whether a project is eligible to provision resources with a provider, and any
 * outstanding KYC requirements that must be satisfied first.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $is_eligible Whether the project is eligible to provision resources with the provider.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string[] $requirements Outstanding requirements that must be satisfied before the project is eligible, if any.
 */
class Eligibility extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'v2.provisioning.eligibility';
}
