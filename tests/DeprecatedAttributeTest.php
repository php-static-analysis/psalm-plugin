<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class DeprecatedAttributeTest extends BaseAttributeTestCase
{
    public function testClassDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Deprecated/ClassDeprecatedAttribute.php');
        $expectedErrors = [
            'test\PhpStaticAnalysis\PsalmPlugin\data\Deprecated\ClassDeprecatedAttribute is marked deprecated' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testTraitDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Deprecated/TraitDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Deprecated/InterfaceDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Deprecated/MethodDeprecatedAttribute.php');
        $expectedErrors = [
            'The method test\PhpStaticAnalysis\PsalmPlugin\data\Deprecated\MethodDeprecatedAttribute::returnDeprecated has been marked as deprecated' => 31,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testFunctionDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Deprecated/FunctionDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testProperyDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Deprecated/PropertyDeprecatedAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodDeprecatedAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Deprecated/InvalidMethodDeprecatedAttribute.php');

        $expectedErrors = [
            'Attribute Deprecated cannot be used on a function/method parameter' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
