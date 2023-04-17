<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\FinancialConnections;

class AccountService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Financial Connections `Account` objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\FinancialConnections\Account>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/financial_connections/accounts', $params, $opts);
    }

    /**
     * Lists all owners for a given `Account`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\FinancialConnections\AccountOwner>
     */
    public function allOwners($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/financial_connections/accounts/%s/owners', $id), $params, $opts);
    }

    /**
     * Disables your access to a Financial Connections `Account`. You will
     * no longer be able to access data associated with the account (e.g. balances,
     * transactions).
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Account
     */
    public function disconnect($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/financial_connections/accounts/%s/disconnect', $id), $params, $opts);
    }

    /**
     * Refreshes the data associated with a Financial Connections `Account`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Account
     */
    public function refresh($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/financial_connections/accounts/%s/refresh', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an Financial Connections `Account`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Account
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/financial_connections/accounts/%s', $id), $params, $opts);
    }
}
