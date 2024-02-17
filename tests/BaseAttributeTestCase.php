<?php

declare(strict_types=1);

namespace test\PhpStaticAnalysis\PsalmPlugin;

use Exception;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\PsalmPlugin\Provider\AttributeStatementProvider;
use Psalm\Config;
use Psalm\Context;
use Psalm\Internal\Analyzer\IssueData;
use Psalm\IssueBuffer;
use Psalm\Tests\TestCase;

class BaseAttributeTestCase extends TestCase
{
    public function setup(): void
    {
        parent::setUp();

        $config = Config::getInstance();

        $config->throw_exception = false;

        /** @psalm-suppress InternalMethod */
        $this->project_analyzer->setPhpVersion('8.0', 'cli');

        /** @psalm-suppress InternalMethod */
        $codebase = $this->project_analyzer->getCodebase();
        $attributeStatementProvider = new AttributeStatementProvider($codebase->statements_provider);

        /** @psalm-suppress InvalidPropertyAssignmentValue */
        $codebase->statements_provider = $attributeStatementProvider; // @phpstan-ignore-line

    }

    protected function makeConfig(): Config
    {
        return new AttributeTestConfig();
    }

    #[Returns('IssueData[]')]
    protected function analyzeTestFile(string $file): array
    {
        $filepath = __DIR__ . $file;
        $code = file_get_contents($filepath);
        if ($code === false) {
            throw new Exception('File ' . $filepath . ' cannot be read');
        }
        $this->addFile($filepath, $code);
        /** @psalm-suppress InternalMethod */
        parent::analyzeFile($filepath, new Context());
        $errors = [];
        $filesWithIssues = IssueBuffer::getIssuesData();
        foreach ($filesWithIssues as $fileIssues) {
            foreach ($fileIssues as $issue) {
                $errors[] = $issue;
            }
        }
        return $errors;
    }

    #[Param(
        errors: 'IssueData[]',
        expectedErrors: 'array<string,int>',
    )]
    protected function checkExpectedErrors(
        array $errors,
        array $expectedErrors
    ): void {
        $this->assertCount(count($expectedErrors), $errors);

        $errorNum = 0;
        foreach ($expectedErrors as $error => $line) {
            /** @psalm-suppress InternalProperty */
            $this->assertSame($error, $errors[$errorNum]->message);
            /** @psalm-suppress InternalProperty */
            $this->assertSame($line, $errors[$errorNum]->line_from);
            $errorNum++;
        }
    }
}
