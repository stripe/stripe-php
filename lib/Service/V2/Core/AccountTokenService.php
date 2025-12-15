<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountTokenService extends \Stripe\Service\AbstractService
{
    /**
     * Creates an Account Token.
     *
     * @param null|array{contact_email?: string, display_name?: string, identity?: array{attestations?: array{directorship_declaration?: array{attested?: bool}, ownership_declaration?: array{attested?: bool}, persons_provided?: array{directors?: bool, executives?: bool, owners?: bool, ownership_exemption_reason?: string}, representative_declaration?: array{attested?: bool}, terms_of_service?: array{account?: array{shown_and_accepted?: bool}}}, business_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, annual_revenue?: array{amount?: array{value?: int, currency?: string}, fiscal_year_end?: string}, documents?: array{bank_account_ownership_verification?: array{files: string[], type: string}, company_license?: array{files: string[], type: string}, company_memorandum_of_association?: array{files: string[], type: string}, company_ministerial_decree?: array{files: string[], type: string}, company_registration_verification?: array{files: string[], type: string}, company_tax_id_verification?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, proof_of_address?: array{files: string[], type: string}, proof_of_registration?: array{files: string[], type: string}, proof_of_ultimate_beneficial_ownership?: array{files: string[], type: string}}, estimated_worker_count?: int, id_numbers?: array{registrar?: string, type: string, value: string}[], monthly_estimated_revenue?: array{amount?: array{value?: int, currency?: string}}, phone?: string, registered_name?: string, script_addresses?: array{kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{registered_name?: string}, kanji?: array{registered_name?: string}}, structure?: string}, entity_type?: string, individual?: array{additional_addresses?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}[], additional_names?: array{full_name?: string, given_name?: string, purpose: string, surname?: string}[], address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, date_of_birth?: array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files: string[], type: string}, passport?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, secondary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, visa?: array{files: string[], type: string}}, email?: string, given_name?: string, id_numbers?: array{type: string, value: string}[], legal_gender?: string, metadata?: array<string, null|string>, nationalities?: string[], phone?: string, political_exposure?: string, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: string, title?: string}, script_addresses?: array{kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{given_name?: string, surname?: string}, kanji?: array{given_name?: string, surname?: string}}, surname?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/account_tokens', $params, $opts);
    }

    /**
     * Retrieves an Account Token.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/account_tokens/%s', $id), $params, $opts);
    }
}
