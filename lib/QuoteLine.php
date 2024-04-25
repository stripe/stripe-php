<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A quote line defines a set of changes, in the order provided, that will be applied upon quote acceptance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject[] $actions A list of items the customer is being quoted for.
 * @property null|\Stripe\StripeObject $applies_to Details to identify the subscription schedule the quote line applies to.
 * @property null|string $billing_cycle_anchor For a point-in-time operation, this attribute lets you set or update whether the subscription's billing cycle anchor is reset at the <code>starts_at</code> timestamp.
 * @property null|\Stripe\StripeObject $cancel_subscription_schedule A point-in-time operation that cancels an existing subscription schedule at the line's starts_at timestamp. Currently only compatible with <code>quote_acceptance_date</code> for <code>starts_at</code>. When using cancel_subscription_schedule, the subscription schedule on the quote remains unalterable, except for modifications to the metadata, collection_method or invoice_settings.
 * @property null|\Stripe\StripeObject $ends_at Details to identify the end of the time range modified by the proposed change. If not supplied, the quote line is considered a point-in-time operation that only affects the exact timestamp at <code>starts_at</code>, and a restricted set of attributes is supported on the quote line.
 * @property null|string $proration_behavior Changes to how Stripe handles prorations during the quote line's time span. Affects if and how prorations are created when a future phase starts.
 * @property null|\Stripe\StripeObject $set_pause_collection Details to modify the pause_collection behavior of the subscription schedule.
 * @property null|string $set_schedule_end Timestamp helper to end the underlying schedule early, based on the acompanying line's start or end date.
 * @property null|\Stripe\StripeObject $starts_at Details to identify the earliest timestamp where the proposed change should take effect.
 * @property null|\Stripe\StripeObject $trial_settings Settings related to subscription trials.
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
