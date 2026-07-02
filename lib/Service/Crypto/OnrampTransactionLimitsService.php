<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Crypto;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OnrampTransactionLimitsService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the remaining onramp limit for a crypto customer.
     *
     * @param null|array{customer_ip_address?: string, destination_network?: string, destination_tag?: string, expand?: string[], wallet_address?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\OnrampTransactionLimits
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/crypto/onramp_transaction_limits', $params, $opts);
    }
}
