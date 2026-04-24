<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ApprovalRequestService extends \Stripe\Service\AbstractService
{
    /**
     * GET /v2/core/approval_requests Lists approval requests with optional filtering.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\ApprovalRequest>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/approval_requests', $params, $opts);
    }

    /**
     * POST /v2/core/approval_requests/:id/cancel Cancels a pending approval request.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ApprovalRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/approval_requests/%s/cancel', $id), $params, $opts);
    }

    /**
     * POST /v2/core/approval_requests/:id/execute Executes an approved approval
     * request.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ApprovalRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function execute($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/approval_requests/%s/execute', $id), $params, $opts);
    }

    /**
     * GET /v2/core/approval_requests/:id Retrieves an approval request by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ApprovalRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/approval_requests/%s', $id), $params, $opts);
    }

    /**
     * POST /v2/core/approval_requests/:id/submit Moves a pending approval request into
     * the reviewer queue for auto-execution upon approval.
     *
     * @param string $id
     * @param null|array{reason?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ApprovalRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/approval_requests/%s/submit', $id), $params, $opts);
    }
}
