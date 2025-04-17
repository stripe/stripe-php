<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $discount_amount The amount an item was discounted for. Positive integer.
 * @property null|(object{card?: (object{commodity_code: null|string}&StripeObject), klarna?: (object{image_url: null|string, product_url: null|string}&StripeObject), paypal?: (object{category?: string, description?: string, sold_by?: string}&StripeObject)}&StripeObject) $payment_method_options Payment method-specific information for line items.
 * @property null|string $product_code Unique identifier of the product. At most 12 characters long.
 * @property string $product_name Name of the product. At most 100 characters long.
 * @property int $quantity Number of items of the product. Positive integer.
 * @property null|(object{total_tax_amount: int}&StripeObject) $tax Contains information about the tax on the item.
 * @property int $unit_cost Cost of the product. Non-negative integer.
 * @property null|string $unit_of_measure A unit of measure for the line item, such as gallons, feet, meters, etc.
 */
class PaymentIntentAmountDetailsLineItem extends ApiResource
{
    const OBJECT_NAME = 'payment_intent_amount_details_line_item';
}
