<?php

namespace Redeye\StormpathBundle\User;

use Stormpath\Resource\Account;
use Stormpath\Resource\Application;
use Stormpath\Resource\Expansion;
use Stormpath\Client;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class StormpathUserProvider implements UserProviderInterface
{
    protected $client;
    protected $application;

    public function __construct(Client $client, Application $application)
    {
        $this->client = $client;
        $this->application = $application;
    }

    public function loadUserByUsername($username)
    {
        $expansion = new Expansion();
        $expansion->addProperty('groups');

        $iter = $this->application
            ->accounts
            ->setSearch([
                'username' => $username
            ])
            ->setExpansion($expansion)
            ->getIterator()
        ;

        if (!$iter->valid()) {
            $e = new UsernameNotFoundException();
            $e->setUsername($username);
            throw $e;
        }

        return new StormpathUser($iter->current(), $this->extractRoles($this->application));
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceOf StormpathUser) {
            throw new UnsupportedUserException();
        }

        $href = $user->getAccountHref();

        $expansion = new Expansion();
        $expansion->addProperty('groups');

        $account = $this->client
            ->dataStore
            ->getResource($href, \Stormpath\Stormpath::ACCOUNT, array('expand' => $expansion));

        if (!$account) {
            throw new \RuntimeException("Account not found when refreshing user.");
        }

        $user->setAccount($account);

        return $user;
    }

    public function supportsClass($class)
    {
        return $class === StormpathUser::class;
    }

    protected function extractRoles(Application $application)
    {
        $roles = [];

        $applicationCustomData = $application->customData;
        if ($applicationCustomData->role) {
            $roles[] = $applicationCustomData->role;
        }

        return $roles;
    }
}
