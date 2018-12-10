<?php

use CrystalCode\Php\Common\Templates\BarTemplate;
use CrystalCode\Php\Common\Templates\FooTemplate;
use CrystalCode\Php\Common\Templates\QuxTemplate;
use CrystalCode\Php\Common\Templates\TemplateContext;
use CrystalCode\Php\Common\Templates\TemplateRenderer;

(function () {
    require_once sprintf('%s/../vendor/autoload.php', __DIR__);
})();

(function () {
    foreach ([
      new FooTemplate,
      new BarTemplate,
      new QuxTemplate,
    ] as $template) {
        var_dump($template);
        $templateRenderer = new TemplateRenderer([], TemplateRenderer::OPTION_TRIM_RENDERED);
        $templateContext = new TemplateContext();
        $rendered = $templateRenderer->renderTemplate($template, $templateContext);
        var_dump($rendered);
    }
})();
