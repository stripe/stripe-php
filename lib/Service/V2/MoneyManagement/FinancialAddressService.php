<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancialAddressService extends \Stripe\Service\AbstractService
{
    /**
     * List all FinancialAddresses for a FinancialAccount.
     *
     * @param null|array{financial_account?: string, include?: string[], limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\FinancialAddress>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/financial_addresses', $params, $opts);
    }

    /**
     * Create a new FinancialAddress for a FinancialAccount.
     *
     * @param null|array{financial_account: string, sepa_bank_account?: array{country: string}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAddress
     *
     * @throws \Stripe\Exception\FinancialAccountNotOpenException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/financial_addresses', $params, $opts);
    }

    /**
     * Retrieve a FinancialAddress. By default, the FinancialAddress will be returned
     * in its unexpanded state, revealing only the last 4 digits of the account number.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAddress
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/financial_addresses/%s', $id), $params, $opts);
    }
}
