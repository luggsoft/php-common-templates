<?php

namespace CrystalCode\Php\Common\Templates;

final class QuxTemplate extends TemplateBase
{

    /**
     * 
     * {@inheritdoc}
     */
    protected function execute(TemplateContextInterface $templateContext): void
    {
        echo $templateContext->getRendered();
        echo 'Qux';
        echo PHP_EOL;
    }

}
