<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RecipientVerificationService extends \Stripe\Service\AbstractService
{
    /**
     * Acknowledges an existing RecipientVerification. Only RecipientVerification
     * awaiting acknowledgement can be acknowledged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RecipientVerification
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function acknowledge($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/recipient_verifications/%s/acknowledge', $id), $params, $opts);
    }

    /**
     * Creates a RecipientVerification to verify the recipient you intend to send funds
     * to.
     *
     * @param null|array{payout_method: string, recipient?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RecipientVerification
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/recipient_verifications', $params, $opts);
    }

    /**
     * Retrieves the details of an existing RecipientVerification by passing the unique
     * RecipientVerification ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RecipientVerification
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/recipient_verifications/%s', $id), $params, $opts);
    }
}
