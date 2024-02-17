<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TypeAttributeTest extends BaseAttributeTestCase
{
    public function testPropertyTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Type/PropertyTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidPropertyTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Type/InvalidPropertyTypeAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Misplaced variable' => 20,
            'Attribute Type cannot be used on a class' => 7,
            'Argument 1 of PhpStaticAnalysis\Attributes\Type::__construct expects string, but 0 provided' => 10,
            'Property test\PhpStaticAnalysis\PsalmPlugin\data\Type\InvalidPropertyTypeAttribute::$invalidProperty does not have a declared type - consider string' => 11,
            'Attribute Type is not repeatable' => 14,
            'Too many arguments for PhpStaticAnalysis\Attributes\Type::__construct - expecting 1 but saw 2' => 17,
            'Property test\PhpStaticAnalysis\PsalmPlugin\data\Type\InvalidPropertyTypeAttribute::$andAnotherinvalidProperty does not have a declared type - consider string' => 21,
        ]);
    }
}
