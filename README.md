# PHP Static Analysis Attributes Psalm Plugin
[![Continuous Integration](https://github.com/php-static-analysis/psalm-plugin/workflows/All%20Tests/badge.svg)](https://github.com/php-static-analysis/psalm-plugin/actions)
[![Latest Stable Version](https://poser.pugx.org/php-static-analysis/psalm-plugin/v/stable)](https://packagist.org/packages/php-static-analysis/psalm-plugin)
[![PHP Version Require](http://poser.pugx.org/php-static-analysis/psalm-plugin/require/php)](https://packagist.org/packages/php-static-analysis/psalm-plugin)
[![License](https://poser.pugx.org/php-static-analysis/psalm-plugin/license)](https://github.com/php-static-analysis/psalm-plugin/blob/main/LICENSE)
[![Total Downloads](https://poser.pugx.org/php-static-analysis/psalm-plugin/downloads)](https://packagist.org/packages/php-static-analysis/psalm-plugin/stats)

Since the release of PHP 8.0 more and more libraries, frameworks and tools have been updated to use attributes instead of annotations in PHPDocs.

However, static analysis tools like Psalm have not made this transition to attributes and they still rely on annotations in PHPDocs for a lot of their functionality.

This is a Psalm plugin that allows Psalm to understand a new set of attributes that replace the PHPDoc annotations. These attributes are defined in [this repository](https://github.com/php-static-analysis/attributes)

## Example

In order to show how code would look with these attributes, we can look at the following example. This is how a class looks like with the current annotations:

```php
<?php

class ArrayAdder
{
    /** @var array<string>  */
    private array $result;

    /**
     * @param array<string> $array1
     * @param array<string> $array2
     * @return array<string>
     */
    public function addArrays(array $array1, array $array2): array
    {
        $this->result = $array1 + $array2;
        return $this->result;
    }
}
```

And this is how it would look like using the new attributes:

```php
<?php

use PhpStaticAnalysis\Attributes\Type;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;

class ArrayAdder
{
    #[Type('array<string>')]
    private array $result;

    #[Param(array1: 'array<string>')]
    #[Param(array2: 'array<string>')]
    #[Returns('array<string>')]
    public function addArrays(array $array1, array $array2): array
    {
        $this->array = $array1 + $array2;
        return $this->array;
    }
}
```

## Installation

First of all, to make the attributes available for your codebase use:

```
composer require php-static-analysis/attributes
```

To use this plugin, require it in Composer:

```
composer require --dev php-static-analysis/psalm-plugin
```

Then run this command to enable the plugin:

```
vendor/bin/psalm-plugin enable php-static-analysis/psalm-plugin
```

This will add this plugin configuration to the `psalm.xml` configuration file:

```xml
    <plugins>
        <pluginClass class="PhpStaticAnalysis\PsalmPlugin\Plugin" />
    </plugins>
```

If you prefer, you can also manually add this configuration to your `psalm.xml` file instead of running the `psalm-plugin enable` command.

## Using the extension

This extension works by interacting with the parser that Psalm uses to parse the code and replacing the new Attributes with PHPDoc annotations that Psalm can understand. The functionality provided by the attribute is exactly the same as the one provided by the corresponding PHPDoc annotation.

These are the available attributes and their corresponding PHPDoc annotations:

| Attribute                                                                                         | PHPDoc Annotations |
|---------------------------------------------------------------------------------------------------|--------------------|
| [Deprecated](https://github.com/php-static-analysis/attributes/blob/main/doc/Deprecated.md)                        | `@deprecated`                        |
| [Impure](https://github.com/php-static-analysis/attributes/blob/main/doc/Impure.md)                                | `@impure`                            |
| [Internal](https://github.com/php-static-analysis/attributes/blob/main/doc/Internal.md)                            | `@internal`                          |
| [IsReadOnly](https://github.com/php-static-analysis/attributes/blob/main/doc/IsReadOnly.md)                        | `@readonly`                          |
| [Method](https://github.com/php-static-analysis/attributes/blob/main/doc/Method.md)                                | `@method`                            |
| [Mixin](https://github.com/php-static-analysis/attributes/blob/main/doc/Mixin.md)                                  | `@mixin`                             |
| [Param](https://github.com/php-static-analysis/attributes/blob/main/doc/Param.md)                                  | `@param`                             |
| [ParamOut](https://github.com/php-static-analysis/attributes/blob/main/doc/ParamOut.md)                            | `@param-out`                         |
| [Property](https://github.com/php-static-analysis/attributes/blob/main/doc/Property.md)                            | `@property` `@var`                   |
| [PropertyRead](https://github.com/php-static-analysis/attributes/blob/main/doc/PropertyRead.md)                    | `@property-read`                     |
| [PropertyWrite](https://github.com/php-static-analysis/attributes/blob/main/doc/PropertyWrite.md)                  | `@property-write`                    |
| [Pure](https://github.com/php-static-analysis/attributes/blob/main/doc/Pure.md)                                    | `@pure`                              |
| [RequireExtends](https://github.com/php-static-analysis/attributes/blob/main/doc/RequireExtends.md)                | `@require-extends`                   |
| [RequireImplements](https://github.com/php-static-analysis/attributes/blob/main/doc/RequireImplements.md)          | `@require-implements`                |
| [Returns](https://github.com/php-static-analysis/attributes/blob/main/doc/Returns.md)                              | `@return`                            |
| [SelfOut](https://github.com/php-static-analysis/attributes/blob/main/doc/SelfOut.md)                              | `@self-out` `@this-out`              |
| [Template](https://github.com/php-static-analysis/attributes/blob/main/doc/Template.md)                            | `@template`                          |
| [TemplateCovariant](https://github.com/php-static-analysis/attributes/blob/main/doc/TemplateCovariant.md)          | `@template-covariant`                |
| [TemplateExtends](https://github.com/php-static-analysis/attributes/blob/main/doc/TemplateExtends.md)              | `@extends` `@template-extends`       |
| [TemplateImplements](https://github.com/php-static-analysis/attributes/blob/main/doc/TemplateImplements.md)        | `@implements` `@template-implements` |
| [TemplateUse](https://github.com/php-static-analysis/attributes/blob/main/doc/TemplateUse.md)                      | `@use` `@template-use`               |
| [Type](https://github.com/php-static-analysis/attributes/blob/main/doc/Type.md)                                    | `@var` `@return`                     |
