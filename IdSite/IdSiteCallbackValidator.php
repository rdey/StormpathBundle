<?php

namespace Redeye\StormpathBundle\IdSite;

use JWT;
use Stormpath\ApiKey;
use Redeye\StormpathBundle\TokenStore\TokenStoreInterface;

/**
* 
*/
class IdSiteCallbackValidator
{
    protected $apiKey;
    protected $tokenStore;

    public function __construct(ApiKey $apiKey, TokenStoreInterface $tokenStore = null)
    {
        $this->apiKey = $apiKey;
        $this->tokenStore = $tokenStore;
    }

    public function validateResponse($response)
    {
        $data = JWT::decode($response, $this->apiKey->getSecret());

        if ($data->aud != $this->apiKey->getId()) {
            throw new \RuntimeException("aud claim doesn't match API key ID");
        }

        if ($this->tokenStore) {
            if ($this->tokenStore->hasToken($data->jti)) {
                throw new \RuntimeException("This token has already been used, possible replay attack.");
            }

            $this->tokenStore->storeToken($data->jti, $data->exp);
        }

        return new IdSiteResponse($data);
    }
}
