<?php

namespace CrystalCode\Php\Common\Templates;

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
