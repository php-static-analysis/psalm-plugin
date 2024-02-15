<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class PropertyAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/ClassPropertyAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/InvalidClassPropertyAttribute.php');

        $expectedErrors = [
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\InvalidClassPropertyAttribute' => 8,
            'Argument 1 of PhpStaticAnalysis\Attributes\Property::__construct expects string, but 0 provided' => 7,
            'Attribute Property cannot be used on a method' => 10,
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\AnotherInvalidClassPropertyAttribute' => 18,
            'Misplaced brackets in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\AndAnotherInvalidClassPropertyAttribute' => 23,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
