<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountLinkService extends \Stripe\Service\AbstractService
{
    /**
     * Creates an AccountLink object that includes a single-use URL that an account can
     * use to access a Stripe-hosted flow for collecting or updating required
     * information.
     *
     * @param null|array{account: string, use_case: array{type: string, account_onboarding?: array{collection_options?: array{fields?: string, future_requirements?: string}, configurations: string[], refresh_url: string, return_url?: string}, account_update?: array{collection_options?: array{fields?: string, future_requirements?: string}, configurations: string[], refresh_url: string, return_url?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountLink
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/account_links', $params, $opts);
    }
}
