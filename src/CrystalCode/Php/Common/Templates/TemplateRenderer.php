<?php

namespace CrystalCode\Php\Common\Templates;

final class TemplateRenderer extends TemplateRendererBase
{

    /**
     * 
     * @param iterable $values
     * @param int $options
     */
    public function __construct(iterable $values = [], int $options = 0)
    {
        parent::__construct($values, $options);
    }

}
