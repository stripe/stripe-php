<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TopupService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of top-ups.
     *
     * @param null|array{amount?: int|array, created?: int|array, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Topup>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/topups', $params, $opts);
    }

    /**
     * Cancels a top-up. Only pending top-ups can be canceled.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Topup
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/topups/%s/cancel', $id), $params, $opts);
    }

    /**
     * Top up the balance of an account.
     *
     * @param null|array{amount: int, currency: string, description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, source?: string, statement_descriptor?: string, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Topup
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/topups', $params, $opts);
    }

    /**
     * Retrieves the details of a top-up that has previously been created. Supply the
     * unique top-up ID that was returned from your previous request, and Stripe will
     * return the corresponding top-up information.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Topup
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/topups/%s', $id), $params, $opts);
    }

    /**
     * Updates the metadata of a top-up. Other top-up details are not editable by
     * design.
     *
     * @param string $id
     * @param null|array{description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Topup
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/topups/%s', $id), $params, $opts);
    }
}
