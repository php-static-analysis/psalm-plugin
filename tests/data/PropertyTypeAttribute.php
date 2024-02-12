<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data;

use PhpStaticAnalysis\Attributes\Type;

class PropertyTypeAttribute
{
    #[Type('string')]
    public const ATTRIBUTE_NAME = 'Type';

    #[Type('int[]')]
    public array $nums = [];

    /**
     * @var string
     */
    public string $string = '';
}