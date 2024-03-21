<?php

// File generated from our OpenAPI spec

namespace Stripe\Entitlements;

/**
 * A summary of a customer's active entitlements.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $customer The customer that is entitled to this feature.
 * @property \Stripe\Collection<\Stripe\Entitlements\ActiveEntitlement> $entitlements The list of entitlements this customer has.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class ActiveEntitlementSummary extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'entitlements.active_entitlement_summary';
}
