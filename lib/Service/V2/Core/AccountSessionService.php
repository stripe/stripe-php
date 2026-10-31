<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Create an Account Session.
     *
     * @param null|array{account: string, components: array{account_management?: array{enabled: bool}, account_onboarding?: array{enabled: bool}, agentic_commerce_settings?: array{enabled: bool}, app_install?: array{enabled: bool}, app_viewport?: array{enabled: bool}, balance_report?: array{enabled: bool}, balances?: array{enabled: bool}, bills?: array{enabled: bool}, business_profile_management?: array{enabled: bool}, capital_financing?: array{enabled: bool}, capital_financing_application?: array{enabled: bool}, capital_financing_promotion?: array{enabled: bool}, check_scanning?: array{enabled: bool}, disputes_list?: array{enabled: bool}, documents?: array{enabled: bool}, export_tax_transactions?: array{enabled: bool}, financial_account_rewards?: array{enabled: bool}, financial_accounts?: array{enabled: bool}, financial_accounts_transactions?: array{enabled: bool}, instant_payouts_promotion?: array{enabled: bool}, invoice_history?: array{enabled: bool}, issuing_card?: array{enabled: bool}, issuing_cards_list?: array{enabled: bool}, network_cost_passthrough_report?: array{enabled: bool}, notification_banner?: array{enabled: bool}, payment_details?: array{enabled: bool}, payment_disputes?: array{enabled: bool}, payment_method_settings?: array{enabled: bool}, payments?: array{enabled: bool}, payout_details?: array{enabled: bool}, payout_reconciliation_report?: array{enabled: bool}, payouts?: array{enabled: bool}, payouts_list?: array{enabled: bool}, product_tax_code_selector?: array{enabled: bool}, reporting_chart?: array{enabled: bool}, tax_registrations?: array{enabled: bool}, tax_settings?: array{enabled: bool}, tax_threshold_monitoring?: array{enabled: bool}, terminal_hardware_orders?: array{enabled: bool}, terminal_hardware_shop?: array{enabled: bool}}, scopes?: array{allowed_stripe_app_ids?: string[], capture_payments?: string, create_instant_payouts?: string, create_outbound_payments?: string, create_payout_schedule?: string, create_standard_payouts?: string, create_us_paper_check_on_application?: string, disable_stripe_user_authentication?: string, manage_bills?: string, manage_destination_on_behalf_of_charges?: string, manage_issuing_cardholders?: string, manage_issuing_cards?: string, manage_issuing_disputes?: string, manage_issuing_spending_controls?: string, manage_payment_disputes?: string, manage_payout_methods?: string, manage_refund_payments?: string, manage_smart_disputes?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountSession
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/account_sessions', $params, $opts);
    }
}
