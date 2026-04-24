<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Iam;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ActivityLogService extends \Stripe\Service\AbstractService
{
    /**
     * List activity logs of an account.
     *
     * @param null|array{action_groups?: string[], actions?: string[], limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Iam\ActivityLog>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/iam/activity_logs', $params, $opts);
    }
}
