<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class PropertyWriteAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyWriteAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/PropertyWrite/ClassPropertyWriteAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyWriteAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/PropertyWrite/InvalidClassPropertyWriteAttribute.php');

        $expectedErrors = [
            'Unable to determine the type that $foo is being assigned to' => 39,
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\PropertyWrite\InvalidClassPropertyWriteAttribute' => 9,
            'Argument 1 of PhpStaticAnalysis\Attributes\PropertyWrite::__construct expects string, but 0 provided' => 7,
            'Attribute PropertyWrite cannot be used on a method' => 11,
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\PropertyWrite\AnotherInvalidClassPropertyWriteAttribute' => 29,
            'Misplaced brackets in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\PropertyWrite\AndAnotherInvalidClassPropertyWriteAttribute' => 34,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
