<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SpendingMandateService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of SpendingMandates.
     *
     * @param null|array{financial_account?: string, limit?: int, network?: string, statuses?: string[], type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\SpendingMandate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/spending_mandates', $params, $opts);
    }

    /**
     * Cancels an active SpendingMandate.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\SpendingMandate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/spending_mandates/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates an active SpendingMandate authorizing an ACH originator to debit a
     * Financial Account.
     *
     * @param null|array{bank_transfer?: array{account_holder_name: string, ach?: array{originator_company_id: string, transaction_limit?: \Stripe\StripeObject}, financial_address: string, network: string}, financial_account: string, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\SpendingMandate
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/spending_mandates', $params, $opts);
    }

    /**
     * Retrieves the details of an existing SpendingMandate.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\SpendingMandate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/spending_mandates/%s', $id), $params, $opts);
    }

    /**
     * Updates an active ACH SpendingMandate.
     *
     * @param string $id
     * @param null|array{bank_transfer?: array{account_holder_name?: string, ach?: array{originator_company_id?: string, transaction_limit?: \Stripe\StripeObject}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\SpendingMandate
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/spending_mandates/%s', $id), $params, $opts);
    }
}
