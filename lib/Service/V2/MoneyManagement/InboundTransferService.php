<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InboundTransferService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of InboundTransfers.
     *
     * @param null|array{created?: string, created_gt?: string, created_gte?: string, created_lt?: string, created_lte?: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\InboundTransfer>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/inbound_transfers', $params, $opts);
    }

    /**
     * InboundTransfers APIs are used to create, retrieve or list InboundTransfers.
     *
     * @param null|array{amount: array{value?: int, currency?: string}, description?: string, from: array{currency?: string, payment_method: string}, to: array{currency: string, financial_account: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\InboundTransfer
     *
     * @throws \Stripe\Exception\BlockedByStripeException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/inbound_transfers', $params, $opts);
    }

    /**
     * Retrieve an InboundTransfer by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\InboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/inbound_transfers/%s', $id), $params, $opts);
    }
}
