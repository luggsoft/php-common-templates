<?php

namespace CrystalCode\Php\Common\Templates;

final class RequireFileTemplate extends FileTemplateBase
{

    /**
     * 
     * @param string $path
     */
    public function __construct($path)
    {
        parent::__construct($path);
    }

    /**
     * 
     * {@inheritdoc}
     */
    protected function execute(TemplateContextInterface $templateContext)
    {
        $template = $this;
        call_user_func(function () use ($template, $templateContext) {
            require_once $template->getPath();
        });
    }

}
