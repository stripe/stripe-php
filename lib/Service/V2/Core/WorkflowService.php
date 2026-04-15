<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class WorkflowService extends \Stripe\Service\AbstractService
{
    /**
     * List all Workflows.
     *
     * @param null|array{limit?: int, status: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Workflow>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/workflows', $params, $opts);
    }

    /**
     * Invokes an on-demand Workflow with parameters, to launch a new Workflow Run.
     *
     * @param string $id
     * @param null|array{input_parameters: array} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\WorkflowRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function invoke($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/workflows/%s/invoke', $id), $params, $opts);
    }

    /**
     * Retrieves the details of a Workflow by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Workflow
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/workflows/%s', $id), $params, $opts);
    }
}
