<?php

namespace Luggsoft\Php\Common\Templates;

interface TemplateRendererInterface extends TemplateInterface
{
    
    /**
     *
     * @param TemplateInterface $template
     * @param TemplateContextInterface $templateContext
     * @return string
     */
    function renderTemplate(TemplateInterface $template, TemplateContextInterface $templateContext = null): string;
    
}
