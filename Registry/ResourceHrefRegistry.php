<?php

namespace Redeye\StormpathBundle\Registry;

class ResourceHrefRegistry
{
    protected $resources = [];

    public function add($key, $href)
    {
        $this->resources[$key] = $href;
    }

    public function get($key)
    {
        if (isset($this->resources[$key])) {
            return $this->resources[$key];
        }

        return null;
    }
}
