<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This object represents a customer of your business. Use it to <a href="https://stripe.com/docs/invoicing/customer">create recurring charges</a>, <a href="https://stripe.com/docs/payments/save-during-payment">save payment</a> and contact information,
 * and track payments that belong to the same customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject) $address The customer's address.
 * @property null|int $balance The current balance, if any, that's stored on the customer. If negative, the customer has credit to apply to their next invoice. If positive, the customer has an amount owed that's added to their next invoice. The balance only considers amounts that Stripe hasn't successfully applied to any invoice. It doesn't reflect unpaid invoices. This balance is only taken into account after invoices finalize.
 * @property null|CashBalance $cash_balance The current funds being held by Stripe on behalf of the customer. You can apply these funds towards payment intents when the source is &quot;cash_balance&quot;. The <code>settings[reconciliation_mode]</code> field describes if these funds apply to these payment intents manually or automatically.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $currency Three-letter <a href="https://stripe.com/docs/currencies">ISO code for the currency</a> the customer can be charged in for recurring billing purposes.
 * @property null|Account|BankAccount|Card|Source|string $default_source <p>ID of the default payment source for the customer.</p><p>If you use payment methods created through the PaymentMethods API, see the <a href="https://stripe.com/docs/api/customers/object#customer_object-invoice_settings-default_payment_method">invoice_settings.default_payment_method</a> field instead.</p>
 * @property null|bool $delinquent <p>Tracks the most recent state change on any invoice belonging to the customer. Paying an invoice or marking it uncollectible via the API will set this field to false. An automatic payment failure or passing the <code>invoice.due_date</code> will set this field to <code>true</code>.</p><p>If an invoice becomes uncollectible by <a href="https://stripe.com/docs/billing/automatic-collection">dunning</a>, <code>delinquent</code> doesn't reset to <code>false</code>.</p><p>If you care whether the customer has paid their most recent subscription invoice, use <code>subscription.status</code> instead. Paying or marking uncollectible any customer invoice regardless of whether it is the latest invoice for a subscription will always set this field to <code>false</code>.</p>
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|Discount $discount Describes the current discount active on the customer, if there is one.
 * @property null|string $email The customer's email address.
 * @property null|StripeObject $invoice_credit_balance The current multi-currency balances, if any, that's stored on the customer. If positive in a currency, the customer has a credit to apply to their next invoice denominated in that currency. If negative, the customer has an amount owed that's added to their next invoice denominated in that currency. These balances don't apply to unpaid invoices. They solely track amounts that Stripe hasn't successfully applied to any invoice. Stripe only applies a balance in a specific currency to an invoice after that invoice (which is in the same currency) finalizes.
 * @property null|string $invoice_prefix The prefix for the customer used to generate unique invoice numbers.
 * @property null|(object{custom_fields: null|(object{name: string, value: string}&StripeObject)[], default_payment_method: null|PaymentMethod|string, footer: null|string, rendering_options: null|(object{amount_tax_display: null|string, template: null|string}&StripeObject)}&StripeObject) $invoice_settings
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $name The customer's full name or business name.
 * @property null|int $next_invoice_sequence The suffix of the customer's next invoice number (for example, 0001). When the account uses account level sequencing, this parameter is ignored in API requests and the field omitted in API responses.
 * @property null|string $phone The customer's phone number.
 * @property null|string[] $preferred_locales The customer's preferred locales (languages), ordered by preference.
 * @property null|(object{address?: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), carrier?: null|string, name?: string, phone?: null|string, tracking_number?: null|string}&StripeObject) $shipping Mailing and shipping address for the customer. Appears on invoices emailed to this customer.
 * @property null|Collection<Account|BankAccount|Card|Source> $sources The customer's payment sources, if any.
 * @property null|Collection<Subscription> $subscriptions The customer's current subscriptions, if any.
 * @property null|(object{automatic_tax: string, ip_address: null|string, location: null|(object{country: string, source: string, state: null|string}&StripeObject)}&StripeObject) $tax
 * @property null|string $tax_exempt Describes the customer's tax exemption status, which is <code>none</code>, <code>exempt</code>, or <code>reverse</code>. When set to <code>reverse</code>, invoice and receipt PDFs include the following text: <strong>&quot;Reverse charge&quot;</strong>.
 * @property null|Collection<TaxId> $tax_ids The customer's tax IDs.
 * @property null|string|TestHelpers\TestClock $test_clock ID of the test clock that this customer belongs to.
 */
class Customer extends ApiResource
{
    const OBJECT_NAME = 'customer';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const TAX_EXEMPT_EXEMPT = 'exempt';
    const TAX_EXEMPT_NONE = 'none';
    const TAX_EXEMPT_REVERSE = 'reverse';

    /**
     * Creates a new customer object.
     *
     * @param null|array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, balance?: int, cash_balance?: array{settings?: array{reconciliation_mode?: string}}, description?: string, email?: string, expand?: string[], invoice_prefix?: string, invoice_settings?: array{custom_fields?: null|array{name: string, value: string}[], default_payment_method?: string, footer?: string, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}, metadata?: null|StripeObject, name?: string, next_invoice_sequence?: int, payment_method?: string, phone?: string, preferred_locales?: string[], shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, source?: string, tax?: array{ip_address?: null|string, validate_location?: string}, tax_exempt?: null|string, tax_id_data?: array{type: string, value: string}[], test_clock?: string, validate?: bool} $params
     * @param null|array|string $options
     *
     * @return Customer the created resource
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
     * Permanently deletes a customer. It cannot be undone. Also immediately cancels
     * any active subscriptions on the customer.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Customer the deleted resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of your customers. The customers are returned sorted by creation
     * date, with the most recent customers appearing first.
     *
     * @param null|array{created?: array|int, email?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, test_clock?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Customer> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a Customer object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Customer
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
     * Updates the specified customer by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged. For example, if you pass the
     * <strong>source</strong> parameter, that becomes the customer’s active source
     * (e.g., a card) to be used for all charges in the future. When you update a
     * customer to a new valid card source by passing the <strong>source</strong>
     * parameter: for each of the customer’s current subscriptions, if the subscription
     * bills automatically and is in the <code>past_due</code> state, then the latest
     * open invoice for the subscription with automatic collection enabled will be
     * retried. This retry will not count as an automatic retry, and will not affect
     * the next regularly scheduled payment for the invoice. Changing the
     * <strong>default_source</strong> for a customer will not trigger this behavior.
     *
     * This request accepts mostly the same arguments as the customer creation call.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, balance?: int, cash_balance?: array{settings?: array{reconciliation_mode?: string}}, default_source?: string, description?: string, email?: string, expand?: string[], invoice_prefix?: string, invoice_settings?: array{custom_fields?: null|array{name: string, value: string}[], default_payment_method?: string, footer?: string, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}, metadata?: null|StripeObject, name?: string, next_invoice_sequence?: int, phone?: string, preferred_locales?: string[], shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, source?: string, tax?: array{ip_address?: null|string, validate_location?: string}, tax_exempt?: null|string, validate?: bool} $params
     * @param null|array|string $opts
     *
     * @return Customer the updated resource
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

    public static function getSavedNestedResources()
    {
        static $savedNestedResources = null;
        if (null === $savedNestedResources) {
            $savedNestedResources = new Util\Set([
                'source',
            ]);
        }

        return $savedNestedResources;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Customer the updated customer
     */
    public function deleteDiscount($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/discount';
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom(['discount' => null], $opts, true);

        return $this;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentMethod> list of payment methods
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allPaymentMethods($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/payment_methods';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param string $payment_method
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return PaymentMethod the retrieved payment method
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function retrievePaymentMethod($payment_method, $params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/payment_methods/' . $payment_method;
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return SearchResult<Customer> the customer search results
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function search($params = null, $opts = null)
    {
        $url = '/v1/customers/search';

        return static::_requestPage($url, SearchResult::class, $params, $opts);
    }

    const PATH_CASH_BALANCE = '/cash_balance';

    /**
     * @param string $id the ID of the customer to which the cash balance belongs
     * @param null|array $params
     * @param null|array|string $opts
     * @param mixed $cashBalanceId
     *
     * @return CashBalance
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveCashBalance($id, $cashBalanceId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_CASH_BALANCE, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the cash balance belongs
     * @param null|array $params
     * @param null|array|string $opts
     * @param mixed $cashBalanceId
     *
     * @return CashBalance
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function updateCashBalance($id, $cashBalanceId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_CASH_BALANCE, $params, $opts);
    }
    const PATH_BALANCE_TRANSACTIONS = '/balance_transactions';

    /**
     * @param string $id the ID of the customer on which to retrieve the customer balance transactions
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<CustomerBalanceTransaction> the list of customer balance transactions
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allBalanceTransactions($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_BALANCE_TRANSACTIONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer on which to create the customer balance transaction
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return CustomerBalanceTransaction
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function createBalanceTransaction($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_BALANCE_TRANSACTIONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the customer balance transaction belongs
     * @param string $balanceTransactionId the ID of the customer balance transaction to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return CustomerBalanceTransaction
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveBalanceTransaction($id, $balanceTransactionId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_BALANCE_TRANSACTIONS, $balanceTransactionId, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the customer balance transaction belongs
     * @param string $balanceTransactionId the ID of the customer balance transaction to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return CustomerBalanceTransaction
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function updateBalanceTransaction($id, $balanceTransactionId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_BALANCE_TRANSACTIONS, $balanceTransactionId, $params, $opts);
    }
    const PATH_CASH_BALANCE_TRANSACTIONS = '/cash_balance_transactions';

    /**
     * @param string $id the ID of the customer on which to retrieve the customer cash balance transactions
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<CustomerCashBalanceTransaction> the list of customer cash balance transactions
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allCashBalanceTransactions($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_CASH_BALANCE_TRANSACTIONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the customer cash balance transaction belongs
     * @param string $cashBalanceTransactionId the ID of the customer cash balance transaction to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return CustomerCashBalanceTransaction
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveCashBalanceTransaction($id, $cashBalanceTransactionId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_CASH_BALANCE_TRANSACTIONS, $cashBalanceTransactionId, $params, $opts);
    }
    const PATH_SOURCES = '/sources';

    /**
     * @param string $id the ID of the customer on which to retrieve the payment sources
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<BankAccount|Card|Source> the list of payment sources (BankAccount, Card or Source)
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allSources($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_SOURCES, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer on which to create the payment source
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return BankAccount|Card|Source
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function createSource($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_SOURCES, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the payment source belongs
     * @param string $sourceId the ID of the payment source to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return BankAccount|Card|Source
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function deleteSource($id, $sourceId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_SOURCES, $sourceId, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the payment source belongs
     * @param string $sourceId the ID of the payment source to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return BankAccount|Card|Source
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveSource($id, $sourceId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_SOURCES, $sourceId, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the payment source belongs
     * @param string $sourceId the ID of the payment source to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return BankAccount|Card|Source
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function updateSource($id, $sourceId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_SOURCES, $sourceId, $params, $opts);
    }
    const PATH_TAX_IDS = '/tax_ids';

    /**
     * @param string $id the ID of the customer on which to retrieve the tax ids
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<TaxId> the list of tax ids
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allTaxIds($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_TAX_IDS, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer on which to create the tax id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return TaxId
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function createTaxId($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_TAX_IDS, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the tax id belongs
     * @param string $taxIdId the ID of the tax id to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return TaxId
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function deleteTaxId($id, $taxIdId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_TAX_IDS, $taxIdId, $params, $opts);
    }

    /**
     * @param string $id the ID of the customer to which the tax id belongs
     * @param string $taxIdId the ID of the tax id to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return TaxId
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveTaxId($id, $taxIdId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_TAX_IDS, $taxIdId, $params, $opts);
    }
}
