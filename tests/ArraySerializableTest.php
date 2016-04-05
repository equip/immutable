<?php

namespace Equip\Immutable;

use Equip\Immutable\Fixture\ArraySerializable;
use PHPUnit_Framework_TestCase as TestCase;

class ArraySerializableTest extends TestCase
{
    public function testToArray()
    {
        $object = new ArraySerializable;

        $object->id = 1;
        $object->name = 'Test Case';

        $data = $object->toArray();

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('name', $data);

        $this->assertSame($object->id, $data['id']);
        $this->assertSame($object->name, $data['name']);

        $object->name = new ArraySerializable;
        $object->name->id = 5;
        $object->name->name = 'nested';

        $data = $object->toArray();

        $this->assertSame([
            'id' => $object->id,
            'name' => [
                'id' => $object->name->id,
                'name' => $object->name->name,
            ],
        ], $data);
    }
}
