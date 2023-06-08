<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class AcceptedFinancingService extends \Stripe\Service\AbstractService
{
    /**
     * Returns the Accepted Financing offers for a merchant.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\AcceptedFinancing>
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/capital/financing/accepted', $params, $opts);
    }
}
