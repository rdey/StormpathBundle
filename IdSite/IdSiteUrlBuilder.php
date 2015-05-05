<?php

namespace Redeye\StormpathBundle\IdSite;

use JWT;
use Stormpath\Resource\Application;
use Stormpath\ApiKey;

/**
* 
*/
class IdSiteUrlBuilder
{
    protected $apiKey;

    public function __construct(ApiKey $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createUrl(Application $application, $callbackUri, $path = null, $state = null)
    {
        $data = array(
            'iat' => time(),
            'iss' => $this->apiKey->getId(),
            'sub' => $application->getHref(),
            'cb_uri' => $callbackUri,
            'jti' => uniqid(),
        );

        if ($path) {
            $data['path'] = (string)$path;
        }

        if ($state) {
            $data['state'] = (string)$state;
        }

        $token = JWT::encode($data, $this->apiKey->getSecret());

        $appUrl = $application->getHref();
        $proto = parse_url($appUrl, PHP_URL_SCHEME);
        $host = parse_url($appUrl, PHP_URL_HOST);
        $base = $proto.'://'.$host;
        $redirectUrl = $base.'/sso?jwtRequest='.$token;

        return $redirectUrl;
    }
}
