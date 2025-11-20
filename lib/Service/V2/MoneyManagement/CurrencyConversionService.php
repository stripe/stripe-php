<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CurrencyConversionService extends \Stripe\Service\AbstractService
{
    /**
     * List all CurrencyConversion on an account with the option to filter by
     * FinancialAccount.
     *
     * @param null|array{financial_account?: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\CurrencyConversion>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/currency_conversions', $params, $opts);
    }

    /**
     * Create a CurrencyConversion.
     *
     * @param null|array{financial_account: string, from: array{amount?: array{value?: int, currency?: string}, currency?: string}, to: array{amount?: array{value?: int, currency?: string}, currency?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\CurrencyConversion
     *
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/currency_conversions', $params, $opts);
    }

    /**
     * Retrieve details of a CurrencyConversion by id.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\CurrencyConversion
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/currency_conversions/%s', $id), $params, $opts);
    }
}
