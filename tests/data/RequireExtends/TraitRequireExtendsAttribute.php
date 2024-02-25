<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\RequireExtends;

use PhpStaticAnalysis\Attributes\RequireExtends;

#[RequireExtends(ClassRequireExtendsAttribute::class)] // the class using this trait needs to extend this class
trait TraitRequireExtendsAttribute
{
}

class ClassRequireExtendsAttribute
{
}

class ClassRequireExtendsAttributeChild extends ClassRequireExtendsAttribute
{
    use TraitRequireExtendsAttribute;
}

class ClassRequireExtendsAttributeChild2
{
    use TraitRequireExtendsAttribute;
}
