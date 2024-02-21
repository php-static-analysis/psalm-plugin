<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data;

use PhpStaticAnalysis\Attributes\Deprecated;

#[Deprecated]
function returnDeprecated(): void
{
}
