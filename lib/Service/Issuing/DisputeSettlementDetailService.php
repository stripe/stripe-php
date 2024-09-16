<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DisputeSettlementDetailService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>DisputeSettlementDetail</code> objects. The
     * objects are sorted in descending order by creation date, with the most recently
     * created object appearing first.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\DisputeSettlementDetail>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/dispute_settlement_details', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>DisputeSettlementDetail</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\DisputeSettlementDetail
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/dispute_settlement_details/%s', $id), $params, $opts);
    }
}
