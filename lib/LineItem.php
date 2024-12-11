<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A line item.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{enabled: bool, maximum: null|int, minimum: null|int}&\Stripe\StripeObject&\stdClass) $adjustable_quantity
 * @property int $amount_discount Total discount amount applied. If no discounts were applied, defaults to 0.
 * @property int $amount_subtotal Total before any discounts or taxes are applied.
 * @property int $amount_tax Total tax amount applied. If no tax was applied, defaults to 0.
 * @property int $amount_total Total after discounts and taxes.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users. Defaults to product name.
 * @property null|(object{amount: int, discount: \Stripe\Discount}&\Stripe\StripeObject&\stdClass)[] $discounts The discounts applied to the line item.
 * @property (object{description: null|string, images: string[], name: string}&\Stripe\StripeObject&\stdClass) $display
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\Price $price The price used to generate the line item.
 * @property null|string|\Stripe\Product $product <p>The ID of the product for this line item.</p><p>This will always be the same as <code>price.product</code>.</p>
 * @property null|int $quantity The quantity of products being purchased.
 * @property ((object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass))[] $taxes The taxes applied to the line item.
 */
class LineItem extends ApiResource
{
    const OBJECT_NAME = 'item';
}
