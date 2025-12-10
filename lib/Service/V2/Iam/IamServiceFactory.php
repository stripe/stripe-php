<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Iam;

/**
 * Service factory class for API resources in the Iam namespace.
 *
 * @property ApiKeyService $apiKeys
 */
class IamServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'apiKeys' => ApiKeyService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
