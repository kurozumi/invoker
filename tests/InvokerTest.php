<?php

declare(strict_types=1);

/*
 * This file is part of Invoker
 *
 * Copyright(c) Akira Kurozumi <info@a-zumi.net>
 *
 * https://a-zumi.net
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kurozumi\PhpPrivateMedhodInvoker\Tests;

use Kurozumi\PhpPrivateMethodInvoker\Invoker;
use PHPUnit\Framework\TestCase;

class InvokerTest extends TestCase
{
    protected Invoker $invoker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->invoker = new Invoker();
    }

    /**
     * @return void
     *
     * @covers \Kurozumi\PhpPrivateMethodInvoker\Invoker
     */
    public function testInstance(): void
    {
        self::assertInstanceOf(Invoker::class, $this->invoker);
    }

    /**
     * @return void
     *
     * @covers ::invoke
     */
    public function testInvoke(): void
    {
        $result = $this->invoker->invoke(new Sample(), 'method1', ['text']);
        self::assertEquals('text', $result);

        $result = $this->invoker->invoke(new Sample(), 'method2', ['text1', 'text2']);
        self::assertEquals('text1_text2', $result);

        $result = $this->invoker->invoke(new Sample(), 'method3', [['text1', 'text2']]);
        self::assertEquals(['text1', 'text2'], $result);
    }
}

class Sample
{
    private function method1(string $text)
    {
        return $text;
    }

    private function method2(string $text1, string $text2)
    {
        return $text1.'_'.$text2;
    }

    private function method3(array $array)
    {
        return $array;
    }
}
