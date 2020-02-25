<?php

namespace Stripe\Service;

class CustomerService extends AbstractService
{
    /**
     * List all customers.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->request('get', '/v1/customers', $params, $opts);
    }

    /**
     * List customer balance transactions.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function allBalanceTransactions($parentId, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/balance_transactions', $parentId), $params, $opts);
    }

    /**
     * List all sources.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function allSources($parentId, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/sources', $parentId), $params, $opts);
    }

    /**
     * List all tax IDs.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function allTaxIds($parentId, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/tax_ids', $parentId), $params, $opts);
    }

    /**
     * Create a customer.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/customers', $params, $opts);
    }

    /**
     * Create a balance transaction.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     */
    public function createBalanceTransaction($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/balance_transactions', $parentId), $params, $opts);
    }

    /**
     * Create a source.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function createSource($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/sources', $parentId), $params, $opts);
    }

    /**
     * Create a tax ID.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     */
    public function createTaxId($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/tax_ids', $parentId), $params, $opts);
    }

    /**
     * Delete a customer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s', $id), $params, $opts);
    }

    /**
     * Delete a customer discount.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Discount
     */
    public function deleteDiscount($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s/discount', $id), $params, $opts);
    }

    /**
     * Delete a source.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function deleteSource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Delete a tax ID.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     */
    public function deleteTaxId($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s/tax_ids/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a customer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s', $id), $params, $opts);
    }

    /**
     * Retrieve a balance transaction.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     */
    public function retrieveBalanceTransaction($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/balance_transactions/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a source.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function retrieveSource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a tax ID.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxId
     */
    public function retrieveTaxId($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/customers/%s/tax_ids/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Update a customer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Customer
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s', $id), $params, $opts);
    }

    /**
     * Update a balance transaction.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     */
    public function updateBalanceTransaction($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/balance_transactions/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Update a source.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function updateSource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Verify a source.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount
     */
    public function verifySource($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/customers/%s/sources/%s/verify', $parentId, $id), $params, $opts);
    }
}
