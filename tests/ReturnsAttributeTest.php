<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

final class ReturnsAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionReturnsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Returns/FunctionReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodReturnsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Returns/MethodReturnsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodReturnsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Returns/InvalidMethodReturnsAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Found duplicated @return or prefixed @return tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Returns\InvalidMethodReturnsAttribute::getOtherName' => 15,
            'Found duplicated @return or prefixed @return tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Returns\InvalidMethodReturnsAttribute::getSomeMoreNames' => 31,
            'Misplaced variable in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Returns\InvalidMethodReturnsAttribute::getMoreAndMoreNames' => 37,
            'Too many arguments for PhpStaticAnalysis\Attributes\Returns::__construct - expecting 0 but saw 1' => 43,
            'Attribute Returns cannot be used on a property' => 43,
        ]);
    }
}
