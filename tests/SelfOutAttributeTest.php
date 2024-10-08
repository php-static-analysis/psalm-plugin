<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

class SelfOutAttributeTest extends BaseAttributeTestCase
{
    public function testMethodSelfOutAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/SelfOut/MethodSelfOutAttribute.php');
        $this->assertCount(0, $errors);
    }

    public function testInvalidMethodSelfOutAttribute(): void
    {
        $errors = $this->analyzeTestFile('/data/SelfOut/InvalidMethodSelfOutAttribute.php');

        $expectedErrors = [
            'Attribute SelfOut cannot be used on a property' => 20,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
