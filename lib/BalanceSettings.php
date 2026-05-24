<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Options for customizing account balances and payout settings for a Stripe platform’s connected accounts.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{debit_negative_balances: null|bool, payouts: null|(object{automatic_transfer_rules_by_currency: null|StripeObject, minimum_balance_by_currency: null|StripeObject, schedule: null|(object{interval: null|string, monthly_payout_days?: int[], weekly_payout_days?: string[]}&StripeObject), statement_descriptor: null|string, status: string}&StripeObject), settlement_timing: (object{delay_days: int, delay_days_override?: int, start_of_day: null|(object{hour: int, minutes: int, timezone: string}&StripeObject)}&StripeObject)}&StripeObject) $payments
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
     * @param null|array{expand?: string[], payments?: array{debit_negative_balances?: bool, payouts?: array{automatic_transfer_rules_by_currency?: null|array<string, null|array{payout_method: string, transfer_up_to_amount?: int, type: string}[]>, minimum_balance_by_currency?: null|array<string, null|int>, schedule?: array{interval?: string, monthly_payout_days?: int[], weekly_payout_days?: string[]}, statement_descriptor?: string}, settlement_timing?: array{delay_days_override?: null|int, start_of_day?: null|array{hour?: int, minutes?: int, timezone?: string}}}} $params
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
