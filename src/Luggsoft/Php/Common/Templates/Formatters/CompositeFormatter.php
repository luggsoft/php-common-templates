<?php

namespace Luggsoft\Php\Common\Templates\Formatters;

final class CompositeFormatter implements FormatterInterface
{
    
    /**
     *
     * @var array|FormatterInterface[]
     */
    private $formatters;
    
    /**
     *
     * @param iterable|FormatterInterface[] $formatters
     */
    public function __construct(FormatterInterface ...$formatters)
    {
        $this->formatters = $formatters;
    }
    
    /**
     *
     * @return iterable|FormatterInterface[]
     */
    public function getFormatters(): iterable
    {
        return $this->formatters;
    }
    
    /**
     *
     * {@inheritdoc}
     */
    public function format(string $input): string
    {
        $result = $input;
        
        foreach ($this->formatters as $formatter) {
            $result = $formatter->format($result);
        }
        
        return $result;
    }
    
}
