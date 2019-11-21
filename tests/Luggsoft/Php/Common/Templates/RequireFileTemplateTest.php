<?php

namespace Luggsoft\Php\Common\Templates;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class RequireFileTemplateTest extends TestCase
{
    
    /**
     *
     * @return void
     */
    public function test1(): void
    {
        $expectPath = sprintf('%s/RequireFileTemplateTest/test1_expect.txt', __DIR__);
        $templatePath = sprintf('%s/RequireFileTemplateTest/test1.txt', __DIR__);
        $template = new RequireFileTemplate($templatePath);
        $templateContext = new TemplateContext();
        $actual = $template->render($templateContext);
        $this->assertStringEqualsFile($expectPath, $actual);
    }
    
    /**
     *
     * @return void
     */
    public function test2(): void
    {
        $expectPath = sprintf('%s/RequireFileTemplateTest/test2_expect.txt', __DIR__);
        $templatePath = sprintf('%s/RequireFileTemplateTest/test2.php', __DIR__);
        $template = new RequireFileTemplate($templatePath);
        $templateContext = new TemplateContext();
        $actual = $template->render($templateContext);
        $this->assertStringEqualsFile($expectPath, $actual);
    }
    
    /**
     *
     * @return void
     */
    public function test3(): void
    {
        $this->expectException(FileNotFoundException::class);
        $templatePath = sprintf('%s/RequireFileTemplateTest/file_not_found.php', __DIR__);
        new RequireFileTemplate($templatePath);
    }
    
}
