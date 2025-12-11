<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\SharedPayment;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class GrantedTokenService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves an existing SharedPaymentGrantedToken object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SharedPayment\GrantedToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/shared_payment/granted_tokens/%s', $id), $params, $opts);
    }
}
