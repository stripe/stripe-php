<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ProjectService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new project.
     *
     * @param null|array{catalog?: string, name: string, project_profile?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Project
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/provisioning/projects', $params, $opts);
    }
}
