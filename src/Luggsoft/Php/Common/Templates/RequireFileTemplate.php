<?php

namespace Luggsoft\Php\Common\Templates;

final class RequireFileTemplate extends FileTemplateBase
{
    
    /**
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        parent::__construct($path);
    }
    
    /**
     *
     * {@inheritdoc}
     */
    protected function execute(TemplateContextInterface $templateContext): void
    {
        $template = $this;
        call_user_func(function () use ($template, $templateContext) {
            require_once $template->getPath();
        });
    }
    
}
