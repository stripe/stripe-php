<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Reserve;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class HoldService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of ReserveHolds previously created. The ReserveHolds are returned
     * in sorted order, with the most recent ReserveHolds appearing first.
     *
     * @param null|array{currency?: string, ending_before?: string, expand?: string[], is_releasable?: bool, limit?: int, reason?: string, reserve_plan?: string, reserve_release?: string, source_charge?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Reserve\Hold>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/reserve/holds', $params, $opts);
    }

    /**
     * Retrieve a ReserveHold.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Reserve\Hold
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/reserve/holds/%s', $id), $params, $opts);
    }
}
