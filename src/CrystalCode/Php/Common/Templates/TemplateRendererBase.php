<?php

namespace CrystalCode\Php\Common\Templates;

use CrystalCode\Php\Common\Collections\Collection;

abstract class TemplateRendererBase implements TemplateRendererInterface
{

    /**
     * 
     * @var int
     */
    const OPTION_TRIM_RENDERED = 1;

    /**
     *
     * @var array
     */
    private $values = [];

    /**
     *
     * @var int
     */
    private $options = 0;

    /**
     * 
     * @param iterable $values
     * @param int $options
     */
    public function __construct(iterable $values = [], int $options = 0)
    {
        $this->setValues($values);
        $this->options = $options;
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

            if ($this->hasOptions(self::OPTION_TRIM_RENDERED)) {
                $rendered = ltrim($rendered);
            }

            $templateContext = $templateContext->withRendered($rendered);
        }

        $rendered = $templateContext->getRendered();

        if ($this->hasOptions(self::OPTION_TRIM_RENDERED)) {
            return trim($rendered);
        }

        return $rendered;
    }

    /**
     * 
     * {@inheritdoc}
     */
    final public function renderTemplate(TemplateInterface $template, TemplateContextInterface $templateContext = null): string
    {
        if ($templateContext === null) {
            $templateContext = new TemplateContext();
        }

        $templateContext->addTemplates($template);
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
     * @return TemplateRendererBase
     */
    final public function withValue(string $name, $value): TemplateRendererBase
    {
        $clone = clone $this;
        $clone->setValue($name, $value);
        return $clone;
    }

    /**
     * 
     * @param iterable $values
     * @return TemplateRendererBase
     */
    final public function withValues(iterable $values): TemplateRendererBase
    {
        $clone = clone $this;
        $clone->setValues($values);
        return $clone;
    }

    /**
     * 
     * @param int $options
     * @return bool
     */
    final public function hasOptions(int $options): bool
    {
        return ($this->options & $options) === $options;
    }

    /**
     * 
     * @param int $options
     * @return TemplateRendererBase
     */
    final public function withOptions(int $options): TemplateRendererBase
    {
        $clone = clone $this;
        $clone->setOptions($options);
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

    /**
     * 
     * @param int $options
     * @return void
     */
    final protected function setOptions(int $options): void
    {
        $this->options = $this->options | $options;
    }

}
