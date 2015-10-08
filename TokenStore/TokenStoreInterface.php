<?php

namespace Redeye\StormpathBundle\TokenStore;

interface TokenStoreInterface
{
    public function storeToken($token, $expiration);

    public function hasToken($token);
}
