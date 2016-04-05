<?php

namespace Equip\Immutable\Fixture;

use Equip\Immutable\ArraySerializableInterface;
use Equip\Immutable\ArraySerializableTrait;

class ArraySerializable implements ArraySerializableInterface
{
    use ArraySerializableTrait;

    public $id;
    public $name;
}
