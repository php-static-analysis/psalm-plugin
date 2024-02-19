<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class PropertyReadAttributeTest extends BaseAttributeTestCase
{
    public function testClassPropertyReadAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/PropertyRead/ClassPropertyReadAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfacePropertyReadAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/PropertyRead/InterfacePropertyReadAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitPropertyReadAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/PropertyRead/TraitPropertyReadAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassPropertyReadAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/PropertyRead/InvalidClassPropertyReadAttribute.php');

        $expectedErrors = [
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\PropertyRead\InvalidClassPropertyReadAttribute' => 9,
            'Argument 1 of PhpStaticAnalysis\Attributes\PropertyRead::__construct expects string, but 0 provided' => 7,
            'Attribute PropertyRead cannot be used on a method' => 11,
            'Badly-formatted @property in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\PropertyRead\AnotherInvalidClassPropertyReadAttribute' => 29,
            'Misplaced brackets in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\PropertyRead\AndAnotherInvalidClassPropertyReadAttribute' => 34,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
