<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TemplateImplementsAttributeTest extends BaseAttributeTestCase
{
    public function testInterfaceTemplateImplementsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateImplements/InterfaceTemplateImplementsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidInterfaceTemplateImplementsAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/TemplateImplements/InvalidInterfaceTemplateImplementsAttribute.php');

        $expectedErrors = [
            'Extended class cannot be empty in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\InvalidClassTemplateImplementsAttribute' => 13,
            'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\InvalidClassTemplateImplementsAttribute has missing template params when extending test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\InvalidInterfaceTemplateImplementsAttribute, expecting 1' => 14,
            'Invalid type \'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\+5\' in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\InvalidClassTemplateImplementsAttribute2' => 18,
            'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\InvalidClassTemplateImplementsAttribute2 has missing template params when extending test\PhpStaticAnalysis\PsalmPlugin\data\TemplateImplements\InvalidInterfaceTemplateImplementsAttribute, expecting 1' => 19,
            'Attribute TemplateImplements cannot be used on a property' => 21,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
