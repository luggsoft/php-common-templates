<?php

namespace CrystalCode\Php\Common\Templates;

interface TemplateContextInterface
{

    /**
     * 
     * @return string
     */
    function getRendered();

    /**
     * 
     * @param string $rendered
     * @return void
     */
    function setRendered($rendered);

    /**
     * 
     * @return bool
     */
    function hasTemplate();

    /**
     * 
     * @param TemplateInterface $template
     * @return void
     */
    function addTemplate(TemplateInterface $template);

    /**
     * 
     * @return TemplateInterface
     */
    function popTemplate();

}
