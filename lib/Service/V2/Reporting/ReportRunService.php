<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Reporting;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReportRunService extends \Stripe\Service\AbstractService
{
    /**
     * Initiates the generation of a `ReportRun` based on the specified report template
     * and user-provided parameters. It's the starting point for obtaining report data,
     * and returns a `ReportRun` object which can be used to track the progress and
     * retrieve the results of the report.
     *
     * @param null|array{report: string, report_parameters: array, result_options?: array{compress_file?: bool}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Reporting\ReportRun
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/reporting/report_runs', $params, $opts);
    }

    /**
     * Fetches the current state and details of a previously created `ReportRun`. If
     * the `ReportRun` has succeeded, the endpoint will provide details for how to
     * retrieve the results.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Reporting\ReportRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/reporting/report_runs/%s', $id), $params, $opts);
    }
}
