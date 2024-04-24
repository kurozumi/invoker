<?php

declare(strict_types=1)

namespace Kurozumi\TestUtil;

final class Invoker
{
    /**
     * @param object $object
     * @param string $methodName
     * @param array $parameters
     * @return mixed
     * @throws \ReflectionException
     */
    protected function invokePrivateMethod(object $object, string $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass($object);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invoke($object, ...$parameters);
    }
}