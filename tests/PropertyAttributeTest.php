<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class PropertyAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Property/ClassPropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfacePropertyAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Property/InterfacePropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitPropertyAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Property/TraitPropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Property/InvalidClassPropertyAttribute.php');

        $expectedErrors = [
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Property\InvalidClassPropertyAttribute' => 8,
            'Attribute Property cannot be used on a method' => 10,
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Property\AnotherInvalidClassPropertyAttribute' => 18,
            'Misplaced brackets in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Property\AndAnotherInvalidClassPropertyAttribute' => 23,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
