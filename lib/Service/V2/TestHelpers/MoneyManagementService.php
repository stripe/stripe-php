<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\TestHelpers;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MoneyManagementService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a RecipientVerification with a specified match result for testing
     * purposes in a Sandbox environment.
     *
     * @param null|array{match_result: string, payout_method: string, recipient?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RecipientVerification
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function recipientVerifications($params = null, $opts = null)
    {
        return $this->request('post', '/v2/test_helpers/money_management/recipient_verifications', $params, $opts);
    }
}
