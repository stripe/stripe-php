<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SourceService extends AbstractService
{
    /**
     * List source transactions for a given source.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\SourceTransaction>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allSourceTransactions($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/sources/%s/source_transactions', $id), $params, $opts);
    }

    /**
     * Creates a new source object.
     *
     * @param null|array{amount?: int, currency?: string, customer?: string, expand?: string[], flow?: string, mandate?: array{acceptance?: array{date?: int, ip?: string, offline?: array{contact_email: string}, online?: array{date?: int, ip?: string, user_agent?: string}, status: string, type?: string, user_agent?: string}, amount?: null|int, currency?: string, interval?: string, notification_method?: string}, metadata?: array<string, string>, original_source?: string, owner?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, receiver?: array{refund_attributes_method?: string}, redirect?: array{return_url: string}, source_order?: array{items?: array{amount?: int, currency?: string, description?: string, parent?: string, quantity?: int, type?: string}[], shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name?: string, phone?: string, tracking_number?: string}}, statement_descriptor?: string, token?: string, type?: string, usage?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/sources', $params, $opts);
    }

    /**
     * Delete a specified source for a given customer.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function detach($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/customers/%s/sources/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves an existing source object. Supply the unique source ID from a source
     * creation request and Stripe will return the corresponding up-to-date source
     * object information.
     *
     * @param string $id
     * @param null|array{client_secret?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/sources/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified source by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * This request accepts the <code>metadata</code> and <code>owner</code> as
     * arguments. It is also possible to update type specific information for selected
     * payment methods. Please refer to our <a href="/docs/sources">payment method
     * guides</a> for more detail.
     *
     * @param string $id
     * @param null|array{amount?: int, expand?: string[], mandate?: array{acceptance?: array{date?: int, ip?: string, offline?: array{contact_email: string}, online?: array{date?: int, ip?: string, user_agent?: string}, status: string, type?: string, user_agent?: string}, amount?: null|int, currency?: string, interval?: string, notification_method?: string}, metadata?: null|array<string, string>, owner?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, source_order?: array{items?: array{amount?: int, currency?: string, description?: string, parent?: string, quantity?: int, type?: string}[], shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name?: string, phone?: string, tracking_number?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/sources/%s', $id), $params, $opts);
    }

    /**
     * Verify a given source.
     *
     * @param string $id
     * @param null|array{expand?: string[], values: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Source
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function verify($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/sources/%s/verify', $id), $params, $opts);
    }
}
