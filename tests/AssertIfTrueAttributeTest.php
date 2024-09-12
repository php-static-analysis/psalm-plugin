<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class AssertIfTrueAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionAssertIfTrueAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/AssertIfTrue/FunctionAssertIfTrueAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodAssertIfTrueAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/AssertIfTrue/MethodAssertIfTrueAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodAssertIfTrueAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/AssertIfTrue/InvalidMethodAssertIfTrueAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Argument 1 of PhpStaticAnalysis\Attributes\AssertIfTrue::__construct expects string, but 0 provided' => 9,
            'Attribute AssertIfTrue cannot be used on a property' => 15,
        ]);
    }
}
