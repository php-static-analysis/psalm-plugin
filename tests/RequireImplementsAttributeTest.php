<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class RequireImplementsAttributeTest extends BaseAttributeTestCase
{
    public function testClassRequireImplementsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/RequireImplements/TraitRequireImplementsAttribute.php');
        $expectedErrors = [
            'test\PhpStaticAnalysis\PsalmPlugin\data\RequireImplements\TraitRequireImplementsAttribute requires using class to implement test\PhpStaticAnalysis\PsalmPlugin\data\RequireImplements\InterfaceRequireImplementsAttribute3, but test\PhpStaticAnalysis\PsalmPlugin\data\RequireImplements\ClassRequireImplementsAttribute2 does not' => 35,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testInvalidClassRequireImplementsAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/RequireImplements/InvalidTraitRequireImplementsAttribute.php');

        $expectedErrors = [
            'Attribute RequireImplements cannot be used on a property' => 10,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
