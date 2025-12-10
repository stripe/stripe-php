<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Tax;

/**
 * A ManualRule holds tax rates for a BillableItem. It can hold at most 5 distinct tax rates.
 *
 * @property string $id The ID of the ManualRule object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The time at which the ManualRule object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{country: string, state?: string}&\Stripe\StripeObject) $location Location where the rule applies.
 * @property (object{type: string, licensed_item?: string, metered_item?: string, tax_code?: string}&\Stripe\StripeObject)[] $products Products associated with the rule.
 * @property (object{rates: (object{country?: string, description?: string, display_name: string, jurisdiction?: string, percentage: string, state?: string}&\Stripe\StripeObject)[], starts_at?: int}&\Stripe\StripeObject)[] $scheduled_tax_rates Tax rates to be applied.
 * @property string $status The status of the ManualRule object.
 */
class ManualRule extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.tax.manual_rule';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
