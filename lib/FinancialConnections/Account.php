<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * A Financial Connections Account represents an account that exists outside of Stripe, to which you have been granted some degree of access.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{account?: string|\Stripe\Account, customer?: string|\Stripe\Customer, type: string}&\Stripe\StripeObject) $account_holder The account holder that this account belongs to.
 * @property null|((object{expected_expiry_date: null|int, identifier_type: string, status: string, supported_networks: string[]}&\Stripe\StripeObject))[] $account_numbers Details about the account numbers.
 * @property null|(object{as_of: int, cash?: (object{available: null|\Stripe\StripeObject}&\Stripe\StripeObject), credit?: (object{used: null|\Stripe\StripeObject}&\Stripe\StripeObject), current: \Stripe\StripeObject, type: string}&\Stripe\StripeObject) $balance The most recent information about the account's balance.
 * @property null|(object{last_attempted_at: int, next_refresh_available_at: null|int, status: string}&\Stripe\StripeObject) $balance_refresh The state of the most recent attempt to refresh the account balance.
 * @property string $category The type of the account. Account category is further divided in <code>subcategory</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $display_name A human-readable name that has been assigned to this account, either by the account holder or by the institution.
 * @property string $institution_name The name of the institution that holds this account.
 * @property null|string $last4 The last 4 digits of the account number. If present, this will be 4 numeric characters.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|AccountOwnership|string $ownership The most recent information about the account's owners.
 * @property null|(object{last_attempted_at: int, next_refresh_available_at: null|int, status: string}&\Stripe\StripeObject) $ownership_refresh The state of the most recent attempt to refresh the account owners.
 * @property null|string[] $permissions The list of permissions granted by this account.
 * @property string $status The status of the link to the account.
 * @property string $subcategory <p>If <code>category</code> is <code>cash</code>, one of:</p><p>- <code>checking</code> - <code>savings</code> - <code>other</code></p><p>If <code>category</code> is <code>credit</code>, one of:</p><p>- <code>mortgage</code> - <code>line_of_credit</code> - <code>credit_card</code> - <code>other</code></p><p>If <code>category</code> is <code>investment</code> or <code>other</code>, this will be <code>other</code>.</p>
 * @property null|string[] $subscriptions The list of data refresh subscriptions requested on this account.
 * @property string[] $supported_payment_method_types The <a href="https://stripe.com/docs/api/payment_methods/object#payment_method_object-type">PaymentMethod type</a>(s) that can be created from this account.
 * @property null|(object{id: string, last_attempted_at: int, next_refresh_available_at: null|int, status: string}&\Stripe\StripeObject) $transaction_refresh The state of the most recent attempt to refresh the account transactions.
 */
class Account extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.account';

    const CATEGORY_CASH = 'cash';
    const CATEGORY_CREDIT = 'credit';
    const CATEGORY_INVESTMENT = 'investment';
    const CATEGORY_OTHER = 'other';

    const STATUS_ACTIVE = 'active';
    const STATUS_DISCONNECTED = 'disconnected';
    const STATUS_INACTIVE = 'inactive';

    const SUBCATEGORY_CHECKING = 'checking';
    const SUBCATEGORY_CREDIT_CARD = 'credit_card';
    const SUBCATEGORY_LINE_OF_CREDIT = 'line_of_credit';
    const SUBCATEGORY_MORTGAGE = 'mortgage';
    const SUBCATEGORY_OTHER = 'other';
    const SUBCATEGORY_SAVINGS = 'savings';

    /**
     * Returns a list of Financial Connections <code>Account</code> objects.
     *
     * @param null|array{account_holder?: array{account?: string, customer?: string}, ending_before?: string, expand?: string[], limit?: int, session?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Account> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an Financial Connections <code>Account</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Account the disconnected account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function disconnect($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/disconnect';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<AccountOwner> list of account owners
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function allOwners($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/owners';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Account the refreshed account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function refreshAccount($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/refresh';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Account the subscribed account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function subscribe($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/subscribe';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Account the unsubscribed account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function unsubscribe($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/unsubscribe';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
