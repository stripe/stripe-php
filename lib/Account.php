<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This is an object representing a Stripe account. You can retrieve it to see
 * properties on the account like its current requirements or if the account is
 * enabled to make live charges or receive payouts.
 *
 * For accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
 * is <code>application</code>, which includes Custom accounts, the properties below are always
 * returned.
 *
 * For accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
 * is <code>stripe</code>, which includes Standard and Express accounts, some properties are only returned
 * until you create an <a href="/api/account_links">Account Link</a> or <a href="/api/account_sessions">Account Session</a>
 * to start Connect Onboarding. Learn about the <a href="/connect/accounts">differences between accounts</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $business_profile Business information about the account.
 * @property null|string $business_type The business type. After you create an <a href="/api/account_links">Account Link</a> or <a href="/api/account_sessions">Account Session</a>, this property is only returned for accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>application</code>, which includes Custom accounts.
 * @property null|\Stripe\StripeObject $capabilities
 * @property null|bool $charges_enabled Whether the account can process charges.
 * @property null|\Stripe\StripeObject $company
 * @property null|\Stripe\StripeObject $controller
 * @property null|string $country The account's country.
 * @property null|int $created Time at which the account was connected. Measured in seconds since the Unix epoch.
 * @property null|string $default_currency Three-letter ISO currency code representing the default currency for the account. This must be a currency that <a href="https://stripe.com/docs/payouts">Stripe supports in the account's country</a>.
 * @property null|bool $details_submitted Whether account details have been submitted. Accounts with Stripe Dashboard access, which includes Standard accounts, cannot receive payouts before this is true. Accounts where this is false should be directed to <a href="/connect/onboarding">an onboarding flow</a> to finish submitting account details.
 * @property null|string $email An email address associated with the account. It's not used for authentication and Stripe doesn't market to this field without explicit approval from the platform.
 * @property null|\Stripe\Collection<\Stripe\BankAccount|\Stripe\Card> $external_accounts External accounts (bank accounts and debit cards) currently attached to this account. External accounts are only returned for requests where <code>controller[is_controller]</code> is true.
 * @property null|\Stripe\StripeObject $future_requirements
 * @property null|\Stripe\StripeObject $groups The groups associated with the account.
 * @property null|\Stripe\Person $individual <p>This is an object representing a person associated with a Stripe account.</p><p>A platform cannot access a person for an account where <a href="/api/accounts/object#account_object-controller-requirement_collection">account.controller.requirement_collection</a> is <code>stripe</code>, which includes Standard and Express accounts, after creating an Account Link or Account Session to start Connect onboarding.</p><p>See the <a href="/connect/standard-accounts">Standard onboarding</a> or <a href="/connect/express-accounts">Express onboarding</a> documentation for information about prefilling information and account onboarding steps. Learn more about <a href="/connect/handling-api-verification#person-information">handling identity verification with the API</a>.</p>
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|bool $payouts_enabled Whether the funds in this account can be paid out.
 * @property null|\Stripe\StripeObject $requirements
 * @property null|\Stripe\StripeObject $settings Options for customizing how the account functions within Stripe.
 * @property null|\Stripe\StripeObject $tos_acceptance
 * @property null|string $type The Stripe account type. Can be <code>standard</code>, <code>express</code>, <code>custom</code>, or <code>none</code>.
 */
class Account extends ApiResource
{
    const OBJECT_NAME = 'account';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    const BUSINESS_TYPE_COMPANY = 'company';
    const BUSINESS_TYPE_GOVERNMENT_ENTITY = 'government_entity';
    const BUSINESS_TYPE_INDIVIDUAL = 'individual';
    const BUSINESS_TYPE_NON_PROFIT = 'non_profit';

    const TYPE_CUSTOM = 'custom';
    const TYPE_EXPRESS = 'express';
    const TYPE_NONE = 'none';
    const TYPE_STANDARD = 'standard';

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
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
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
     * href="/api/balance/balance_object">balances</a> are zero.
     *
     * If you want to delete your own account, use the <a
     * href="https://dashboard.stripe.com/settings/account">account information tab in
     * your account settings</a> instead.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account the deleted resource
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of accounts connected to your platform via <a
     * href="/docs/connect">Connect</a>. If you’re not a platform, the list is empty.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Account> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
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
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    use ApiOperations\Retrieve {
        retrieve as protected _retrieve;
    }

    public static function getSavedNestedResources()
    {
        static $savedNestedResources = null;
        if (null === $savedNestedResources) {
            $savedNestedResources = new Util\Set([
                'external_account',
                'bank_account',
            ]);
        }

        return $savedNestedResources;
    }

    public function instanceUrl()
    {
        if (null === $this['id']) {
            return '/v1/account';
        }

        return parent::instanceUrl();
    }

    /**
     * @param null|array|string $id the ID of the account to retrieve, or an
     *     options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public static function retrieve($id = null, $opts = null)
    {
        if (!$opts && \is_string($id) && 'sk_' === \substr($id, 0, 3)) {
            $opts = $id;
            $id = null;
        }

        return self::_retrieve($id, $opts);
    }

    public function serializeParameters($force = false)
    {
        $update = parent::serializeParameters($force);
        if (isset($this->_values['legal_entity'])) {
            $entity = $this['legal_entity'];
            if (isset($entity->_values['additional_owners'])) {
                $owners = $entity['additional_owners'];
                $entityUpdate = isset($update['legal_entity']) ? $update['legal_entity'] : [];
                $entityUpdate['additional_owners'] = $this->serializeAdditionalOwners($entity, $owners);
                $update['legal_entity'] = $entityUpdate;
            }
        }
        if (isset($this->_values['individual'])) {
            $individual = $this['individual'];
            if (($individual instanceof Person) && !isset($update['individual'])) {
                $update['individual'] = $individual->serializeParameters($force);
            }
        }

        return $update;
    }

    private function serializeAdditionalOwners($legalEntity, $additionalOwners)
    {
        if (isset($legalEntity->_originalValues['additional_owners'])) {
            $originalValue = $legalEntity->_originalValues['additional_owners'];
        } else {
            $originalValue = [];
        }
        if (($originalValue) && (\count($originalValue) > \count($additionalOwners))) {
            throw new Exception\InvalidArgumentException(
                'You cannot delete an item from an array, you must instead set a new array'
            );
        }

        $updateArr = [];
        foreach ($additionalOwners as $i => $v) {
            $update = ($v instanceof StripeObject) ? $v->serializeParameters() : $v;

            if ([] !== $update) {
                if (!$originalValue
                    || !\array_key_exists($i, $originalValue)
                    || ($update !== $legalEntity->serializeParamsValue($originalValue[$i], null, false, true))) {
                    $updateArr[$i] = $update;
                }
            }
        }

        return $updateArr;
    }

    /**
     * @param null|array $clientId
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject object containing the response from the API
     */
    public function deauthorize($clientId = null, $opts = null)
    {
        $params = [
            'client_id' => $clientId,
            'stripe_user_id' => $this->id,
        ];

        return OAuth::deauthorize($params, $opts);
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account the rejected account
     */
    public function reject($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reject';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    const PATH_CAPABILITIES = '/capabilities';

    /**
     * @param string $id the ID of the account on which to retrieve the capabilities
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Capability> the list of capabilities
     */
    public static function allCapabilities($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_CAPABILITIES, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the capability belongs
     * @param string $capabilityId the ID of the capability to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public static function retrieveCapability($id, $capabilityId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_CAPABILITIES, $capabilityId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the capability belongs
     * @param string $capabilityId the ID of the capability to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public static function updateCapability($id, $capabilityId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_CAPABILITIES, $capabilityId, $params, $opts);
    }
    const PATH_EXTERNAL_ACCOUNTS = '/external_accounts';

    /**
     * @param string $id the ID of the account on which to retrieve the external accounts
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\BankAccount|\Stripe\Card> the list of external accounts (BankAccount or Card)
     */
    public static function allExternalAccounts($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_EXTERNAL_ACCOUNTS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account on which to create the external account
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function createExternalAccount($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function deleteExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function retrieveExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function updateExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }
    const PATH_LOGIN_LINKS = '/login_links';

    /**
     * @param string $id the ID of the account on which to create the login link
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\LoginLink
     */
    public static function createLoginLink($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_LOGIN_LINKS, $params, $opts);
    }
    const PATH_PERSONS = '/persons';

    /**
     * @param string $id the ID of the account on which to retrieve the persons
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Person> the list of persons
     */
    public static function allPersons($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_PERSONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account on which to create the person
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function createPerson($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_PERSONS, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function deletePerson($id, $personId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_PERSONS, $personId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function retrievePerson($id, $personId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_PERSONS, $personId, $params, $opts);
    }

    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function updatePerson($id, $personId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_PERSONS, $personId, $params, $opts);
    }
}
