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
     * @var array|FormatterInterface[]
     */
    private $formatters = [];

    /**
     * 
     * @param iterable $values
     * @param iterable|FormatterInterface[] $formatters
     */
    public function __construct(iterable $values = [], iterable $formatters = [])
    {
        $this->setValues($values);
        $this->addFormatters(...$formatters);
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

        $rendered = $templateContext->getRendered();

        foreach ($this->formatters as $formatter) {
            $rendered = $formatter->format($rendered);
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
     * @return void
     */
    final public function setValue(string $name, $value): void
    {
        $this->values[$name] = $value;
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
     * @return array
     */
    final public function getValues(): array
    {
        return $this->values;
    }

    /**
     * 
     * @param iterable $values
     * @return void
     */
    final public function setValues(iterable $values): void
    {
        foreach (Collection::create($values) as $name => $value) {
            $this->setValue($name, $value);
        }
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
     * @return array|FormatterInterface[]
     */
    final public function getFormatters(): array
    {
        return $this->formatters;
    }

    /**
     * 
     * @param iterable|FormatterInterface[] $formatters
     * @return void
     */
    final public function addFormatters(FormatterInterface ...$formatters): void
    {
        foreach ($formatters as $formatter) {
            $this->formatters[] = $formatter;
        }
    }

    /**
     * 
     * @param iterable|FormatterInterface[] $formatters
     * @return TemplateRendererBase
     */
    final public function withFormatters(FormatterInterface ...$formatters): TemplateRendererBase
    {
        $clone = clone $this;
        $clone->addFormatters(...$formatters);
        return $clone;
    }

}
