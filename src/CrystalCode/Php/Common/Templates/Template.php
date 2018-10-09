<?php

namespace CrystalCode\Php\Common\Templates;

final class Template extends TemplateBase
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
    protected function execute(TemplateContextInterface $templateContext)
    {
        call_user_func($this->callable, $templateContext);
    }

}
