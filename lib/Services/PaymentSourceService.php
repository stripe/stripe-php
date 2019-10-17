<?php

namespace Stripe\Services;

class PaymentSourceService extends AbstractNestedService
{
    public function basePath()
    {
        return '/v1/customers/{PARENT}/sources';
    }

    /**
     * List all payment sources.
     *
     * @param array $params
     * @param array $opts
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\PaymentMethod|\Stripe\Source
     */
    public function all($parentId, $params = [], $opts = [])
    {
        return $this->allNestedObjects($parentId, $params, $opts);
    }

    /**
     * Create a payment source.
     *
     * @param array $params
     * @param array $opts
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\PaymentMethod|\Stripe\Source
     */
    public function create($parentId, $params = [], $opts = [])
    {
        return $this->createNestedObject($parentId, $params, $opts);
    }

    /**
     * Delete a payment source.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\PaymentMethod|\Stripe\Source
     */
    public function delete($parentId, $id, $params = [], $opts = [])
    {
        return $this->deleteNestedObject($parentId, $id, $params, $opts);
    }

    /**
     * Retrieve a payment source.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\PaymentMethod|\Stripe\Source
     */
    public function retrieve($parentId, $id, $params = [], $opts = [])
    {
        return $this->retrieveNestedObject($parentId, $id, $params, $opts);
    }

    /**
     * Update a payment source.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     * @return \Stripe\BankAccount|\Stripe\Card|\Stripe\PaymentMethod|\Stripe\Source
     */
    public function update($parentId, $id, $params = [], $opts = [])
    {
        return $this->updateNestedObject($parentId, $id, $params, $opts);
    }
}
