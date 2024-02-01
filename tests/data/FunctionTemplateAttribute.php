<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data;

use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\Attributes\Template;

#[Template('T')]
#[Param(param: 'T')]
#[Returns('T')]
function returnTemplate($param)
{
    return $param;
}
