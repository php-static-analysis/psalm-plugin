<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\TemplateCovariant;

use PhpStaticAnalysis\Attributes\TemplateCovariant;

#[TemplateCovariant(0)]
#[TemplateCovariant('')]
#[TemplateCovariant('T', 0)]
class InvalidClassTemplateCovariantAttribute
{
    #[TemplateCovariant('T')]
    public string $property = '';
}
