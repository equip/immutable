<?php

namespace Equip\Immutable;

interface ArraySerializableInterface
{
    /**
     * Get the values of the object as an array.
     *
     * @return array
     */
    public function toArray();
}
