<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Param;

use PhpStaticAnalysis\Attributes\Param;

class MethodParamAttribute
{
    #[Param(names: 'string[]')] // returns the number of names
    public function countNames($names): int
    {
        return count($names);
    }

    #[Param('string[] $names')]
    public function countUnnamedNames($names): int
    {
        return count($names);
    }

    /**
     * @deprecated
     */
    #[Param(names: 'string[]')]
    public function countMoreNames($names): int
    {
        return count($names);
    }

    #[Param(
        names1: 'string[]',
        names2: 'string[]'
    )]
    public function countTwoNames($names1, $names2): int
    {
        return count($names1 + $names2);
    }

    #[Param(names1: 'string[]')]
    #[Param(names2: 'string[]')]
    public function countTwoMoreNames($names1, $names2): int
    {
        return count($names1 + $names2);
    }

    #[Param(names: 'string ...')]
    public function countVariadicNames(...$names): int
    {
        return count($names);
    }

    /**
     * @param string[] $names
     */
    public function countNamesAndNames($names): int
    {
        return count($names);
    }

    public function countNamesInParam(
        #[Param('string[]')]
        array $names
    ): int {
        return count($names);
    }

    public function countNamesInParamWithName(
        #[Param(names: 'string[]')]
        array $names
    ): int {
        return count($names);
    }

    public function countNamesInTwoParams(
        #[Param('string[]')]
        array $names1,
        #[Param('string[]')]
        array $names2
    ): int {
        return count($names1) + count($names2);
    }
}
