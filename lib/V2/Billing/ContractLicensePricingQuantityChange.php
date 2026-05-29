<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A license pricing quantity change object returned by ListContractLicenseQuantityChanges.
 *
 * @property string $id The ID of the quantity change object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The timestamp when this quantity change object was created.
 * @property int $effective_at The timestamp when this quantity change takes effect.
 * @property string $license_pricing_id The ID of the license pricing.
 * @property string $license_pricing_type The type of the license pricing.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $pricing_line The ID of the pricing line associated with this quantity change.
 * @property int $quantity The quantity at the effective time.
 */
class ContractLicensePricingQuantityChange extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.contract_license_pricing_quantity_change';

    const LICENSE_PRICING_TYPE_LICENSE_FEE = 'license_fee';
    const LICENSE_PRICING_TYPE_PRICE = 'price';
}
