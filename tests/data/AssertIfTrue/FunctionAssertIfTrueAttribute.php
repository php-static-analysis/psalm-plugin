<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\AssertIfTrue;

use Exception;
use PhpStaticAnalysis\Attributes\AssertIfTrue;

#[AssertIfTrue(name: 'string')]
function checkString(mixed $name): bool
{
    return !is_string($name);
}
