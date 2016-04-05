<?php

namespace Equip\Immutable;

use Equip\Immutable\Fixture\ProtectedObject;
use PHPUnit_Framework_TestCase as TestCase;
use RuntimeException;

class ProtectedValueObjectTest extends TestCase
{
    /**
     * @var ProtectedObject
     */
    private $object;

    public function setUp()
    {
        $this->object = new ProtectedObject;
    }

    public function testGet()
    {
        $this->assertSame(1, $this->object->id);
        $this->assertSame('Test', $this->object->name);
    }

    public function testIsset()
    {
        $this->assertTrue(isset($this->object->id));
        $this->assertTrue(isset($this->object->name));
    }

    public function testSet()
    {
        $this->setExpectedExceptionRegExp(
            RuntimeException::class,
            '/modification of immutable object .+ is not allowed/i'
        );

        $this->object->id = 10;
    }

    public function testUnset()
    {
        $this->setExpectedExceptionRegExp(
            RuntimeException::class,
            '/modification of immutable object .+ is not allowed/i'
        );

        unset($this->object->id);
    }
}
