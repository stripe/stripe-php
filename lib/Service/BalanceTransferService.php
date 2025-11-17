<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BalanceTransferService extends AbstractService
{
    /**
     * Creates a balance transfer. For Issuing use cases, funds will be debited
     * immediately from the source balance and credited to the destination balance
     * immediately (if your account is based in the US) or next-business-day (if your
     * account is based in the EU). For Segregated Separate Charges and Transfers use
     * cases, funds will be debited immediately from the source balance and credited
     * immediately to the destination balance.
     *
     * @param null|array{amount: int, currency: string, destination_balance: array{type: string}, expand?: string[], metadata?: array<string, string>, source_balance: array{allocated_funds?: array{charge: string, type: string}, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BalanceTransfer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/balance_transfers', $params, $opts);
    }
}
