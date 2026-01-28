<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Reserve;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReleaseService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of ReserveReleases previously created. The ReserveReleases are
     * returned in sorted order, with the most recent ReserveReleases appearing first.
     *
     * @param null|array{currency?: string, ending_before?: string, expand?: string[], limit?: int, reserve_hold?: string, reserve_plan?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Reserve\Release>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/reserve/releases', $params, $opts);
    }

    /**
     * Retrieve a ReserveRelease.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Reserve\Release
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/reserve/releases/%s', $id), $params, $opts);
    }
}
