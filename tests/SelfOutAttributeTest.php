<?php

namespace test\PhpStaticAnalysis\PsalmPlugin;

final class SelfOutAttributeTest extends BaseAttributeTestCase
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
            'Too many arguments for PhpStaticAnalysis\Attributes\SelfOut::__construct - expecting 0 but saw 1' => 20,
            'Attribute SelfOut cannot be used on a property' => 20,
        ];

        $this->checkExpectedErrors($errors, $expectedErrors);
    }
}
