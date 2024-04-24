<?php

namespace Kurozumi\Invoker\Tests;

use Kurozumi\Invoker\Invoker;
use PHPUnit\Framework\TestCase;

class InvokerTest extends TestCase
{
    protected $invoker;
    protected function setUp(): void
    {
        parent::setUp();

        $this->invoker = new Invoker();
    }

    /**
     * @return void
     * @covers \Kurozumi\Invoker\Invoker
     */
    public function testInstance(): void
    {
        self::assertInstanceOf(Invoker::class, $this->invoker);
    }

    /**
     * @return void
     * @covers ::invokePrivateMethod
     */
    public function testInvokePrivateMethod(): void
    {
        self::markTestIncomplete();
    }
}
