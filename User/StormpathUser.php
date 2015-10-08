<?php

namespace Redeye\StormpathBundle\User;

use Stormpath\Resource\Account;
use Symfony\Component\Security\Core\User\UserInterface;

class StormpathUser implements UserInterface
{
    protected $account;
    protected $accountHref;
    protected $roles;
    protected $additionalRoles;

    public function __construct(Account $account, $additionalRoles = [])
    {
        $this->additionalRoles = $additionalRoles;
        $this->setAccount($account);
    }

    public function setAccount(Account $account)
    {
        $this->account = $account;
        $this->accountHref = $account->getHref();
        $this->roles = array_merge($this->extractRoles($account), $this->additionalRoles);
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getAccountHref()
    {
        return $this->accountHref;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return null;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->accountHref;
    }

    public function __toString()
    {
        return $this->getAccount()->getUsername();
    }

    public function eraseCredentials()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(array($this->accountHref));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($str)
    {
        list($this->accountHref) = unserialize($str);
    }

    protected function extractRoles(Account $account)
    {
        $roles = [];

        foreach ($account->getGroups() as $group) {
            $customData = $group->getCustomData();
            if ($customData->role) {
                $roles[] = $customData->role;
            }
        }

        $directoryCustomData = $account->getDirectory()->getCustomData();
        if ($directoryCustomData->role) {
            $roles[] = $directoryCustomData->role;
        }

        return $roles;
    }
}
