<?php


namespace test\PhpStaticAnalysis\PsalmPlugin;

class ImmutableAttributeTest extends BaseAttributeTestCase
{
    public function testClassImmutableAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Immutable/ClassImmutableAttribute.php');
        $expectedErrors = [
            'test\PhpStaticAnalysis\PsalmPlugin\data\Immutable\ClassImmutableAttribute::$name is marked readonly' => 14,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testTraitImmutableAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Immutable/TraitImmutableAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceImmutableAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Immutable/InterfaceImmutableAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassImmutableAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Immutable/InvalidClassImmutableAttribute.php');

        $expectedErrors = [
            'Attribute Immutable is not repeatable' => 10,
            'Attribute Immutable cannot be used on a property' => 13,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
