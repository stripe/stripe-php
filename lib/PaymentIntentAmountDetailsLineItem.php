<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $discount_amount <p>The discount applied on this line item represented in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>. An integer greater than 0.</p><p>This field is mutually exclusive with the <code>amount_details[discount_amount]</code> field.</p>
 * @property null|(object{card?: (object{commodity_code: null|string}&StripeObject), card_present?: (object{commodity_code: null|string}&StripeObject), klarna?: (object{image_url: null|string, product_url: null|string, reference: null|string, subscription_reference: null|string}&StripeObject), paypal?: (object{category?: string, description?: string, sold_by?: string}&StripeObject)}&StripeObject) $payment_method_options Payment method-specific information for line items.
 * @property null|string $product_code The product code of the line item, such as an SKU. Required for L3 rates. At most 12 characters long.
 * @property string $product_name <p>The product name of the line item. Required for L3 rates. At most 1024 characters long.</p><p>For Cards, this field is truncated to 26 alphanumeric characters before being sent to the card networks. For Paypal, this field is truncated to 127 characters.</p>
 * @property int $quantity The quantity of items. Required for L3 rates. An integer greater than 0.
 * @property null|(object{total_tax_amount: int}&StripeObject) $tax Contains information about the tax on the item.
 * @property int $unit_cost The unit cost of the line item represented in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>. Required for L3 rates. An integer greater than or equal to 0.
 * @property null|string $unit_of_measure A unit of measure for the line item, such as gallons, feet, meters, etc. Required for L3 rates. At most 12 alphanumeric characters long.
 */
class PaymentIntentAmountDetailsLineItem extends ApiResource
{
    const OBJECT_NAME = 'payment_intent_amount_details_line_item';
}
