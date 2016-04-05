<?php

namespace Equip\Immutable\Fixture;

use Equip\Immutable\ArraySerializableInterface;
use Equip\Immutable\ArraySerializableTrait;
use Equip\Immutable\ImmutableValueObjectTrait;

class NestedImmutableValueObject implements ArraySerializableInterface
{
    use ArraySerializableTrait;
    use ImmutableValueObjectTrait;

    private $parent;

    private function expects()
    {
        return [
            'parent' => ImmutableValueObject::class,
        ];
    }
}
