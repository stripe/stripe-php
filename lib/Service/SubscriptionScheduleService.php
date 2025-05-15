<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SubscriptionScheduleService extends AbstractService
{
    /**
     * Retrieves the list of your subscription schedules.
     *
     * @param null|array{canceled_at?: array|int, completed_at?: array|int, created?: array|int, customer?: string, ending_before?: string, expand?: string[], limit?: int, released_at?: array|int, scheduled?: bool, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\SubscriptionSchedule>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/subscription_schedules', $params, $opts);
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
     * @return \Stripe\SubscriptionSchedule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_schedules/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a new subscription schedule object. Each customer can have up to 500
     * active or scheduled subscriptions.
     *
     * @param null|array{customer?: string, default_settings?: array{application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, default_payment_method?: string, description?: null|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, on_behalf_of?: null|string, transfer_data?: null|array{amount_percent?: float, destination: string}}, end_behavior?: string, expand?: string[], from_subscription?: string, metadata?: null|array<string, string>, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], end_date?: int, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], metadata?: array<string, string>, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], iterations?: int, metadata?: array<string, string>, on_behalf_of?: string, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_end?: int})[], start_date?: array|int|string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SubscriptionSchedule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\SubscriptionSchedule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\SubscriptionSchedule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/subscription_schedules/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing subscription schedule.
     *
     * @param string $id
     * @param null|array{default_settings?: array{application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, default_payment_method?: string, description?: null|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, on_behalf_of?: null|string, transfer_data?: null|array{amount_percent?: float, destination: string}}, end_behavior?: string, expand?: string[], metadata?: null|array<string, string>, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], end_date?: array|int|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], metadata?: array<string, string>, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], iterations?: int, metadata?: array<string, string>, on_behalf_of?: string, proration_behavior?: string, start_date?: array|int|string, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_end?: array|int|string})[], proration_behavior?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SubscriptionSchedule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_schedules/%s', $id), $params, $opts);
    }
}
