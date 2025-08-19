<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountSessionService extends AbstractService
{
    /**
     * Creates a AccountSession object that includes a single-use token that the
     * platform can use on their front-end to grant client-side API access.
     *
     * @param null|array{account: string, components: array{account_management?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, account_onboarding?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, balance_report?: array{enabled: bool, features?: array{}}, balances?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, disputes_list?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, documents?: array{enabled: bool, features?: array{}}, financial_account?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool, send_money?: bool, transfer_balance?: bool}}, financial_account_transactions?: array{enabled: bool, features?: array{card_spend_dispute_management?: bool}}, instant_payouts_promotion?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool, instant_payouts?: bool}}, issuing_card?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, spend_control_management?: bool}}, issuing_cards_list?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, disable_stripe_user_authentication?: bool, spend_control_management?: bool}}, notification_banner?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, payment_details?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payment_disputes?: array{enabled: bool, features?: array{destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payments?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payout_details?: array{enabled: bool, features?: array{}}, payout_reconciliation_report?: array{enabled: bool, features?: array{}}, payouts?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, payouts_list?: array{enabled: bool, features?: array{}}, tax_registrations?: array{enabled: bool, features?: array{}}, tax_settings?: array{enabled: bool, features?: array{}}}, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\AccountSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/account_sessions', $params, $opts);
    }
}
