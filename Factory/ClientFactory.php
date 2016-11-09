<?php


namespace Redeye\StormpathBundle\Factory;


use Stormpath\ApiKey;
use Stormpath\Client;

class ClientFactory
{
    public static function createClient(ApiKey $apiKey, $cacheManager, $cacheOptions)
    {
        Client::tearDown();
        Client::$apiKeyProperties = "apiKey.id=".$apiKey->getId()."\napiKey.secret=".$apiKey->getSecret();
        Client::$cacheManager = $cacheManager;
        Client::$cacheManagerOptions = $cacheOptions;
        return Client::getInstance();
    }
}