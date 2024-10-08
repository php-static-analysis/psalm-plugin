<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class MixinAttributeTest extends BaseAttributeTestCase
{
    public function testClassMixinAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Mixin/ClassMixinAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceMixinAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Mixin/InterfaceMixinAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitMixinAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Mixin/TraitMixinAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassMixinAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/Mixin/InvalidClassMixinAttribute.php');

        $expectedErrors = [
            '@mixin annotation used without specifying class in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Mixin\InvalidClassMixinAttribute' => 9,
            'Attribute Mixin cannot be used on a method' => 11,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
