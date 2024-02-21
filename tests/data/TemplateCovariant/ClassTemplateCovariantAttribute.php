<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\TemplateCovariant;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\TemplateCovariant;
use PhpStaticAnalysis\Attributes\Type;

abstract class ClassTemplateCovariantAttribute
{
    abstract public function getName() : string;
}
class ClassTemplateCovariantAttributeChild extends ClassTemplateCovariantAttribute
{
    public function getName() : string { return "child"; }
}

#[TemplateCovariant('T')] // can only be used in covariant position
class Collection {
    #[Type('array<int, T>')]
    public array $list = [];
}

#[Param(collection: 'Collection<ClassTemplateCovariantAttribute>')]
function getNames(Collection $collection) : void {
    foreach ($collection->list as $item) {
        echo $item->getName();
    }
}

#[Param(children: 'Collection<ClassTemplateCovariantAttributeChild>')]
function listChildNames(Collection $children) : void {
    getNames($children);
}
