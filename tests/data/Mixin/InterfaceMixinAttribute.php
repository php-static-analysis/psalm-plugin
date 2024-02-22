<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Mixin;

use PhpStaticAnalysis\Attributes\Mixin;

#[Mixin('AClass')]
interface InterfaceMixinAttribute
{
}

class AClass
{
}
