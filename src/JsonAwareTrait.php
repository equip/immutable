<?php

namespace Equip\Immutable;

trait JsonAwareTrait /* implements JsonSerializable */
{
    /**
     * @see ArraySerializableInterface
     */
    abstract public function toArray();

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
