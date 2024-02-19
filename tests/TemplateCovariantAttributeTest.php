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
            'Argument 1 of PhpStaticAnalysis\Attributes\TemplateCovariant::__construct expects string, but 0 provided' => 7,
            'Argument 2 of PhpStaticAnalysis\Attributes\TemplateCovariant::__construct expects null|string, but 0 provided' => 9,
            'Attribute TemplateCovariant cannot be used on a property' => 12,
        ]);
    }
}
