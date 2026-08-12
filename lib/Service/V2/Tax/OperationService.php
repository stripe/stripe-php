<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OperationService extends \Stripe\Service\AbstractService
{
    /**
     * Resolves an address to its tax precision level.
     *
     * @param null|array{address: array{city?: string, country: string, line1?: string, postal_code?: string, state?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\OperationsResolveAddressResult
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function resolveAddress($params = null, $opts = null)
    {
        return $this->request('post', '/v2/tax/operations/resolve_address', $params, $opts);
    }
}
