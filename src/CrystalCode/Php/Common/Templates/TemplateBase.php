<?php

namespace CrystalCode\Php\Common\Templates;

use Exception;

abstract class TemplateBase implements TemplateInterface
{

    /**
     * 
     * @param TemplateContextInterface $templateContext
     * @return string
     * @throws Exception
     */
    final public function render(TemplateContextInterface $templateContext)
    {
        $level = ob_get_level();
        try {
            ob_start();
            $this->execute($templateContext);
            return (string) ob_get_clean();
        }
        catch (Exception $exception) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }
            throw $exception;
        }
    }

    /**
     * 
     * @param TemplateContextInterface $templateContext
     * @return void
     */
    abstract protected function execute(TemplateContextInterface $templateContext);

}
