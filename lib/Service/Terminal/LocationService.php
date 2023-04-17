<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Terminal;

class LocationService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of `Location` objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Terminal\Location>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/terminal/locations', $params, $opts);
    }

    /**
     * Creates a new `Location` object. For further details, including which
     * address fields are required in each country, see the [Manage locations](/docs/terminal/fleet/locations) guide.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Location
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/terminal/locations', $params, $opts);
    }

    /**
     * Deletes a `Location` object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Location
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/terminal/locations/%s', $id), $params, $opts);
    }

    /**
     * Retrieves a `Location` object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Location
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/terminal/locations/%s', $id), $params, $opts);
    }

    /**
     * Updates a `Location` object by setting the values of the parameters
     * passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Location
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/locations/%s', $id), $params, $opts);
    }
}
