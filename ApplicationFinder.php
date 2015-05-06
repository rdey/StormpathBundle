<?php

namespace Redeye\StormpathBundle;

use Stormpath\DataStore\DataStore;
use Stormpath\Resource\Tenant;
use Stormpath\Resource\Application;
use Redeye\StormpathBundle\Exception\ApplicationNotFoundException;

class ApplicationFinder
{
    protected $dataStore;
    protected $tenant;

    public function __construct(DataStore $dataStore, Tenant $tenant)
    {
        $this->dataStore = $dataStore;
        $this->tenant = $tenant;
    }

    public function findApplicationWithHref($href)
    {
        return $this->dataStore->getResource($href, Application::class);
    }

    public function findApplicationNamed($applicationName)
    {
        $apps = $this->tenant->applications;
        $apps->search = array('name' => $applicationName);
        if (!$apps->getIterator()->valid()) {
            throw new ApplicationNotFoundException($applicationName);
        }

        $application = $apps->getIterator()->current();

        return $application;
    }
}
