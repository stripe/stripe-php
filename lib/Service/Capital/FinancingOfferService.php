<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Capital;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancingOfferService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the financing offers available for Connected accounts that belong to
     * your platform.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Capital\FinancingOffer>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/capital/financing_offers', $params, $opts);
    }

    /**
     * Acknowledges that platform has received and delivered the financing_offer to the
     * intended merchant recipient.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingOffer
     */
    public function markDelivered($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/capital/financing_offers/%s/mark_delivered', $id), $params, $opts);
    }

    /**
     * Get the details of the financing offer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingOffer
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/capital/financing_offers/%s', $id), $params, $opts);
    }
}
