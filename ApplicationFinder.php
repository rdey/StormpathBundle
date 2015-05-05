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
        if (!$apps->getIterator()->valid()) {
            throw new ApplicationNotFoundException($applicationName);
        }

        $application = $apps->getIterator()->current();

        return $application;
    }
}
