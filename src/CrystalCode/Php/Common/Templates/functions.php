<?php

namespace CrystalCode\Php\Common\Templates;

/**
 * 
 * @param callable $executeCallable
 * @param TemplateContextInterface $templateContext
 * @param TemplateRendererInterface $templateRenderer
 * @return string
 */
function render(callable $executeCallable, TemplateContextInterface $templateContext = null, TemplateRendererInterface $templateRenderer = null)
{
    if ($templateContext === null) {
        $templateContext = new DefaultTemplateContext();
    }
    if ($templateRenderer === null) {
        $templateRenderer = new DefaultTemplateRenderer();
    }
    $template = new Template($executeCallable);
    return $templateRenderer->renderTemplate($template, $templateContext);
}
