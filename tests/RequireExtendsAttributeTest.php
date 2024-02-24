<?php


namespace test\PhpStaticAnalysis\PsalmPlugin;

class RequireExtendsAttributeTest extends BaseAttributeTestCase
{
    public function testClassRequireExtendsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/RequireExtends/TraitRequireExtendsAttribute.php');
        $expectedErrors = [
            'test\PhpStaticAnalysis\PsalmPlugin\data\RequireExtends\TraitRequireExtendsAttribute requires using class to extend test\PhpStaticAnalysis\PsalmPlugin\data\RequireExtends\ClassRequireExtendsAttribute, but test\PhpStaticAnalysis\PsalmPlugin\data\RequireExtends\ClassRequireExtendsAttributeChild2 does not' => 23,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }

    public function testInvalidClassRequireExtendsAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/RequireExtends/InvalidTraitRequireExtendsAttribute.php');

        $expectedErrors = [
            'Attribute RequireExtends cannot be used on a property' => 10,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
