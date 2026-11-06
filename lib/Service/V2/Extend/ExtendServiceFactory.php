<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Extend;

/**
 * Service factory class for API resources in the Extend namespace.
 *
 * @property ObjectDefinitionService $objectDefinitions
 * @property WorkflowRunService $workflowRuns
 * @property WorkflowService $workflows
 */
class ExtendServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'objectDefinitions' => ObjectDefinitionService::class,
        'workflowRuns' => WorkflowRunService::class,
        'workflows' => WorkflowService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
