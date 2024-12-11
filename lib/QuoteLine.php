<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A quote line defines a set of changes, in the order provided, that will be applied upon quote acceptance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property ((object{add_discount: null|(object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{type: string}&\Stripe\StripeObject&\stdClass), index: null|int, promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass), add_item: null|(object{discounts: ((object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass))[], metadata: null|\Stripe\StripeObject, price: string|\Stripe\Price, quantity?: int, tax_rates?: null|\Stripe\TaxRate[], trial?: null|(object{converts_to?: null|string[], type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), add_metadata: null|\Stripe\StripeObject, remove_discount: null|(object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass), remove_item: null|(object{price: string|\Stripe\Price}&\Stripe\StripeObject&\stdClass), remove_metadata: null|string[], set_discounts: null|((object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass))[], set_items: null|((object{discounts: ((object{coupon: null|string|\Stripe\Coupon, discount: null|string|\Stripe\Discount, discount_end?: null|(object{timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), promotion_code: null|string|\Stripe\PromotionCode}&\Stripe\StripeObject&\stdClass))[], metadata: null|\Stripe\StripeObject, price: string|\Stripe\Price, quantity?: int, tax_rates?: null|\Stripe\TaxRate[], trial?: null|(object{converts_to?: null|string[], type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass))[], set_metadata: null|\Stripe\StripeObject, type: string}&\Stripe\StripeObject&\stdClass))[] $actions A list of items the customer is being quoted for.
 * @property null|(object{new_reference: null|string, subscription_schedule: null|string, type: string}&\Stripe\StripeObject&\stdClass) $applies_to Details to identify the subscription schedule the quote line applies to.
 * @property null|string $billing_cycle_anchor For point-in-time quote lines (having no <code>ends_at</code> timestamp), this attribute lets you set or remove whether the subscription's billing cycle anchor is reset at the Quote Line <code>starts_at</code> timestamp.For time-span based quote lines (having both <code>starts_at</code> and <code>ends_at</code>), the only valid value is <code>automatic</code>, which removes any previously configured billing cycle anchor resets during the window of time spanning the quote line.
 * @property null|(object{cancel_at: string, invoice_now: null|bool, prorate: null|bool}&\Stripe\StripeObject&\stdClass) $cancel_subscription_schedule A point-in-time operation that cancels an existing subscription schedule at the line's starts_at timestamp. Currently only compatible with <code>quote_acceptance_date</code> for <code>starts_at</code>. When using cancel_subscription_schedule, the subscription schedule on the quote remains unalterable, except for modifications to the metadata, collection_method or invoice_settings.
 * @property null|(object{computed: null|int, discount_end?: null|(object{discount: string}&\Stripe\StripeObject&\stdClass), duration: null|(object{interval: string, interval_count: int}&\Stripe\StripeObject&\stdClass), timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass) $ends_at Details to identify the end of the time range modified by the proposed change. If not supplied, the quote line is considered a point-in-time operation that only affects the exact timestamp at <code>starts_at</code>, and a restricted set of attributes is supported on the quote line.
 * @property null|string $proration_behavior Changes to how Stripe handles prorations during the quote line's time span. Affects if and how prorations are created when a future phase starts.
 * @property null|(object{set?: null|(object{behavior: string}&\Stripe\StripeObject&\stdClass), type: string}&\Stripe\StripeObject&\stdClass) $set_pause_collection Details to modify the pause_collection behavior of the subscription schedule.
 * @property null|string $set_schedule_end Timestamp helper to end the underlying schedule early, based on the acompanying line's start or end date.
 * @property null|(object{computed: null|int, discount_end?: null|(object{discount: string}&\Stripe\StripeObject&\stdClass), line_ends_at: null|(object{id: string}&\Stripe\StripeObject&\stdClass), timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass) $starts_at Details to identify the earliest timestamp where the proposed change should take effect.
 * @property null|(object{end_behavior: null|(object{prorate_up_front: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $trial_settings Settings related to subscription trials.
 */
class QuoteLine extends ApiResource
{
    const OBJECT_NAME = 'quote_line';

    const BILLING_CYCLE_ANCHOR_AUTOMATIC = 'automatic';
    const BILLING_CYCLE_ANCHOR_LINE_STARTS_AT = 'line_starts_at';

    const PRORATION_BEHAVIOR_ALWAYS_INVOICE = 'always_invoice';
    const PRORATION_BEHAVIOR_CREATE_PRORATIONS = 'create_prorations';
    const PRORATION_BEHAVIOR_NONE = 'none';

    const SET_SCHEDULE_END_LINE_ENDS_AT = 'line_ends_at';
    const SET_SCHEDULE_END_LINE_STARTS_AT = 'line_starts_at';
}
