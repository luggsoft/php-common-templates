<?php

namespace CrystalCode\Php\Common\Templates;

final class BarTemplate extends TemplateBase
{

    /**
     * 
     * {@inheritdoc}
     */
    protected function execute(TemplateContextInterface $templateContext): void
    {
        $templateContext->addTemplates(new QuxTemplate);
        echo $templateContext->getRendered();
        echo 'Bar';
        echo PHP_EOL;
    }

}
