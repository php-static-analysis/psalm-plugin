<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\AssertIfFalse;

use PhpStaticAnalysis\Attributes\AssertIfFalse;

class InvalidMethodAssertIfFalseAttribute
{
    #[AssertIfFalse(0)]
    public function checkString(mixed $name): bool
    {
        return false;
    }

    #[AssertIfFalse(property: 'string')]
    public string $property = '';
}
