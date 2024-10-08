<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class DefineTypeAttributeTest extends BaseAttributeTestCase
{
    public function testClassDefineTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/DefineType/ClassDefineTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceDefineTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/DefineType/InterfaceDefineTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitDefineTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/DefineType/TraitDefineTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassDefineTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/DefineType/InvalidClassDefineTypeAttribute.php');

        $expectedErrors = [
            'Misplaced brackets' => 7,
            'Attribute DefineType cannot be used on a method' => 12,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
