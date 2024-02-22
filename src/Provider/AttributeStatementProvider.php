<?php

declare(strict_types=1);

namespace PhpStaticAnalysis\PsalmPlugin\Provider;

use Exception;
use PhpParser\Node\Stmt;
use PhpParser\NodeTraverser;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;
use PhpStaticAnalysis\NodeVisitor\AttributeNodeVisitor;
use Psalm\Internal\Provider\StatementsProvider;
use Psalm\Progress\Progress;

class AttributeStatementProvider
{
    private StatementsProvider $statementsProvider;

    public function __construct(StatementsProvider $statementsProvider)
    {
        $this->statementsProvider = $statementsProvider;
    }

    #[Returns('Stmt[]')]
    public function getStatementsForFile(
        string $file_path,
        int $analysis_php_version_id,
        ?Progress $progress = null
    ): array {
        /** @psalm-suppress InternalMethod */
        $ast = $this->statementsProvider->getStatementsForFile(
            $file_path,
            $analysis_php_version_id,
            $progress
        );
        return $this->traverseAst($ast);
    }

    #[Param(args: 'mixed[]')]
    public function __call(string $method, array $args): mixed
    {
        $callable = [$this->statementsProvider, $method];

        if (is_callable($callable)) {
            return call_user_func_array($callable, $args);
        }

        throw new Exception("Undefined method $method in base StatementsProvider class.");
    }

    public function __get(string $property): mixed
    {
        if (property_exists($this->statementsProvider, $property)) {
            return $this->statementsProvider->$property;
        }
        return null;
    }

    public function __set(string $property, mixed $value)
    {
        $this->statementsProvider->$property = $value;
    }

    #[Param(ast: 'Stmt[]')]
    #[Returns('Stmt[]')]
    private function traverseAst(array $ast): array
    {
        $traverser = new NodeTraverser();
        $nodeVisitor = new AttributeNodeVisitor('psalm');
        $traverser->addVisitor($nodeVisitor);

        $ast = $traverser->traverse($ast);
        /** @var Stmt[] $ast */
        return $ast;
    }
}
