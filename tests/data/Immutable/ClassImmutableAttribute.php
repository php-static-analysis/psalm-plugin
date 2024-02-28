<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Immutable;

use PhpStaticAnalysis\Attributes\Immutable;

#[Immutable] // All properties are read only
class ClassImmutableAttribute
{
    public string $name = '';
}

$class = new ClassImmutableAttribute();
$class->name = 'John';
