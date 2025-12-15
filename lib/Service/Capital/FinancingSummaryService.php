<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Capital;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancingSummaryService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve the financing summary object for the account.
     *
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Capital\FinancingSummary
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/capital/financing_summary', $params, $opts);
    }
}
