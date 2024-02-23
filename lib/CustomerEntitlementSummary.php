<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A summary of a customer's entitlements.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $customer The customer that is entitled to this feature.
 * @property \Stripe\Collection<\Stripe\CustomerEntitlement> $entitlements The list of entitlements this customer has.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class CustomerEntitlementSummary extends ApiResource
{
    const OBJECT_NAME = 'customer_entitlement_summary';
}
