<?php

namespace Equip\Immutable;

use Equip\Immutable\Fixture\ImmutableValueObject;
use Equip\Immutable\Fixture\NestedImmutableValueObject;
use Equip\Immutable\Fixture\TypelessImmutableValueObject;
use PHPUnit_Framework_TestCase as TestCase;

class ImmutableValueObjectTest extends TestCase
{
    public function testConstruction()
    {
        $date = new \DateTime;
        $data = [
            'id'         => 1,
            'name'       => 'Jonny Jones',
            'created_at' => $date,
        ];

        $object = new ImmutableValueObject($data);

        $this->assertSame($data, $object->toArray());

        foreach (array_keys($data) as $key) {
            $this->assertTrue($object->has($key));
            $this->assertSame($data[$key], $object->toArray()[$key]);
        }
    }

    public function testConstructionWithUndefinedProps()
    {
        $data = [
            'id'   => 2,
            'name' => 'Fuzzy Fred',
            'skip' => true,
        ];

        $object = new ImmutableValueObject($data);

        $this->assertNotSame($data, $object->toArray());

        $this->assertTrue($object->has('id'));
        $this->assertTrue($object->has('name'));
        $this->assertFalse($object->has('skip'));
    }

    public function testConstructionSetsType()
    {
        $data = [
            'id' => '10',
            'name' => 1337,
        ];

        $object = new ImmutableValueObject($data);

        $values = $object->toArray();

        $this->assertNotSame($data, $object->toArray());

        $this->assertSame(10, $values['id']);
        $this->assertSame('1337', $values['name']);

        // Without type coercion, input data is exactly the same
        $object = new TypelessImmutableValueObject($data);

        $this->assertSame($data, $object->toArray());
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /expected value of .* to be an object of .* type/i
     */
    public function testConstructionWithExpectationFaiure()
    {
        $data = [
            'created_at' => new \stdClass,
        ];

        $object = new ImmutableValueObject($data);
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /requires a name/i
     */
    public function testValidateThrowsException()
    {
        $object = new ImmutableValueObject([
            'id' => 5,
        ]);
    }

    public function testWithData()
    {
        $data = [
            'id'   => 1,
            'name' => 'Jonny Jones',
        ];

        $object = new ImmutableValueObject($data);
        $copied = $object->withData(['name' => 'JJ']);

        $this->assertNotSame($object, $copied);

        $this->assertSame('Jonny Jones', $object->toArray()['name']);
        $this->assertSame('JJ', $copied->toArray()['name']);
    }

    public function testToArrayRecursion()
    {
        $parent = new ImmutableValueObject([
            'name' => 'Nested Nero',
        ]);

        $object = new NestedImmutableValueObject([
            'parent' => $parent,
        ]);

        $array  = $object->toArray();
        $expect = [
            'parent' => $parent->toArray(),
        ];

        $this->assertSame($expect, $array);
    }
}
