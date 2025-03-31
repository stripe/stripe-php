<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>Transaction</code> objects. The objects are
     * sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array{card?: string, cardholder?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Transaction>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/transactions', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Transaction</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Transaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/transactions/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing <code>Transaction</code> object by setting the
     * values of the parameters passed. Any parameters not provided will be left
     * unchanged.
     *
     * @param string $id
     * @param null|array{expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Transaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/transactions/%s', $id), $params, $opts);
    }
}
