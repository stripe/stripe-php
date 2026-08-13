<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * A Financial Connections Session is the secure way to programmatically launch the client-side Stripe.js modal that lets your users link their accounts.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{account?: string|\Stripe\Account, customer?: string|\Stripe\Customer, customer_account?: string, type: string}&\Stripe\StripeObject) $account_holder The account holder for whom accounts are collected in this session.
 * @property \Stripe\Collection<Account> $accounts The accounts that were collected as part of this Session.
 * @property null|\Stripe\Token $bank_account_token <p>Tokenization is the process Stripe uses to collect sensitive card or bank account details, or personally identifiable information (PII), directly from your customers in a secure manner. A token representing this information is returned to your server to use. Use our <a href="https://docs.stripe.com/payments">recommended payments integrations</a> to perform this process on the client-side. This guarantees that no sensitive card data touches your server, and allows your integration to operate in a PCI-compliant way.</p><p>If you can't use client-side tokenization, you can also create tokens using the API with either your publishable or secret API key. If your integration uses this method, you're responsible for any PCI compliance that it might require, and you must keep your secret API key safe. Unlike with client-side tokenization, your customer's information isn't sent directly to Stripe, so we can't determine how it's handled or stored.</p><p>You can't store or use tokens more than once. To store card or bank account information for later use, create <a href="https://docs.stripe.com/api#customers">Customer</a> objects or <a href="/api#external_accounts">External accounts</a>. <a href="https://docs.stripe.com/radar">Radar</a>, our integrated solution for automatic fraud protection, performs best with integrations that use client-side tokenization.</p>
 * @property null|string $client_secret A value that will be passed to the client to launch the authentication flow.
 * @property null|(object{account_subcategories: null|string[], countries: null|string[], country: null|string, institution?: string, require_payment_method_support?: string}&\Stripe\StripeObject) $filters
 * @property null|(object{delivery_method?: string, return_url: null|string}&\Stripe\StripeObject) $hosted Settings for the Hosted UI mode.
 * @property null|(object{accounts: int}&\Stripe\StripeObject) $limits
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|(object{mode?: string}&\Stripe\StripeObject) $manual_entry
 * @property string[] $permissions Permissions requested for accounts collected during this session.
 * @property null|string[] $prefetch Data features requested to be retrieved upon account creation.
 * @property null|(object{account?: null|string, authorization: string}&\Stripe\StripeObject) $relink_options
 * @property null|(object{account: null|string, authorization: null|string, failure_reason: null|string}&\Stripe\StripeObject) $relink_result
 * @property null|string $return_url For webview integrations only. Upon completing OAuth login in the native browser, the user will be redirected to this URL to return to your app.
 * @property null|string $status The current state of the session.
 * @property null|(object{cancelled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details
 * @property null|string $ui_mode The UI mode for this session.
 * @property null|string $url The hosted URL for this Session. Redirect customers to this URL to take them to the hosted authentication flow. This value is only present when the Session is active and the <code>ui_mode</code> is <code>hosted</code>.
 */
class Session extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.session';

    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCEEDED = 'succeeded';

    const UI_MODE_HOSTED = 'hosted';
    const UI_MODE_MODAL = 'modal';

    /**
     * To launch the Financial Connections authorization flow, create a
     * <code>Session</code>. The session’s <code>client_secret</code> can be used to
     * launch the flow using Stripe.js.
     *
     * @param null|array{account_holder?: array{account?: string, customer?: string, customer_account?: string, type: string}, expand?: string[], filters?: array{account_subcategories?: string[], countries?: string[], institution?: string, require_payment_method_support?: string}, hosted?: array{delivery_method?: string}, limits?: array{accounts: null|int}, manual_entry?: array{mode?: string}, permissions: string[], prefetch?: string[], relink_options?: array{account?: string, authorization: string}, return_url?: string, ui_mode?: string} $params
     * @param null|array|string $options
     *
     * @return Session the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * Retrieves the details of a Financial Connections <code>Session</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Session
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
}
