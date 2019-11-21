<?php

namespace Luggsoft\Php\Common\Templates\Formatters;

use PHPUnit\Framework\TestCase;

class CompositeFormatterTest extends TestCase
{
    
    /**
     *
     * @return void
     */
    public function test1(): void
    {
        
        $expect = 'Hello world.';
        $formatter = new CompositeFormatter(...[
            new TrimFormatter('!', '?'),
            new TrimFormatter('@', '#'),
        ]);
        $actual = $formatter->format('!?@#Hello world.#@?!');
        $this->assertEquals($expect, $actual);
    }
    
}
