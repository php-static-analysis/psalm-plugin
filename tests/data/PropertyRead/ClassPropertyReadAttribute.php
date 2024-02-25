<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\PropertyRead;

use Exception;
use PhpStaticAnalysis\Attributes\PropertyRead;

#[PropertyRead(name: 'string')] // cannot be written to
#[PropertyRead(exception: Exception::class)]
#[PropertyRead('int $age')]
#[PropertyRead(
    index1: 'string[]',
    index2: 'string[]',
)]
class ClassPropertyReadAttribute
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

$class = new ClassPropertyReadAttribute();
$foo = $class->name;
$bar = $class->age;
$indexes = $class->index1 + $class->index2;
