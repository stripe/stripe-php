<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\FinancialConnections;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Financial Connections <code>Account</code> objects.
     *
     * @param null|array{account_holder?: array{account?: string, customer?: string}, ending_before?: string, expand?: string[], limit?: int, session?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
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
     * Lists the recorded inferred balances for a Financial Connections
     * <code>Account</code>.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\FinancialConnections\AccountInferredBalance>
     */
    public function allInferredBalances($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/financial_connections/accounts/%s/inferred_balances', $parentId), $params, $opts);
    }

    /**
     * Lists all owners for a given <code>Account</code>.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, ownership: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
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
     * Disables your access to a Financial Connections <code>Account</code>. You will
     * no longer be able to access data associated with the account (e.g. balances,
     * transactions).
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
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
     * Refreshes the data associated with a Financial Connections <code>Account</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[], features: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
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
     * Retrieves the details of an Financial Connections <code>Account</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Account
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/financial_connections/accounts/%s', $id), $params, $opts);
    }

    /**
     * Subscribes to periodic refreshes of data associated with a Financial Connections
     * <code>Account</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[], features: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Account
     */
    public function subscribe($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/financial_connections/accounts/%s/subscribe', $id), $params, $opts);
    }

    /**
     * Unsubscribes from periodic refreshes of data associated with a Financial
     * Connections <code>Account</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[], features: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Account
     */
    public function unsubscribe($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/financial_connections/accounts/%s/unsubscribe', $id), $params, $opts);
    }
}
