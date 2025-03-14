<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Entitlements;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ActiveEntitlementService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve a list of active entitlements for a customer.
     *
     * @param null|array{customer: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Entitlements\ActiveEntitlement>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/entitlements/active_entitlements', $params, $opts);
    }

    /**
     * Retrieve an active entitlement.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Entitlements\ActiveEntitlement
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/entitlements/active_entitlements/%s', $id), $params, $opts);
    }
}
