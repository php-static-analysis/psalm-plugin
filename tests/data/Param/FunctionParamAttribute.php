<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Param;

use PhpStaticAnalysis\Attributes\Param;

#[Param(names: 'string[]')]
function countNames($names): int
{
    return count($names);
}
