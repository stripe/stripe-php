<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MarginService extends AbstractService
{
    /**
     * Retrieve a list of your margins.
     *
     * @param null|array{active?: bool, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Margin>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/billing/margins', $params, $opts);
    }

    /**
     * Create a margin object to be used with invoices, invoice items, and invoice line
     * items for a customer to represent a partner discount. A margin has a
     * <code>percent_off</code> which is the percent that will be taken off the
     * subtotal after all items and other discounts and promotions) of any invoices for
     * a customer. Calculation of prorations do not include any partner margins applied
     * on the original invoice item.
     *
     * @param null|array{active?: bool, expand?: string[], metadata?: array<string, string>, name?: string, percent_off: float} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Margin
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing/margins', $params, $opts);
    }

    /**
     * Retrieve a margin object with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Margin
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/billing/margins/%s', $id), $params, $opts);
    }

    /**
     * Update the specified margin object. Certain fields of the margin object are not
     * editable.
     *
     * @param string $id
     * @param null|array{active?: bool, expand?: string[], metadata?: array<string, string>, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Margin
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/margins/%s', $id), $params, $opts);
    }
}
