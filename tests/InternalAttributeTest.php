<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class InternalAttributeTest extends BaseAttributeTestCase
{
    public function testClassInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/ClassInternalAttribute.php');
        $expectedErrors = [
            'test\PhpStaticAnalysis\PsalmPlugin\data\Internal\ClassInternalAttribute is internal to newNamespace\test but called from newNamespace\other\otherClass' => 34,
            'The method test\PhpStaticAnalysis\PsalmPlugin\data\Internal\ClassInternalAttribute::myFunction is internal to newNamespace\test and test but called from newNamespace\other\otherClass::otherFunction' => 36,
        ];
        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testTraitInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/TraitInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/InterfaceInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/MethodInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testFunctionInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/FunctionInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testProperyInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/PropertyInternalAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodInternalAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Internal/InvalidMethodInternalAttribute.php');
        $expectedErrors = [
            'psalm-internal annotation used without specifying namespace in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Internal\InvalidMethodInternalAttribute::getName' => 9,
            'Argument 1 of PhpStaticAnalysis\Attributes\Internal::__construct expects null|string, but 0 provided' => 9,
            'Attribute Internal cannot be used on a function/method parameter' => 15,
            'Attribute Internal is not repeatable' => 22,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
