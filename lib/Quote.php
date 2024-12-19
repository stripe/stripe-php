<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Quote is a way to model prices that you'd like to provide to a customer.
 * Once accepted, it will automatically create an invoice, subscription or subscription schedule.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|bool $allow_backdated_lines Allow quote lines to have <code>starts_at</code> in the past if collection is paused between <code>starts_at</code> and now.
 * @property int $amount_subtotal Total before any discounts or taxes are applied.
 * @property int $amount_total Total after discounts and taxes are applied.
 * @property null|string|\Stripe\Application $application ID of the Connect Application that created the quote.
 * @property null|int $application_fee_amount The amount of the application fee (if any) that will be requested to be applied to the payment and transferred to the application owner's Stripe account. Only applicable if there are no line items with recurring prices on the quote.
 * @property null|float $application_fee_percent A non-negative decimal between 0 and 100, with at most two decimal places. This represents the percentage of the subscription invoice total that will be transferred to the application owner's Stripe account. Only applicable if there are line items with recurring prices on the quote.
 * @property (object{enabled: bool, liability: null|(object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass), status: null|string}&\Stripe\StripeObject&\stdClass) $automatic_tax
 * @property string $collection_method Either <code>charge_automatically</code>, or <code>send_invoice</code>. When charging automatically, Stripe will attempt to pay invoices at the end of the subscription cycle or on finalization using the default payment method attached to the subscription or customer. When sending an invoice, Stripe will email your customer an invoice with payment instructions and mark the subscription as <code>active</code>. Defaults to <code>charge_automatically</code>.
 * @property (object{last_reestimation_details?: null|(object{failed: null|(object{failure_code: null|string, message: null|string, reason: string}&\Stripe\StripeObject&\stdClass), status: string}&\Stripe\StripeObject&\stdClass), recurring: null|(object{amount_subtotal: int, amount_total: int, interval: string, interval_count: int, total_details: (object{amount_discount: int, amount_shipping: null|int, amount_tax: int, breakdown?: (object{discounts: (object{amount: int, discount: \Stripe\Discount}&\Stripe\StripeObject&\stdClass)[], taxes: ((object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), updated_at?: null|int, upfront: (object{amount_subtotal: int, amount_total: int, line_items?: \Stripe\Collection<\Stripe\LineItem>, total_details: (object{amount_discount: int, amount_shipping: null|int, amount_tax: int, breakdown?: (object{discounts: (object{amount: int, discount: \Stripe\Discount}&\Stripe\StripeObject&\stdClass)[], taxes: ((object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $computed
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string|\Stripe\Customer $customer The customer which this quote belongs to. A customer is required before finalizing the quote. Once specified, it cannot be changed.
 * @property null|(string|\Stripe\TaxRate)[] $default_tax_rates The tax rates applied to this quote.
 * @property null|string $description A description that will be displayed on the quote PDF.
 * @property (string|\Stripe\Discount)[] $discounts The discounts applied to this quote.
 * @property int $expires_at The date on which the quote will be canceled if in <code>open</code> or <code>draft</code> status. Measured in seconds since the Unix epoch.
 * @property null|string $footer A footer that will be displayed on the quote PDF.
 * @property null|(object{is_revision: bool, quote: string|\Stripe\Quote}&\Stripe\StripeObject&\stdClass) $from_quote Details of the quote that was cloned. See the <a href="https://stripe.com/docs/quotes/clone">cloning documentation</a> for more details.
 * @property null|string $header A header that will be displayed on the quote PDF.
 * @property null|string|\Stripe\Invoice $invoice The invoice that was created from this quote.
 * @property (object{days_until_due: null|int, issuer: (object{account?: string|\Stripe\Account, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $invoice_settings
 * @property null|\Stripe\Collection<\Stripe\LineItem> $line_items A list of items the customer is being quoted for.
 * @property null|string[] $lines A list of <a href="https://docs.stripe.com/api/quote_lines">quote lines</a> on the quote. These lines describe changes, in the order provided, that will be used to create new subscription schedules or update existing subscription schedules when the quote is accepted.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $number A unique number that identifies this particular quote. This number is assigned once the quote is <a href="https://stripe.com/docs/quotes/overview#finalize">finalized</a>.
 * @property null|string|\Stripe\Account $on_behalf_of The account on behalf of which to charge. See the <a href="https://support.stripe.com/questions/sending-invoices-on-behalf-of-connected-accounts">Connect documentation</a> for details.
 * @property string $status The status of the quote.
 * @property null|(object{canceled?: (object{reason: null|string, transitioned_at: null|int}&\Stripe\StripeObject&\stdClass), stale?: (object{expires_at: null|int, last_reason: null|(object{line_invalid?: string, lines_invalid?: (object{invalid_at: int, lines: string[]}&\Stripe\StripeObject&\stdClass)[], marked_stale?: null|string, subscription_canceled?: string, subscription_changed?: (object{previous_subscription: null|\Stripe\Subscription}&\Stripe\StripeObject&\stdClass), subscription_expired?: string, subscription_schedule_canceled?: string, subscription_schedule_changed?: (object{previous_subscription_schedule: null|\Stripe\SubscriptionSchedule}&\Stripe\StripeObject&\stdClass), subscription_schedule_released?: string, type: null|string}&\Stripe\StripeObject&\stdClass), last_updated_at: null|int, transitioned_at: null|int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $status_details Details on when and why a quote has been marked as stale or canceled.
 * @property (object{accepted_at: null|int, canceled_at: null|int, finalized_at: null|int}&\Stripe\StripeObject&\stdClass) $status_transitions
 * @property null|string|\Stripe\Subscription $subscription The subscription that was created or updated from this quote.
 * @property (object{bill_on_acceptance?: null|(object{bill_from: null|(object{computed: null|int, line_starts_at: null|(object{id: string}&\Stripe\StripeObject&\stdClass), timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), bill_until: null|(object{computed: null|int, duration: null|(object{interval: string, interval_count: int}&\Stripe\StripeObject&\stdClass), line_ends_at: null|(object{id: string}&\Stripe\StripeObject&\stdClass), timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), billing_behavior?: string, billing_cycle_anchor?: null|string, description: null|string, effective_date: null|int, end_behavior?: null|string, from_subscription?: null|string|\Stripe\Subscription, metadata: null|\Stripe\StripeObject, prebilling?: null|(object{iterations: int}&\Stripe\StripeObject&\stdClass), proration_behavior?: string, trial_period_days: null|int}&\Stripe\StripeObject&\stdClass) $subscription_data
 * @property null|((object{applies_to: (object{new_reference: null|string, subscription_schedule: null|string, type: string}&\Stripe\StripeObject&\stdClass), bill_on_acceptance?: null|(object{bill_from: null|(object{computed: null|int, line_starts_at: null|(object{id: string}&\Stripe\StripeObject&\stdClass), timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass), bill_until: null|(object{computed: null|int, duration: null|(object{interval: string, interval_count: int}&\Stripe\StripeObject&\stdClass), line_ends_at: null|(object{id: string}&\Stripe\StripeObject&\stdClass), timestamp: null|int, type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), billing_behavior?: string, customer: null|string, description: null|string, end_behavior?: null|string, proration_behavior?: null|string}&\Stripe\StripeObject&\stdClass))[] $subscription_data_overrides List representing overrides for <code>subscription_data</code> configurations for specific subscription schedules.
 * @property null|string|\Stripe\SubscriptionSchedule $subscription_schedule The subscription schedule that was created or updated from this quote.
 * @property null|((object{applies_to: (object{new_reference: null|string, subscription_schedule: null|string, type: string}&\Stripe\StripeObject&\stdClass), subscription_schedule: string}&\Stripe\StripeObject&\stdClass))[] $subscription_schedules The subscription schedules that were created or updated from this quote.
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this quote belongs to.
 * @property (object{amount_discount: int, amount_shipping: null|int, amount_tax: int, breakdown?: (object{discounts: (object{amount: int, discount: \Stripe\Discount}&\Stripe\StripeObject&\stdClass)[], taxes: ((object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $total_details
 * @property null|(object{amount: null|int, amount_percent: null|float, destination: string|\Stripe\Account}&\Stripe\StripeObject&\stdClass) $transfer_data The account (if any) the payments will be attributed to for tax reporting, and where funds from each payment will be transferred to for each of the invoices.
 */
class Quote extends ApiResource
{
    const OBJECT_NAME = 'quote';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';

    const STATUS_ACCEPTED = 'accepted';
    const STATUS_ACCEPTING = 'accepting';
    const STATUS_CANCELED = 'canceled';
    const STATUS_DRAFT = 'draft';
    const STATUS_OPEN = 'open';
    const STATUS_STALE = 'stale';

    /**
     * A quote models prices and services for a customer. Default options for
     * <code>header</code>, <code>description</code>, <code>footer</code>, and
     * <code>expires_at</code> can be set in the dashboard via the <a
     * href="https://dashboard.stripe.com/settings/billing/quote">quote template</a>.
     *
     * @param null|array{allow_backdated_lines?: bool, application_fee_amount?: null|int, application_fee_percent?: null|float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, collection_method?: string, customer?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], expires_at?: int, footer?: null|string, from_quote?: array{is_revision?: bool, quote: string}, header?: null|string, invoice_settings?: array{days_until_due?: int, issuer?: array{account?: string, type: string}}, line_items?: (array{discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], lines?: (array{actions?: (array{add_discount?: array{coupon?: string, discount?: string, discount_end?: array{type: string}, index?: int, promotion_code?: string}, add_item?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, add_metadata?: \Stripe\StripeObject, remove_discount?: array{coupon?: string, discount?: string, promotion_code?: string}, remove_item?: array{price: string}, remove_metadata?: string[], set_discounts?: array{coupon?: string, discount?: string, promotion_code?: string}[], set_items?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}[], set_metadata?: null|\Stripe\StripeObject, type: string})[], applies_to?: array{new_reference?: string, subscription_schedule?: string, type: string}, billing_cycle_anchor?: string, cancel_subscription_schedule?: array{cancel_at: string, invoice_now?: bool, prorate?: bool}, ends_at?: array{discount_end?: array{discount: string}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, proration_behavior?: string, set_pause_collection?: array{set?: array{behavior: string}, type: string}, set_schedule_end?: string, starts_at?: array{discount_end?: array{discount: string}, line_ends_at?: array{index?: int}, timestamp?: int, type: string}, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], metadata?: \Stripe\StripeObject, on_behalf_of?: null|string, subscription_data?: array{bill_on_acceptance?: array{bill_from?: array{line_starts_at?: array{id?: string, index?: int}, timestamp?: int, type: string}, bill_until?: array{duration?: array{interval: string, interval_count: int}, line_ends_at?: array{id?: string, index?: int}, timestamp?: int, type: string}}, billing_behavior?: string, billing_cycle_anchor?: null|string, description?: string, effective_date?: null|string|int|array, end_behavior?: string, from_subscription?: string, metadata?: \Stripe\StripeObject, prebilling?: null|array{iterations: int}, proration_behavior?: string, trial_period_days?: null|int}, subscription_data_overrides?: array{applies_to: array{new_reference?: string, subscription_schedule?: string, type: string}, bill_on_acceptance?: array{bill_from?: array{line_starts_at?: array{id?: string, index?: int}, timestamp?: int, type: string}, bill_until?: array{duration?: array{interval: string, interval_count: int}, line_ends_at?: array{id?: string, index?: int}, timestamp?: int, type: string}}, billing_behavior?: string, customer?: string, description?: string, end_behavior?: string, proration_behavior?: string}[], test_clock?: string, transfer_data?: null|array{amount?: int, amount_percent?: float, destination: string}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of your quotes.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], from_subscription?: string, limit?: int, starting_after?: string, status?: string, test_clock?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Quote> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the quote with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * A quote models prices and services for a customer.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{allow_backdated_lines?: bool, application_fee_amount?: null|int, application_fee_percent?: null|float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, collection_method?: string, customer?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], expires_at?: int, footer?: null|string, header?: null|string, invoice_settings?: array{days_until_due?: int, issuer?: array{account?: string, type: string}}, line_items?: (array{discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], id?: string, price?: string, price_data?: array{currency: string, product: string, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], lines?: (array{actions?: (array{add_discount?: array{coupon?: string, discount?: string, discount_end?: array{type: string}, index?: int, promotion_code?: string}, add_item?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}, add_metadata?: \Stripe\StripeObject, remove_discount?: array{coupon?: string, discount?: string, promotion_code?: string}, remove_item?: array{price: string}, remove_metadata?: string[], set_discounts?: array{coupon?: string, discount?: string, promotion_code?: string}[], set_items?: array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: \Stripe\StripeObject, price: string, quantity?: int, tax_rates?: string[], trial?: array{converts_to?: string[], type: string}}[], set_metadata?: null|\Stripe\StripeObject, type: string})[], applies_to?: array{new_reference?: string, subscription_schedule?: string, type: string}, billing_cycle_anchor?: string, cancel_subscription_schedule?: array{cancel_at: string, invoice_now?: bool, prorate?: bool}, ends_at?: array{discount_end?: array{discount: string}, duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, id?: string, proration_behavior?: string, set_pause_collection?: array{set?: array{behavior: string}, type: string}, set_schedule_end?: string, starts_at?: array{discount_end?: array{discount: string}, line_ends_at?: array{id?: string, index?: int}, timestamp?: int, type: string}, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], metadata?: \Stripe\StripeObject, on_behalf_of?: null|string, subscription_data?: array{bill_on_acceptance?: null|array{bill_from?: array{line_starts_at?: array{id?: string, index?: int}, timestamp?: int, type: string}, bill_until?: array{duration?: array{interval: string, interval_count: int}, line_ends_at?: array{id?: string, index?: int}, timestamp?: int, type: string}}, billing_behavior?: string, billing_cycle_anchor?: null|string, description?: null|string, effective_date?: null|string|int|array, end_behavior?: string, metadata?: \Stripe\StripeObject, prebilling?: null|array{iterations: int}, proration_behavior?: string, trial_period_days?: null|int}, subscription_data_overrides?: null|(array{applies_to: array{new_reference?: string, subscription_schedule?: string, type: string}, bill_on_acceptance?: null|array{bill_from?: array{line_starts_at?: array{id?: string, index?: int}, timestamp?: int, type: string}, bill_until?: array{duration?: array{interval: string, interval_count: int}, line_ends_at?: array{id?: string, index?: int}, timestamp?: int, type: string}}, billing_behavior?: string, customer?: string, description?: null|string, end_behavior?: string, proration_behavior?: string})[], transfer_data?: null|array{amount?: int, amount_percent?: float, destination: string}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the accepted quote
     */
    public function accept($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/accept';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the canceled quote
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the finalized quote
     */
    public function finalizeQuote($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/finalize';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem> list of line items
     */
    public static function allComputedUpfrontLineItems($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/computed_upfront_line_items';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem> list of line items
     */
    public static function allLineItems($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/line_items';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\QuoteLine> list of quote lines
     */
    public static function allLines($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/lines';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param string $id
     * @param string $preview_invoice
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\InvoiceLineItem> list of invoice line items
     */
    public static function allPreviewInvoiceLines($id, $preview_invoice, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/preview_invoices/' . $preview_invoice . '/lines';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the marked quote
     */
    public function markDraft($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/mark_draft';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the marked quote
     */
    public function markStale($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/mark_stale';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param callable $readBodyChunkCallable
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return void
     */
    public function pdf($readBodyChunkCallable, $params = null, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = \Stripe\Stripe::$apiUploadBase;
        }
        $url = $this->instanceUrl() . '/pdf';
        $this->_requestStream('get', $url, $readBodyChunkCallable, $params, $opts);
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote the reestimated quote
     */
    public function reestimate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reestimate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    const PATH_PREVIEW_INVOICES = '/preview_invoices';

    /**
     * @param string $id the ID of the quote on which to retrieve the quote preview invoices
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\QuotePreviewInvoice> the list of quote preview invoices
     */
    public static function allPreviewInvoices($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_PREVIEW_INVOICES, $params, $opts);
    }
    const PATH_PREVIEW_SUBSCRIPTION_SCHEDULES = '/preview_subscription_schedules';

    /**
     * @param string $id the ID of the quote on which to retrieve the quote preview subscription schedules
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\QuotePreviewSubscriptionSchedule> the list of quote preview subscription schedules
     */
    public static function allPreviewSubscriptionSchedules($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_PREVIEW_SUBSCRIPTION_SCHEDULES, $params, $opts);
    }
}
