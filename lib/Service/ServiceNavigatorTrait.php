<?php

namespace Stripe\Service;

/**
 * Trait for service factories or auxiliary services
 * that have to navigate to other services.
 */
trait ServiceNavigatorTrait
{
    /** @var array<string, AbstractService|AbstractServiceFactory> */
    protected $services = [];

    /** @var \Stripe\StripeClientInterface */
    protected $client;

    protected function getServiceClass($name)
    {
        \trigger_error('Undefined property: ' . static::class . '::$' . $name);
    }

    public function __get($name)
    {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass) {
            if (!\array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->client);
            }

            return $this->services[$name];
        }

        \trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }

    /**
     * @param string $name
     *
     * @return null|AbstractService|AbstractServiceFactory
     */
    public function getService($name)
    {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass) {
            if (!\array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->client);
            }

            return $this->services[$name];
        }

        \trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }
}
