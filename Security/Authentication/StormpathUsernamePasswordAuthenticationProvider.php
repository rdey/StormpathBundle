<?php

namespace Redeye\StormpathBundle\Security\Authentication;

use Stormpath\Resource\Application;
use Redeye\StormpathBundle\User\StormpathUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Redeye\StormpathBundle\Security\Authentication\StormpathUsernamePasswordAuthenticationProvider;

class StormpathUsernamePasswordAuthenticationProvider implements AuthenticationProviderInterface
{
    private $application;
    private $userProvider;
    private $providerKey;

    public function __construct(Application $application, UserProviderInterface $userProvider, $providerKey)
    {
        $this->application = $application;
        $this->userProvider = $userProvider;
        $this->providerKey = $providerKey;
    }

    public function authenticate(TokenInterface $token)
    {
        try {
            $result = $this->application->authenticate($token->getUsername(), $token->getCredentials());
            $account = $result->getAccount();
        } catch (\Stormpath\Resource\ResourceError $re) {
            throw new AuthenticationException($re->getMessage(), $re->getErrorCode(), $re);
        }

        $user = $this->userProvider->loadUserByUsername($account->getHref());

        if (!$user instanceof StormpathUser) {
            throw new AuthenticationException('Stormpath Username Password authenticator can only handle Stormpath users');
        }

        $token = new UsernamePasswordToken($user, $token->getCredentials(), $this->providerKey, $user->getRoles());

        if (!$token->isAuthenticated()) {
            throw new AuthenticationException('Stormpath authentication passed, but user has no roles.');
        }

        return $token;
    }

    public function supports(TokenInterface $token)
    {
        if (!$token instanceof UsernamePasswordToken) {
            return false;
        }

        if ($token->getProviderKey() !== $this->providerKey) {
            return false;
        }

        return true;
    }
}
