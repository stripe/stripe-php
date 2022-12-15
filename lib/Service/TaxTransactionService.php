<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class TaxTransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a Tax <code>Transaction</code> from a calculation.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxTransaction
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/transactions', $params, $opts);
    }

    /**
     * Creates a partial or full reversal of a previously created
     * <code>Transaction</code>.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxTransaction
     */
    public function createReversal($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/transactions/create_reversal', $params, $opts);
    }

    /**
     * Retrieves a Tax <code>Transaction</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxTransaction
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax/transactions/%s', $id), $params, $opts);
    }
}
