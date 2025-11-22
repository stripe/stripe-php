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
     * Creates a trial offer.
     *
     * @param null|array{duration: array{relative?: array{iterations: int}, type: string}, end_behavior: array{transition: array{price: string}}, expand?: string[], price: string} $params
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
}
