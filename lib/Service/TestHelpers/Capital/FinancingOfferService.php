<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Capital;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancingOfferService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a test financing offer for a connected account.
     *
     * @param null|array{advance_amount: int, expand?: string[], fee_amount: int, financing_type: string, status?: string, withhold_rate: float} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Capital\FinancingOffer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/test_helpers/capital/financing_offers', $params, $opts);
    }

    /**
     * Refills a test financing offer for a connected account.
     *
     * @param string $id
     * @param null|array{advance_amount: int, expand?: string[], fee_amount: int, financing_type: string, status?: string, withhold_rate: float} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Capital\FinancingOffer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function refill($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/capital/financing_offers/%s/refill', $id), $params, $opts);
    }
}
