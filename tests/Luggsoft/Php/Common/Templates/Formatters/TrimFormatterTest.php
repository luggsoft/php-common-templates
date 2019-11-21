<?php

namespace Luggsoft\Php\Common\Templates\Formatters;

use PHPUnit\Framework\TestCase;

class TrimFormatterTest extends TestCase
{
    
    /**
     *
     * @return void
     */
    function test1(): void
    {
        $expect = 'Hello world.';
        $formatter = new TrimFormatter();
        $actual = $formatter->format('  
            Hello world.
        ');
        $this->assertEquals($expect, $actual);
    }
    
    /**
     *
     * @return void
     */
    function test2(): void
    {
        $expect = 'Hello world.';
        $formatter = new TrimFormatter('#', '@');
        $actual = $formatter->format('@@@#Hello world.###@');
        $this->assertEquals($expect, $actual);
    }
    
}
