<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Issuing;

class CardService extends \Stripe\Service\AbstractService
{
    /**
     * Updates the shipping status of the specified Issuing `Card` object to
     * `delivered`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function deliverCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/cards/%s/shipping/deliver', $id), $params, $opts);
    }

    /**
     * Updates the shipping status of the specified Issuing `Card` object to
     * `failure`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function failCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/cards/%s/shipping/fail', $id), $params, $opts);
    }

    /**
     * Updates the shipping status of the specified Issuing `Card` object to
     * `returned`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function returnCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/cards/%s/shipping/return', $id), $params, $opts);
    }

    /**
     * Updates the shipping status of the specified Issuing `Card` object to
     * `shipped`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function shipCard($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/issuing/cards/%s/shipping/ship', $id), $params, $opts);
    }
}
