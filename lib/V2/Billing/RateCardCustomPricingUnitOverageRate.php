<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A rate card custom pricing unit overage rate defines the conversion rate from a custom pricing unit
 * to fiat currency when credits are exhausted. This enables automatic overage charges
 * at a configurable per-unit rate.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property string $custom_pricing_unit The ID of the custom pricing unit this overage rate applies to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property OneTimeItem $one_time_item A one-time item represents a product that can be charged as a one-time line item, used for overage charges when custom pricing unit credits are exhausted.
 * @property string $rate_card The ID of the Rate Card this overage rate belongs to.
 * @property string $rate_card_version The ID of the Rate Card Version this overage rate was created on.
 * @property string $unit_amount The per-unit amount to charge for overages, represented as a decimal string in minor currency units with at most 12 decimal places.
 */
class RateCardCustomPricingUnitOverageRate extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.rate_card_custom_pricing_unit_overage_rate';
}
