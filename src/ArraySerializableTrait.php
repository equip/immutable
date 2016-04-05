<?php

namespace Equip\Immutable;

trait ArraySerializableTrait /* implements ArraySerializableInterface */
{
    /**
     * Get the values of the object as an array.
     *
     * Recursively handles any value that can be converted to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(static function ($value) {
            if ($value instanceof ArraySerializableInterface) {
                $value = $value->toArray();
            }
            return $value;
        }, get_object_vars($this));
    }
}
