<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancialAccountService extends \Stripe\Service\AbstractService
{
    /**
     * Lists FinancialAccounts in this compartment.
     *
     * @param null|array{limit?: int, status?: string, types?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\FinancialAccount>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/financial_accounts', $params, $opts);
    }

    /**
     * Closes a FinancialAccount with or without forwarding settings.
     *
     * @param string $id
     * @param null|array{forwarding_settings?: array{payment_method?: string, payout_method?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\NonZeroBalanceException
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/financial_accounts/%s/close', $id), $params, $opts);
    }

    /**
     * Creates a new FinancialAccount.
     *
     * @param null|array{display_name?: string, metadata?: array<string, string>, storage?: array{holds_currencies: string[]}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/financial_accounts', $params, $opts);
    }

    /**
     * Retrieves the details of an existing FinancialAccount.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/financial_accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing FinancialAccount.
     *
     * @param string $id
     * @param null|array{display_name?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/financial_accounts/%s', $id), $params, $opts);
    }
}
