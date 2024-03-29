<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\TemplateCovariant;

use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\TemplateCovariant;

#[TemplateCovariant('T')]
interface InterfaceTemplateCovariantAttribute
{
    #[Returns('T')]
    public function returnTemplateCovariant();
}
