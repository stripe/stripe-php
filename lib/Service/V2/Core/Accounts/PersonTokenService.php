<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Accounts;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PersonTokenService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a Person Token associated with an Account.
     *
     * @param string $id
     * @param null|array{additional_addresses?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}[], additional_names?: array{full_name?: string, given_name?: string, purpose: string, surname?: string}[], additional_terms_of_service?: array{account?: array{shown_and_accepted?: bool}}, address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, date_of_birth?: array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files: string[], type: string}, passport?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, secondary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, visa?: array{files: string[], type: string}}, email?: string, given_name?: string, id_numbers?: array{type: string, value: string}[], legal_gender?: string, metadata?: array<string, null|string>, nationalities?: string[], phone?: string, political_exposure?: string, relationship?: array{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, percent_ownership?: string, representative?: bool, title?: string}, script_addresses?: array{kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{given_name?: string, surname?: string}, kanji?: array{given_name?: string, surname?: string}}, surname?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountPersonToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/accounts/%s/person_tokens', $id), $params, $opts);
    }

    /**
     * Retrieves a Person Token associated with an Account.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\AccountPersonToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/accounts/%s/person_tokens/%s', $parentId, $id), $params, $opts);
    }
}
