<?php

namespace CrystalCode\Php\Common\Templates;

final class DefaultTemplateContext extends TemplateContextBase
{

    /**
     * 
     * @param mixed $values
     * @param string $rendered
     * @param TemplateInterface[] $templates
     */
    public function __construct($values = [], $rendered = null, mixed $templates = [])
    {
        parent::__construct($values, $rendered, $templates);
    }

}
