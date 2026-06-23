<?php

namespace Stripe\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property OAuthService $oauth
 * // Doc: The beginning of the section generated from our OpenAPI spec
 * // Doc: The end of the section generated from our OpenAPI spec
 */
class CoreServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'oauth' => OAuthService::class,
        // Class Map: The beginning of the section generated from our OpenAPI spec
        // Class Map: The end of the section generated from our OpenAPI spec
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
