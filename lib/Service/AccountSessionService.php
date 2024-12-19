<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a AccountSession object that includes a single-use token that the
     * platform can use on their front-end to grant client-side API access.
     *
     * @param null|array{account: string, components: array{account_management?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, account_onboarding?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, app_install?: array{enabled: bool, features?: array{allowed_apps?: null|string[]}}, app_viewport?: array{enabled: bool, features?: array{allowed_apps?: null|string[]}}, balances?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, capital_financing?: array{enabled: bool, features?: array{}}, capital_financing_application?: array{enabled: bool, features?: array{}}, capital_financing_promotion?: array{enabled: bool, features?: array{}}, capital_overview?: array{enabled: bool, features?: array{}}, documents?: array{enabled: bool, features?: array{}}, financial_account?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool, send_money?: bool, transfer_balance?: bool}}, financial_account_transactions?: array{enabled: bool, features?: array{card_spend_dispute_management?: bool}}, issuing_card?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, spend_control_management?: bool}}, issuing_cards_list?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, disable_stripe_user_authentication?: bool, spend_control_management?: bool}}, notification_banner?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, payment_details?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payment_method_settings?: array{enabled: bool, features?: array{}}, payments?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payouts?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, payouts_list?: array{enabled: bool, features?: array{}}, recipients?: array{enabled: bool, features?: array{send_money?: bool}}, reporting_chart?: array{enabled: bool, features?: array{}}, tax_registrations?: array{enabled: bool, features?: array{}}, tax_settings?: array{enabled: bool, features?: array{}}}, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\AccountSession
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/account_sessions', $params, $opts);
    }
}
