<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FxQuoteService extends AbstractService
{
    /**
     * Returns a list of FX quotes that have been issued. The FX quotes are returned in
     * sorted order, with the most recent FX quotes appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\FxQuote>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/fx_quotes', $params, $opts);
    }

    /**
     * Creates an FX Quote object.
     *
     * @param null|array{expand?: string[], from_currencies: string[], lock_duration: string, to_currency: string, usage?: array{payment?: array{destination?: string, on_behalf_of?: string}, transfer?: array{destination: string}, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FxQuote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/fx_quotes', $params, $opts);
    }

    /**
     * Retrieve an FX Quote object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\FxQuote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/fx_quotes/%s', $id), $params, $opts);
    }
}
