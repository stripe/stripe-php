<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Risk;

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
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Risk\Form
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/risk/forms/%s', $id), $params, $opts);
    }

    /**
     * Submits a response to a risk Form.
     *
     * @param string $id
     * @param null|array{appeal?: array{explanation: string}, authorization_documents?: array{files: string[]}, product_removal?: array{items_removed_at: string}, self_funding_context?: array{source_of_wealth?: array{description: string, files: string[]}}, transaction_context?: array{purpose: string, sender_relationship?: string, source_of_funds?: array{description: string, files: string[]}, use_of_funds: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Risk\Form
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/risk/forms/%s', $id), $params, $opts);
    }
}
