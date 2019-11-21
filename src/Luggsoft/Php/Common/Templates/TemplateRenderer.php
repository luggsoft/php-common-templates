<?php

namespace Luggsoft\Php\Common\Templates;

use Luggsoft\Php\Common\Templates\Formatters\FormatterInterface;

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
