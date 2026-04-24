<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Extend;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class WorkflowRunService extends \Stripe\Service\AbstractService
{
    /**
     * List all Workflow Runs.
     *
     * @param null|array{limit?: int, status?: string[], workflow?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Extend\WorkflowRun>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/extend/workflow_runs', $params, $opts);
    }

    /**
     * Retrieves the details of a Workflow Run by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Extend\WorkflowRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/extend/workflow_runs/%s', $id), $params, $opts);
    }
}
