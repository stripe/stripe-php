<?php

namespace Stripe\Service;

/**
 * Trait for creatable resources and auxiliary services.
 * Adds a `create()` static method to the class for creatable resources.
 * Adds custom properties named like nested classes to parent of
 * auxiliary services.
 *
 * This trait should only be applied to classes that derive from StripeObject.
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
}
