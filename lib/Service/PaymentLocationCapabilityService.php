<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentLocationCapabilityService extends AbstractService
{
    /**
     * Returns a list of <code>PaymentLocationCapability</code> objects associated with
     * the location.
     *
     * @param null|array{expand?: string[], location: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PaymentLocationCapability>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_location_capabilities', $params, $opts);
    }

    /**
     * Retrieves information about the specified Payment Location Capability.
     *
     * @param string $id
     * @param null|array{expand?: string[], location: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentLocationCapability
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_location_capabilities/%s', $id), $params, $opts);
    }

    /**
     * Updates a specified Payment Location Capability. Request or remove a payment
     * location capability by updating its <code>requested</code> parameter.
     *
     * @param string $id
     * @param null|array{expand?: string[], location: string, requested: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentLocationCapability
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_location_capabilities/%s', $id), $params, $opts);
    }
}
