<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Returns;

use PhpStaticAnalysis\Attributes\Returns;

#[Returns('string[]')]
function getNames()
{
    return ['hello', 'world'];
}
