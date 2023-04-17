<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The line item amount in integer cents. If `tax_behavior=inclusive`, then this amount includes taxes. Otherwise, taxes were calculated on top of this amount.
 * @property int $amount_tax The amount of tax calculated for this line item, in integer cents.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property int $quantity The number of units of the item being purchased. For reversals, this is the quantity reversed.
 * @property string $reference A custom identifier for this line item in the transaction.
 * @property null|\Stripe\StripeObject $reversal If `type=reversal`, contains information about what was reversed.
 * @property string $tax_behavior Specifies whether the `amount` includes taxes. If `tax_behavior=inclusive`, then the amount includes taxes.
 * @property string $tax_code The [tax code](https://stripe.com/docs/tax/tax-categories) ID used for this resource.
 * @property string $type If `reversal`, this line item reverses an earlier transaction.
 */
class TransactionLineItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.transaction_line_item';

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';

    const TYPE_REVERSAL = 'reversal';
    const TYPE_TRANSACTION = 'transaction';
}
