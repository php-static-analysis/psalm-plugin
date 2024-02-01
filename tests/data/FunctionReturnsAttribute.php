<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data;

use PhpStaticAnalysis\Attributes\Returns;

#[Returns('string[]')]
function getNames()
{
    return ['hello', 'world'];
}
