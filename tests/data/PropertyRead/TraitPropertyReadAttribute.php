<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\PropertyRead;

use PhpStaticAnalysis\Attributes\PropertyRead;

#[PropertyRead(name: 'string')]
trait TraitPropertyReadAttribute
{
}
