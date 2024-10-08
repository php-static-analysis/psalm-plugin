<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class PureAttributeTest extends BaseAttributeTestCase
{
    public function testMethodPureAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Pure/MethodPureAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionPureAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Pure/FunctionPureAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodPureAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Pure/InvalidMethodPureAttribute.php');

        $expectedErrors = [
            'Attribute Pure cannot be used on a property' => 11,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
