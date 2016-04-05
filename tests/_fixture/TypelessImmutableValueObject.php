<?php

namespace Equip\Immutable\Fixture;

use Equip\Immutable\ArraySerializableInterface;
use Equip\Immutable\ArraySerializableTrait;
use Equip\Immutable\ImmutableValueObjectTrait;

class TypelessImmutableValueObject implements ArraySerializableInterface
{
    use ArraySerializableTrait;
    use ImmutableValueObjectTrait;

    private $id;
    private $name;
}
