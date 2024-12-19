<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SubscriptionScheduleService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the list of your subscription schedules.
     *
     * @param null|array{canceled_at?: int|array, completed_at?: int|array, created?: int|array, customer?: string, ending_before?: string, expand?: string[], limit?: int, released_at?: int|array, scheduled?: bool, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SubscriptionSchedule>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/subscription_schedules', $params, $opts);
    }

    /**
     * Amends an existing subscription schedule.
     *
     * @param string $id
     * @param null|array{amendments?: (array{amendment_end?: array{discount_end?: array{discount: string}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, amendment_start: array{amendment_end?: array{index: int}, discount_end?: array{discount: string}, timestamp?: int, type: string}, billing_cycle_anchor?: string, discount_actions?: array{add?: array{coupon?: string, discount?: string, discount_end?: array{type: string}, index?: int, promotion_code?: string}, remove?: array{coupon?: string, discount?: string, promotion_code?: string}, set?: array{coupon?: string, discount?: string, promotion_code?: string}, type: string}[], item_actions?: array{add?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, remove?: array{price: string}, set?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, type: string}[], metadata_actions?: (array{add?: \Stripe\StripeObject, remove?: string[], set?: null|\Stripe\StripeObject, type: string})[], proration_behavior?: string, set_pause_collection?: array{set?: array{behavior: string}, type: string}, set_schedule_end?: string, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], expand?: string[], prebilling?: null|array{bill_from?: array{amendment_start?: array{index: int}, timestamp?: int, type: string}, bill_until?: array{amendment_end?: array{index: int}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, invoice_at?: string, update_behavior?: string}[], proration_behavior?: string, schedule_settings?: array{end_behavior?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function amend($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_schedules/%s/amend', $id), $params, $opts);
    }

    /**
     * Cancels a subscription schedule and its associated subscription immediately (if
     * the subscription schedule has an active subscription). A subscription schedule
     * can only be canceled if its status is <code>not_started</code> or
     * <code>active</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[], invoice_now?: bool, prorate?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_schedules/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a new subscription schedule object. Each customer can have up to 500
     * active or scheduled subscriptions.
     *
     * @param null|array{billing_behavior?: string, customer?: string, default_settings?: array{application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, default_payment_method?: string, description?: null|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, on_behalf_of?: null|string, transfer_data?: null|array{amount_percent?: float, destination: string}}, end_behavior?: string, expand?: string[], from_subscription?: string, metadata?: null|\Stripe\StripeObject, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, coupon?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: int, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: \Stripe\StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: int, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: array{iterations: int, update_behavior?: string}, start_date?: int|string|array} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/subscription_schedules', $params, $opts);
    }

    /**
     * Releases the subscription schedule immediately, which will stop scheduling of
     * its phases, but leave any existing subscription in place. A schedule can only be
     * released if its status is <code>not_started</code> or <code>active</code>. If
     * the subscription schedule is currently associated with a subscription, releasing
     * it will remove its <code>subscription</code> property and set the subscription’s
     * ID to the <code>released_subscription</code> property.
     *
     * @param string $id
     * @param null|array{expand?: string[], preserve_cancel_date?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function release($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_schedules/%s/release', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an existing subscription schedule. You only need to
     * supply the unique subscription schedule identifier that was returned upon
     * subscription schedule creation.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/subscription_schedules/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing subscription schedule.
     *
     * @param string $id
     * @param null|array{billing_behavior?: string, default_settings?: array{application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, default_payment_method?: string, description?: null|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, on_behalf_of?: null|string, transfer_data?: null|array{amount_percent?: float, destination: string}}, end_behavior?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, coupon?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: int|string|array, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: \Stripe\StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, start_date?: int|string|array, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: int|string|array, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: array{iterations: int, update_behavior?: string}, proration_behavior?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_schedules/%s', $id), $params, $opts);
    }
}
