<?php

namespace CrystalCode\Php\Common\Templates;

abstract class TemplateRendererBase implements TemplateRendererInterface
{

    /**
     * 
     * @param TemplateContextInterface $templateContext
     * @return string
     */
    final public function render(TemplateContextInterface $templateContext)
    {
        while ($templateContext->hasTemplate()) {
            $template = $templateContext->popTemplate();
            $rendered = $template->render($templateContext);
            $templateContext->setRendered($rendered);
        }
        return $templateContext->getRendered();
    }

    /**
     * 
     * @param TemplateInterface $template
     * @param TemplateContextInterface $templateContext
     * @return string
     */
    final public function renderTemplate(TemplateInterface $template, TemplateContextInterface $templateContext = null)
    {
        if ($templateContext === null) {
            $templateContext = new TemplateContext();
        }
        $templateContext->addTemplate($template);
        return $this->render($templateContext);
    }

}
