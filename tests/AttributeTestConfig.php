<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

use Psalm\Codebase;
use Psalm\Progress\Progress;
use Psalm\Tests\TestConfig;

class AttributeTestConfig extends TestConfig
{
    protected function getContents(): string
    {
        return '<?xml version="1.0"?>
                <psalm
                  throwExceptionOnError="false"
                >
                </psalm>';
    }

    public function visitStubFiles(Codebase $codebase, ?Progress $progress = null): void
    {
    }
}