<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class ReturnsAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionReturnsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/FunctionReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodReturnsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/MethodReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodReturnsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/InvalidMethodReturnsAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Argument 1 of PhpStaticAnalysis\Attributes\Returns::__construct expects string, but 0 provided' => 9,
            'Found duplicated @return or prefixed @return tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodReturnsAttribute::getOtherName' => 15,
            'Attribute Returns is not repeatable' => 16,
            'Too many arguments for PhpStaticAnalysis\Attributes\Returns::__construct - expecting 1 but saw 2' => 22,
            'Found duplicated @return or prefixed @return tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodReturnsAttribute::getSomeMoreNames' => 31,
            'Misplaced variable in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidMethodReturnsAttribute::getMoreAndMoreNames' => 37,
            'Attribute Returns cannot be used on a property' => 43,
        ]);
    }
}
