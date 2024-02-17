<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Property;

use PhpStaticAnalysis\Attributes\Property;

#[Property(0)]
class InvalidClassPropertyAttribute
{
    #[Property('string')]
    public function getName(): string
    {
        return "John";
    }
}

#[Property('string')]
class AnotherInvalidClassPropertyAttribute
{
}

#[Property(name: 'count($a)')]
class AndAnotherInvalidClassPropertyAttribute
{
}
