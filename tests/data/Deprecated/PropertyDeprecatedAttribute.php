<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Deprecated;

use PhpStaticAnalysis\Attributes\Deprecated;

class PropertyDeprecatedAttribute
{
    #[Deprecated]
    public const NAME = 'name';

    #[Deprecated]
    public string $name = '';
}
