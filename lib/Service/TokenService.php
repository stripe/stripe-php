<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TokenService extends AbstractService
{
    /**
     * Creates a single-use token that represents a bank account’s details. You can use
     * this token with any v1 API method in place of a bank account dictionary. You can
     * only use this token once. To do so, attach it to a <a href="#accounts">connected
     * account</a> where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>application</code>, which includes Custom accounts.
     *
     * @param null|array{account?: array{business_type?: string, company?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, directors_provided?: bool, directorship_declaration?: array{date?: int, ip?: string, user_agent?: string}, executives_provided?: bool, export_license_id?: string, export_purpose_code?: string, name?: string, name_kana?: string, name_kanji?: string, owners_provided?: bool, ownership_declaration?: array{date?: int, ip?: string, user_agent?: string}, ownership_declaration_shown_and_signed?: bool, ownership_exemption_reason?: null|string, phone?: string, registration_number?: string, structure?: null|string, tax_id?: string, tax_id_registrar?: string, vat_id?: string, verification?: array{document?: array{back?: string, front?: string}}}, individual?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, email?: string, first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: null|float, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}}, tos_shown_and_accepted?: bool}, bank_account?: array{account_holder_name?: string, account_holder_type?: string, account_number: string, account_type?: string, country: string, currency?: string, payment_method?: string, routing_number?: string}, card?: array|string, customer?: string, cvc_update?: array{cvc: string}, expand?: string[], person?: array{additional_tos_acceptances?: array{account?: array{date?: int, ip?: string, user_agent?: null|string}}, address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, address_kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, address_kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, dob?: null|array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files?: string[]}, passport?: array{files?: string[]}, visa?: array{files?: string[]}}, email?: string, first_name?: string, first_name_kana?: string, first_name_kanji?: string, full_name_aliases?: null|string[], gender?: string, id_number?: string, id_number_secondary?: string, last_name?: string, last_name_kana?: string, last_name_kanji?: string, maiden_name?: string, metadata?: null|\Stripe\StripeObject, nationality?: string, phone?: string, political_exposure?: string, registered_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, relationship?: array{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, percent_ownership?: null|float, representative?: bool, title?: string}, ssn_last_4?: string, verification?: array{additional_document?: array{back?: string, front?: string}, document?: array{back?: string, front?: string}}}, pii?: array{id_number?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Token
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tokens', $params, $opts);
    }

    /**
     * Retrieves the token with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Token
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tokens/%s', $id), $params, $opts);
    }
}
