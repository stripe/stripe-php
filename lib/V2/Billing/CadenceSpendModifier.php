<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Spend Modifier changes how spend is computed when billing for specific cadence.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $billing_cadence The ID of the Billing Cadence this spend modifier is associated with.
 * @property int $created Timestamp of when the object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{alert: string, amount: (object{custom_pricing_unit?: (object{value: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), custom_pricing_unit_overage_rate: (object{id: string}&\Stripe\StripeObject), effective_from: int, effective_until?: int}&\Stripe\StripeObject) $max_billing_period_spend Max invoice spend details. Present if type is <code>max_billing_period_spend</code>.
 * @property string $type The type of the spend modifier.
 */
class CadenceSpendModifier extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.cadence_spend_modifier';
}
