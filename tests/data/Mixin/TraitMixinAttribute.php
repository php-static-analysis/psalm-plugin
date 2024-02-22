<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Mixin;

use PhpStaticAnalysis\Attributes\Mixin;

class Other
{
}

#[Mixin('Other')]
trait TraitMixinAttribute
{
}
