<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\SharedPayment;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class GrantedTokenService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new test SharedPaymentGrantedToken object. This endpoint is only
     * available in test mode and allows sellers to create SharedPaymentGrantedTokens
     * for testing their integration.
     *
     * @param null|array{customer?: string, expand?: string[], payment_method: string, shared_metadata?: null|array<string, string>, usage_limits: array{currency: string, expires_at: int, max_amount: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SharedPayment\GrantedToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/test_helpers/shared_payment/granted_tokens', $params, $opts);
    }

    /**
     * Revokes a test SharedPaymentGrantedToken object. This endpoint is only available
     * in test mode and allows sellers to revoke SharedPaymentGrantedTokens for testing
     * their integration.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SharedPayment\GrantedToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function revoke($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/shared_payment/granted_tokens/%s/revoke', $id), $params, $opts);
    }
}
