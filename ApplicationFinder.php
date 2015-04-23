<?php

namespace Redeye\StormpathBundle;

use Stormpath\Resource\Tenant;
use Redeye\StormpathBundle\Exception\ApplicationNotFoundException;

class ApplicationFinder
{
    public function getApplication(Tenant $tenant, $applicationName)
    {
        $apps = $tenant->applications;
        $apps->search = array('name' => $applicationName);
        $application = $apps->getIterator()->current();

        if (!$application) {
            throw new ApplicationNotFoundException($applicationName);
        }

        return $application;
    }
}
