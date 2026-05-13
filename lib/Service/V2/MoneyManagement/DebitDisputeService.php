<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DebitDisputeService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of DebitDisputes.
     *
     * @param null|array{financial_account?: string, limit?: int, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\DebitDispute>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/debit_disputes', $params, $opts);
    }

    /**
     * Creates a new DebitDispute for a ReceivedDebit.
     *
     * @param null|array{bank_transfer?: array{reason?: string}, received_debit: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\DebitDispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/debit_disputes', $params, $opts);
    }

    /**
     * Retrieves the details of an existing DebitDispute.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\DebitDispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/debit_disputes/%s', $id), $params, $opts);
    }
}
