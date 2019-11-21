<?php

namespace Luggsoft\Php\Common\Templates;

final class DelegateTemplate extends TemplateBase
{
    
    /**
     *
     * @var callable
     */
    private $callable;
    
    /**
     *
     * @param callable $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    protected function execute(TemplateContextInterface $templateContext): void
    {
        call_user_func($this->callable, $templateContext);
    }
    
}
