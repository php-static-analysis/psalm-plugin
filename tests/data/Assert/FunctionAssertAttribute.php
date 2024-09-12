<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Assert;

use Exception;
use PhpStaticAnalysis\Attributes\Assert;

#[Assert(name: 'string')]
function checkString(mixed $name): void
{
    if (!is_string($name)) {
        throw new Exception();
    }
}
