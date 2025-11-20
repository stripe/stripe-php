<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OutboundTransferService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of OutboundTransfers that match the provided filters.
     *
     * @param null|array{created?: string, created_gt?: string, created_gte?: string, created_lt?: string, created_lte?: string, limit?: int, status?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\OutboundTransfer>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/outbound_transfers', $params, $opts);
    }

    /**
     * Cancels an OutboundTransfer. Only processing OutboundTransfers can be canceled.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundTransfer
     *
     * @throws \Stripe\Exception\AlreadyCanceledException
     * @throws \Stripe\Exception\NotCancelableException
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/outbound_transfers/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates an OutboundTransfer.
     *
     * @param null|array{amount: array{value?: int, currency?: string}, delivery_options?: array{bank_account?: string}, description?: string, from: array{currency: string, financial_account: string}, metadata?: array<string, string>, recipient_verification?: string, to: array{currency?: string, payout_method: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundTransfer
     *
     * @throws \Stripe\Exception\InsufficientFundsException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/outbound_transfers', $params, $opts);
    }

    /**
     * Retrieves the details of an existing OutboundTransfer by passing the unique
     * OutboundTransfer ID from either the OutboundPayment create or list response.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/outbound_transfers/%s', $id), $params, $opts);
    }
}
