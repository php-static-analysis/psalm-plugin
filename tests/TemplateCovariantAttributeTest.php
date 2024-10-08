<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TemplateCovariantAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateCovariantAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateCovariant/ClassTemplateCovariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceTemplateCovariantAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateCovariant/InterfaceTemplateCovariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitTemplateCovariantAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateCovariant/TraitTemplateCovariantAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassTemplateCovariantAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateCovariant/InvalidClassTemplateCovariantAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Empty @template-covariant tag in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\TemplateCovariant\InvalidClassTemplateCovariantAttribute' => 10,
            'Attribute TemplateCovariant cannot be used on a property' => 12,
        ]);
    }
}
