<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReportService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Stripe-defined reports that the caller can create a
     * `ReportRun` for.
     *
     * @param null|array{include?: string[], limit?: int, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Data\Report>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/data/reports', $params, $opts);
    }

    /**
     * Retrieves metadata about a specific `Report`, including its name, description,
     * and the parameters it accepts. It's useful for understanding the capabilities
     * and requirements of a particular `Report` before requesting a `ReportRun`.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\Report
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/data/reports/%s', $id), $params, $opts);
    }
}
