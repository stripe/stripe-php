<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Risk;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FormService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a risk Form by ID.
     *
     * <h3>Error Codes</h3>
     *
     * | Code | HTTP status | Description | | — | — | — | | <code>form_not_found</code>
     * | 400 | No Form matches the supplied ID. |
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Risk\Form
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/risk/forms/%s', $id), $params, $opts);
    }

    /**
     * Updates a risk Form with the connected account’s response.
     *
     * <h3>Error Codes</h3>
     *
     * | Code | HTTP status | Description | | — | — | — | | <code>form_not_found</code>
     * | 400 | No Form matches the supplied ID. | | <code>form_closed</code> | 400 |
     * The Form is closed and cannot accept updates. | |
     * <code>invalid_field_for_form_type</code> | 400 | A submitted field is not
     * supported by this Form type. | | <code>form_field_already_submitted</code> | 400
     * | A submitted field has already been submitted. | |
     * <code>form_insufficient_fields</code> | 400 | Required fields are missing for
     * this Form type. | | <code>resource_missing</code> | 404 | A submitted file does
     * not exist or is not accessible to the requesting account. |
     *
     * @param string $id
     * @param null|array{appeal?: array{explanation: string}, authorization_documents?: array{files: string[]}, expand?: string[], payment_processing?: array{multi_processor?: array{files?: array{file: string, tag?: string}[], value?: string}, purpose?: string, stripe_selection_rationale?: string}, product_removal?: array{items_removed_at: int}, reviewed_fields?: array{attestation: array{attested_at?: int, fields?: string[]}}, self_funding_context?: array{source_of_wealth?: array{description?: string, files?: string[]}}, transaction_context?: array{frequency?: string, purpose?: string, purpose_files?: string[], sender_relationship?: string, source_of_funds?: array{description?: string, files?: string[]}, use_of_funds?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Risk\Form
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/risk/forms/%s', $id), $params, $opts);
    }
}
