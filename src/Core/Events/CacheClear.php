<?php

namespace Dissonance\Core\Events;

class CacheClear {

    protected  $path = null;

    public function __construct(string $path = null)
    {
        $this->path = trim($path);
    }

    public function getPath()
    {
        return $this->path;
    }
}