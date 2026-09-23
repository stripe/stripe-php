<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\FinancialConnections;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ConsentService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a Financial Connections <code>Consent</code> object for an account
     * holder.
     *
     * @param null|array{account_holder: array{account?: string, customer?: string, customer_account?: string, type: string}, expand?: string[], locale?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FinancialConnections\Consent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/financial_connections/consents', $params, $opts);
    }

    /**
     * Retrieves the details of a Financial Connections <code>Consent</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FinancialConnections\Consent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/financial_connections/consents/%s', $id), $params, $opts);
    }
}
