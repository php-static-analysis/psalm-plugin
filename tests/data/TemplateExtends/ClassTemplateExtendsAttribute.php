<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends;

use PhpStaticAnalysis\Attributes\Template;
use PhpStaticAnalysis\Attributes\TemplateExtends;

#[Template('T')]
class ClassTemplateExtendsAttribute
{
}

#[TemplateExtends('ClassTemplateExtendsAttribute<int>')] // this class extends the base template
class ClassTemplateExtendsAttributeChild extends ClassTemplateExtendsAttribute
{
}
