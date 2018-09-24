<?php

namespace CrystalCode\Php\Common\Templates;

abstract class TemplateContextBase implements TemplateContextInterface
{

    /**
     *
     * @var string
     */
    private $rendered;

    /**
     *
     * @var array|TemplateInterface[]
     */
    private $templates = [];

    /**
     * 
     * @param string $rendered
     * @param array|TemplateInterface[] $templates
     */
    public function __construct($rendered = null, array $templates = [])
    {
        $this->setRendered($rendered);
        $this->addTemplates($templates);
    }

    /**
     * 
     * @return string
     */
    final public function getRendered()
    {
        return $this->rendered;
    }

    /**
     * 
     * @param string $rendered
     * @return void
     */
    final public function setRendered($rendered)
    {
        $this->rendered = (string) $rendered;
    }

    /**
     * 
     * @return bool
     */
    final public function hasTemplate()
    {
        return count($this->templates) > 0;
    }

    /**
     * 
     * @param array|TemplateInterface[] $templates
     * @return void
     */
    final public function addTemplates(array $templates)
    {
        foreach ($templates as $template) {
            $this->addTemplate($template);
        }
    }

    /**
     * 
     * @param TemplateInterface $template
     * @return void
     */
    final public function addTemplate(TemplateInterface $template)
    {
        array_push($this->templates, $template);
    }

    /**
     * 
     * @return TemplateInterface
     */
    final public function popTemplate()
    {
        return array_pop($this->templates);
    }

}
