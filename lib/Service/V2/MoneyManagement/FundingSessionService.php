<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FundingSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Create a FundingSession: a hosted funding surface for a customer to fund a
     * FinancialAccount.
     *
     * @param null|array{account: string, financial_account: string, financial_address_options: array{crypto_wallet?: array{settlement_currency: string}}, financial_address_types: string[], return_url: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FundingSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/funding_sessions', $params, $opts);
    }
}
