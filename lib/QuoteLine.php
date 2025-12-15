<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A quote line defines a set of changes, in the order provided, that will be applied upon quote acceptance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|((object{add_discount: null|(object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{type: string}&StripeObject), index: null|int, promotion_code: null|PromotionCode|string}&StripeObject), add_item: null|(object{discounts: ((object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&StripeObject), promotion_code: null|PromotionCode|string}&StripeObject))[], metadata: null|StripeObject, price: Price|string, quantity?: int, tax_rates?: null|TaxRate[], trial?: null|(object{converts_to?: null|string[], type: string}&StripeObject), trial_offer?: null|string}&StripeObject), add_metadata: null|StripeObject, remove_discount: null|(object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&StripeObject), promotion_code: null|PromotionCode|string}&StripeObject), remove_item: null|(object{price: Price|string}&StripeObject), remove_metadata: null|string[], set_discounts: null|((object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&StripeObject), promotion_code: null|PromotionCode|string}&StripeObject))[], set_items: null|((object{discounts: ((object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&StripeObject), promotion_code: null|PromotionCode|string}&StripeObject))[], metadata: null|StripeObject, price: Price|string, quantity?: int, tax_rates?: null|TaxRate[], trial?: null|(object{converts_to?: null|string[], type: string}&StripeObject), trial_offer?: null|string}&StripeObject))[], set_metadata: null|StripeObject, type: string}&StripeObject))[] $actions A list of items the customer is being quoted for.
 * @property null|(object{new_reference: null|string, subscription_schedule: null|string, type: string}&StripeObject) $applies_to Details to identify the subscription schedule the quote line applies to.
 * @property null|string $billing_cycle_anchor For point-in-time quote lines (having no <code>ends_at</code> timestamp), this attribute lets you set or remove whether the subscription's billing cycle anchor is reset at the Quote Line <code>starts_at</code> timestamp.For time-span based quote lines (having both <code>starts_at</code> and <code>ends_at</code>), the only valid value is <code>automatic</code>, which removes any previously configured billing cycle anchor resets during the window of time spanning the quote line.
 * @property null|(object{cancel_at: string, invoice_now: null|bool, prorate: null|bool}&StripeObject) $cancel_subscription_schedule A point-in-time operation that cancels an existing subscription schedule at the line's starts_at timestamp. Currently only compatible with <code>quote_acceptance_date</code> for <code>starts_at</code>. When using cancel_subscription_schedule, the subscription schedule on the quote remains unalterable, except for modifications to the metadata, collection_method or invoice_settings.
 * @property null|string $effective_at Configures how the subscription schedule handles billing for phase transitions.
 * @property null|(object{computed: null|int, discount_end?: null|(object{discount: string}&StripeObject), duration: null|(object{interval: string, interval_count: int}&StripeObject), timestamp: null|int, type: string}&StripeObject) $ends_at Details to identify the end of the time range modified by the proposed change. If not supplied, the quote line is considered a point-in-time operation that only affects the exact timestamp at <code>starts_at</code>, and a restricted set of attributes is supported on the quote line.
 * @property null|string $proration_behavior Changes to how Stripe handles prorations during the quote line's time span. Affects if and how prorations are created when a future phase starts.
 * @property null|(object{set?: null|(object{behavior: string}&StripeObject), type: string}&StripeObject) $set_pause_collection Details to modify the pause_collection behavior of the subscription schedule.
 * @property null|string $set_schedule_end Timestamp helper to end the underlying schedule early, based on the acompanying line's start or end date.
 * @property null|(object{computed: null|int, discount_end?: null|(object{discount: string}&StripeObject), line_ends_at: null|(object{id: string}&StripeObject), timestamp: null|int, type: string}&StripeObject) $starts_at Details to identify the earliest timestamp where the proposed change should take effect.
 * @property null|(object{end_behavior: null|(object{prorate_up_front: null|string}&StripeObject)}&StripeObject) $trial_settings Settings related to subscription trials.
 */
class QuoteLine extends ApiResource
{
    const OBJECT_NAME = 'quote_line';

    const BILLING_CYCLE_ANCHOR_AUTOMATIC = 'automatic';
    const BILLING_CYCLE_ANCHOR_LINE_STARTS_AT = 'line_starts_at';

    const EFFECTIVE_AT_BILLING_PERIOD_START = 'billing_period_start';
    const EFFECTIVE_AT_LINE_START = 'line_start';

    const PRORATION_BEHAVIOR_ALWAYS_INVOICE = 'always_invoice';
    const PRORATION_BEHAVIOR_CREATE_PRORATIONS = 'create_prorations';
    const PRORATION_BEHAVIOR_NONE = 'none';

    const SET_SCHEDULE_END_LINE_ENDS_AT = 'line_ends_at';
    const SET_SCHEDULE_END_LINE_STARTS_AT = 'line_starts_at';
}
