<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class ParamOutAttributeTest extends BaseAttributeTestCase
{
    public function testMethodParamOutAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/ParamOut/MethodParamOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionParamOutAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/ParamOut/FunctionParamOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodParamOutAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/ParamOut/InvalidMethodParamOutAttribute.php');

        $expectedErrors = [
            'Badly-formatted @param in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\ParamOut\InvalidMethodParamOutAttribute::setName' => 9,
            'Badly-formatted @param in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\ParamOut\InvalidMethodParamOutAttribute::setOtherName' => 15,
            'Misplaced brackets in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\ParamOut\InvalidMethodParamOutAttribute::setAnotherName' => 21,
            'Attribute ParamOut cannot be used on a property' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
