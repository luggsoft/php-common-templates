<?php

namespace Luggsoft\Php\Common\Templates;

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
     */
    function setRendered(string $rendered = null): void;
    
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
     * @param string $name
     * @param type $value
     * @return void
     */
    function setValue(string $name, $value): void;
    
    /**
     *
     * @param string $name
     * @param mixed $value
     * @return TemplateContextInterface
     */
    function withValue(string $name, $value): TemplateContextInterface;
    
    /**
     *
     * @return iterable
     */
    function getValues(): iterable;
    
    /**
     *
     * @param iterable $values
     * @return void
     */
    function setValues(iterable $values): void;
    
    /**
     *
     * @param iterable $values
     * @return TemplateContextInterface
     */
    function withValues(iterable $values): TemplateContextInterface;
    
    /**
     *
     * @param string $name
     * @return bool
     */
    function hasSectionTemplate(string $name): bool;
    
    /**
     *
     * @param string $name
     * @return TemplateInterface
     * @throws Exception
     */
    function getSectionTemplate(string $name): TemplateInterface;
    
    /**
     *
     * @param string $name
     * @param TemplateInterface $template
     */
    function setSectionTemplate(string $name, TemplateInterface $template): void;
    
    /**
     *
     * @param string $name
     * @param TemplateInterface $template
     * @return TemplateContextInterface
     */
    function withSectionTemplate(string $name, TemplateInterface $template): TemplateContextInterface;
    
    /**
     *
     * @param string $name
     * @return string
     */
    function renderSectionTemplate(string $name): string;
    
}
