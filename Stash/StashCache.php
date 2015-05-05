<?php

namespace Redeye\StormpathBundle\Stash;

use Stormpath\Cache\Cache;

class StashCache implements Cache
{
    private $pool;

    public function __construct($options)
    {
        $this->pool = $options['stash']['pool'];
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string $key
     * @return mixed
     */
    public function get($key)
    {
        if ($key == null) {
            return null;
        }

        $key = $this->normalizeId($key);
        $cache = $this->pool->getItem($key);
        $value = $cache->get();

        return $cache->isMiss() ? null : $value;
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string $key
     * @param  mixed $value
     * @param  int $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        if ($key == null) {
            return null;
        }

        $key = $this->normalizeId($key);
        $item = $this->pool->getItem($key);

        $item->set($value, $minutes * 60);
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string $key
     * @return bool
     */
    public function delete($key)
    {
        if ($key == null) {
            return null;
        }

        $key = $this->normalizeId($key);
        return $this->pool->clear($key);
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function clear()
    {
        $this->pool->flushAll();
    }

    private function normalizeId($id)
    {
        // These replaces are safe, because the IDs are URLs and the replaces aren't allowed in URLs
        $id = str_replace(['/', ':'], ['<', '>'], $id);
        return $id;
    }
}
