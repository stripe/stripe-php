<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @property Accounts\PersonService $persons
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = ['persons' => Accounts\PersonService::class];

    /**
     * Returns a list of Accounts.
     *
     * @param null|array{applied_configurations?: string[], limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Account>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/accounts', $params, $opts);
    }

    /**
     * Removes access to the Account and its associated resources.
     *
     * @param string $id
     * @param null|array{applied_configurations?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/accounts/%s/close', $id), $params, $opts);
    }

    /**
     * An Account is a representation of a company, individual or other entity that a
     * user interacts with. Accounts contain identifying information about the entity,
     * and configurations that store the features an account has access to. An account
     * can be configured as any or all of the following configurations: Customer,
     * Merchant and/or Recipient.
     *
     * @param null|array{configuration?: array{customer?: array{automatic_indirect_tax?: array{exempt?: string, ip_address?: string, location_source?: string}, billing?: array{invoice?: array{custom_fields?: array{name: string, value: string}[], footer?: string, next_sequence?: int, prefix?: string, rendering?: array{amount_tax_display?: string, template?: string}}}, capabilities?: array{automatic_indirect_tax?: array{requested: bool}}, shipping?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, test_clock?: string}, merchant?: array{bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, capabilities?: array{ach_debit_payments?: array{requested: bool}, acss_debit_payments?: array{requested: bool}, affirm_payments?: array{requested: bool}, afterpay_clearpay_payments?: array{requested: bool}, alma_payments?: array{requested: bool}, amazon_pay_payments?: array{requested: bool}, au_becs_debit_payments?: array{requested: bool}, bacs_debit_payments?: array{requested: bool}, bancontact_payments?: array{requested: bool}, blik_payments?: array{requested: bool}, boleto_payments?: array{requested: bool}, card_payments?: array{requested: bool}, cartes_bancaires_payments?: array{requested: bool}, cashapp_payments?: array{requested: bool}, eps_payments?: array{requested: bool}, fpx_payments?: array{requested: bool}, gb_bank_transfer_payments?: array{requested: bool}, grabpay_payments?: array{requested: bool}, ideal_payments?: array{requested: bool}, jcb_payments?: array{requested: bool}, jp_bank_transfer_payments?: array{requested: bool}, kakao_pay_payments?: array{requested: bool}, klarna_payments?: array{requested: bool}, konbini_payments?: array{requested: bool}, kr_card_payments?: array{requested: bool}, link_payments?: array{requested: bool}, mobilepay_payments?: array{requested: bool}, multibanco_payments?: array{requested: bool}, mx_bank_transfer_payments?: array{requested: bool}, naver_pay_payments?: array{requested: bool}, oxxo_payments?: array{requested: bool}, p24_payments?: array{requested: bool}, pay_by_bank_payments?: array{requested: bool}, payco_payments?: array{requested: bool}, paynow_payments?: array{requested: bool}, promptpay_payments?: array{requested: bool}, revolut_pay_payments?: array{requested: bool}, samsung_pay_payments?: array{requested: bool}, sepa_bank_transfer_payments?: array{requested: bool}, sepa_debit_payments?: array{requested: bool}, swish_payments?: array{requested: bool}, twint_payments?: array{requested: bool}, us_bank_transfer_payments?: array{requested: bool}, zip_payments?: array{requested: bool}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}}, mcc?: string, statement_descriptor?: array{descriptor?: string, prefix?: string}, support?: array{address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, email?: string, phone?: string, url?: string}}, recipient?: array{capabilities?: array{bank_accounts?: array{local?: array{requested: bool}, wire?: array{requested: bool}}, cards?: array{requested: bool}, stripe_balance?: array{stripe_transfers?: array{requested: bool}}}}, storer?: array{capabilities?: array{financial_addresses?: array{bank_accounts?: array{requested: bool}}, holds_currencies?: array{gbp?: array{requested: bool}}, inbound_transfers?: array{bank_accounts?: array{requested: bool}}, outbound_payments?: array{bank_accounts?: array{requested: bool}, cards?: array{requested: bool}, financial_accounts?: array{requested: bool}}, outbound_transfers?: array{bank_accounts?: array{requested: bool}, financial_accounts?: array{requested: bool}}}}}, contact_email?: string, dashboard?: string, defaults?: array{currency?: string, locales?: string[], responsibilities?: array{fees_collector: string, losses_collector: string}}, display_name?: string, identity?: array{attestations?: array{directorship_declaration?: array{date?: string, ip?: string, user_agent?: string}, ownership_declaration?: array{date?: string, ip?: string, user_agent?: string}, persons_provided?: array{directors?: bool, executives?: bool, owners?: bool, ownership_exemption_reason?: string}, terms_of_service?: array{account?: array{date: string, ip: string, user_agent?: string}, storer?: array{date: string, ip: string, user_agent?: string}}}, business_details?: array{address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, annual_revenue?: array{amount?: \Stripe\StripeObject, fiscal_year_end?: string}, documents?: array{bank_account_ownership_verification?: array{files: string[], type: string}, company_license?: array{files: string[], type: string}, company_memorandum_of_association?: array{files: string[], type: string}, company_ministerial_decree?: array{files: string[], type: string}, company_registration_verification?: array{files: string[], type: string}, company_tax_id_verification?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front: string}, type: string}, proof_of_address?: array{files: string[], type: string}, proof_of_registration?: array{files: string[], type: string}, proof_of_ultimate_beneficial_ownership?: array{files: string[], type: string}}, doing_business_as?: string, estimated_worker_count?: int, id_numbers?: array{registrar?: string, type: string, value: string}[], monthly_estimated_revenue?: array{amount?: \Stripe\StripeObject}, phone?: string, product_description?: string, registered_name?: string, script_addresses?: array{kana?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{registered_name?: string}, kanji?: array{registered_name?: string}}, structure?: string, url?: string}, country?: string, entity_type?: string, individual?: array{additional_addresses?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}[], additional_names?: array{full_name?: string, given_name?: string, purpose: string, surname?: string}[], address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, date_of_birth?: array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files: string[], type: string}, passport?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front: string}, type: string}, secondary_verification?: array{front_back: array{back?: string, front: string}, type: string}, visa?: array{files: string[], type: string}}, email?: string, given_name?: string, id_numbers?: array{type: string, value: string}[], legal_gender?: string, metadata?: array<string, string>, nationalities?: string[], phone?: string, political_exposure?: string, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: string, title?: string}, script_addresses?: array{kana?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{given_name?: string, surname?: string}, kanji?: array{given_name?: string, surname?: string}}, surname?: string}}, include?: string[], metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/accounts', $params, $opts);
    }

    /**
     * Retrieves the details of an Account.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates the details of an Account.
     *
     * @param string $id
     * @param null|array{configuration?: array{customer?: array{automatic_indirect_tax?: array{exempt?: string, ip_address?: string, location_source?: string, validate_location?: string}, billing?: array{default_payment_method?: string, invoice?: array{custom_fields?: array{name: string, value: string}[], footer?: string, next_sequence?: int, prefix?: string, rendering?: array{amount_tax_display?: string, template?: string}}}, capabilities?: array{automatic_indirect_tax?: array{requested?: bool}}, shipping?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, test_clock?: string}, merchant?: array{bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, capabilities?: array{ach_debit_payments?: array{requested?: bool}, acss_debit_payments?: array{requested?: bool}, affirm_payments?: array{requested?: bool}, afterpay_clearpay_payments?: array{requested?: bool}, alma_payments?: array{requested?: bool}, amazon_pay_payments?: array{requested?: bool}, au_becs_debit_payments?: array{requested?: bool}, bacs_debit_payments?: array{requested?: bool}, bancontact_payments?: array{requested?: bool}, blik_payments?: array{requested?: bool}, boleto_payments?: array{requested?: bool}, card_payments?: array{requested?: bool}, cartes_bancaires_payments?: array{requested?: bool}, cashapp_payments?: array{requested?: bool}, eps_payments?: array{requested?: bool}, fpx_payments?: array{requested?: bool}, gb_bank_transfer_payments?: array{requested?: bool}, grabpay_payments?: array{requested?: bool}, ideal_payments?: array{requested?: bool}, jcb_payments?: array{requested?: bool}, jp_bank_transfer_payments?: array{requested?: bool}, kakao_pay_payments?: array{requested?: bool}, klarna_payments?: array{requested?: bool}, konbini_payments?: array{requested?: bool}, kr_card_payments?: array{requested?: bool}, link_payments?: array{requested?: bool}, mobilepay_payments?: array{requested?: bool}, multibanco_payments?: array{requested?: bool}, mx_bank_transfer_payments?: array{requested?: bool}, naver_pay_payments?: array{requested?: bool}, oxxo_payments?: array{requested?: bool}, p24_payments?: array{requested?: bool}, pay_by_bank_payments?: array{requested?: bool}, payco_payments?: array{requested?: bool}, paynow_payments?: array{requested?: bool}, promptpay_payments?: array{requested?: bool}, revolut_pay_payments?: array{requested?: bool}, samsung_pay_payments?: array{requested?: bool}, sepa_bank_transfer_payments?: array{requested?: bool}, sepa_debit_payments?: array{requested?: bool}, swish_payments?: array{requested?: bool}, twint_payments?: array{requested?: bool}, us_bank_transfer_payments?: array{requested?: bool}, zip_payments?: array{requested?: bool}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}}, mcc?: string, statement_descriptor?: array{descriptor?: string, prefix?: string}, support?: array{address?: array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, email?: string, phone?: string, url?: string}}, recipient?: array{capabilities?: array{bank_accounts?: array{local?: array{requested?: bool}, wire?: array{requested?: bool}}, cards?: array{requested?: bool}, stripe_balance?: array{stripe_transfers?: array{requested?: bool}}}, default_outbound_destination?: string}, storer?: array{capabilities?: array{financial_addresses?: array{bank_accounts?: array{requested?: bool}}, holds_currencies?: array{gbp?: array{requested?: bool}}, inbound_transfers?: array{bank_accounts?: array{requested?: bool}}, outbound_payments?: array{bank_accounts?: array{requested?: bool}, cards?: array{requested?: bool}, financial_accounts?: array{requested?: bool}}, outbound_transfers?: array{bank_accounts?: array{requested?: bool}, financial_accounts?: array{requested?: bool}}}}}, contact_email?: string, dashboard?: string, defaults?: array{currency?: string, locales?: string[], responsibilities?: array{fees_collector: string, losses_collector: string}}, display_name?: string, identity?: array{attestations?: array{directorship_declaration?: array{date?: string, ip?: string, user_agent?: string}, ownership_declaration?: array{date?: string, ip?: string, user_agent?: string}, persons_provided?: array{directors?: bool, executives?: bool, owners?: bool, ownership_exemption_reason?: string}, terms_of_service?: array{account?: array{date?: string, ip?: string, user_agent?: string}, storer?: array{date?: string, ip?: string, user_agent?: string}}}, business_details?: array{address?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, annual_revenue?: null|array{amount?: \Stripe\StripeObject, fiscal_year_end?: null|string}, documents?: null|array{bank_account_ownership_verification?: null|array{files: string[], type: string}, company_license?: null|array{files: string[], type: string}, company_memorandum_of_association?: null|array{files: string[], type: string}, company_ministerial_decree?: null|array{files: string[], type: string}, company_registration_verification?: null|array{files: string[], type: string}, company_tax_id_verification?: null|array{files: string[], type: string}, primary_verification?: null|array{front_back: array{back?: null|string, front?: string}, type: string}, proof_of_address?: array{files: string[], type: string}, proof_of_registration?: null|array{files: string[], type: string}, proof_of_ultimate_beneficial_ownership?: array{files: string[], type: string}}, doing_business_as?: null|string, estimated_worker_count?: null|int, id_numbers?: null|array{registrar?: string, type: string, value: string}[], monthly_estimated_revenue?: null|array{amount?: \Stripe\StripeObject}, phone?: null|string, product_description?: null|string, registered_name?: null|string, script_addresses?: null|array{kana?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, kanji?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}}, script_names?: null|array{kana?: null|array{registered_name?: null|string}, kanji?: null|array{registered_name?: null|string}}, structure?: null|string, url?: null|string}, country?: string, entity_type?: string, individual?: array{additional_addresses?: null|(array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, purpose: string, state?: null|string, town?: null|string})[], additional_names?: null|array{full_name?: string, given_name?: string, purpose: string, surname?: string}[], address?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, date_of_birth?: null|array{day: int, month: int, year: int}, documents?: null|array{company_authorization?: array{files: string[], type: string}, passport?: array{files: string[], type: string}, primary_verification?: null|array{front_back: array{back?: null|string, front?: string}, type: string}, secondary_verification?: null|array{front_back: array{back?: null|string, front?: string}, type: string}, visa?: array{files: string[], type: string}}, email?: null|string, given_name?: null|string, id_numbers?: null|array{type: string, value: string}[], legal_gender?: null|string, metadata?: array<string, null|string>, nationalities?: string[], phone?: null|string, political_exposure?: null|string, relationship?: null|array{director?: null|bool, executive?: null|bool, owner?: null|bool, percent_ownership?: null|string, title?: null|string}, script_addresses?: null|array{kana?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}, kanji?: null|array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string, town?: null|string}}, script_names?: null|array{kana?: null|array{given_name?: null|string, surname?: null|string}, kanji?: null|array{given_name?: null|string, surname?: null|string}}, surname?: null|string}}, include?: string[], metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/accounts/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
