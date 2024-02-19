<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\PropertyWrite;

use PhpStaticAnalysis\Attributes\PropertyWrite;

#[PropertyWrite(name: 'string')]
trait TraitPropertyWriteAttribute
{
}
