<?php

namespace Equip\Immutable\Fixture;

use Equip\Immutable\ProtectedValueObjectTrait;

class ProtectedObject
{
    use ProtectedValueObjectTrait;

    private $id = 1;
    private $name = 'Test';
}
