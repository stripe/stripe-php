<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Capital;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancingTransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of financing transactions. The transactions are returned in
     * sorted order, with the most recent transactions appearing first.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Capital\FinancingTransaction>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/capital/financing_transactions', $params, $opts);
    }

    /**
     * Retrieves a financing transaction for a financing offer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingTransaction
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/capital/financing_transactions/%s', $id), $params, $opts);
    }
}
