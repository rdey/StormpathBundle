<?php

namespace Redeye\StormpathBundle\Factory;

use Stormpath\Client;
use Stormpath\ApiKey;

/**
* 
*/
class ClientFactory
{
    public function createClient(ApiKey $apiKey, $cacheManagerClass, $cacheOptions = [])
    {
        $fullCacheOptions = $this->getFullCacheOptions($cacheOptions);
        if (!class_exists($cacheManagerClass)) {
            throw new \InvalidArgumentException("Cache manager class \"$cacheManagerClass\" does not exist.");
        }

        return new Client($apiKey, $cacheManagerClass, $fullCacheOptions);
    }

    private function getFullCacheOptions($overrides)
    {
        $defaults = array(
            'memcached' => array(),
            'redis' => array(),
            'ttl' => 60, // This value is set in minutes
            'tti' => 120, // This value is set in minutes
            'regions' => array(
                'accounts' => array(
                    'ttl' => 60,
                    'tti' => 120
                ),
                'applications' => array(
                    'ttl' => 60,
                    'tti' => 120
                ),
                'directories' => array(
                    'ttl' => 60,
                    'tti' => 120
                ),
                'groups' => array(
                    'ttl' => 60,
                    'tti' => 120
                ),
                'tenants' => array(
                    'ttl' => 60,
                    'tti' => 120
                ),
            )
        );
        return array_replace($defaults, $overrides);
    }
}
