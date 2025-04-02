<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountService extends AbstractService
{
    /**
     * Returns a list of accounts connected to your platform via <a
     * href="/docs/connect">Connect</a>. If you’re not a platform, the list is empty.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Account>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/accounts', $params, $opts);
    }

    /**
     * Returns a list of capabilities associated with the account. The capabilities are
     * returned sorted by creation date, with the most recent capability appearing
     * first.
     *
     * @param string $parentId
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Capability>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allCapabilities($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/accounts/%s/capabilities', $parentId), $params, $opts);
    }

    /**
     * List external accounts for an account.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, object?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\BankAccount|\Stripe\Card>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allExternalAccounts($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/accounts/%s/external_accounts', $parentId), $params, $opts);
    }

    /**
     * Returns a list of people associated with the account’s legal entity. The people
     * are returned sorted by creation date, with the most recent people appearing
     * first.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, relationship?: array{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, representative?: bool}, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Person>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allPersons($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/accounts/%s/persons', $parentId), $params, $opts);
    }

    /**
     * With <a href="/docs/connect">Connect</a>, you can create Stripe accounts for
     * your users. To do this, you’ll first need to <a
     * href="https://dashboard.stripe.com/account/applications/settings">register your
     * platform</a>.
     *
     * If you’ve already collected information for your connected accounts, you <a
     * href="/docs/connect/best-practices#onboarding">can prefill that information</a>
     * when creating the account. Connect Onboarding won’t ask for the prefilled
     * information during account onboarding. You can prefill any information on the
     * account.
     *
     * @param null|array{account_token?: string, business_profile?: array{annual_revenue?: array{amount: int, currency: string, fiscal_year_end: string}, estimated_worker_count?: int, mcc?: string, monthly_estimated_revenue?: array{amount: int, currency: string}, name?: string, product_description?: string, support_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, support_email?: string, support_phone?: string, support_url?: null|string, url?: string}, business_type?: string, capabilities?: array{acss_debit_payments?: array{requested?: bool}, affirm_payments?: array{requested?: bool}, afterpay_clearpay_payments?: array{requested?: bool}, alma_payments?: array{requested?: bool}, amazon_pay_payments?: array{requested?: bool}, au_becs_debit_payments?: array{requested?: bool}, bacs_debit_payments?: array{requested?: bool}, bancontact_payments?: array{requested?: bool}, bank_transfer_payments?: array{requested?: bool}, billie_payments?: array{requested?: bool}, blik_payments?: array{requested?: bool}, boleto_payments?: array{requested?: bool}, card_issuing?: array{requested?: bool}, card_payments?: array{requested?: bool}, cartes_bancaires_payments?: array{requested?: bool}, cashapp_payments?: array{requested?: bool}, eps_payments?: array{requested?: bool}, fpx_payments?: array{requested?: bool}, gb_bank_transfer_payments?: array{requested?: bool}, giropay_payments?: array{requested?: bool}, grabpay_payments?: array{requested?: bool}, ideal_payments?: array{requested?: bool}, india_international_payments?: array{requested?: bool}, jcb_payments?: array{requested?: bool}, jp_bank_transfer_payments?: array{requested?: bool}, kakao_pay_payments?: array{requested?: bool}, klarna_payments?: array{requested?: bool}, konbini_payments?: array{requested?: bool}, kr_card_payments?: array{requested?: bool}, legacy_payments?: array{requested?: bool}, link_payments?: array{requested?: bool}, mobilepay_payments?: array{requested?: bool}, multibanco_payments?: array{requested?: bool}, mx_bank_transfer_payments?: array{requested?: bool}, naver_pay_payments?: array{requested?: bool}, nz_bank_account_becs_debit_payments?: array{requested?: bool}, oxxo_payments?: array{requested?: bool}, p24_payments?: array{requested?: bool}, pay_by_bank_payments?: array{requested?: bool}, payco_payments?: array{requested?: bool}, paynow_payments?: array{requested?: bool}, promptpay_payments?: array{requested?: bool}, revolut_pay_payments?: array{requested?: bool}, samsung_pay_payments?: array{requested?: bool}, satispay_payments?: array{requested?: bool}, sepa_bank_transfer_payments?: array{requested?: bool}, sepa_debit_payments?: array{requested?: bool}, sofort_payments?: array{requested?: bool}, swish_payments?: array{requested?: bool}, tax_reporting_us_1099_k?: array{requested?: bool}, tax_reporting_us_1099_misc?: array{requested?: bool}, transfers?: array{requested?: bool}, treasury?: array{requested?: bool}, twint_payments?: array{requested?: bool}, us_bank_account_ach_payments?: array{requested?: bool}, us_bank_transfer_payments?: array{requested?: bool}, zip_payments?: array{requested?: bool}}, company?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, directors_provided?: bool, directorship_declaration?: array{date?: int, ip?: string, user_agent?: string}, executives_provided?: bool, export_license_id?: string, export_purpose_code?: string, name?: string, name_kana?: string, name_kanji?: string, owners_provided?: bool, ownership_declaration?: array{date?: int, ip?: string, user_agent?: string}, ownership_exemption_reason?: null|string, phone?: string, registration_number?: string, structure?: null|string, tax_id?: string, tax_id_registrar?: string, vat_id?: string, verification?: array{document?: array{back?: string, front?: string}}}, controller?: array{fees?: array{payer?: string}, losses?: array{payments?: string}, requirement_collection?: string, stripe_dashboard?: array{type?: string}}, country?: string, default_currency?: string, documents?: array{bank_account_ownership_verification?: array{files?: string[]}, company_license?: array{files?: string[]}, company_memorandum_of_association?: array{files?: string[]}, company_ministerial_decree?: array{files?: string[]}, company_registration_verification?: array{files?: string[]}, company_tax_id_verification?: array{files?: string[]}, proof_of_registration?: array{files?: string[]}, proof_of_ultimate_beneficial_ownership?: array{files?: string[]}}, email?: string, expand?: string[], external_account?: array|string, groups?: array{payments_pricing?: null|string}, individual?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, email?: string, first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: null|float, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}}, metadata?: null|\Stripe\StripeObject, settings?: array{bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, card_issuing?: array{tos_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}, statement_descriptor_prefix?: string, statement_descriptor_prefix_kana?: null|string, statement_descriptor_prefix_kanji?: null|string}, invoices?: array{hosted_payment_method_save?: string}, payments?: array{statement_descriptor?: string, statement_descriptor_kana?: string, statement_descriptor_kanji?: string}, payouts?: array{debit_negative_balances?: bool, schedule?: array{delay_days?: array|int|string, interval?: string, monthly_anchor?: int, weekly_anchor?: string}, statement_descriptor?: string}, treasury?: array{tos_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}}, tos_acceptance?: array{date?: int, ip?: string, service_agreement?: string, user_agent?: string}, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/accounts', $params, $opts);
    }

    /**
     * Create an external account for a given account.
     *
     * @param string $parentId
     * @param null|array{default_for_currency?: bool, expand?: string[], external_account: array|string, metadata?: \Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createExternalAccount($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/external_accounts', $parentId), $params, $opts);
    }

    /**
     * Creates a login link for a connected account to access the Express Dashboard.
     *
     * <strong>You can only create login links for accounts that use the <a
     * href="/connect/express-dashboard">Express Dashboard</a> and are connected to
     * your platform</strong>.
     *
     * @param string $parentId
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\LoginLink
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createLoginLink($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/login_links', $parentId), $params, $opts);
    }

    /**
     * Creates a new person.
     *
     * @param string $parentId
     * @param null|array{additional_tos_acceptances?: array{account?: array{date?: int, ip?: string, user_agent?: null|string}}, address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files?: string[]}, passport?: array{files?: string[]}, visa?: array{files?: string[]}}, email?: string, expand?: string[], first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, nationality?: string, person_token?: string, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, percent_ownership?: null|float, representative?: bool, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Person
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function createPerson($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/persons', $parentId), $params, $opts);
    }

    /**
     * With <a href="/connect">Connect</a>, you can delete accounts you manage.
     *
     * Test-mode accounts can be deleted at any time.
     *
     * Live-mode accounts where Stripe is responsible for negative account balances
     * cannot be deleted, which includes Standard accounts. Live-mode accounts where
     * your platform is liable for negative account balances, which includes Custom and
     * Express accounts, can be deleted when all <a
     * href="/api/balance/balance_object">balances</a> are zero.
     *
     * If you want to delete your own account, use the <a
     * href="https://dashboard.stripe.com/settings/account">account information tab in
     * your account settings</a> instead.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/accounts/%s', $id), $params, $opts);
    }

    /**
     * Delete a specified external account for a given account.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deleteExternalAccount($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/accounts/%s/external_accounts/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Deletes an existing person’s relationship to the account’s legal entity. Any
     * person with a relationship for an account can be deleted through the API, except
     * if the person is the <code>account_opener</code>. If your integration is using
     * the <code>executive</code> parameter, you cannot delete the only verified
     * <code>executive</code> on file.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Person
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deletePerson($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/accounts/%s/persons/%s', $parentId, $id), $params, $opts);
    }

    /**
     * With <a href="/connect">Connect</a>, you can reject accounts that you have
     * flagged as suspicious.
     *
     * Only accounts where your platform is liable for negative account balances, which
     * includes Custom and Express accounts, can be rejected. Test-mode accounts can be
     * rejected at any time. Live-mode accounts can only be rejected after all balances
     * are zero.
     *
     * @param string $id
     * @param null|array{expand?: string[], reason: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reject($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/reject', $id), $params, $opts);
    }

    /**
     * Retrieves information about the specified Account Capability.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Capability
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveCapability($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/accounts/%s/capabilities/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a specified external account for a given account.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveExternalAccount($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/accounts/%s/external_accounts/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves an existing person.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Person
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrievePerson($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/accounts/%s/persons/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates a <a href="/connect/accounts">connected account</a> by setting the
     * values of the parameters passed. Any parameters not provided are left unchanged.
     *
     * For accounts where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>application</code>, which includes Custom accounts, you can update any
     * information on the account.
     *
     * For accounts where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>stripe</code>, which includes Standard and Express accounts, you can
     * update all information until you create an <a href="/api/account_links">Account
     * Link</a> or <a href="/api/account_sessions">Account Session</a> to start Connect
     * onboarding, after which some properties can no longer be updated.
     *
     * To update your own account, use the <a
     * href="https://dashboard.stripe.com/settings/account">Dashboard</a>. Refer to our
     * <a href="/docs/connect/updating-accounts">Connect</a> documentation to learn
     * more about updating accounts.
     *
     * @param string $id
     * @param null|array{account_token?: string, business_profile?: array{annual_revenue?: array{amount: int, currency: string, fiscal_year_end: string}, estimated_worker_count?: int, mcc?: string, monthly_estimated_revenue?: array{amount: int, currency: string}, name?: string, product_description?: string, support_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, support_email?: string, support_phone?: string, support_url?: null|string, url?: string}, business_type?: string, capabilities?: array{acss_debit_payments?: array{requested?: bool}, affirm_payments?: array{requested?: bool}, afterpay_clearpay_payments?: array{requested?: bool}, alma_payments?: array{requested?: bool}, amazon_pay_payments?: array{requested?: bool}, au_becs_debit_payments?: array{requested?: bool}, bacs_debit_payments?: array{requested?: bool}, bancontact_payments?: array{requested?: bool}, bank_transfer_payments?: array{requested?: bool}, billie_payments?: array{requested?: bool}, blik_payments?: array{requested?: bool}, boleto_payments?: array{requested?: bool}, card_issuing?: array{requested?: bool}, card_payments?: array{requested?: bool}, cartes_bancaires_payments?: array{requested?: bool}, cashapp_payments?: array{requested?: bool}, eps_payments?: array{requested?: bool}, fpx_payments?: array{requested?: bool}, gb_bank_transfer_payments?: array{requested?: bool}, giropay_payments?: array{requested?: bool}, grabpay_payments?: array{requested?: bool}, ideal_payments?: array{requested?: bool}, india_international_payments?: array{requested?: bool}, jcb_payments?: array{requested?: bool}, jp_bank_transfer_payments?: array{requested?: bool}, kakao_pay_payments?: array{requested?: bool}, klarna_payments?: array{requested?: bool}, konbini_payments?: array{requested?: bool}, kr_card_payments?: array{requested?: bool}, legacy_payments?: array{requested?: bool}, link_payments?: array{requested?: bool}, mobilepay_payments?: array{requested?: bool}, multibanco_payments?: array{requested?: bool}, mx_bank_transfer_payments?: array{requested?: bool}, naver_pay_payments?: array{requested?: bool}, nz_bank_account_becs_debit_payments?: array{requested?: bool}, oxxo_payments?: array{requested?: bool}, p24_payments?: array{requested?: bool}, pay_by_bank_payments?: array{requested?: bool}, payco_payments?: array{requested?: bool}, paynow_payments?: array{requested?: bool}, promptpay_payments?: array{requested?: bool}, revolut_pay_payments?: array{requested?: bool}, samsung_pay_payments?: array{requested?: bool}, satispay_payments?: array{requested?: bool}, sepa_bank_transfer_payments?: array{requested?: bool}, sepa_debit_payments?: array{requested?: bool}, sofort_payments?: array{requested?: bool}, swish_payments?: array{requested?: bool}, tax_reporting_us_1099_k?: array{requested?: bool}, tax_reporting_us_1099_misc?: array{requested?: bool}, transfers?: array{requested?: bool}, treasury?: array{requested?: bool}, twint_payments?: array{requested?: bool}, us_bank_account_ach_payments?: array{requested?: bool}, us_bank_transfer_payments?: array{requested?: bool}, zip_payments?: array{requested?: bool}}, company?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, directors_provided?: bool, directorship_declaration?: array{date?: int, ip?: string, user_agent?: string}, executives_provided?: bool, export_license_id?: string, export_purpose_code?: string, name?: string, name_kana?: string, name_kanji?: string, owners_provided?: bool, ownership_declaration?: array{date?: int, ip?: string, user_agent?: string}, ownership_exemption_reason?: null|string, phone?: string, registration_number?: string, structure?: null|string, tax_id?: string, tax_id_registrar?: string, vat_id?: string, verification?: array{document?: array{back?: string, front?: string}}}, default_currency?: string, documents?: array{bank_account_ownership_verification?: array{files?: string[]}, company_license?: array{files?: string[]}, company_memorandum_of_association?: array{files?: string[]}, company_ministerial_decree?: array{files?: string[]}, company_registration_verification?: array{files?: string[]}, company_tax_id_verification?: array{files?: string[]}, proof_of_registration?: array{files?: string[]}, proof_of_ultimate_beneficial_ownership?: array{files?: string[]}}, email?: string, expand?: string[], external_account?: null|array|string, groups?: array{payments_pricing?: null|string}, individual?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, email?: string, first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: null|float, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}}, metadata?: null|\Stripe\StripeObject, settings?: array{bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, card_issuing?: array{tos_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}, statement_descriptor_prefix?: string, statement_descriptor_prefix_kana?: null|string, statement_descriptor_prefix_kanji?: null|string}, invoices?: array{default_account_tax_ids?: null|string[], hosted_payment_method_save?: string}, payments?: array{statement_descriptor?: string, statement_descriptor_kana?: string, statement_descriptor_kanji?: string}, payouts?: array{debit_negative_balances?: bool, schedule?: array{delay_days?: array|int|string, interval?: string, monthly_anchor?: int, weekly_anchor?: string}, statement_descriptor?: string}, treasury?: array{tos_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}}, tos_acceptance?: array{date?: int, ip?: string, service_agreement?: string, user_agent?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing Account Capability. Request or remove a capability by
     * updating its <code>requested</code> parameter.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[], requested?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Capability
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateCapability($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/capabilities/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates the metadata, account holder name, account holder type of a bank account
     * belonging to a connected account and optionally sets it as the default for its
     * currency. Other bank account details are not editable by design.
     *
     * You can only update bank accounts when <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">account.controller.requirement_collection</a>
     * is <code>application</code>, which includes <a
     * href="/connect/custom-accounts">Custom accounts</a>.
     *
     * You can re-enable a disabled bank account by performing an update call without
     * providing any arguments or changes.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{account_holder_name?: string, account_holder_type?: null|string, account_type?: string, address_city?: string, address_country?: string, address_line1?: string, address_line2?: string, address_state?: string, address_zip?: string, default_for_currency?: bool, documents?: array{bank_account_ownership_verification?: array{files?: string[]}}, exp_month?: string, exp_year?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updateExternalAccount($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/external_accounts/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Updates an existing person.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{additional_tos_acceptances?: array{account?: array{date?: int, ip?: string, user_agent?: null|string}}, address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files?: string[]}, passport?: array{files?: string[]}, visa?: array{files?: string[]}}, email?: string, expand?: string[], first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, nationality?: string, person_token?: string, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, percent_ownership?: null|float, representative?: bool, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Person
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function updatePerson($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/accounts/%s/persons/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves the details of an account.
     *
     * @param null|string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id = null, $params = null, $opts = null)
    {
        if (null === $id) {
            return $this->request('get', '/v1/account', $params, $opts);
        }

        return $this->request('get', $this->buildPath('/v1/accounts/%s', $id), $params, $opts);
    }
}
