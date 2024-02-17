<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\IsReadOnly;

use PhpStaticAnalysis\Attributes\IsReadOnly;

class InvalidPropertyIsReadOnlyAttribute
{
    #[IsReadOnly(0)]
    public string $invalidProperty;

    #[IsReadOnly]
    #[IsReadOnly]
    public string $otherInvalidProperty;

    #[IsReadOnly]
    public function getString(): string
    {
        return 'hello';
    }

    public function __construct()
    {
        $this->invalidProperty = 'Mike';
        $this->otherInvalidProperty = 'John';
    }
}
