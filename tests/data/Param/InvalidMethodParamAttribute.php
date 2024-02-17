<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Param;

use PhpStaticAnalysis\Attributes\Param;

class InvalidMethodParamAttribute
{
    #[Param(0)]
    public function getNameLength(string $name): int
    {
        return strlen($name);
    }

    #[Param('string')]
    public function getOtherNameLength(string $name): int
    {
        return strlen($name);
    }

    #[Param(name: 'count($a)')]
    public function getAnotherNameLength(string $name): int
    {
        return strlen($name);
    }

    /**
     * @param int $names
     */
    #[Param(names: 'string[]')]
    public function countEvenMoreNames($names): int
    {
        return count($names);
    }

    #[Param(property: 'string')]
    public string $property = '';
}
