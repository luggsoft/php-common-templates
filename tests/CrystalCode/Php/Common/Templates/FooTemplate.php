<?php

namespace CrystalCode\Php\Common\Templates;

final class FooTemplate extends TemplateBase
{

    /**
     * 
     * {@inheritdoc}
     */
    protected function execute(TemplateContextInterface $templateContext): void
    {
        $templateContext->addTemplate(new BarTemplate);
        echo 'Foo';
        echo PHP_EOL;
    }

}
