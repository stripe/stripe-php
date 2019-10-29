<?php

namespace Stripe\Service;

/**
 * Abstract base class for all services.
 */
abstract class AbstractService
{
    /**
     * @var \Stripe\StripeClientInterface
     */
    protected $client;

    /**
     * Initializes a new instance of the {@link AbstractService} class.
     *
     * @param \Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Returns the base path for requests issued by this service. Must be
     * implemented by all concrete subclasses.
     *
     * @return string the base path for requests issued by this service
     */
    abstract public function basePath();

    /**
     * Gets the client used by this service to send requests.
     *
     * @return \Stripe\StripeClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    protected function allObjects($params, $opts)
    {
        return $this->request('get', $this->basePath(), $params, $opts);
    }

    protected function allNestedObjects($nestedPath, $parentId, $params, $opts)
    {
        return $this->request('get', $this->baseNestedPath($parentId, $nestedPath), $params, $opts);
    }

    protected function createObject($params, $opts)
    {
        return $this->request('post', $this->basePath(), $params, $opts);
    }

    protected function createNestedObject($nestedPath, $parentId, $params, $opts)
    {
        return $this->request('post', $this->baseNestedPath($parentId, $nestedPath), $params, $opts);
    }

    protected function deleteObject($id, $params, $opts)
    {
        return $this->request('delete', $this->instancePath($id), $params, $opts);
    }

    protected function deleteNestedObject($nestedPath, $parentId, $id, $params, $opts)
    {
        return $this->request('delete', $this->instanceNestedPath($parentId, $nestedPath, $id), $params, $opts);
    }

    protected function retrieveObject($id, $params, $opts)
    {
        return $this->request('get', $this->instancePath($id), $params, $opts);
    }

    protected function retrieveNestedObject($nestedPath, $parentId, $id, $params, $opts)
    {
        return $this->request('get', $this->instanceNestedPath($parentId, $nestedPath, $id), $params, $opts);
    }

    protected function updateObject($id, $params, $opts)
    {
        return $this->request('post', $this->instancePath($id), $params, $opts);
    }

    protected function updateNestedObject($nestedPath, $parentId, $id, $params, $opts)
    {
        return $this->request('post', $this->instanceNestedPath($parentId, $nestedPath, $id), $params, $opts);
    }

    protected function request($method, $path, $params, $opts)
    {
        return $this->getClient()->request($method, $path, $params, $opts);
    }

    protected function baseNestedPath($parentId, $nestedPath)
    {
        return $this->instancePath($parentId) . '/' . $nestedPath;
    }

    protected function instancePath($id)
    {
        if (null === $id || '' === \trim($id)) {
            $msg = 'The resource ID cannot be null or whitespace.';

            throw new \Stripe\Exception\InvalidArgumentException($msg);
        }

        return $this->basePath() . '/' . \urlencode($id);
    }

    protected function instanceNestedPath($parentId, $nestedPath, $id)
    {
        if (null === $id || '' === \trim($id)) {
            $msg = 'The resource ID cannot be null or whitespace.';

            throw new \Stripe\Exception\InvalidArgumentException($msg);
        }

        return $this->baseNestedPath($parentId, $nestedPath) . '/' . \urlencode($id);
    }
}
