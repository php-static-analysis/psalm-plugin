<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TemplateAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionTemplateAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Template/FunctionTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testClassTemplateAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Template/ClassTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceTemplateAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Template/InterfaceTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitTemplateAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Template/TraitTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodTemplateAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Template/MethodTemplateAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodTemplateAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Template/InvalidMethodTemplateAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Empty @template tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Template\InvalidMethodTemplateAttribute::getName' => 11,
            'Empty @template tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\Template\InvalidMethodTemplateAttribute::getAnotherName' => 17,
            'Attribute Template cannot be used on a property' => 23,
        ]);
    }
}
