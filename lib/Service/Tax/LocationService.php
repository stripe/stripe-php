<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class LocationService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve a list of all tax locations. Tax locations can represent the venues for
     * services, tickets, or other product types.
     *
     * The response includes detailed information for each tax location, such as its
     * address, name, description, and current operational status.
     *
     * You can paginate through the list by using the <code>limit</code> parameter to
     * control the number of results returned in each request.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Tax\Location>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax/locations', $params, $opts);
    }

    /**
     * Create a tax location to use in calculating taxes for a service, ticket, or
     * other type of product. The resulting object contains the id, address, name,
     * description, and current operational status of the tax location.
     *
     * @param null|array{address: array{city?: null|string, country: string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}, description?: string, expand?: string[], type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Location
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/locations', $params, $opts);
    }

    /**
     * Fetch the details of a specific tax location using its unique identifier. Use a
     * tax location to calculate taxes based on the location of the end product, such
     * as a performance, instead of the customer address. For more details, check the
     * <a
     * href="https://docs.stripe.com/tax/tax-for-tickets/integration-guide">integration
     * guide</a>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Location
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax/locations/%s', $id), $params, $opts);
    }
}
