<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TypeAttributeTest extends BaseAttributeTestCase
{
    public function testPropertyTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/PropertyTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidPropertyTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/InvalidPropertyTypeAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Misplaced variable' => 19,
            'Attribute Type cannot be used on a method' => 22,
            'Argument 1 of PhpStaticAnalysis\Attributes\Type::__construct expects string, but 0 provided' => 9,
            'Property test\PhpStaticAnalysis\PsalmPlugin\data\InvalidPropertyTypeAttribute::$invalidProperty does not have a declared type - consider string' => 10,
            'Attribute Type is not repeatable' => 13,
            'Too many arguments for PhpStaticAnalysis\Attributes\Type::__construct - expecting 1 but saw 2' => 16,
            'Property test\PhpStaticAnalysis\PsalmPlugin\data\InvalidPropertyTypeAttribute::$andAnotherinvalidProperty does not have a declared type - consider string' => 20,
        ]);
    }
}
