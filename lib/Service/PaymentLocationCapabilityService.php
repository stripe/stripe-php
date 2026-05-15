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
