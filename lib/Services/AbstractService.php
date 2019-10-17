<?php

namespace Stripe\Services;

abstract class AbstractService
{
    /**
     * @var \Stripe\StripeClientInterface
     */
    protected $client = null;

    /**
     * Initializes a new instance of the AbstractService class.
     *
     * @param \Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    abstract public function basePath();

    protected function allObjects($params, $opts)
    {
        return $this->request('get', $this->basePath(), $params, $opts);
    }

    protected function createObject($params, $opts)
    {
        return $this->request('post', $this->basePath(), $params, $opts);
    }

    protected function deleteObject($id, $params, $opts)
    {
        return $this->request('delete', $this->instancePath($id), $params, $opts);
    }

    protected function retrieveObject($id, $params, $opts)
    {
        return $this->request('get', $this->instancePath($id), $params, $opts);
    }

    protected function updateObject($id, $params, $opts)
    {
        return $this->request('post', $this->instancePath($id), $params, $opts);
    }

    protected function request($method, $path, $params, $opts)
    {
        return $this->client->request($method, $path, $params, $opts);
    }

    protected function instancePath($id)
    {
        return $this->basePath() . '/' . urlencode($id);
    }
}
