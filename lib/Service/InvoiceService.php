<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InvoiceService extends \Stripe\Service\AbstractService
{
    /**
     * Adds multiple line items to an invoice. This is only possible when an invoice is
     * still a draft.
     *
     * @param string $id
     * @param null|array{expand?: string[], invoice_metadata?: null|\Stripe\StripeObject, lines: (array{amount?: int, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], invoice_item?: string, margins?: null|string[], metadata?: null|\Stripe\StripeObject, period?: array{end: int, start: int}, price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: \Stripe\StripeObject, name: string, tax_code?: string}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate_data: array{country?: string, description?: string, display_name: string, inclusive: bool, jurisdiction?: string, percentage: float, state?: string, tax_type?: string}, taxable_amount: int}[], tax_rates?: null|string[]})[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function addLines($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/add_lines', $id), $params, $opts);
    }

    /**
     * You can list all invoices, or list the invoices for a specific customer. The
     * invoices are returned sorted by creation date, with the most recently created
     * invoices appearing first.
     *
     * @param null|array{collection_method?: string, created?: int|array, customer?: string, due_date?: int|array, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string, subscription?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Invoice>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/invoices', $params, $opts);
    }

    /**
     * When retrieving an invoice, you’ll get a <strong>lines</strong> property
     * containing the total count of line items and the first handful of those items.
     * There is also a URL where you can retrieve the full (paginated) list of line
     * items.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\InvoiceLineItem>
     */
    public function allLines($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/invoices/%s/lines', $parentId), $params, $opts);
    }

    /**
     * When retrieving an invoice, there is an includable payments property containing
     * the first handful of those items. There is also a URL where you can retrieve the
     * full (paginated) list of payments.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\InvoicePayment>
     */
    public function allPayments($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/invoices/%s/payments', $parentId), $params, $opts);
    }

    /**
     * Attaches a PaymentIntent or an Out of Band Payment to the invoice, adding it to
     * the list of <code>payments</code>.
     *
     * For Out of Band Payment, the payment is credited to the invoice immediately,
     * increasing the <code>amount_paid</code> of the invoice and subsequently
     * transitioning the status of the invoice to <code>paid</code> if necessary.
     *
     * For the PaymentIntent, when the PaymentIntent’s status changes to
     * <code>succeeded</code>, the payment is credited to the invoice, increasing its
     * <code>amount_paid</code>. When the invoice is fully paid, the invoice’s status
     * becomes <code>paid</code>.
     *
     * If the PaymentIntent’s status is already <code>succeeded</code> when it’s
     * attached, it’s credited to the invoice immediately.
     *
     * See: <a href="/docs/invoicing/payments/create">Create an invoice payment</a> to
     * learn more.
     *
     * @param string $id
     * @param null|array{amount_requested?: int, expand?: string[], payment_intent?: string, payment_record?: string, payment_record_data?: array{amount: int, currency: string, metadata?: null|\Stripe\StripeObject, money_movement_type: string, paid_at?: int, payment_reference?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function attachPayment($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/attach_payment', $id), $params, $opts);
    }

    /**
     * Attaches a PaymentIntent to the invoice, adding it to the list of
     * <code>payments</code>. When the PaymentIntent’s status changes to
     * <code>succeeded</code>, the payment is credited to the invoice, increasing its
     * <code>amount_paid</code>. When the invoice is fully paid, the invoice’s status
     * becomes <code>paid</code>.
     *
     * If the PaymentIntent’s status is already <code>succeeded</code> when it is
     * attached, it is credited to the invoice immediately.
     *
     * Related guide: <a href="/docs/invoicing/payments/create">Create an invoice
     * payment</a>
     *
     * @param string $id
     * @param null|array{amount_requested?: int, expand?: string[], payment_intent: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function attachPaymentIntent($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/attach_payment_intent', $id), $params, $opts);
    }

    /**
     * This endpoint creates a draft invoice for a given customer. The invoice remains
     * a draft until you <a href="#finalize_invoice">finalize</a> the invoice, which
     * allows you to <a href="#pay_invoice">pay</a> or <a href="#send_invoice">send</a>
     * the invoice to your customers.
     *
     * @param null|array{account_tax_ids?: null|string[], amounts_due?: null|array{amount: int, days_until_due?: int, description: string, due_date?: int}[], application_fee_amount?: int, auto_advance?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, automatically_finalizes_at?: int, collection_method?: string, currency?: string, custom_fields?: null|array{name: string, value: string}[], customer?: string, days_until_due?: int, default_margins?: string[], default_payment_method?: string, default_source?: string, default_tax_rates?: string[], description?: string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], due_date?: int, effective_at?: int, expand?: string[], footer?: string, from_invoice?: array{action: string, invoice: string}, issuer?: array{account?: string, type: string}, metadata?: null|\Stripe\StripeObject, number?: string, on_behalf_of?: string, payment_settings?: array{default_mandate?: null|string, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: null|array{preferred_language?: string}, card?: null|array{installments?: array{enabled?: bool, plan?: null|array{count?: int, interval?: string, type: string}}, request_three_d_secure?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, id_bank_transfer?: null|array{}, konbini?: null|array{}, sepa_debit?: null|array{}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, permissions?: string[], prefetch?: string[]}, verification_method?: string}}, payment_method_types?: null|string[]}, pending_invoice_items_behavior?: string, rendering?: array{amount_tax_display?: null|string, pdf?: array{page_size?: string}, template?: string, template_version?: null|int}, shipping_cost?: array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, statement_descriptor?: string, subscription?: string, transfer_data?: array{amount?: int, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/invoices', $params, $opts);
    }

    /**
     * At any time, you can preview the upcoming invoice for a customer. This will show
     * you all the charges that are pending, including subscription renewal charges,
     * invoice item charges, etc. It will also show you any discounts that are
     * applicable to the invoice.
     *
     * Note that when you are viewing an upcoming invoice, you are simply viewing a
     * preview – the invoice has not yet been created. As such, the upcoming invoice
     * will not show up in invoice listing calls, and you cannot use the API to pay or
     * edit the invoice. If you want to change the amount that your customer will be
     * billed, you can add, remove, or update pending invoice items, or update the
     * customer’s discount.
     *
     * You can preview the effects of updating a subscription, including a preview of
     * what proration will take place. To ensure that the actual proration is
     * calculated exactly the same as the previewed proration, you should pass the
     * <code>subscription_details.proration_date</code> parameter when doing the actual
     * subscription update. The recommended way to get only the prorations being
     * previewed is to consider only proration line items where
     * <code>period[start]</code> is equal to the
     * <code>subscription_details.proration_date</code> value passed in the request.
     *
     * Note: Currency conversion calculations use the latest exchange rates. Exchange
     * rates may vary between the time of the preview and the time of the actual
     * invoice creation. <a href="https://docs.stripe.com/currencies/conversions">Learn
     * more</a>
     *
     * @param null|array{automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, coupon?: string, currency?: string, customer?: string, customer_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, tax?: array{ip_address?: null|string}, tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], invoice_items?: (array{amount?: int, currency?: string, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], invoiceitem?: string, metadata?: null|\Stripe\StripeObject, period?: array{end: int, start: int}, price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_behavior?: string, tax_code?: null|string, tax_rates?: null|string[], unit_amount?: int, unit_amount_decimal?: string})[], issuer?: array{account?: string, type: string}, on_behalf_of?: null|string, preview_mode?: string, schedule?: string, schedule_details?: array{amendments?: (array{amendment_end?: array{discount_end?: array{discount: string}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, amendment_start: array{amendment_end?: array{index: int}, discount_end?: array{discount: string}, timestamp?: int, type: string}, billing_cycle_anchor?: string, discount_actions?: array{add?: array{coupon?: string, discount?: string, discount_end?: array{type: string}, index?: int, promotion_code?: string}, remove?: array{coupon?: string, discount?: string, promotion_code?: string}, set?: array{coupon?: string, discount?: string, promotion_code?: string}, type: string}[], item_actions?: array{add?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, remove?: array{price: string}, set?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, type: string}[], metadata_actions?: (array{add?: \Stripe\StripeObject, remove?: string[], set?: null|\Stripe\StripeObject, type: string})[], proration_behavior?: string, set_pause_collection?: array{set?: array{behavior: string}, type: string}, set_schedule_end?: string, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], billing_behavior?: string, end_behavior?: string, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, coupon?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: int|string|array, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: \Stripe\StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, start_date?: int|string|array, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: int|string|array, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: null|array{bill_until?: array{amendment_end?: array{index: int}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, iterations?: int}[], proration_behavior?: string}, subscription?: string, subscription_details?: array{billing_cycle_anchor?: string|int|array, cancel_at?: null|int, cancel_at_period_end?: bool, cancel_now?: bool, default_tax_rates?: null|string[], items?: (array{billing_thresholds?: null|array{usage_gte: int}, clear_usage?: bool, deleted?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id?: string, metadata?: null|\Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], prebilling?: array{iterations: int}, proration_behavior?: string, proration_date?: int, resume_at?: string, start_date?: int, trial_end?: string|int|array}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function createPreview($params = null, $opts = null)
    {
        return $this->request('post', '/v1/invoices/create_preview', $params, $opts);
    }

    /**
     * Permanently deletes a one-off invoice draft. This cannot be undone. Attempts to
     * delete invoices that are no longer in a draft state will fail; once an invoice
     * has been finalized or if an invoice is for a subscription, it must be <a
     * href="#void_invoice">voided</a>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/invoices/%s', $id), $params, $opts);
    }

    /**
     * Stripe automatically finalizes drafts before sending and attempting payment on
     * invoices. However, if you’d like to finalize a draft invoice manually, you can
     * do so using this method.
     *
     * @param string $id
     * @param null|array{auto_advance?: bool, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function finalizeInvoice($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/finalize', $id), $params, $opts);
    }

    /**
     * Marking an invoice as uncollectible is useful for keeping track of bad debts
     * that can be written off for accounting purposes.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function markUncollectible($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/mark_uncollectible', $id), $params, $opts);
    }

    /**
     * Stripe automatically creates and then attempts to collect payment on invoices
     * for customers on subscriptions according to your <a
     * href="https://dashboard.stripe.com/account/billing/automatic">subscriptions
     * settings</a>. However, if you’d like to attempt payment on an invoice out of the
     * normal collection schedule or for some other reason, you can do so.
     *
     * @param string $id
     * @param null|array{expand?: string[], forgive?: bool, mandate?: null|string, off_session?: bool, paid_out_of_band?: bool, payment_method?: string, source?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function pay($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/pay', $id), $params, $opts);
    }

    /**
     * Removes multiple line items from an invoice. This is only possible when an
     * invoice is still a draft.
     *
     * @param string $id
     * @param null|array{expand?: string[], invoice_metadata?: null|\Stripe\StripeObject, lines: array{behavior: string, id: string}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function removeLines($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/remove_lines', $id), $params, $opts);
    }

    /**
     * Retrieves the invoice with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/invoices/%s', $id), $params, $opts);
    }

    /**
     * Retrieves the invoice payment with the given ID.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\InvoicePayment
     */
    public function retrievePayment($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/invoices/%s/payments/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Search for invoices you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<\Stripe\Invoice>
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/invoices/search', $params, $opts);
    }

    /**
     * Stripe will automatically send invoices to customers according to your <a
     * href="https://dashboard.stripe.com/account/billing/automatic">subscriptions
     * settings</a>. However, if you’d like to manually send an invoice to your
     * customer out of the normal schedule, you can do so. When sending invoices that
     * have already been paid, there will be no reference to the payment in the email.
     *
     * Requests made in test-mode result in no emails being sent, despite sending an
     * <code>invoice.sent</code> event.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function sendInvoice($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/send', $id), $params, $opts);
    }

    /**
     * At any time, you can preview the upcoming invoice for a customer. This will show
     * you all the charges that are pending, including subscription renewal charges,
     * invoice item charges, etc. It will also show you any discounts that are
     * applicable to the invoice.
     *
     * Note that when you are viewing an upcoming invoice, you are simply viewing a
     * preview – the invoice has not yet been created. As such, the upcoming invoice
     * will not show up in invoice listing calls, and you cannot use the API to pay or
     * edit the invoice. If you want to change the amount that your customer will be
     * billed, you can add, remove, or update pending invoice items, or update the
     * customer’s discount.
     *
     * You can preview the effects of updating a subscription, including a preview of
     * what proration will take place. To ensure that the actual proration is
     * calculated exactly the same as the previewed proration, you should pass the
     * <code>subscription_details.proration_date</code> parameter when doing the actual
     * subscription update. The recommended way to get only the prorations being
     * previewed is to consider only proration line items where
     * <code>period[start]</code> is equal to the
     * <code>subscription_details.proration_date</code> value passed in the request.
     *
     * Note: Currency conversion calculations use the latest exchange rates. Exchange
     * rates may vary between the time of the preview and the time of the actual
     * invoice creation. <a href="https://docs.stripe.com/currencies/conversions">Learn
     * more</a>
     *
     * @param null|array{automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, coupon?: string, currency?: string, customer?: string, customer_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, tax?: array{ip_address?: null|string}, tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], invoice_items?: (array{amount?: int, currency?: string, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], invoiceitem?: string, metadata?: null|\Stripe\StripeObject, period?: array{end: int, start: int}, price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_behavior?: string, tax_code?: null|string, tax_rates?: null|string[], unit_amount?: int, unit_amount_decimal?: string})[], issuer?: array{account?: string, type: string}, on_behalf_of?: null|string, preview_mode?: string, schedule?: string, schedule_details?: array{amendments?: (array{amendment_end?: array{discount_end?: array{discount: string}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, amendment_start: array{amendment_end?: array{index: int}, discount_end?: array{discount: string}, timestamp?: int, type: string}, billing_cycle_anchor?: string, discount_actions?: array{add?: array{coupon?: string, discount?: string, discount_end?: array{type: string}, index?: int, promotion_code?: string}, remove?: array{coupon?: string, discount?: string, promotion_code?: string}, set?: array{coupon?: string, discount?: string, promotion_code?: string}, type: string}[], item_actions?: array{add?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, remove?: array{price: string}, set?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, type: string}[], metadata_actions?: (array{add?: \Stripe\StripeObject, remove?: string[], set?: null|\Stripe\StripeObject, type: string})[], proration_behavior?: string, set_pause_collection?: array{set?: array{behavior: string}, type: string}, set_schedule_end?: string, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], billing_behavior?: string, end_behavior?: string, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, coupon?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: int|string|array, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: \Stripe\StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, start_date?: int|string|array, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: int|string|array, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: null|array{bill_until?: array{amendment_end?: array{index: int}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, iterations?: int}[], proration_behavior?: string}, subscription?: string, subscription_billing_cycle_anchor?: string|int|array, subscription_cancel_at?: null|int, subscription_cancel_at_period_end?: bool, subscription_cancel_now?: bool, subscription_default_tax_rates?: null|string[], subscription_details?: array{billing_cycle_anchor?: string|int|array, cancel_at?: null|int, cancel_at_period_end?: bool, cancel_now?: bool, default_tax_rates?: null|string[], items?: (array{billing_thresholds?: null|array{usage_gte: int}, clear_usage?: bool, deleted?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id?: string, metadata?: null|\Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], prebilling?: array{iterations: int}, proration_behavior?: string, proration_date?: int, resume_at?: string, start_date?: int, trial_end?: string|int|array}, subscription_items?: (array{billing_thresholds?: null|array{usage_gte: int}, clear_usage?: bool, deleted?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id?: string, metadata?: null|\Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], subscription_prebilling?: array{iterations: int}, subscription_proration_behavior?: string, subscription_proration_date?: int, subscription_resume_at?: string, subscription_start_date?: int, subscription_trial_end?: string|int|array, subscription_trial_from_plan?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function upcoming($params = null, $opts = null)
    {
        return $this->request('get', '/v1/invoices/upcoming', $params, $opts);
    }

    /**
     * When retrieving an upcoming invoice, you’ll get a <strong>lines</strong>
     * property containing the total count of line items and the first handful of those
     * items. There is also a URL where you can retrieve the full (paginated) list of
     * line items.
     *
     * @param null|array{automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, coupon?: string, currency?: string, customer?: string, customer_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, tax?: array{ip_address?: null|string}, tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], ending_before?: string, expand?: string[], invoice_items?: (array{amount?: int, currency?: string, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], invoiceitem?: string, metadata?: null|\Stripe\StripeObject, period?: array{end: int, start: int}, price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_behavior?: string, tax_code?: null|string, tax_rates?: null|string[], unit_amount?: int, unit_amount_decimal?: string})[], issuer?: array{account?: string, type: string}, limit?: int, on_behalf_of?: null|string, preview_mode?: string, schedule?: string, schedule_details?: array{amendments?: (array{amendment_end?: array{discount_end?: array{discount: string}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, amendment_start: array{amendment_end?: array{index: int}, discount_end?: array{discount: string}, timestamp?: int, type: string}, billing_cycle_anchor?: string, discount_actions?: array{add?: array{coupon?: string, discount?: string, discount_end?: array{type: string}, index?: int, promotion_code?: string}, remove?: array{coupon?: string, discount?: string, promotion_code?: string}, set?: array{coupon?: string, discount?: string, promotion_code?: string}, type: string}[], item_actions?: array{add?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, remove?: array{price: string}, set?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, type: string}[], metadata_actions?: (array{add?: \Stripe\StripeObject, remove?: string[], set?: null|\Stripe\StripeObject, type: string})[], proration_behavior?: string, set_pause_collection?: array{set?: array{behavior: string}, type: string}, set_schedule_end?: string, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], billing_behavior?: string, end_behavior?: string, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, billing_thresholds?: null|array{amount_gte?: int, reset_billing_cycle_anchor?: bool}, collection_method?: string, coupon?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: int|string|array, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: \Stripe\StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, start_date?: int|string|array, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: int|string|array, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: null|array{bill_until?: array{amendment_end?: array{index: int}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, iterations?: int}[], proration_behavior?: string}, starting_after?: string, subscription?: string, subscription_billing_cycle_anchor?: string|int|array, subscription_cancel_at?: null|int, subscription_cancel_at_period_end?: bool, subscription_cancel_now?: bool, subscription_default_tax_rates?: null|string[], subscription_details?: array{billing_cycle_anchor?: string|int|array, cancel_at?: null|int, cancel_at_period_end?: bool, cancel_now?: bool, default_tax_rates?: null|string[], items?: (array{billing_thresholds?: null|array{usage_gte: int}, clear_usage?: bool, deleted?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id?: string, metadata?: null|\Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], prebilling?: array{iterations: int}, proration_behavior?: string, proration_date?: int, resume_at?: string, start_date?: int, trial_end?: string|int|array}, subscription_items?: (array{billing_thresholds?: null|array{usage_gte: int}, clear_usage?: bool, deleted?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id?: string, metadata?: null|\Stripe\StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], subscription_prebilling?: array{iterations: int}, subscription_proration_behavior?: string, subscription_proration_date?: int, subscription_resume_at?: string, subscription_start_date?: int, subscription_trial_end?: string|int|array, subscription_trial_from_plan?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\InvoiceLineItem>
     */
    public function upcomingLines($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/invoices/upcoming/lines', $params, $opts);
    }

    /**
     * Draft invoices are fully editable. Once an invoice is <a
     * href="/docs/billing/invoices/workflow#finalized">finalized</a>, monetary values,
     * as well as <code>collection_method</code>, become uneditable.
     *
     * If you would like to stop the Stripe Billing engine from automatically
     * finalizing, reattempting payments on, sending reminders for, or <a
     * href="/docs/billing/invoices/reconciliation">automatically reconciling</a>
     * invoices, pass <code>auto_advance=false</code>.
     *
     * @param string $id
     * @param null|array{account_tax_ids?: null|string[], amounts_due?: null|array{amount: int, days_until_due?: int, description: string, due_date?: int}[], application_fee_amount?: int, auto_advance?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, automatically_finalizes_at?: int, collection_method?: string, custom_fields?: null|array{name: string, value: string}[], days_until_due?: int, default_margins?: null|string[], default_payment_method?: string, default_source?: null|string, default_tax_rates?: null|string[], description?: string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], due_date?: int, effective_at?: null|int, expand?: string[], footer?: string, issuer?: array{account?: string, type: string}, metadata?: null|\Stripe\StripeObject, number?: null|string, on_behalf_of?: null|string, payment_settings?: array{default_mandate?: null|string, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: null|array{preferred_language?: string}, card?: null|array{installments?: array{enabled?: bool, plan?: null|array{count?: int, interval?: string, type: string}}, request_three_d_secure?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, id_bank_transfer?: null|array{}, konbini?: null|array{}, sepa_debit?: null|array{}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, permissions?: string[], prefetch?: string[]}, verification_method?: string}}, payment_method_types?: null|string[]}, rendering?: array{amount_tax_display?: null|string, pdf?: array{page_size?: string}, template?: string, template_version?: null|int}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, statement_descriptor?: string, transfer_data?: null|array{amount?: int, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s', $id), $params, $opts);
    }

    /**
     * Updates an invoice’s line item. Some fields, such as <code>tax_amounts</code>,
     * only live on the invoice line item, so they can only be updated through this
     * endpoint. Other fields, such as <code>amount</code>, live on both the invoice
     * item and the invoice line item, so updates on this endpoint will propagate to
     * the invoice item as well. Updating an invoice’s line item is only possible
     * before the invoice is finalized.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{amount?: int, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], margins?: null|string[], metadata?: null|\Stripe\StripeObject, period?: array{end: int, start: int}, price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: \Stripe\StripeObject, name: string, tax_code?: string}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate_data: array{country?: string, description?: string, display_name: string, inclusive: bool, jurisdiction?: string, percentage: float, state?: string, tax_type?: string}, taxable_amount: int}[], tax_rates?: null|string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\InvoiceLineItem
     */
    public function updateLine($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/lines/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates multiple line items on an invoice. This is only possible when an invoice
     * is still a draft.
     *
     * @param string $id
     * @param null|array{expand?: string[], invoice_metadata?: null|\Stripe\StripeObject, lines: (array{amount?: int, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id: string, margins?: null|string[], metadata?: null|\Stripe\StripeObject, period?: array{end: int, start: int}, price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: \Stripe\StripeObject, name: string, tax_code?: string}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate_data: array{country?: string, description?: string, display_name: string, inclusive: bool, jurisdiction?: string, percentage: float, state?: string, tax_type?: string}, taxable_amount: int}[], tax_rates?: null|string[]})[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function updateLines($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/update_lines', $id), $params, $opts);
    }

    /**
     * Mark a finalized invoice as void. This cannot be undone. Voiding an invoice is
     * similar to <a href="#delete_invoice">deletion</a>, however it only applies to
     * finalized invoices and maintains a papertrail where the invoice can still be
     * found.
     *
     * Consult with local regulations to determine whether and how an invoice might be
     * amended, canceled, or voided in the jurisdiction you’re doing business in. You
     * might need to <a href="#create_invoice">issue another invoice</a> or <a
     * href="#create_credit_note">credit note</a> instead. Stripe recommends that you
     * consult with your legal counsel for advice specific to your business.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Invoice
     */
    public function voidInvoice($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoices/%s/void', $id), $params, $opts);
    }
}
