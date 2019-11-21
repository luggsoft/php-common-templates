<?php

namespace Luggsoft\Php\Common\Templates\Formatters;

final class TrimFormatter implements FormatterInterface
{
    
    /**
     *
     * @var array|string[]
     */
    private $characters = [];
    
    /**
     *
     * @param iterable|string[] $characters
     */
    public function __construct(string ...$characters)
    {
        if (empty($characters)) {
            $characters = [' ', "\t", "\r", "\n", "\0", "\x0B"];
        }
        $this->characters = $characters;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    public function format(string $input): string
    {
        $mask = implode($this->characters);
        var_dump($mask);
        return trim($input, $mask);
    }
    
}
