<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SubscriptionService extends AbstractService
{
    /**
     * By default, returns a list of subscriptions that have not been canceled. In
     * order to list canceled subscriptions, specify <code>status=canceled</code>.
     *
     * @param null|array{automatic_tax?: array{enabled: bool}, collection_method?: string, created?: array|int, current_period_end?: array|int, current_period_start?: array|int, customer?: string, ending_before?: string, expand?: string[], limit?: int, plan?: string, price?: string, starting_after?: string, status?: string, test_clock?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Subscription>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/subscriptions', $params, $opts);
    }

    /**
     * Cancels a customer’s subscription immediately. The customer won’t be charged
     * again for the subscription. After it’s canceled, you can no longer update the
     * subscription or its <a href="/metadata">metadata</a>.
     *
     * Any pending invoice items that you’ve created are still charged at the end of
     * the period, unless manually <a href="#delete_invoiceitem">deleted</a>. If you’ve
     * set the subscription to cancel at the end of the period, any pending prorations
     * are also left in place and collected at the end of the period. But if the
     * subscription is set to cancel immediately, pending prorations are removed.
     *
     * By default, upon subscription cancellation, Stripe stops automatic collection of
     * all finalized invoices for the customer. This is intended to prevent unexpected
     * payment attempts after the customer has canceled a subscription. However, you
     * can resume automatic collection of the invoices manually after subscription
     * cancellation to have us proceed. Or, you could check for unpaid invoices before
     * allowing the customer to cancel the subscription at all.
     *
     * @param string $id
     * @param null|array{cancellation_details?: array{comment?: null|string, feedback?: null|string}, expand?: string[], invoice_now?: bool, prorate?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Subscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/subscriptions/%s', $id), $params, $opts);
    }

    /**
     * Creates a new subscription on an existing customer. Each customer can have up to
     * 500 active or scheduled subscriptions.
     *
     * When you create a subscription with
     * <code>collection_method=charge_automatically</code>, the first invoice is
     * finalized as part of the request. The <code>payment_behavior</code> parameter
     * determines the exact behavior of the initial payment.
     *
     * To start subscriptions where the first invoice always begins in a
     * <code>draft</code> status, use <a
     * href="/docs/billing/subscriptions/subscription-schedules#managing">subscription
     * schedules</a> instead. Schedules provide the flexibility to model more complex
     * billing configurations that change over time.
     *
     * @param null|array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: null|float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, backdate_start_date?: int, billing_cycle_anchor?: int, billing_cycle_anchor_config?: array{day_of_month: int, hour?: int, minute?: int, month?: int, second?: int}, cancel_at?: int, cancel_at_period_end?: bool, collection_method?: string, currency?: string, customer: string, days_until_due?: int, default_payment_method?: string, default_source?: string, default_tax_rates?: null|string[], description?: string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], invoice_settings?: array{account_tax_ids?: null|string[], issuer?: array{account?: string, type: string}}, items?: (array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], metadata?: \Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: null|\Stripe\StripeObject, off_session?: bool, on_behalf_of?: null|string, payment_behavior?: string, payment_settings?: array{payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: null|array{preferred_language?: string}, card?: null|array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: null|array{}, sepa_debit?: null|array{}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method?: string}}, payment_method_types?: null|string[], save_default_payment_method?: string}, pending_invoice_item_interval?: null|array{interval: string, interval_count?: int}, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial_end?: array|int|string, trial_from_plan?: bool, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Subscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/subscriptions', $params, $opts);
    }

    /**
     * Removes the currently applied discount on a subscription.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Discount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deleteDiscount($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/subscriptions/%s/discount', $id), $params, $opts);
    }

    /**
     * Initiates resumption of a paused subscription, optionally resetting the billing
     * cycle anchor and creating prorations. If a resumption invoice is generated, it
     * must be paid or marked uncollectible before the subscription will be unpaused.
     * If payment succeeds the subscription will become <code>active</code>, and if
     * payment fails the subscription will be <code>past_due</code>. The resumption
     * invoice will void automatically if not paid by the expiration date.
     *
     * @param string $id
     * @param null|array{billing_cycle_anchor?: string, expand?: string[], proration_behavior?: string, proration_date?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Subscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function resume($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscriptions/%s/resume', $id), $params, $opts);
    }

    /**
     * Retrieves the subscription with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Subscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/subscriptions/%s', $id), $params, $opts);
    }

    /**
     * Search for subscriptions you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SearchResult<\Stripe\Subscription>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/subscriptions/search', $params, $opts);
    }

    /**
     * Updates an existing subscription to match the specified parameters. When
     * changing prices or quantities, we optionally prorate the price we charge next
     * month to make up for any price changes. To preview how the proration is
     * calculated, use the <a href="/docs/api/invoices/create_preview">create
     * preview</a> endpoint.
     *
     * By default, we prorate subscription changes. For example, if a customer signs up
     * on May 1 for a <currency>100</currency> price, they’ll be billed
     * <currency>100</currency> immediately. If on May 15 they switch to a
     * <currency>200</currency> price, then on June 1 they’ll be billed
     * <currency>250</currency> (<currency>200</currency> for a renewal of her
     * subscription, plus a <currency>50</currency> prorating adjustment for half of
     * the previous month’s <currency>100</currency> difference). Similarly, a
     * downgrade generates a credit that is applied to the next invoice. We also
     * prorate when you make quantity changes.
     *
     * Switching prices does not normally change the billing date or generate an
     * immediate charge unless:
     *
     * <ul> <li>The billing interval is changed (for example, from monthly to
     * yearly).</li> <li>The subscription moves from free to paid.</li> <li>A trial
     * starts or ends.</li> </ul>
     *
     * In these cases, we apply a credit for the unused time on the previous price,
     * immediately charge the customer using the new price, and reset the billing date.
     * Learn about how <a
     * href="/docs/billing/subscriptions/upgrade-downgrade#immediate-payment">Stripe
     * immediately attempts payment for subscription changes</a>.
     *
     * If you want to charge for an upgrade immediately, pass
     * <code>proration_behavior</code> as <code>always_invoice</code> to create
     * prorations, automatically invoice the customer for those proration adjustments,
     * and attempt to collect payment. If you pass <code>create_prorations</code>, the
     * prorations are created but not automatically invoiced. If you want to bill the
     * customer for the prorations before the subscription’s renewal date, you need to
     * manually <a href="/docs/api/invoices/create">invoice the customer</a>.
     *
     * If you don’t want to prorate, set the <code>proration_behavior</code> option to
     * <code>none</code>. With this option, the customer is billed
     * <currency>100</currency> on May 1 and <currency>200</currency> on June 1.
     * Similarly, if you set <code>proration_behavior</code> to <code>none</code> when
     * switching between different billing intervals (for example, from monthly to
     * yearly), we don’t generate any credits for the old subscription’s unused time.
     * We still reset the billing date and bill immediately for the new subscription.
     *
     * Updating the quantity on a subscription many times in an hour may result in <a
     * href="/docs/rate-limits">rate limiting</a>. If you need to bill for a frequently
     * changing quantity, consider integrating <a
     * href="/docs/billing/subscriptions/usage-based">usage-based billing</a> instead.
     *
     * @param string $id
     * @param null|array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: null|float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, cancel_at?: null|int, cancel_at_period_end?: bool, cancellation_details?: array{comment?: null|string, feedback?: null|string}, collection_method?: string, days_until_due?: int, default_payment_method?: string, default_source?: null|string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], invoice_settings?: array{account_tax_ids?: null|string[], issuer?: array{account?: string, type: string}}, items?: (array{clear_usage?: bool, deleted?: bool, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], id?: string, metadata?: null|\Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: null|\Stripe\StripeObject, off_session?: bool, on_behalf_of?: null|string, pause_collection?: null|array{behavior: string, resumes_at?: int}, payment_behavior?: string, payment_settings?: array{payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: null|array{preferred_language?: string}, card?: null|array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: null|array{}, sepa_debit?: null|array{}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method?: string}}, payment_method_types?: null|string[], save_default_payment_method?: string}, pending_invoice_item_interval?: null|array{interval: string, interval_count?: int}, proration_behavior?: string, proration_date?: int, transfer_data?: null|array{amount_percent?: float, destination: string}, trial_end?: array|int|string, trial_from_plan?: bool, trial_settings?: array{end_behavior: array{missing_payment_method: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Subscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscriptions/%s', $id), $params, $opts);
    }
}
