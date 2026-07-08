<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A quantity change object for a pricing line, returned by ListContractPricingLineQuantityChanges.
 *
 * @property string $id The id of the quantity change object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The timestamp when this quantity change object was created.
 * @property int $effective_at The timestamp when this quantity change takes effect.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{price?: string, type: string}&\Stripe\StripeObject) $pricing The pricing configuration for the associated pricing line.
 * @property string $pricing_line The id of the pricing line associated with this quantity change.
 * @property string $quantity The quantity at the effective time.
 */
class ContractPricingLineQuantityChange extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.contract_pricing_line_quantity_change';

    public static function fieldEncodings()
    {
        return ['quantity' => ['kind' => 'decimal_string']];
    }
}
