<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data;

use PhpStaticAnalysis\Attributes\Type;

class InvalidPropertyTypeAttribute
{
    #[Type(0)]
    public $invalidProperty = '';

    #[Type('string')]
    #[Type('string')]
    public $otherInvalidProperty = '';

    #[Type('string', 'string')]
    public $anotherInvalidProperty = '';

    #[Type('$a + $b')]
    public $andAnotherinvalidProperty = '';

    #[Type('string')]
    public function getString(): string
    {
        return 'hello';
    }
}
