<?php

namespace Redeye\StormpathBundle\Exception;

class ApplicationNotFoundException extends \RuntimeException
{
    public function __construct($applicationName)
    {
        parent::__construct('Could not find application named "'.$applicationName.'"');
    }
}
