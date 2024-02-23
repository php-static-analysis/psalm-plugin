<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TemplateUseAttributeTest extends BaseAttributeTestCase
{
    public function testTraitTemplateUseAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateUse/TraitTemplateUseAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidTraitTemplateUseAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateUse/InvalidTraitTemplateUseAttribute.php');

        $expectedErrors = [
            'Argument 1 of PhpStaticAnalysis\Attributes\TemplateUse::__construct expects string, but 0 provided' => 13,
            'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateUse\InvalidClassTemplateUseAttribute has missing template params when extending test\PhpStaticAnalysis\PsalmPlugin\data\TemplateUse\InvalidTraitTemplateUseAttribute, expecting 1' => 16,
            'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateUse\InvalidClassTemplateUseAttribute2 has missing template params when extending test\PhpStaticAnalysis\PsalmPlugin\data\TemplateUse\InvalidTraitTemplateUseAttribute, expecting 1' => 22,
            'Attribute TemplateUse cannot be used on a property' => 24,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
