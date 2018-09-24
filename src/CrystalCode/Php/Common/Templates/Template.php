<?php

namespace CrystalCode\Php\Common\Templates;

final class Template extends TemplateBase
{

    /**
     *
     * @var callable
     */
    private $executeCallable;

    /**
     * 
     * @param callable $executeCallable
     */
    public function __construct(callable $executeCallable)
    {
        $this->executeCallable = $executeCallable;
    }

    /**
     * 
     * @param TemplateContextInterface $templateContext
     * @return void
     */
    protected function execute(TemplateContextInterface $templateContext)
    {
        call_user_func($this->executeCallable, $templateContext);
    }

}
