<?php

namespace Luggsoft\Php\Common\Templates\Formatters;

final class DelegateFormatter implements FormatterInterface
{
    
    /**
     *
     * @var callable
     */
    private $callable;
    
    /**
     *
     * @param callable $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }
    
    /**
     *
     * @param string $input
     * @return string
     */
    public function format(string $input): string
    {
        return (string) call_user_func($this->callable, $input);
    }
    
}
