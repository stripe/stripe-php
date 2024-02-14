<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Capital;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancingSummaryService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve the financing state for the account that was authenticated in the
     * request.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingSummary
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/capital/financing_summary', $params, $opts);
    }
}
