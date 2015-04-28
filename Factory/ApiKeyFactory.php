<?php

namespace Redeye\StormpathBundle\Factory;

use Stormpath\ApiKey;

/**
* 
*/
class ApiKeyFactory
{
    private $apiKeyIdPropertyName = "apiKey.id";
    private $apiKeySecretPropertyName = "apiKey.secret";

    public function __construct($apiKeyIdPropertyName = null, $apiKeySecretPropertyName = null)
    {
        if ($apiKeyIdPropertyName) {
            $this->apiKeyIdPropertyName = $apiKeyIdPropertyName;
        }

        if ($apiKeySecretPropertyName) {
            $this->apiKeySecretPropertyName = $apiKeySecretPropertyName;
        }
    }

    public function createFromFile($filename)
    {
        $data = parse_ini_file($filename);

        if (!isset($data[$this->apiKeyIdPropertyName])) {
            throw new \InvalidArgumentException("Stormpath API Key file doesn't contain property \"$this->apiKeyIdPropertyName\".");
        }
        if (!isset($data[$this->apiKeySecretPropertyName])) {
            throw new \InvalidArgumentException("Stormpath API Key file doesn't contain property \"$this->apiKeySecretPropertyName\".");
        }

        $id = $data[$this->apiKeyIdPropertyName];
        $secret = $data[$this->apiKeySecretPropertyName];

        return new ApiKey($id, $secret);
    }
}
