<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Returns;

use PhpStaticAnalysis\Attributes\Returns;

class InvalidMethodReturnsAttribute
{
    #[Returns(0)]
    public function getName(): string
    {
        return 'hello';
    }

    #[Returns('string')]
    #[Returns('string')]
    public function getOtherName(): string
    {
        return 'hello';
    }

    #[Returns('string', 'string')]
    public function getEvenMoreNames(): string
    {
        return 'hello';
    }

    /**
     * @return string[]
     */
    #[Returns('string[]')]
    public function getSomeMoreNames(): array
    {
        return ['hello', 'world'];
    }

    #[Returns('$a + $b')]
    public function getMoreAndMoreNames(): string
    {
        return 'hello';
    }

    #[Returns('string')]
    public string $property = '';
}
