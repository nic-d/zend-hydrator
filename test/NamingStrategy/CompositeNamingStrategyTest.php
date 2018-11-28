<?php
/**
 * @see       https://github.com/zendframework/zend-hydrator for the canonical source repository
 * @copyright Copyright (c) 2010-2018 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-hydrator/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace ZendTest\Hydrator\NamingStrategy;

use PHPUnit\Framework\TestCase;
use Zend\Hydrator\NamingStrategy\CompositeNamingStrategy;
use Zend\Hydrator\NamingStrategy\NamingStrategyInterface;

/**
 * Tests for {@see CompositeNamingStrategy}
 *
 * @covers \Zend\Hydrator\NamingStrategy\CompositeNamingStrategy
 */
class CompositeNamingStrategyTest extends TestCase
{
    public function testGetSameNameWhenNoNamingStrategyExistsForTheName()
    {
        $compositeNamingStrategy = new CompositeNamingStrategy([
            'foo' => $this->createMock(NamingStrategyInterface::class)
        ]);

        $this->assertEquals('bar', $compositeNamingStrategy->hydrate('bar'));
        $this->assertEquals('bar', $compositeNamingStrategy->extract('bar'));
    }

    public function testUseDefaultNamingStrategy()
    {
        /* @var $defaultNamingStrategy NamingStrategyInterface|\PHPUnit_Framework_MockObject_MockObject*/
        $defaultNamingStrategy = $this->createMock(NamingStrategyInterface::class);
        $defaultNamingStrategy->expects($this->at(0))
            ->method('hydrate')
            ->with('foo')
            ->will($this->returnValue('Foo'));
        $defaultNamingStrategy->expects($this->at(1))
            ->method('extract')
            ->with('Foo')
            ->will($this->returnValue('foo'));

        $compositeNamingStrategy = new CompositeNamingStrategy(
            ['bar' => $this->createMock(NamingStrategyInterface::class)],
            $defaultNamingStrategy
        );
        $this->assertEquals('Foo', $compositeNamingStrategy->hydrate('foo'));
        $this->assertEquals('foo', $compositeNamingStrategy->extract('Foo'));
    }

    public function testHydrate()
    {
        $fooNamingStrategy = $this->createMock(NamingStrategyInterface::class);
        $fooNamingStrategy->expects($this->once())
            ->method('hydrate')
            ->with('foo')
            ->will($this->returnValue('FOO'));
        $compositeNamingStrategy = new CompositeNamingStrategy(['foo' => $fooNamingStrategy]);
        $this->assertEquals('FOO', $compositeNamingStrategy->hydrate('foo'));
    }

    public function testExtract()
    {
        $fooNamingStrategy = $this->createMock(NamingStrategyInterface::class);
        $fooNamingStrategy->expects($this->once())
            ->method('extract')
            ->with('FOO')
            ->will($this->returnValue('foo'));
        $compositeNamingStrategy = new CompositeNamingStrategy(['FOO' => $fooNamingStrategy]);
        $this->assertEquals('foo', $compositeNamingStrategy->extract('FOO'));
    }
}
