<?php

namespace Stripe\Services;

abstract class ServiceNamespace
{
    private $client;
    private $services;

    public function __construct($client)
    {
        $this->client = $client;
        $this->services = [];
    }

    abstract public function getServiceClass($name);

    public function __get($name)
    {
        $serviceClass = $this->getServiceClass($name);
        if (!is_null($serviceClass)) {
            return $this->getCachedService($name, $serviceClass);
        }

        // TODO: throw exception?
        return null;
    }

    private function getCachedService($name, $class)
    {
        if (!array_key_exists($name, $this->services)) {
            $this->services[$name] = new $class($this->client);
        }
        return $this->services[$name];
    }
}
