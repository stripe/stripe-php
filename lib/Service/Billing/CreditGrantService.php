<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CreditGrantService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve a list of credit grants.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Billing\CreditGrant>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/billing/credit_grants', $params, $opts);
    }

    /**
     * Creates a credit grant.
     *
     * @param null|array{amount: array{monetary?: array{currency: string, value: int}, type: string}, applicability_config: array{scope: array{price_type: string}}, category: string, customer: string, effective_at?: int, expand?: string[], expires_at?: int, metadata?: \Stripe\StripeObject, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing/credit_grants', $params, $opts);
    }

    /**
     * Expires a credit grant.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant
     */
    public function expire($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/credit_grants/%s/expire', $id), $params, $opts);
    }

    /**
     * Retrieves a credit grant.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/billing/credit_grants/%s', $id), $params, $opts);
    }

    /**
     * Updates a credit grant.
     *
     * @param string $id
     * @param null|array{expand?: string[], expires_at?: null|int, metadata?: \Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/credit_grants/%s', $id), $params, $opts);
    }

    /**
     * Voids a credit grant.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditGrant
     */
    public function voidGrant($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/credit_grants/%s/void', $id), $params, $opts);
    }
}
