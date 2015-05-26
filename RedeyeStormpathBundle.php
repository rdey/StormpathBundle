<?php

namespace Redeye\StormpathBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Redeye\StormpathBundle\DependencyInjection\Security\Factory\StormpathHttpBasicFactory;

class RedeyeStormpathBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        if ($container->hasExtension('security')) {
            $extension = $container->getExtension('security');
            $extension->addSecurityListenerFactory(new StormpathHttpBasicFactory());
        }
    }
}
