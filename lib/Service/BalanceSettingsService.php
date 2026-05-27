<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BalanceSettingsService extends AbstractService
{
    /**
     * Retrieves balance settings for a given connected account.  Related guide: <a
     * href="/connect/authentication">Making API calls for connected accounts</a>.
     *
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BalanceSettings
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/balance_settings', $params, $opts);
    }

    /**
     * Updates balance settings for a given connected account.  Related guide: <a
     * href="/connect/authentication">Making API calls for connected accounts</a>.
     *
     * @param null|array{expand?: string[], payments?: array{debit_negative_balances?: bool, payouts?: array{automatic_transfer_rules_by_currency?: null|array<string, null|array{payout_method: string, transfer_up_to_amount?: int, type: string}[]>, minimum_balance_by_currency?: null|array<string, null|int>, schedule?: array{interval?: string, monthly_payout_days?: int[], weekly_payout_days?: string[]}, statement_descriptor?: string}, settlement_timing?: array{delay_days_override?: null|int, start_of_day?: null|array{hour?: int, minutes?: int, timezone?: string}}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BalanceSettings
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($params = null, $opts = null)
    {
        return $this->request('post', '/v1/balance_settings', $params, $opts);
    }
}
