<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of accounts connected to your platform via <a
     * href="/docs/connect">Connect</a>. If you’re not a platform, the list is empty.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Account>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/accounts', $params, $opts);
    }

    /**
     * Returns a list of capabilities associated with the account. The capabilities are
     * returned sorted by creation date, with the most recent capability appearing
     * first.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Capability>
     */
    public function allCapabilities($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/accounts/%s/capabilities', $parentId), $params, $opts);
    }

    /**
     * List external accounts for an account.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\BankAccount|\Stripe\Card>
     */
    public function allExternalAccounts($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/accounts/%s/external_accounts', $parentId), $params, $opts);
    }

    /**
     * Returns a list of people associated with the account’s legal entity. The people
     * are returned sorted by creation date, with the most recent people appearing
     * first.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Person>
     */
    public function allPersons($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/accounts/%s/persons', $parentId), $params, $opts);
    }

    /**
     * With <a href="/docs/connect">Connect</a>, you can create Stripe accounts for
     * your users. To do this, you’ll first need to <a
     * href="https://dashboard.stripe.com/account/applications/settings">register your
     * platform</a>.
     *
     * If you’ve already collected information for your connected accounts, you <a
     * href="/docs/connect/best-practices#onboarding">can prefill that information</a>
     * when creating the account. Connect Onboarding won’t ask for the prefilled
     * information during account onboarding. You can prefill any information on the
     * account.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/accounts', $params, $opts);
    }

    /**
     * Create an external account for a given account.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public function createExternalAccount($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/external_accounts', $parentId), $params, $opts);
    }

    /**
     * Creates a single-use login link for a connected account to access the Express
     * Dashboard.
     *
     * <strong>You can only create login links for accounts that use the <a
     * href="/connect/express-dashboard">Express Dashboard</a> and are connected to
     * your platform</strong>.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\LoginLink
     */
    public function createLoginLink($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/login_links', $parentId), $params, $opts);
    }

    /**
     * Creates a new person.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public function createPerson($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/persons', $parentId), $params, $opts);
    }

    /**
     * With <a href="/connect">Connect</a>, you can delete accounts you manage.
     *
     * Test-mode accounts can be deleted at any time.
     *
     * Live-mode accounts where Stripe is responsible for negative account balances
     * cannot be deleted, which includes Standard accounts. Live-mode accounts where
     * your platform is liable for negative account balances, which includes Custom and
     * Express accounts, can be deleted when all <a
     * href="/api/balance/balanace_object">balances</a> are zero.
     *
     * If you want to delete your own account, use the <a
     * href="https://dashboard.stripe.com/settings/account">account information tab in
     * your account settings</a> instead.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/accounts/%s', $id), $params, $opts);
    }

    /**
     * Delete a specified external account for a given account.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public function deleteExternalAccount($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/accounts/%s/external_accounts/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Deletes an existing person’s relationship to the account’s legal entity. Any
     * person with a relationship for an account can be deleted through the API, except
     * if the person is the <code>account_opener</code>. If your integration is using
     * the <code>executive</code> parameter, you cannot delete the only verified
     * <code>executive</code> on file.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public function deletePerson($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/accounts/%s/persons/%s', $parentId, $id), $params, $opts);
    }

    /**
     * With <a href="/connect">Connect</a>, you can reject accounts that you have
     * flagged as suspicious.
     *
     * Only accounts where your platform is liable for negative account balances, which
     * includes Custom and Express accounts, can be rejected. Test-mode accounts can be
     * rejected at any time. Live-mode accounts can only be rejected after all balances
     * are zero.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public function reject($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/reject', $id), $params, $opts);
    }

    /**
     * Retrieves information about the specified Account Capability.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public function retrieveCapability($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/accounts/%s/capabilities/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a specified external account for a given account.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public function retrieveExternalAccount($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/accounts/%s/external_accounts/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves an existing person.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public function retrievePerson($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/accounts/%s/persons/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates a <a href="/connect/accounts">connected account</a> by setting the
     * values of the parameters passed. Any parameters not provided are left unchanged.
     *
     * For accounts where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>application</code>, which includes Custom accounts, you can update any
     * information on the account.
     *
     * For accounts where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>stripe</code>, which includes Standard and Express accounts, you can
     * update all information until you create an <a href="/api/account_links">Account
     * Link</a> or <a href="/api/account_sessions">Account Session</a> to start Connect
     * onboarding, after which some properties can no longer be updated.
     *
     * To update your own account, use the <a
     * href="https://dashboard.stripe.com/settings/account">Dashboard</a>. Refer to our
     * <a href="/docs/connect/updating-accounts">Connect</a> documentation to learn
     * more about updating accounts.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing Account Capability. Request or remove a capability by
     * updating its <code>requested</code> parameter.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public function updateCapability($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/capabilities/%s', $parentId, $id), $params, $opts);
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
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public function updateExternalAccount($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/external_accounts/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates an existing person.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public function updatePerson($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/persons/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves the details of an account.
     *
     * @param null|string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public function retrieve($id = null, $params = null, $opts = null)
    {
        if (null === $id) {
            return $this->request('get', '/v1/account', $params, $opts);
        }

        return $this->request('get', $this->buildPath('/v1/accounts/%s', $id), $params, $opts);
    }
}
