<?php

namespace test\PhpStaticAnalysis\PsalmPlugin\data\Type;

use Exception;
use PhpStaticAnalysis\Attributes\Type;

class PropertyTypeAttribute
{
    #[Type('string')]
    public const ATTRIBUTE_NAME = 'Type';

    #[Type('int[]')] // number of items
    public array $nums = [];

    #[Type(Exception::class)]
    public $exception;

    /**
     * @var string
     */
    public string $string = '';

    public function __construct()
    {
        $this->exception = new Exception();
    }

    #[Type('string')]
    public function getString(): string
    {
        return 'hello';
    }
}
