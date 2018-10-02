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
     * @return TemplateContextInterface
     */
    function withRendered($rendered);

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

    /**
     * 
     * @param string $name
     * @return mixed
     */
    function getValue($name);

    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return TemplateContextInterface
     */
    function withValue($name, $value);

    /**
     * 
     * @param mixed $values
     * @return TemplateContextInterface
     */
    function withValues($values);

}
