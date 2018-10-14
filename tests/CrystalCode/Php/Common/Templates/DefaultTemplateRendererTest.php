<?php

namespace CrystalCode\Php\Common\Templates;

use PHPUnit\Framework\TestCase;

class DefaultTemplateRendererTest extends TestCase
{

    /**
     * 
     * @return void
     */
    public function testRenderTemplate()
    {
        $templateRenderer = new DefaultTemplateRenderer();
        $template = new Template(function () {
            echo 'Hello world';
        });
        $rendered = $templateRenderer->renderTemplate($template);
        $this->assertEquals('Hello world', $rendered);
    }

}
