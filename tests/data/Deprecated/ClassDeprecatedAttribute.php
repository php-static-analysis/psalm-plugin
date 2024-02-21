<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Deprecated;

use PhpStaticAnalysis\Attributes\Deprecated;

#[Deprecated] // Use NotDeprecatedClassInstead
class ClassDeprecatedAttribute
{
}

$class = new ClassDeprecatedAttribute();
