<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\ImportType;

use PhpStaticAnalysis\Attributes\DefineType;
use PhpStaticAnalysis\Attributes\ImportType;

#[ImportType(StringArray: StringClass::class)]
interface InterfaceImportTypeAttribute
{
}

#[DefineType(StringArray: 'string[]')]
class StringClass
{
}
