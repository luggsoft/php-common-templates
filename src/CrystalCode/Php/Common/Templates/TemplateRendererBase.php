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
     * @param mixed $values
     */
    public function __construct($values = [])
    {
        $this->setValues($values);
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function render(TemplateContextInterface $templateContext)
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
    final public function renderTemplate(TemplateInterface $template, TemplateContextInterface $templateContext = null)
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
    final public function getValue($name)
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
    final public function withValue($name, $value)
    {
        $clone = clone $this;
        $clone->setValue($name, $value);
        return $clone;
    }

    /**
     * 
     * @param mixed $values
     * @return TemplateContextInterface
     */
    final public function withValues($values)
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
