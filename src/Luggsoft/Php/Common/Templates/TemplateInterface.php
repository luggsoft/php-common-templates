<?php

namespace Luggsoft\Php\Common\Templates;

interface TemplateInterface
{
    
    /**
     *
     * @param TemplateContextInterface $templateContext
     * @return string
     */
    function render(TemplateContextInterface $templateContext): string;
    
}
