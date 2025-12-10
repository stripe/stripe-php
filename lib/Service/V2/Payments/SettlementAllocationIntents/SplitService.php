<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Payments\SettlementAllocationIntents;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SplitService extends \Stripe\Service\AbstractService
{
    /**
     * Cancel SettlementAllocationIntentSplit API.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntentSplit
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/settlement_allocation_intents/%s/splits/%s/cancel', $parentId, $id), $params, $opts);
    }

    /**
     * Create SettlementAllocationIntentSplit API.
     *
     * @param string $id
     * @param null|array{account: string, amount: array{value?: int, currency?: string}, metadata?: array<string, string>, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntentSplit
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/settlement_allocation_intents/%s/splits', $id), $params, $opts);
    }

    /**
     * Retrieve SettlementAllocationIntentSplit API.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\SettlementAllocationIntentSplit
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/payments/settlement_allocation_intents/%s/splits/%s', $parentId, $id), $params, $opts);
    }
}
