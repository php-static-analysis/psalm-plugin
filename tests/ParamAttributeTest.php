<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class ParamAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionParamAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/FunctionParamAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodParamAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/MethodParamAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodParamAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/InvalidMethodParamAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Badly-formatted @param in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodParamAttribute::getNameLength' => 9,
            'Badly-formatted @param in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodParamAttribute::getOtherNameLength' => 15,
            'Argument 1 of PhpStaticAnalysis\Attributes\Param::__construct expects string, but 0 provided' => 9,
            'Misplaced brackets in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodParamAttribute::getAnotherNameLength' => 22,
            'Found duplicated @param or prefixed @param tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodParamAttribute::countEvenMoreNames' => 30,
            'Argument 1 of count cannot be mixed, expecting Countable|array<array-key, mixed>' => 33,
            'Parameter $names has no provided type' => 31,
            'Attribute Param cannot be used on a property' => 36,
        ]);
    }
}
