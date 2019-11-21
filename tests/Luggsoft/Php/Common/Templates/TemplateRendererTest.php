<?php

namespace Luggsoft\Php\Common\Templates;

use PHPUnit\Framework\TestCase;

class TemplateRendererTest extends TestCase
{
    
    /**
     *
     * @return void
     */
    public function test1(): void
    {
        $expect = 'Hello world.';
        $templateRenderer = new TemplateRenderer();
        $template = new DelegateTemplate(function () {
            echo 'Hello world.';
        });
        $actual = $templateRenderer->renderTemplate($template);
        $this->assertEquals($expect, $actual);
    }
    
    /**
     *
     * @return void
     */
    public function test2(): void
    {
        $expect = 'Hello world. Goodbye universe.';
        $templateRenderer = new TemplateRenderer();
        $template = new DelegateTemplate(function (TemplateContextInterface $templateContext) {
            $templateContext->addTemplates(new DelegateTemplate(function (TemplateContextInterface $templateContext) {
                echo $templateContext->getRendered();
                echo ' ';
                echo 'Goodbye universe.';
            }));
            echo 'Hello world.';
        });
        $actual = $templateRenderer->renderTemplate($template);
        $this->assertEquals($expect, $actual);
    }
    
    /**
     *
     * @return void
     */
    public function test3(): void
    {
        $expect = 'Hello world. Goodbye universe. Foo bar qux.';
        $templateRenderer = new TemplateRenderer();
        $template = new DelegateTemplate(function (TemplateContextInterface $templateContext) {
            $templateContext->addTemplates(new DelegateTemplate(function (TemplateContextInterface $templateContext) {
                $templateContext->addTemplates(new DelegateTemplate(function (TemplateContextInterface $templateContext) {
                    echo $templateContext->getRendered();
                    echo ' ';
                    echo 'Foo bar qux.';
                }));
                echo $templateContext->getRendered();
                echo ' ';
                echo 'Goodbye universe.';
            }));
            echo 'Hello world.';
        });
        $actual = $templateRenderer->renderTemplate($template);
        $this->assertEquals($expect, $actual);
    }
    
}
