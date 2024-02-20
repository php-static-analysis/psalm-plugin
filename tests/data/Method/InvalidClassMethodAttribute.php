<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Method;

use PhpStaticAnalysis\Attributes\Method;
use PhpStaticAnalysis\Attributes\Param;

#[Method(0)]
class InvalidClassMethodAttribute
{
    #[Method('string getString()')]
    public function getName(): string
    {
        return "John";
    }

    #[Param(arguments: 'mixed[]')]
    public function __call(string $name, array $arguments): mixed
    {
        $callable = [$this, $name];
        if (is_callable($callable)) {
            return call_user_func_array($callable, $arguments);
        }
        return null;
    }
}

#[Method('string')]
class AnotherInvalidClassMethodAttribute
{
}

$class = new InvalidClassMethodAttribute();
$class->badFunction();
