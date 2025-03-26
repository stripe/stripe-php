<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A subscription schedule allows you to create and manage the lifecycle of a subscription by predefining expected changes.
 *
 * Related guide: <a href="https://stripe.com/docs/billing/subscriptions/subscription-schedules">Subscription schedules</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|Application|string $application ID of the Connect Application that created the schedule.
 * @property null|string $billing_behavior Configures when the subscription schedule generates prorations for phase transitions. Possible values are <code>prorate_on_next_phase</code> or <code>prorate_up_front</code> with the default being <code>prorate_on_next_phase</code>. <code>prorate_on_next_phase</code> will apply phase changes and generate prorations at transition time. <code>prorate_up_front</code> will bill for all phases within the current billing cycle up front.
 * @property null|int $canceled_at Time at which the subscription schedule was canceled. Measured in seconds since the Unix epoch.
 * @property null|int $completed_at Time at which the subscription schedule was completed. Measured in seconds since the Unix epoch.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{end_date: int, start_date: int}&\stdClass&StripeObject) $current_phase Object representing the start and end dates for the current phase of the subscription schedule, if it is <code>active</code>.
 * @property Customer|string $customer ID of the customer who owns the subscription schedule.
 * @property null|string $customer_account ID of the account who owns the subscription schedule.
 * @property (object{application_fee_percent: null|float, automatic_tax?: (object{disabled_reason: null|string, enabled: bool, liability: null|(object{account?: Account|string, type: string}&\stdClass&StripeObject)}&\stdClass&StripeObject), billing_cycle_anchor: string, collection_method: null|string, default_payment_method: null|PaymentMethod|string, description: null|string, invoice_settings: (object{account_tax_ids: null|(string|TaxId)[], days_until_due: null|int, issuer: (object{account?: Account|string, type: string}&\stdClass&StripeObject)}&\stdClass&StripeObject), on_behalf_of: null|Account|string, transfer_data: null|(object{amount_percent: null|float, destination: Account|string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $default_settings
 * @property string $end_behavior Behavior of the subscription schedule and underlying subscription when it ends. Possible values are <code>release</code> or <code>cancel</code> with the default being <code>release</code>. <code>release</code> will end the subscription schedule and keep the underlying subscription running. <code>cancel</code> will end the subscription schedule and cancel the underlying subscription.
 * @property null|(object{errored_at: int, failed_transitions: (object{source_price: string, target_price: string}&\stdClass&StripeObject)[], type: string}&\stdClass&StripeObject) $last_price_migration_error Details of the most recent price migration that failed for the subscription schedule.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property ((object{add_invoice_items: ((object{discounts: ((object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&\stdClass&StripeObject), promotion_code: null|PromotionCode|string}&\stdClass&StripeObject))[], price: Price|string, quantity: null|int, tax_rates?: null|TaxRate[]}&\stdClass&StripeObject))[], application_fee_percent: null|float, automatic_tax?: (object{disabled_reason: null|string, enabled: bool, liability: null|(object{account?: Account|string, type: string}&\stdClass&StripeObject)}&\stdClass&StripeObject), billing_cycle_anchor: null|string, collection_method: null|string, currency: string, default_payment_method: null|PaymentMethod|string, default_tax_rates?: null|TaxRate[], description: null|string, discounts: ((object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&\stdClass&StripeObject), promotion_code: null|PromotionCode|string}&\stdClass&StripeObject))[], end_date: int, invoice_settings: null|(object{account_tax_ids: null|(string|TaxId)[], days_until_due: null|int, issuer: null|(object{account?: Account|string, type: string}&\stdClass&StripeObject)}&\stdClass&StripeObject), items: ((object{discounts: ((object{coupon: null|Coupon|string, discount: null|Discount|string, discount_end?: null|(object{timestamp: null|int, type: string}&\stdClass&StripeObject), promotion_code: null|PromotionCode|string}&\stdClass&StripeObject))[], metadata: null|StripeObject, plan: Plan|string, price: Price|string, quantity?: int, tax_rates?: null|TaxRate[], trial?: null|(object{converts_to?: null|string[], type: string}&\stdClass&StripeObject)}&\stdClass&StripeObject))[], metadata: null|StripeObject, on_behalf_of: null|Account|string, pause_collection?: null|(object{behavior: string}&\stdClass&StripeObject), proration_behavior: string, start_date: int, transfer_data: null|(object{amount_percent: null|float, destination: Account|string}&\stdClass&StripeObject), trial_continuation?: null|string, trial_end: null|int, trial_settings?: null|(object{end_behavior: null|(object{prorate_up_front: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject)}&\stdClass&StripeObject))[] $phases Configuration for the subscription schedule's phases.
 * @property null|(object{invoice: Invoice|string, period_end: int, period_start: int, update_behavior?: string}&\stdClass&StripeObject) $prebilling Time period and invoice for a Subscription billed in advance.
 * @property null|int $released_at Time at which the subscription schedule was released. Measured in seconds since the Unix epoch.
 * @property null|string $released_subscription ID of the subscription once managed by the subscription schedule (if it is released).
 * @property string $status The present status of the subscription schedule. Possible values are <code>not_started</code>, <code>active</code>, <code>completed</code>, <code>released</code>, and <code>canceled</code>. You can read more about the different states in our <a href="https://stripe.com/docs/billing/subscriptions/subscription-schedules">behavior guide</a>.
 * @property null|string|Subscription $subscription ID of the subscription managed by the subscription schedule.
 * @property null|string|TestHelpers\TestClock $test_clock ID of the test clock this subscription schedule belongs to.
 */
class SubscriptionSchedule extends ApiResource
{
    const OBJECT_NAME = 'subscription_schedule';

    use ApiOperations\Update;

    const BILLING_BEHAVIOR_PRORATE_ON_NEXT_PHASE = 'prorate_on_next_phase';
    const BILLING_BEHAVIOR_PRORATE_UP_FRONT = 'prorate_up_front';

    const END_BEHAVIOR_CANCEL = 'cancel';
    const END_BEHAVIOR_NONE = 'none';
    const END_BEHAVIOR_RELEASE = 'release';
    const END_BEHAVIOR_RENEW = 'renew';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_COMPLETED = 'completed';
    const STATUS_NOT_STARTED = 'not_started';
    const STATUS_RELEASED = 'released';

    /**
     * Creates a new subscription schedule object. Each customer can have up to 500
     * active or scheduled subscriptions.
     *
     * @param null|array{billing_behavior?: string, customer?: string, customer_account?: string, default_settings?: array{application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, default_payment_method?: string, description?: null|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, on_behalf_of?: null|string, transfer_data?: null|array{amount_percent?: float, destination: string}}, end_behavior?: string, expand?: string[], from_subscription?: string, metadata?: null|StripeObject, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: int, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: int, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: array{iterations: int, update_behavior?: string}, start_date?: array|int|string} $params
     * @param null|array|string $options
     *
     * @return SubscriptionSchedule the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Retrieves the list of your subscription schedules.
     *
     * @param null|array{canceled_at?: array|int, completed_at?: array|int, created?: array|int, customer?: string, customer_account?: string, ending_before?: string, expand?: string[], limit?: int, released_at?: array|int, scheduled?: bool, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<SubscriptionSchedule> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing subscription schedule. You only need to
     * supply the unique subscription schedule identifier that was returned upon
     * subscription schedule creation.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return SubscriptionSchedule
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates an existing subscription schedule.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{billing_behavior?: string, default_settings?: array{application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, default_payment_method?: string, description?: null|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, on_behalf_of?: null|string, transfer_data?: null|array{amount_percent?: float, destination: string}}, end_behavior?: string, expand?: string[], metadata?: null|StripeObject, phases?: (array{add_invoice_items?: (array{discounts?: array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_cycle_anchor?: string, collection_method?: string, currency?: string, default_payment_method?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], end_date?: array|int|string, invoice_settings?: array{account_tax_ids?: null|string[], days_until_due?: int, issuer?: array{account?: string, type: string}}, items: (array{discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], metadata?: StripeObject, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}})[], iterations?: int, metadata?: StripeObject, on_behalf_of?: string, pause_collection?: array{behavior: string}, proration_behavior?: string, start_date?: array|int|string, transfer_data?: array{amount_percent?: float, destination: string}, trial?: bool, trial_continuation?: string, trial_end?: array|int|string, trial_settings?: array{end_behavior?: array{prorate_up_front?: string}}})[], prebilling?: array{iterations: int, update_behavior?: string}, proration_behavior?: string} $params
     * @param null|array|string $opts
     *
     * @return SubscriptionSchedule the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return SubscriptionSchedule the amended subscription schedule
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function amend($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/amend';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return SubscriptionSchedule the canceled subscription schedule
     *
     * @throws Exception\ApiErrorException if the request fails
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
     * @return SubscriptionSchedule the released subscription schedule
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function release($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/release';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
