<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\ProductCatalog;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TrialOfferService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of trial offers.
     *
     * @param null|array{active?: bool, created?: array|int, ending_before?: string, expand?: string[], limit?: int, prices?: string[], starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\ProductCatalog\TrialOffer>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/product_catalog/trial_offers', $params, $opts);
    }

    /**
     * Creates a trial offer.
     *
     * @param null|array{duration: array{relative?: array{iterations: int}, type: string}, end_behavior: array{transition: array{price: string}}, expand?: string[], name?: string, price: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ProductCatalog\TrialOffer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/product_catalog/trial_offers', $params, $opts);
    }

    /**
     * Retrieves the trial offer with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ProductCatalog\TrialOffer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/product_catalog/trial_offers/%s', $id), $params, $opts);
    }
}
