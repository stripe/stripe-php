<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\FinancialConnections;

class TransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Financial Connections <code>Transaction</code> objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\FinancialConnections\Transaction>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/financial_connections/transactions', $params, $opts);
    }
}
