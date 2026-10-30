<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id The ID of the quantity change.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $contract The ID of the parent contract.
 * @property string $created When this quantity change was created.
 * @property string $effective_at When the quantity change takes effect.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $quantity The quantity at the effective time.
 * @property string $term The ID of the recurring-price term.
 */
class ContractTermQuantityChange extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.contract_term_quantity_change';

    public static function fieldEncodings()
    {
        return ['quantity' => ['kind' => 'decimal_string']];
    }
}
