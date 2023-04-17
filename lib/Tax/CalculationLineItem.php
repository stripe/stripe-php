<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The line item amount in integer cents. If `tax_behavior=inclusive`, then this amount includes taxes. Otherwise, taxes were calculated on top of this amount.
 * @property int $amount_tax The amount of tax calculated for this line item, in integer cents.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|string $product A Product ID.
 * @property int $quantity The number of units of the item being purchased. For reversals, this is the quantity reversed.
 * @property null|string $reference A custom identifier for this line item.
 * @property string $tax_behavior Specifies whether the `amount` includes taxes. If `tax_behavior=inclusive`, then the amount includes taxes.
 * @property null|\Stripe\StripeObject[] $tax_breakdown Detailed account of taxes relevant to this line item.
 * @property string $tax_code The [tax code](https://stripe.com/docs/tax/tax-categories) ID used for this resource.
 */
class CalculationLineItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.calculation_line_item';

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';
}
