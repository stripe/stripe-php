<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Options for customizing account balances and payout settings for a Stripe platform’s connected accounts.
 *
 * This API is only available for users enrolled in the public preview for Accounts v2 on Stripe Connect.
 * If you are not in this preview, please use the <a href="https://docs.stripe.com/api/accounts?api-version=2025-03-31.basil">Accounts v1 API</a>
 * to manage your connected accounts’ balance settings instead.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|bool $debit_negative_balances A Boolean indicating if Stripe should try to reclaim negative balances from an attached bank account. See <a href="/connect/account-balances">Understanding Connect account balances</a> for details. The default value is <code>false</code> when <a href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a> is <code>application</code>, which includes Custom accounts, otherwise <code>true</code>.
 * @property null|(object{schedule: null|(object{interval: null|string, monthly_payout_days?: int[], weekly_payout_days?: string[]}&StripeObject), statement_descriptor: null|string, status: string}&StripeObject) $payouts Settings specific to the account's payouts.
 * @property (object{delay_days: int}&StripeObject) $settlement_timing
 */
class BalanceSettings extends SingletonApiResource
{
    const OBJECT_NAME = 'balance_settings';

    use ApiOperations\Update;

    /**
     * Retrieves balance settings for a given connected account.  Related guide: <a
     * href="/connect/authentication">Making API calls for connected accounts</a>.
     *
     * @param null|array|string $opts
     *
     * @return BalanceSettings
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates balance settings for a given connected account.  Related guide: <a
     * href="/connect/authentication">Making API calls for connected accounts</a>.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{debit_negative_balances?: bool, expand?: string[], payouts?: array{schedule?: array{interval?: string, monthly_payout_days?: int[], weekly_payout_days?: string[]}, statement_descriptor?: string}, settlement_timing?: array{delay_days_override?: int}} $params
     * @param null|array|string $opts
     *
     * @return BalanceSettings the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
