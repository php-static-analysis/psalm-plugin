<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class MethodAttributeTest extends BaseAttributeTestCase
{
    public function testClassMethodAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Method/ClassMethodAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceMethodAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Method/InterfaceMethodAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitMethodAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Method/TraitMethodAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassMethodAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Method/InvalidClassMethodAttribute.php');

        $expectedErrors = [
            'No @method entry specified in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Method\InvalidClassMethodAttribute' => 9,
            'Attribute Method cannot be used on a method' => 11,
            'string is not a valid method in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Method\AnotherInvalidClassMethodAttribute' => 29,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
