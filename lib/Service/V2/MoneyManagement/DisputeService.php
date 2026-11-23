<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DisputeService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of Disputes.
     *
     * @param null|array{financial_account?: string, limit?: int, statuses?: string[], target?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\Dispute>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/disputes', $params, $opts);
    }

    /**
     * Creates a Dispute for the specified money movement.
     *
     * @param null|array{explanation?: string, metadata?: array<string, string>, reason: string, target: array{received_debit?: string, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\Dispute
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/disputes', $params, $opts);
    }

    /**
     * Retrieves a Dispute.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/disputes/%s', $id), $params, $opts);
    }
}
