<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

class CardDesignService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of card design objects. The objects are sorted in descending
     * order by creation date, with the most recently created object appearing first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\CardDesign>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/card_designs', $params, $opts);
    }

    /**
     * Retrieves a card design object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDesign
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/card_designs/%s', $id), $params, $opts);
    }

    /**
     * Updates a card design object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDesign
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/card_designs/%s', $id), $params, $opts);
    }
}
