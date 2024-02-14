<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountNoticeService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of <code>AccountNotice</code> objects. The objects are sorted
     * in descending order by creation date, with the most-recently-created object
     * appearing first.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\AccountNotice>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/account_notices', $params, $opts);
    }

    /**
     * Retrieves an <code>AccountNotice</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\AccountNotice
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/account_notices/%s', $id), $params, $opts);
    }

    /**
     * Updates an <code>AccountNotice</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\AccountNotice
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/account_notices/%s', $id), $params, $opts);
    }
}
