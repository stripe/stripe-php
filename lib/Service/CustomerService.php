<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CustomerService extends AbstractService
{
    /**
     * Returns a list of your customers. The customers are returned sorted by creation
     * date, with the most recent customers appearing first.
     *
     * @param null|array{created?: array|int, email?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, test_clock?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Customer>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/customers', $params, $opts);
    }

    /**
     * Returns a list of transactions that updated the customer’s <a
     * href="/docs/billing/customer/balance">balances</a>.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\CustomerBalanceTransaction>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allBalanceTransactions($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/customers/%s/balance_transactions', $parentId), $params, $opts);
    }

    /**
     * Returns a list of transactions that modified the customer’s <a
     * href="/docs/payments/customer-balance">cash balance</a>.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\CustomerCashBalanceTransaction>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allCashBalanceTransactions($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/customers/%s/cash_balance_transactions', $parentId), $params, $opts);
    }

    /**
     * Returns a list of PaymentMethods for a given Customer.
     *
     * @param string $id
     * @param null|array{allow_redisplay?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PaymentMethod>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allPaymentMethods($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/customers/%s/payment_methods', $id), $params, $opts);
    }

    /**
     * List sources for a specified customer.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, object?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allSources($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/customers/%s/sources', $parentId), $params, $opts);
    }

    /**
     * Returns a list of tax IDs for a customer.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\TaxId>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allTaxIds($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/customers/%s/tax_ids', $parentId), $params, $opts);
    }

    /**
     * Creates a new customer object.
     *
     * @param null|array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, balance?: int, cash_balance?: array{settings?: array{reconciliation_mode?: string}}, description?: string, email?: string, expand?: string[], invoice_prefix?: string, invoice_settings?: array{custom_fields?: null|array{name: string, value: string}[], default_payment_method?: string, footer?: string, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}, metadata?: null|\Stripe\StripeObject, name?: string, next_invoice_sequence?: int, payment_method?: string, phone?: string, preferred_locales?: string[], shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, source?: string, tax?: array{ip_address?: null|string, validate_location?: string}, tax_exempt?: null|string, tax_id_data?: array{type: string, value: string}[], test_clock?: string, validate?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/customers', $params, $opts);
    }

    /**
     * Creates an immutable transaction that updates the customer’s credit <a
     * href="/docs/billing/customer/balance">balance</a>.
     *
     * @param string $parentId
     * @param null|array{amount: int, currency: string, description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createBalanceTransaction($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/balance_transactions', $parentId), $params, $opts);
    }

    /**
     * Retrieve funding instructions for a customer cash balance. If funding
     * instructions do not yet exist for the customer, new funding instructions will be
     * created. If funding instructions have already been created for a given customer,
     * the same funding instructions will be retrieved. In other words, we will return
     * the same funding instructions each time.
     *
     * @param string $id
     * @param null|array{bank_transfer: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, currency: string, expand?: string[], funding_type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FundingInstructions
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createFundingInstructions($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/funding_instructions', $id), $params, $opts);
    }

    /**
     * When you create a new credit card, you must specify a customer or recipient on
     * which to create it.
     *
     * If the card’s owner has no default card, then the new card will become the
     * default. However, if the owner already has a default, then it will not change.
     * To change the default, you should <a href="/docs/api#update_customer">update the
     * customer</a> to have a new <code>default_source</code>.
     *
     * @param string $parentId
     * @param null|array{expand?: string[], metadata?: \Stripe\StripeObject, source: string, validate?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createSource($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/sources', $parentId), $params, $opts);
    }

    /**
     * Creates a new <code>tax_id</code> object for a customer.
     *
     * @param string $parentId
     * @param null|array{expand?: string[], type: string, value: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createTaxId($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/tax_ids', $parentId), $params, $opts);
    }

    /**
     * Permanently deletes a customer. It cannot be undone. Also immediately cancels
     * any active subscriptions on the customer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s', $id), $params, $opts);
    }

    /**
     * Removes the currently applied discount on a customer.
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
        return $this->request('delete', $this->buildPath('/v1/customers/%s/discount', $id), $params, $opts);
    }

    /**
     * Delete a specified source for a given customer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deleteSource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Deletes an existing <code>tax_id</code> object.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deleteTaxId($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s/tax_ids/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves a Customer object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s', $id), $params, $opts);
    }

    /**
     * Retrieves a specific customer balance transaction that updated the customer’s <a
     * href="/docs/billing/customer/balance">balances</a>.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveBalanceTransaction($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/balance_transactions/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves a customer’s cash balance.
     *
     * @param string $parentId
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CashBalance
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveCashBalance($parentId, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/cash_balance', $parentId), $params, $opts);
    }

    /**
     * Retrieves a specific cash balance transaction, which updated the customer’s <a
     * href="/docs/payments/customer-balance">cash balance</a>.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerCashBalanceTransaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveCashBalanceTransaction($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/cash_balance_transactions/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves a PaymentMethod object for a given Customer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentMethod
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrievePaymentMethod($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/payment_methods/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a specified source for a given customer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveSource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves the <code>tax_id</code> object with the given identifier.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveTaxId($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/tax_ids/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Search for customers you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SearchResult<\Stripe\Customer>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/customers/search', $params, $opts);
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
     * @param string $id
     * @param null|array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, balance?: int, cash_balance?: array{settings?: array{reconciliation_mode?: string}}, default_source?: string, description?: string, email?: string, expand?: string[], invoice_prefix?: string, invoice_settings?: array{custom_fields?: null|array{name: string, value: string}[], default_payment_method?: string, footer?: string, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}, metadata?: null|\Stripe\StripeObject, name?: string, next_invoice_sequence?: int, phone?: string, preferred_locales?: string[], shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: string}, source?: string, tax?: array{ip_address?: null|string, validate_location?: string}, tax_exempt?: null|string, validate?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s', $id), $params, $opts);
    }

    /**
     * Most credit balance transaction fields are immutable, but you may update its
     * <code>description</code> and <code>metadata</code>.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateBalanceTransaction($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/balance_transactions/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Changes the settings on a customer’s cash balance.
     *
     * @param string $parentId
     * @param null|array{expand?: string[], settings?: array{reconciliation_mode?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CashBalance
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateCashBalance($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/cash_balance', $parentId), $params, $opts);
    }

    /**
     * Update a specified source for a given customer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{account_holder_name?: string, account_holder_type?: string, address_city?: string, address_country?: string, address_line1?: string, address_line2?: string, address_state?: string, address_zip?: string, exp_month?: string, exp_year?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, name?: string, owner?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateSource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Verify a specified bank account for a given customer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{amounts?: int[], expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function verifySource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/sources/%s/verify', $parentId, $id), $params, $opts);
    }
}
