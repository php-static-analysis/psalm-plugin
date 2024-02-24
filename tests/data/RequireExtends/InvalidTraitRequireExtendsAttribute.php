<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\RequireExtends;

use PhpStaticAnalysis\Attributes\RequireExtends;

#[RequireExtends('InvalidClassRequireExtendsAttribute')]
trait InvalidTraitRequireExtendsAttribute
{
    #[RequireExtends('InvalidClassRequireExtendsAttribute')]
    public string $name = '';
}

class InvalidClassRequireExtendsAttribute
{
}

class InvalidClassRequireExtendsAttributeChild extends InvalidClassRequireExtendsAttribute
{
    use InvalidTraitRequireExtendsAttribute;
}
