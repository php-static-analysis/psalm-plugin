<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Immutable;

use PhpStaticAnalysis\Attributes\Immutable;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;

#[Immutable]
#[Immutable]
class InvalidClassImmutableAttribute
{
    #[Immutable]
    public string $name = '';
}
