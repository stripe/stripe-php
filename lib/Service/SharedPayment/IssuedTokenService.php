<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\SharedPayment;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class IssuedTokenService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new SharedPaymentIssuedToken object.
     *
     * @param null|array{expand?: string[], payment_method: string, return_url?: string, seller_details: array{external_id?: string, network_business_profile?: string}, setup_future_usage?: string, shared_metadata?: array<string, string>, usage_limits: array{currency: string, expires_at?: int, max_amount: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SharedPayment\IssuedToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/shared_payment/issued_tokens', $params, $opts);
    }

    /**
     * Retrieves an existing SharedPaymentIssuedToken object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SharedPayment\IssuedToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/shared_payment/issued_tokens/%s', $id), $params, $opts);
    }

    /**
     * Revokes a SharedPaymentIssuedToken.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SharedPayment\IssuedToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function revoke($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/shared_payment/issued_tokens/%s/revoke', $id), $params, $opts);
    }
}
