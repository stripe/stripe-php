<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Treasury;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of Transaction objects.
     *
     * @param null|array{created?: int|array, ending_before?: string, expand?: string[], financial_account: string, limit?: int, order_by?: string, starting_after?: string, status?: string, status_transitions?: array{posted_at?: int|array}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\Transaction>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/treasury/transactions', $params, $opts);
    }

    /**
     * Retrieves the details of an existing Transaction.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\Transaction
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/treasury/transactions/%s', $id), $params, $opts);
    }
}
