<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\PropertyWrite;

use PhpStaticAnalysis\Attributes\PropertyWrite;

#[PropertyWrite(0)]
#[PropertyWrite(name: 'string')]
class InvalidClassPropertyWriteAttribute
{
    #[PropertyWrite('string')]
    public function getName(): string
    {
        return "John";
    }

    public function __get(string $name): mixed
    {
        return $name;
    }

    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }
}

#[PropertyWrite('string')]
class AnotherInvalidClassPropertyWriteAttribute
{
}

#[PropertyWrite(name: 'count($a)')]
class AndAnotherInvalidClassPropertyWriteAttribute
{
}

$class = new InvalidClassPropertyWriteAttribute();
$foo = $class->name;

