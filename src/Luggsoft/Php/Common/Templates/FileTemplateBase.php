<?php

namespace Luggsoft\Php\Common\Templates;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;

abstract class FileTemplateBase extends TemplateBase
{
    
    /**
     *
     * @var string
     */
    private $path;
    
    /**
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = realpath($path);
        
        if (is_file($this->path) === false) {
            throw new FileNotFoundException($path);
        }
    }
    
    /**
     *
     * @return string
     */
    final public function getPath(): string
    {
        return $this->path;
    }
    
}
