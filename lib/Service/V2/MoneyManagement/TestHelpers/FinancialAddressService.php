<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement\TestHelpers;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancialAddressService extends \Stripe\Service\AbstractService
{
    /**
     * Simulate crediting a FinancialAddress in a Sandbox environment. This can be used
     * to add virtual funds and increase your balance for testing.
     *
     * @param string $id
     * @param null|array{amount: \Stripe\StripeObject, network: string, statement_descriptor?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAddressCreditSimulation
     *
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function credit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/test_helpers/financial_addresses/%s/credit', $id), $params, $opts);
    }

    /**
     * Simulate debiting a FinancialAddress in a Sandbox environment. This can be used
     * to remove virtual funds and decrease your balance for testing.
     *
     * @param string $id
     * @param null|array{amount: \Stripe\StripeObject, network: string, statement_descriptor?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAddressDebitSimulation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function debit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/test_helpers/financial_addresses/%s/debit', $id), $params, $opts);
    }

    /**
     * Generates microdeposits for a FinancialAddress in a Sandbox environment.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAddressGeneratedMicrodeposits
     *
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function generateMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/test_helpers/financial_addresses/%s/generate_microdeposits', $id), $params, $opts);
    }
}
