<?php

namespace Equip\Immutable\Fixture;

use Equip\Immutable\ArraySerializableTrait;
use Equip\Immutable\JsonAwareTrait;
use JsonSerializable;

class JsonAware implements JsonSerializable
{
    use ArraySerializableTrait;
    use JsonAwareTrait;

    public $id;
    public $name;
}
