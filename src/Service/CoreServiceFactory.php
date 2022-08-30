<?php

namespace Hyperzod\AutozodSdkPhp\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property TaskService $taskService
 */
class CoreServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'task' => TaskService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
