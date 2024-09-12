<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

class AssertIfFalseAttributeTest extends BaseAttributeTestCase
{
    public function testFunctionAssertIfFalseAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/AssertIfFalse/FunctionAssertIfFalseAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testMethodAssertIfFalseAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/AssertIfFalse/MethodAssertIfFalseAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodAssertIfFalseAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/AssertIfFalse/InvalidMethodAssertIfFalseAttribute.php');
        $this->checkExpectedErrors($errors,[
            'Argument 1 of PhpStaticAnalysis\Attributes\AssertIfFalse::__construct expects string, but 0 provided' => 9,
            'Attribute AssertIfFalse cannot be used on a property' => 15,
        ]);
    }
}
