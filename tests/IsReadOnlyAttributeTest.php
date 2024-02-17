<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class IsReadOnlyAttributeTest extends BaseAttributeTestCase
{
    public function testPropertyIsReadOnlyAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/IsReadOnly/PropertyIsReadOnlyAttribute.php');
        $this->checkExpectedErrors($errors,[
            'test\PhpStaticAnalysis\PsalmPlugin\data\IsReadOnly\PropertyIsReadOnlyAttribute::$name is marked readonly' => 19,
        ]);
    }

    public function testInvalidPropertyIsReadOnlyAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/IsReadOnly/InvalidPropertyIsReadOnlyAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Attribute IsReadOnly cannot be used on a method' => 16,
            'Too many arguments for PhpStaticAnalysis\Attributes\IsReadOnly::__construct - expecting 0 but saw 1' => 9,
            'Attribute IsReadOnly is not repeatable' => 13,
        ]);
    }
}
