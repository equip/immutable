<?php

namespace Equip\Immutable;

use Equip\Immutable\Fixture\JsonAware;
use PHPUnit_Framework_TestCase as TestCase;

class JsonAwareTest extends TestCase
{
    public function testEncodeDecode()
    {
        $object = new JsonAware;

        $object->id = 1;
        $object->name = 'Test Case';

        $json = json_encode($object);

        $this->assertJson($json, $object);

        $data = json_decode($json, true);

        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('name', $data);

        $this->assertSame($object->id, $data['id']);
        $this->assertSame($object->name, $data['name']);
    }
}
