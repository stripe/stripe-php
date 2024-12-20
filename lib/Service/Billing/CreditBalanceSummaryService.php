<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CreditBalanceSummaryService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the credit balance summary for a customer.
     *
     * @param null|array{customer: string, expand?: string[], filter: array{applicability_scope?: array{price_type: string}, credit_grant?: string, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditBalanceSummary
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/billing/credit_balance_summary', $params, $opts);
    }
}
