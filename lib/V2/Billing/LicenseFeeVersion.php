<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property string $license_fee_id The ID of the parent License Fee.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $tiering_mode Defines whether the tiering price should be graduated or volume-based. In volume-based tiering, the maximum quantity within a period determines the per-unit price. In graduated tiering, the pricing changes as the quantity grows into new tiers. Can only be set if <code>tiers</code> is set.
 * @property (object{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}&\Stripe\StripeObject)[] $tiers Each element represents a pricing tier. Cannot be set if <code>unit_amount</code> is provided.
 * @property null|(object{divide_by: int, round: string}&\Stripe\StripeObject) $transform_quantity Apply a transformation to the reported usage or set quantity before computing the amount billed.
 * @property null|string $unit_amount The per-unit amount to be charged, represented as a decimal string in minor currency units with at most 12 decimal places. Cannot be set if <code>tiers</code> is provided.
 */
class LicenseFeeVersion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.license_fee_version';

    const TIERING_MODE_GRADUATED = 'graduated';
    const TIERING_MODE_VOLUME = 'volume';
}
