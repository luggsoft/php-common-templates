<?php

namespace CrystalCode\Php\Common\Templates;

use CrystalCode\Php\Common\Collections\Collection;

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
    final public function getRendered(): string
    {
        return $this->rendered;
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
     * {@inheritdoc}
     */
    final public function popTemplate(): TemplateInterface
    {
        return array_pop($this->templates);
    }

    /**
     * 
     * @param string $rendered
     * @return void
     */
    final protected function setRendered(string $rendered = null): void
    {
        $this->rendered = (string) $rendered;
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    final protected function setValue(string $name, $value): void
    {
        $this->values[$name] = $value;
    }

    /**
     * 
     * @param iterable $values
     * @return void
     */
    final protected function setValues(iterable $values): void
    {
        foreach (Collection::create($values) as $name => $value) {
            $this->setValue($name, $value);
        }
    }

}
