<?php

namespace CrystalCode\Php\Common\Templates;

final class DefaultTemplateRenderer extends TemplateRendererBase
{

    /**
     * 
     * @param iterable $values
     */
    public function __construct(iterable $values = [])
    {
        parent::__construct($values);
    }

}
