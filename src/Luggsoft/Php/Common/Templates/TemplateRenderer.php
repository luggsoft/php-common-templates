<?php

namespace Luggsoft\Php\Common\Templates;

final class TemplateRenderer extends TemplateRendererBase
{
    
    /**
     *
     * @param iterable $values
     * @param iterable|FormatterInterface[] $formatters
     */
    public function __construct(iterable $values = [], iterable $formatters = [])
    {
        parent::__construct($values, $formatters);
    }
    
}
