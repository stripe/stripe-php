<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new account evaluation to trigger signal evaluations on an account or
     * account data.
     *
     * @param null|array{account?: string, account_data?: array{defaults?: array{profile: array{business_url: string, doing_business_as?: string, product_description?: string}}, identity?: array{business_details: array{registered_name?: string}}}, signals: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/account_evaluations', $params, $opts);
    }
}
