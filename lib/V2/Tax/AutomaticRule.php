<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Tax;

/**
 * An AutomaticRule holds automatic Tax configuration for a BillableItem.
 *
 * @property string $id The ID of the AutomaticRule object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $billable_item The ID of the BillableItem.
 * @property int $created The time at which the AutomaticRule object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the AutomaticRule object.
 * @property string $tax_code A TaxCode object that will be used for automatic tax calculations.
 */
class AutomaticRule extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.tax.automatic_rule';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
