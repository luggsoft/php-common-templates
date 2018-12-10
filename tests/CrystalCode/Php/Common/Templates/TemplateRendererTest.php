<?php

namespace CrystalCode\Php\Common\Templates;

use PHPUnit\Framework\TestCase;

class TemplateRendererTest extends TestCase
{

    /**
     * 
     * @return void
     */
    public function testRenderTemplate1(): void
    {
        $templateRenderer = new TemplateRenderer();
        $template = new Template(function () {
            echo 'Hello world';
        });
        $rendered = $templateRenderer->renderTemplate($template);
        $this->assertEquals('Hello world', $rendered);
    }

    /**
     * 
     * @return void
     */
    public function testRenderTemplate2(): void
    {
        $templateRenderer = new TemplateRenderer([], TemplateRenderer::OPTION_TRIM_RENDERED);
        $template = new FooTemplate();
        $templateContext = new TemplateContext();
        $rendered = $templateRenderer->renderTemplate($template, $templateContext);
        $expected = 'Foo' . PHP_EOL .
          'Bar' . PHP_EOL .
          'Qux';
        $this->assertEquals($expected, $rendered);
    }

    /**
     * 
     * @return void
     */
    public function testRenderTemplate3(): void
    {
        $templateRenderer = new TemplateRenderer([], TemplateRenderer::OPTION_TRIM_RENDERED);
        $template = new BarTemplate();
        $templateContext = new TemplateContext();
        $rendered = $templateRenderer->renderTemplate($template, $templateContext);
        $expected = 'Bar' . PHP_EOL .
          'Qux';
        $this->assertEquals($expected, $rendered);
    }

    /**
     * 
     * @return void
     */
    public function testRenderTemplate4(): void
    {

        $templateRenderer = new TemplateRenderer([], TemplateRenderer::OPTION_TRIM_RENDERED);
        $template = new QuxTemplate();
        $templateContext = new TemplateContext();
        $rendered = $templateRenderer->renderTemplate($template, $templateContext);
        $expected = 'Qux';
        $this->assertEquals($expected, $rendered);
    }

}
