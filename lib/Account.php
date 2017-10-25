<?php

namespace Stripe;

/**
 * Class Account
 *
 * @property string $id
 * @property string $object
 * @property mixed $business_logo
 * @property string $business_name
 * @property mixed $business_url
 * @property bool $charges_enabled
 * @property string $country
 * @property bool $debit_negative_balances
 * @property mixed $decline_charge_on
 * @property string $default_currency
 * @property bool $details_submitted
 * @property string $display_name
 * @property string $email
 * @property mixed $external_accounts
 * @property mixed $legal_entity
 * @property bool $managed
 * @property mixed $payout_schedule
 * @property mixed $payout_statement_descriptor
 * @property bool $payouts_enabled
 * @property mixed $product_description
 * @property mixed $statement_descriptor
 * @property mixed $support_email
 * @property mixed $support_phone
 * @property string $timezone
 * @property mixed $tos_acceptance
 * @property mixed $verification
 * @property mixed $keys
 *
 * @package Stripe
 */
class Account extends ApiResource
{
    const PATH_EXTERNAL_ACCOUNTS = '/external_accounts';
    const PATH_LOGIN_LINKS = '/login_links';

    public function instanceUrl()
    {
        if ($this['id'] === null) {
            return '/v1/account';
        } else {
            return parent::instanceUrl();
        }
    }

    /**
     * @param array|string|null $id The ID of the account to retrieve, or an
     *     options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Account
     */
    public static function retrieve($id = null, $opts = null)
    {
        if (!$opts && is_string($id) && substr($id, 0, 3) === 'sk_') {
            $opts = $id;
            $id = null;
        }
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the account to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Account The updated account.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Account
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account The deleted account.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account The rejected account.
     */
    public function reject($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reject';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of Accounts
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param array|null $clientId
     * @param array|string|null $opts
     *
     * @return StripeObject Object containing the response from the API.
     */
    public function deauthorize($clientId = null, $opts = null)
    {
        $params = array(
            'client_id' => $clientId,
            'stripe_user_id' => $this->id,
        );
        OAuth::deauthorize($params, $opts);
    }

    /**
     * @param array|null $id The ID of the account on which to create the external account.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExternalAccount
     */
    public static function createExternalAccount($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the account to which the external account belongs.
     * @param array|null $externalAccountId The ID of the external account to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExternalAccount
     */
    public static function retrieveExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the account to which the external account belongs.
     * @param array|null $externalAccountId The ID of the external account to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExternalAccount
     */
    public static function updateExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the account to which the external account belongs.
     * @param array|null $externalAccountId The ID of the external account to delete.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExternalAccount
     */
    public static function deleteExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_EXTERNAL_ACCOUNTS, $externalAccountId, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the account on which to retrieve the external accounts.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExternalAccount
     */
    public static function allExternalAccounts($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_EXTERNAL_ACCOUNTS, $params, $opts);
    }

    /**
     * @param array|null $id The ID of the account on which to create the login link.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return LoginLink
     */
    public static function createLoginLink($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_LOGIN_LINKS, $params, $opts);
    }
}
