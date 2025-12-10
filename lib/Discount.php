<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A discount represents the actual application of a <a href="https://api.stripe.com#coupons">coupon</a> or <a href="https://api.stripe.com#promotion_codes">promotion code</a>.
 * It contains information about when the discount began, when it will end, and what it is applied to.
 *
 * Related guide: <a href="https://docs.stripe.com/billing/subscriptions/discounts">Applying discounts to subscriptions</a>
 *
 * @property string $id The ID of the discount object. Discounts cannot be fetched by ID. Use <code>expand[]=discounts</code> in API calls to expand discount IDs in an array.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $checkout_session The Checkout session that this coupon is applied to, if it is applied to a particular session in payment mode. Will not be present for subscription mode.
 * @property null|Customer|string $customer The ID of the customer associated with this discount.
 * @property null|string $customer_account The ID of the account representing the customer associated with this discount.
 * @property null|int $end If the coupon has a duration of <code>repeating</code>, the date that this discount will end. If the coupon has a duration of <code>once</code> or <code>forever</code>, this attribute will be null.
 * @property null|string $invoice The invoice that the discount's coupon was applied to, if it was applied directly to a particular invoice.
 * @property null|string $invoice_item The invoice item <code>id</code> (or invoice line item <code>id</code> for invoice line items of type='subscription') that the discount's coupon was applied to, if it was applied directly to a particular invoice item or invoice line item.
 * @property null|PromotionCode|string $promotion_code The promotion code applied to create this discount.
 * @property (object{coupon: null|Coupon|string, type: string}&StripeObject) $source
 * @property int $start Date that the coupon was applied.
 * @property null|string $subscription The subscription that this coupon is applied to, if it is applied to a particular subscription.
 * @property null|string $subscription_item The subscription item that this coupon is applied to, if it is applied to a particular subscription item.
 */
class Discount extends ApiResource
{
    const OBJECT_NAME = 'discount';
}
