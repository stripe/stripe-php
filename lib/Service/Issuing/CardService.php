<?php

namespace Stripe\Service\Issuing;

class CardService extends \Stripe\Service\AbstractService
{
    public function basePath()
    {
        return '/v1/issuing/cards';
    }

    /**
     * List all cards.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
        return $this->request('get', '/v1/issuing/cards', $params, $opts);
    }

    /**
     * Create a card.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Card
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/issuing/cards', $params, $opts);
    }

    /**
     * Retrieve a card details.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\CardDetails
     */
    public function details($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/cards/%s/details', $id), $params, $opts);
    }

    /**
     * Retrieve a card.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Card
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/cards/%s', $id), $params, $opts);
    }

    /**
     * Update a card.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Issuing\Card
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/cards/%s', $id), $params, $opts);
    }
}
