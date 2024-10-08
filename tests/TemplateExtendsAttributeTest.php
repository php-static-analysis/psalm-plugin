<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class TemplateExtendsAttributeTest extends BaseAttributeTestCase
{
    public function testClassTemplateExtendsAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/TemplateExtends/ClassTemplateExtendsAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassTemplateExtendsAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/TemplateExtends/InvalidClassTemplateExtendsAttribute.php');

        $expectedErrors = [
            'Extended class cannot be empty in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild' => 13,
            'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild has missing template params when extending test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\InvalidClassTemplateExtendsAttribute, expecting 1' => 14,
            'Invalid type \'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\+5\' in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild2' => 18,
            'test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\InvalidClassTemplateExtendsAttributeChild2 has missing template params when extending test\PhpStaticAnalysis\PsalmPlugin\data\TemplateExtends\InvalidClassTemplateExtendsAttribute, expecting 1' => 19,
            'Attribute TemplateExtends cannot be used on a property' => 27,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
