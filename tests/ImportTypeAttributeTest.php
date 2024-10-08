<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class ImportTypeAttributeTest extends BaseAttributeTestCase
{
    public function testClassImportTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/ImportType/ClassImportTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInterfaceImportTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/ImportType/InterfaceImportTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testTraitImportTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/ImportType/TraitImportTypeAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidClassImportTypeAttribute(): void
    {
        $errors = $this->analyzeTestFile( '/data/ImportType/InvalidClassImportTypeAttribute.php');

        $expectedErrors = [
            'Invalid import in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\ImportType\InvalidClassImportTypeAttribute, expecting "<TypeName> from <ClassName>", got "" instead.' => 9,
            'Invalid import in docblock for test\PhpStaticAnalysis\PsalmPlugin\data\ImportType\InvalidClassImportTypeAttribute, expecting "<TypeName> from <ClassName>", got "string" instead.' => 10,
            'Attribute ImportType cannot be used on a method' => 13,
            'Docblock-defined class, interface or enum named test\PhpStaticAnalysis\PsalmPlugin\data\ImportType\count($a) does not exist' => 11,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
