<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TokenService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a single-use token that represents a bank account’s details. You can use
     * this token with any v1 API method in place of a bank account dictionary. You can
     * only use this token once. To do so, attach it to a <a href="#accounts">connected
     * account</a> where <a
     * href="/api/accounts/object#account_object-controller-requirement_collection">controller.requirement_collection</a>
     * is <code>application</code>, which includes Custom accounts.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Token
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tokens', $params, $opts);
    }

    /**
     * Retrieves the token with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Token
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tokens/%s', $id), $params, $opts);
    }
}
