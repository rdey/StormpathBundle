<?php

namespace Redeye\StormpathBundle\TokenStore;

use Stash\Interfaces\PoolInterface;

class StashTokenStore implements TokenStoreInterface
{
    protected $pool;

    public function __construct(PoolInterface $pool)
    {
        $this->pool = $pool;
    }

    public function storeToken($token, $expiration)
    {
        $key = $this->normalizeId($token);
        $item = $this->pool->getItem($key);

        $item->set($token, $expiration - time());
    }

    public function hasToken($token)
    {
        $key = $this->normalizeId($token);
        $item = $this->pool->getItem($key);
        $item->get();

        return !$cache->isMiss();
    }

    public function normalizeId($key)
    {
        return 'id-token-'.$key;
    }
}
