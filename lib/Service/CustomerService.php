<?php

namespace Stripe\Service;

class CustomerService extends AbstractService
{
    const BALANCE_TRANSACTIONS = 'balance_transactions';
    const SOURCES = 'sources';
    const TAX_IDS = 'tax_ids';

    public function basePath()
    {
        return '/v1/customers';
    }

    /**
     * List all customers.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = [], $opts = [])
    {
        return $this->allObjects($params, $opts);
    }

    /**
     * List customer balance transactions.
     *
     * @param string $customerId
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function allBalanceTransactions($customerId, $params = [], $opts = [])
    {
        return $this->allNestedObjects(self::BALANCE_TRANSACTIONS, $customerId, $params, $opts);
    }

    /**
     * List all sources.
     *
     * @param string $customerId
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function allSources($customerId, $params = [], $opts = [])
    {
        return $this->allNestedObjects(self::SOURCES, $customerId, $params, $opts);
    }

    /**
     * List all tax IDs.
     *
     * @param string $customerId
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function allTaxIds($customerId, $params = [], $opts = [])
    {
        return $this->allNestedObjects(self::TAX_IDS, $customerId, $params, $opts);
    }

    /**
     * Create a customer.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Customer
     */
    public function create($params = [], $opts = [])
    {
        return $this->createObject($params, $opts);
    }

    /**
     * Create a balance transaction.
     *
     * @param string $customerId
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     */
    public function createBalanceTransaction($customerId, $params = [], $opts = [])
    {
        return $this->createNestedObject(self::BALANCE_TRANSACTIONS, $customerId, $params, $opts);
    }

    /**
     * Create a source.
     *
     * @param string $customerId
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function createSource($customerId, $params = [], $opts = [])
    {
        return $this->createNestedObject(self::SOURCES, $customerId, $params, $opts);
    }

    /**
     * Create a tax ID.
     *
     * @param string $customerId
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\TaxId
     */
    public function createTaxId($customerId, $params = [], $opts = [])
    {
        return $this->createNestedObject(self::TAX_IDS, $customerId, $params, $opts);
    }

    /**
     * Delete a customer.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Customer
     */
    public function delete($id, $params = [], $opts = [])
    {
        return $this->deleteObject($id, $params, $opts);
    }

    /**
     * Delete a customer discount.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Discount
     */
    public function deleteDiscount($id, $params = [], $opts = [])
    {
        return $this->request('delete', $this->instancePath($id) . '/discount', $params, $opts);
    }

    /**
     * Delete a source.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function deleteSource($customerId, $id, $params = [], $opts = [])
    {
        return $this->deleteNestedObject(self::SOURCES, $customerId, $id, $params, $opts);
    }

    /**
     * Delete a tax ID.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\TaxId
     */
    public function deleteTaxId($customerId, $id, $params = [], $opts = [])
    {
        return $this->deleteNestedObject(self::TAX_IDS, $customerId, $id, $params, $opts);
    }

    /**
     * Retrieve a customer.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Customer
     */
    public function retrieve($id, $params = [], $opts = [])
    {
        return $this->retrieveObject($id, $params, $opts);
    }

    /**
     * Retrieve a balance transaction.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     */
    public function retrieveBalanceTransaction($customerId, $id, $params = [], $opts = [])
    {
        return $this->retrieveNestedObject(self::BALANCE_TRANSACTIONS, $customerId, $id, $params, $opts);
    }

    /**
     * Retrieve a source.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function retrieveSource($customerId, $id, $params = [], $opts = [])
    {
        return $this->retrieveNestedObject(self::SOURCES, $customerId, $id, $params, $opts);
    }

    /**
     * Retrieve a tax ID.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\TaxId
     */
    public function retrieveTaxId($customerId, $id, $params = [], $opts = [])
    {
        return $this->retrieveNestedObject(self::TAX_IDS, $customerId, $id, $params, $opts);
    }

    /**
     * Update a customer.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Customer
     */
    public function update($id, $params = [], $opts = [])
    {
        return $this->updateObject($id, $params, $opts);
    }

    /**
     * Update a balance transaction.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\CustomerBalanceTransaction
     */
    public function updateBalanceTransaction($customerId, $id, $params = [], $opts = [])
    {
        return $this->updateNestedObject(self::BALANCE_TRANSACTIONS, $customerId, $id, $params, $opts);
    }

    /**
     * Update a source.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     */
    public function updateSource($customerId, $id, $params = [], $opts = [])
    {
        return $this->updateNestedObject(self::SOURCES, $customerId, $id, $params, $opts);
    }

    /**
     * Verify a source.
     *
     * @param string $customerId
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\BankAccount
     */
    public function verifySource($customerId, $id, $params = [], $opts = [])
    {
        return $this->request(
            'post',
            $this->instanceNestedPath($customerId, self::SOURCES, $id) . '/verify',
            $params,
            $opts
        );
    }
}
