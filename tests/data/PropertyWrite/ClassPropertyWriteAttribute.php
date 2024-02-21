<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\PropertyWrite;

use PhpStaticAnalysis\Attributes\PropertyWrite;

#[PropertyWrite(name: 'string')] // cannot be read
#[PropertyWrite('int $age')]
#[PropertyWrite(
    index1: 'string[]',
    index2: 'string[]',
)]
class ClassPropertyWriteAttribute
{
    public function __get(string $name): mixed
    {
        return $name;
    }

    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }
}

$class = new ClassPropertyWriteAttribute();
$class->name = '';
$class->age = 7;
$class->index1 = [];
$class->index2 = [];
