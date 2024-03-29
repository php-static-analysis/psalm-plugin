<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Method;

use PhpStaticAnalysis\Attributes\Method;
use PhpStaticAnalysis\Attributes\Param;

#[Method('string getString()')] // get the main string
#[Method(
    'void setString(string $text)',
    'static string staticGetter()',
)]
class ClassMethodAttribute
{
    #[Param(arguments: 'mixed[]')]
    public function __call(string $name, array $arguments): mixed
    {
        $callable = [$this, $name];
        if (is_callable($callable)) {
            return call_user_func_array($callable, $arguments);
        }
        return null;
    }

    #[Param(arguments: 'mixed[]')]
    public static function __callStatic(string $name, array $arguments): mixed
    {
        $callable = [get_called_class(), $name];
        if (is_callable($callable)) {
            return call_user_func_array($callable, $arguments);
        }
        return null;
    }
}

$class = new ClassMethodAttribute();
$foo = $class->getString();
$class->setString($foo);
$bar = ClassMethodAttribute::staticGetter();
