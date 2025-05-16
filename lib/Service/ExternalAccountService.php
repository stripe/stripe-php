<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ExternalAccountService extends AbstractService
{
    /**
     * List external accounts for an account.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, object?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\BankAccount|\Stripe\Card>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/external_accounts', $params, $opts);
    }

    /**
     * Create an external account for a given connected account.
     *
     * @param null|array{default_for_currency?: bool, expand?: string[], external_account: array|string, metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/external_accounts', $params, $opts);
    }

    /**
     * Delete a specified external account for a given account.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/external_accounts/%s', $id), $params, $opts);
    }

    /**
     * Retrieve a specified external account for a given account.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/external_accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates the metadata, account holder name, account holder type of a bank account
     * belonging to a connected account and optionally sets it as the default for its
     * currency. Other bank account details are not editable by design.
     *
     * You can only update bank accounts when <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">account.controller.requirement_collection</a>
     * is <code>application</code>, which includes <a
     * href="/connect/custom-accounts">Custom accounts</a>.
     *
     * You can re-enable a disabled bank account by performing an update call without
     * providing any arguments or changes.
     *
     * @param string $id
     * @param null|array{account_holder_name?: string, account_holder_type?: null|string, account_type?: string, address_city?: string, address_country?: string, address_line1?: string, address_line2?: string, address_state?: string, address_zip?: string, default_for_currency?: bool, documents?: array{bank_account_ownership_verification?: array{files?: string[]}}, exp_month?: string, exp_year?: string, expand?: string[], metadata?: null|array<string, string>, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/external_accounts/%s', $id), $params, $opts);
    }
}
