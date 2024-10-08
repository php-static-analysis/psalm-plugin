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
            'Misplaced variable' => 19,
            'Attribute Type cannot be used on a function/method parameter' => 23,
            'Property test\PhpStaticAnalysis\PsalmPlugin\data\Type\InvalidPropertyTypeAttribute::$invalidProperty does not have a declared type - consider string' => 10,
            'Property test\PhpStaticAnalysis\PsalmPlugin\data\Type\InvalidPropertyTypeAttribute::$andAnotherinvalidProperty does not have a declared type - consider string' => 20,
        ]);
    }
}
