<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class IntegrationConfigurationService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve the tax integration configuration for this account.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\IntegrationConfiguration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v2/tax/integration_configurations', $params, $opts);
    }

    /**
     * Update the tax integration configuration for this account.
     *
     * @param null|array{checkout_sessions?: array{automatic_tax_default_value: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\IntegrationConfiguration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($params = null, $opts = null)
    {
        return $this->request('post', '/v2/tax/integration_configurations', $params, $opts);
    }
}
