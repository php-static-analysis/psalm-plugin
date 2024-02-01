<?php

declare(strict_types=1);

namespace PhpStaticAnalysis\PsalmPlugin;

use PhpStaticAnalysis\PsalmPlugin\Provider\AttributeStatementProvider;
use Psalm\Internal\Analyzer\ProjectAnalyzer;
use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;
use SimpleXMLElement;

class Plugin implements PluginEntryPointInterface
{
    public function __invoke(RegistrationInterface $registration, ?SimpleXMLElement $config = null): void
    {
        /** @psalm-suppress InternalMethod, InternalClass */
        $codebase = ProjectAnalyzer::getInstance()->getCodebase();
        $attributeStatementProvider = new AttributeStatementProvider($codebase->statements_provider);

        /** @psalm-suppress InvalidPropertyAssignmentValue */
        $codebase->statements_provider = $attributeStatementProvider; // @phpstan-ignore-line
    }
}
