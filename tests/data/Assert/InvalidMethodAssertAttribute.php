<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Assert;

use PhpStaticAnalysis\Attributes\Assert;

class InvalidMethodAssertAttribute
{
    #[Assert(0)]
    public function checkString(mixed $name): void
    {
    }

    #[Assert(property: 'string')]
    public string $property = '';
}
