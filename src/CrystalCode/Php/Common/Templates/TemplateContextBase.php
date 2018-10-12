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
     * @param string $rendered
     * @param array|TemplateInterface[] $templates
     */
    public function __construct($values = [], $rendered = null, array $templates = [])
    {
        $this->setValues($values);
        $this->setRendered($rendered);
        $this->addTemplates($templates);
    }

    /**
     * 
     * @param string $name
     * @return mixed
     */
    final public function __get($name)
    {
        return $this->getValue($name);
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    final public function __set($name, $value)
    {
        $this->setValue($name, $value);
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function getValue($name)
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
    final public function withValue($name, $value)
    {
        $clone = clone $this;
        $clone->setValue($name, $value);
        return $clone;
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function withValues($values)
    {
        $clone = clone $this;
        $clone->setValues($values);
        return $clone;
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function getRendered()
    {
        return $this->rendered;
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function withRendered($rendered)
    {
        $clone = clone $this;
        $clone->setRendered($rendered);
        return $clone;
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function hasTemplate()
    {
        return count($this->templates) > 0;
    }

    /**
     * 
     * @param array|TemplateInterface[] $templates
     * @return void
     */
    final public function addTemplates(array $templates)
    {
        foreach ($templates as $template) {
            $this->addTemplate($template);
        }
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function addTemplate(TemplateInterface $template)
    {
        array_push($this->templates, $template);
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function popTemplate()
    {
        return array_pop($this->templates);
    }

    /**
     * 
     * @param string $rendered
     * @return void
     */
    final protected function setRendered($rendered)
    {
        $this->rendered = (string) $rendered;
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    final protected function setValue($name, $value)
    {
        $this->values[(string) $name] = $value;
    }

    /**
     * 
     * @param mixed[] $values
     * @return void
     */
    final protected function setValues($values)
    {
        foreach (Collection::create($values) as $name => $value) {
            $this->setValue($name, $value);
        }
    }

}
