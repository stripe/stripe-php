<?php

namespace Stripe\Service\Issuing;

class DisputeService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>Dispute</code> objects. The objects are sorted
     * in descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/disputes', $params, $opts);
    }

    /**
     * Creates an Issuing <code>Dispute</code> object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/disputes', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Dispute</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/disputes/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing <code>Dispute</code> object by setting the values
     * of the parameters passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/disputes/%s', $id), $params, $opts);
    }
}
