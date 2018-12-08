<?php

namespace CrystalCode\Php\Common\Templates;

use CrystalCode\Php\Common\Collections\Collection;

abstract class TemplateRendererBase implements TemplateRendererInterface
{

    /**
     *
     * @var array
     */
    private $values = [];

    /**
     * 
     * @param iterable $values
     */
    public function __construct(iterable $values = [])
    {
        $this->setValues($values);
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function render(TemplateContextInterface $templateContext): string
    {
        $templateContext = $templateContext->withValues($this->values);
        while ($templateContext->hasTemplate()) {
            $template = $templateContext->popTemplate();
            $rendered = $template->render($templateContext);
            $templateContext = $templateContext->withRendered($rendered);
        }
        return $templateContext->getRendered();
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function renderTemplate(TemplateInterface $template, TemplateContextInterface $templateContext = null): string
    {
        if ($templateContext === null) {
            $templateContext = new DefaultTemplateContext();
        }
        $templateContext->addTemplate($template);
        return $this->render($templateContext);
    }

    /**
     * 
     * @param string $name
     * @return mixed
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
     * @param string $name
     * @param mixed $value
     * @return TemplateContextInterface
     */
    final public function withValue(string $name, $value): TemplateContextInterface
    {
        $clone = clone $this;
        $clone->setValue($name, $value);
        return $clone;
    }

    /**
     * 
     * @param iterable $values
     * @return TemplateContextInterface
     */
    final public function withValues(iterable $values): TemplateContextInterface
    {
        $clone = clone $this;
        $clone->setValues($values);
        return $clone;
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
