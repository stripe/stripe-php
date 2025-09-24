<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ExchangeRateService extends AbstractService
{
    /**
     * [Deprecated] The <code>ExchangeRate</code> APIs are deprecated. Please use the
     * <a
     * href="https://docs.stripe.com/payments/currencies/localize-prices/fx-quotes-api">FX
     * Quotes API</a> instead.
     *
     * Returns a list of objects that contain the rates at which foreign currencies are
     * converted to one another. Only shows the currencies for which Stripe supports.
     *
     * @deprecated  this method is deprecated, please refer to the description for details
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\ExchangeRate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/exchange_rates', $params, $opts);
    }

    /**
     * [Deprecated] The <code>ExchangeRate</code> APIs are deprecated. Please use the
     * <a
     * href="https://docs.stripe.com/payments/currencies/localize-prices/fx-quotes-api">FX
     * Quotes API</a> instead.
     *
     * Retrieves the exchange rates from the given currency to every supported
     * currency.
     *
     * @deprecated  this method is deprecated, please refer to the description for details
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ExchangeRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/exchange_rates/%s', $id), $params, $opts);
    }
}
