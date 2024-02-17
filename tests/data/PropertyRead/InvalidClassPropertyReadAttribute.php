<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\PropertyRead;

use PhpStaticAnalysis\Attributes\PropertyRead;

#[PropertyRead(0)]
#[PropertyRead(name: 'string')]
class InvalidClassPropertyReadAttribute
{
    #[PropertyRead('string')]
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

#[PropertyRead('string')]
class AnotherInvalidClassPropertyReadAttribute
{
}

#[PropertyRead(name: 'count($a)')]
class AndAnotherInvalidClassPropertyReadAttribute
{
}

$class = new InvalidClassPropertyReadAttribute();
$class->name = '';

