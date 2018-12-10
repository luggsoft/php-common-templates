<?php

namespace CrystalCode\Php\Common\Templates;

interface TemplateContextInterface
{

    /**
     * 
     * @return string
     */
    function getRendered(): string;

    /**
     * 
     * @param string $rendered
     * @return TemplateContextInterface
     */
    function withRendered(string $rendered = null): TemplateContextInterface;

    /**
     * 
     * @return bool
     */
    function hasTemplate(): bool;

    /**
     * 
     * @param iterable|TemplateInterface[] $templates
     * @return void
     */
    function addTemplates(TemplateInterface ...$template): void;

    /**
     * 
     * @return TemplateInterface
     */
    function popTemplate(): TemplateInterface;

    /**
     * 
     * @param string $name
     * @return mixed
     */
    function getValue(string $name);

    /**
     * 
     * @param iterable $values
     * @return TemplateContextInterface
     */
    function withValues(iterable $values): TemplateContextInterface;

    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return TemplateContextInterface
     */
    function withValue(string $name, $value): TemplateContextInterface;

}
