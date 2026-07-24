<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Risk;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InquiryService extends \Stripe\Service\AbstractService
{
    /**
     * Lists risk inquiries for a connected account.
     *
     * @param null|array{account: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Risk\Inquiry>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/risk/inquiries', $params, $opts);
    }

    /**
     * Retrieves a risk inquiry by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Risk\Inquiry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/risk/inquiries/%s', $id), $params, $opts);
    }

    /**
     * Submits a response to a risk inquiry.
     *
     * @param string $id
     * @param null|array{appeal?: array{explanation: string}, authorization_documents?: array{files: string[]}, product_removal?: array{items_removed_at: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Risk\Inquiry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/risk/inquiries/%s', $id), $params, $opts);
    }
}
