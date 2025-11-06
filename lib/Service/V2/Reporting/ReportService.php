<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Reporting;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReportService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves metadata about a specific `Report` template, including its name,
     * description, and the parameters it accepts. It's useful for understanding the
     * capabilities and requirements of a particular `Report` before requesting a
     * `ReportRun`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Reporting\Report
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/reporting/reports/%s', $id), $params, $opts);
    }
}
