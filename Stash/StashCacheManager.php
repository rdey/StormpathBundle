<?php

namespace Redeye\StormpathBundle\Stash;

use Stormpath\Cache\CacheManager;

/**
* 
*/
class StashCacheManager implements CacheManager
{
    public function __construct($options)
    {
        $this->options = $options;
    }

    public function getCache()
    {
        return new StashCache($this->options);
    }
}
