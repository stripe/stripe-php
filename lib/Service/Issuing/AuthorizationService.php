<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

class AuthorizationService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Issuing <code>Authorization</code> objects. The objects are
     * sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Authorization>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/authorizations', $params, $opts);
    }

    /**
     * [Deprecated] Approves a pending Issuing <code>Authorization</code> object. This
     * request should be made within the timeout window of the <a
     * href="/docs/issuing/controls/real-time-authorizations">real-time
     * authorization</a> flow.  This method is deprecated. Instead, <a
     * href="/docs/issuing/controls/real-time-authorizations#authorization-handling">respond
     * directly to the webhook request to approve an authorization</a>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Authorization
     */
    public function approve($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/authorizations/%s/approve', $id), $params, $opts);
    }

    /**
     * [Deprecated] Declines a pending Issuing <code>Authorization</code> object. This
     * request should be made within the timeout window of the <a
     * href="/docs/issuing/controls/real-time-authorizations">real time
     * authorization</a> flow. This method is deprecated. Instead, <a
     * href="/docs/issuing/controls/real-time-authorizations#authorization-handling">respond
     * directly to the webhook request to decline an authorization</a>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Authorization
     */
    public function decline($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/authorizations/%s/decline', $id), $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Authorization</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Authorization
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/authorizations/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified Issuing <code>Authorization</code> object by setting the
     * values of the parameters passed. Any parameters not provided will be left
     * unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Authorization
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/authorizations/%s', $id), $params, $opts);
    }
}
