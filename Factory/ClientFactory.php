<?php

namespace Redeye\StormpathBundle\Factory;

use Stormpath\Client;
use Stormpath\ApiKey;
use Stormpath\DataStore\DefaultDataStore;
use Stormpath\Http\HttpClientRequestExecutor;

use Guzzle\Common\HasDispatcherInterface;
use Guzzle\Plugin\Log\LogPlugin;
use Guzzle\Plugin\History\HistoryPlugin;
use Psr\Log\LoggerInterface;

/**
* 
*/
class ClientFactory
{
    protected $logPlugin;
    protected $historyPlugin;

    public function __construct(LoggerInterface $logger = null, LogPlugin $logPlugin = null, HistoryPlugin $historyPlugin = null)
    {
        $this->logger = $logger;
        $this->logPlugin = $logPlugin;
        $this->historyPlugin = $historyPlugin;
    }

    public function createClient(ApiKey $apiKey, $cacheManager, $cacheOptions = [])
    {
        $fullCacheOptions = $this->getFullCacheOptions($cacheOptions);

        $client = new Client($apiKey, $cacheManager, $fullCacheOptions);

        if ($this->logPlugin || $this->historyPlugin) {
            try {
                $requestExecutorRP = new \ReflectionProperty(DefaultDataStore::class, 'requestExecutor');
                $httpClientRP = new \ReflectionProperty(HttpClientRequestExecutor::class, 'httpClient');

                $requestExecutorRP->setAccessible(true);
                $httpClientRP->setAccessible(true);

                $dataStore = $client->getDataStore();
                if (!$dataStore instanceOf DefaultDataStore) {
                    throw new \RuntimeException("Expected datastore to be a DefaultDataStore, was ".get_class($dataStore));
                }

                $requestExecutor = $requestExecutorRP->getValue($dataStore);
                if (!$requestExecutor instanceOf HttpClientRequestExecutor) {
                    throw new \RuntimeException("Expected requestExecutor to be a HttpClientRequestExecutor, was ".get_class($requestExecutor));
                }

                $httpClient = $httpClientRP->getValue($requestExecutor);
                if (!$httpClient instanceOf HasDispatcherInterface) {
                    throw new \RuntimeException("Expected httpClient to implement HasDispatcherInterface, ".get_class($httpClient)." doesn't");
                }

                if ($this->logPlugin) {
                    $httpClient->addSubscriber($this->logPlugin);
                }
                if ($this->historyPlugin) {
                    $httpClient->addSubscriber($this->historyPlugin);
                }
            } catch (\Exception $e) {
                if ($this->logger) {
                    $this->logger->warning("Couldn't add logging and profiling to Stormpath. Probably due to version incompatibility. Skipping. Error message: ".$e->getMessage());
                }
            }
        }

        return $client;
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
