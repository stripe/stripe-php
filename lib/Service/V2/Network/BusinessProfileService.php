<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Network;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BusinessProfileService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve the Stripe business profile associated with the requesting merchant and
     * livemode.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Network\BusinessProfile
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function me($params = null, $opts = null)
    {
        return $this->request('get', '/v2/network/business_profiles/me', $params, $opts);
    }

    /**
     * Retrieve a Stripe business profile by its Network ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Network\BusinessProfile
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/network/business_profiles/%s', $id), $params, $opts);
    }
}
