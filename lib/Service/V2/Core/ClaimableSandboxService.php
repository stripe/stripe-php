<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ClaimableSandboxService extends \Stripe\Service\AbstractService
{
    /**
     * Create an anonymous, claimable sandbox. This sandbox can be prefilled with data.
     * The response will include a claim URL that allow a user to claim the account.
     *
     * @param null|array{enable_mcp_access: bool, prefill: array{country: string, email: string, name?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ClaimableSandbox
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/claimable_sandboxes', $params, $opts);
    }
}
