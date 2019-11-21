<?php

namespace Luggsoft\Php\Common\Templates;

use Exception;
use Luggsoft\Php\Common\Collections\Collection;

abstract class TemplateContextBase implements TemplateContextInterface
{
    
    /**
     *
     * @var array
     */
    private $values = [];
    
    /**
     *
     * @var string
     */
    private $rendered;
    
    /**
     *
     * @var array|TemplateInterface[]
     */
    private $templates = [];
    
    /**
     *
     * @var array|TemplateInterface[]
     */
    private $sectionTemplates = [];
    
    /**
     *
     * @param iterable $values
     * @param string $rendered
     * @param iterable|TemplateInterface[] $templates
     */
    public function __construct(iterable $values = [], string $rendered = null, iterable $templates = [])
    {
        $this->setValues($values);
        $this->setRendered($rendered);
        $this->addTemplates(...$templates);
    }
    
    /**
     *
     * @param iterable|TemplateInterface[] $templates
     * @return void
     */
    final public function addTemplates(TemplateInterface ...$templates): void
    {
        foreach ($templates as $template) {
            $this->templates[] = $template;
        }
    }
    
    /**
     *
     * @param string $name
     * @return mixed
     */
    final public function __get(string $name)
    {
        return $this->getValue($name);
    }
    
    /**
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    final public function __set(string $name, $value)
    {
        $this->setValue($name, $value);
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function getValue(string $name)
    {
        if (isset($this->values[$name])) {
            return $this->values[$name];
        }
        
        return null;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function setValue(string $name, $value): void
    {
        $this->values[$name] = $value;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function withValue(string $name, $value): TemplateContextInterface
    {
        $clone = clone $this;
        $clone->setValue($name, $value);
        return $clone;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    public function getValues(): iterable
    {
        return $this->values;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function setValues(iterable $values): void
    {
        foreach (Collection::create($values) as $name => $value) {
            $this->setValue($name, $value);
        }
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function getRendered(): string
    {
        return $this->rendered;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function setRendered(string $rendered = null): void
    {
        $this->rendered = (string) $rendered;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function withRendered(string $rendered = null): TemplateContextInterface
    {
        $clone = clone $this;
        $clone->setRendered($rendered);
        return $clone;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function hasTemplate(): bool
    {
        return count($this->templates) > 0;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function popTemplate(): TemplateInterface
    {
        return array_pop($this->templates);
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function hasSectionTemplate(string $name): bool
    {
        return isset($this->sectionTemplates[$name]);
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function withSectionTemplate(string $name, TemplateInterface $template): TemplateContextInterface
    {
        $clone = clone $this;
        $clone->setSectionTemplate($name, $template);
        return $clone;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function setSectionTemplate(string $name, TemplateInterface $template): void
    {
        $this->sectionTemplates[$name] = $template;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function renderSectionTemplate(string $name, iterable $values = []): string
    {
        $templateContext = $this->withValues($values);
        return $this->getSectionTemplate($name)->render($templateContext);
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function withValues(iterable $values): TemplateContextInterface
    {
        $clone = clone $this;
        $clone->setValues($values);
        return $clone;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    final public function getSectionTemplate(string $name): TemplateInterface
    {
        if (isset($this->sectionTemplates[$name])) {
            return $this->sectionTemplates[$name];
        }
        throw new Exception();
    }
    
}
