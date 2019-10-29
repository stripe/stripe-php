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
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Collection
     */
    public function all($params = [], $opts = [])
    {
        return $this->allObjects($params, $opts);
    }

    /**
     * Create a card.
     *
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Issuing\Card
     */
    public function create($params = [], $opts = [])
    {
        return $this->createObject($params, $opts);
    }

    /**
     * Retrieve a card details.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Issuing\CardDetails
     */
    public function details($id, $params = [], $opts = [])
    {
        return $this->request('get', $this->instancePath($id) . '/details', $params, $opts);
    }

    /**
     * Retrieve a card.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Issuing\Card
     */
    public function retrieve($id, $params = [], $opts = [])
    {
        return $this->retrieveObject($id, $params, $opts);
    }

    /**
     * Update a card.
     *
     * @param string $id
     * @param array $params
     * @param array $opts
     *
     * @return \Stripe\Issuing\Card
     */
    public function update($id, $params = [], $opts = [])
    {
        return $this->updateObject($id, $params, $opts);
    }
}
