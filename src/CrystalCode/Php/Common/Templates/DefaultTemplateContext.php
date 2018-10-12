<?php

namespace CrystalCode\Php\Common\Templates;

final class DefaultTemplateContext extends TemplateContextBase
{

    /**
     * 
     * @param iterable $values
     * @param string $rendered
     * @param iterable|TemplateInterface[] $templates
     */
    public function __construct(iterable $values = [], string $rendered = null, iterable $templates = [])
    {
        parent::__construct($values, $rendered, $templates);
    }

}
