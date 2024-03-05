<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Type;

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

    public function getName(
        #[Type('string')]
        string $user
    ): void {
    }
}
