<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\RequireImplements;

use PhpStaticAnalysis\Attributes\RequireImplements;

#[RequireImplements('InvalidInterfaceRequireImplementsAttribute')]
trait InvalidTraitRequireImplementsAttribute
{
    #[RequireImplements('InvalidInterfaceRequireImplementsAttribute')]
    public string $name = '';
}

interface InvalidInterfaceRequireImplementsAttribute
{
}

class InvalidClassRequireImplementsAttribute implements InvalidInterfaceRequireImplementsAttribute
{
    use InvalidTraitRequireImplementsAttribute;
}
