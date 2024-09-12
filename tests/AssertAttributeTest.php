<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class AssertAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionAssertAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Assert/FunctionAssertAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodAssertAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Assert/MethodAssertAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodAssertAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/Assert/InvalidMethodAssertAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Argument 1 of PhpStaticAnalysis\Attributes\Assert::__construct expects string, but 0 provided' => 9,
            'Attribute Assert cannot be used on a property' => 14,
        ]);
    }
}
