<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property null|(object{custom_pricing_unit_details?: CustomPricingUnit, id: string, value: string}&\Stripe\StripeObject) $custom_pricing_unit_amount The custom pricing unit that this rate binds to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property MeteredItem $metered_item A Metered Item represents a billable item whose pricing is based on usage, measured by a meter. You can use rate cards to specify the pricing and create subscriptions to these items.
 * @property string $rate_card The ID of the Rate Card it belongs to.
 * @property string $rate_card_version The ID of the Rate Card Version it was created on.
 * @property null|string $tiering_mode Defines whether the tiering price should be graduated or volume-based. In volume-based tiering, the maximum quantity within a period determines the per-unit price. In graduated tiering, the pricing changes as the quantity grows into new tiers. Can only be set if <code>tiers</code> is set.
 * @property (object{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}&\Stripe\StripeObject)[] $tiers Each element represents a pricing tier. Cannot be set if <code>unit_amount</code> is provided.
 * @property null|(object{divide_by: int, round: string}&\Stripe\StripeObject) $transform_quantity Apply a transformation to the reported usage or set quantity before computing the amount billed.
 * @property null|string $unit_amount The per-unit amount to be charged, represented as a decimal string in minor currency units with at most 12 decimal places. Cannot be set if <code>tiers</code> is provided.
 */
class RateCardRate extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.rate_card_rate';

    const TIERING_MODE_GRADUATED = 'graduated';
    const TIERING_MODE_VOLUME = 'volume';
}
