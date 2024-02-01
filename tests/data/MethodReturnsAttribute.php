<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data;

use PhpStaticAnalysis\Attributes\Returns;

class MethodReturnsAttribute
{
    #[Returns('string[]')]
    public function getNames(): array
    {
        return ['hello', 'world'];
    }

    /**
     * @deprecated
     */
    #[Returns('string[]')]
    public function getMoreNames(): array
    {
        return ['hello', 'world'];
    }


    /**
     * @return string[]
     */
    public function getNamesAndNames(): array
    {
        return ['hello', 'world'];
    }
}
