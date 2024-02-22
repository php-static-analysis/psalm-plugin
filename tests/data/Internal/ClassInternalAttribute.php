<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Internal;

use PhpStaticAnalysis\Attributes\Internal;

#[Internal('newNamespace\test')]
class ClassInternalAttribute
{
    #[Internal] // Can only be accessed from the current namespace
    public function myFunction(): void
    {
    }
}

namespace newNamespace\test;

class newClass
{
    public function newFunction(): void
    {
        $class = new \test\PhpStaticAnalysis\PsalmPlugin\data\Internal\ClassInternalAttribute();

        $class->myFunction();
    }
}

namespace newNamespace\other;

class otherClass
{
    public function otherFunction(): void
    {
        $class = new \test\PhpStaticAnalysis\PsalmPlugin\data\Internal\ClassInternalAttribute();

        $class->myFunction();
    }
}