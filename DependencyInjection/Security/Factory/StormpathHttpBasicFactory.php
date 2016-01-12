<?php

namespace Redeye\StormpathBundle\DependencyInjection\Security\Factory;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;

/**
 * HttpBasicFactory creates services for HTTP basic authentication.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class StormpathHttpBasicFactory implements SecurityFactoryInterface
{
    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        $provider = 'redeye_stormpath.stormpath.authentication.provider.usernamepassword.'.$id;
        $container
            ->setDefinition($provider, new DefinitionDecorator('redeye_stormpath.stormpath.authentication.provider.usernamepassword'))
            ->replaceArgument(0, new Reference($config['application']))
            ->replaceArgument(1, new Reference($userProvider))
            ->replaceArgument(2, $id)
        ;

        // entry point
        $entryPointId = $this->createEntryPoint($container, $id, $config, $defaultEntryPoint);

        // listener
        $listenerId = 'security.authentication.listener.basic.'.$id;
        $listener = $container->setDefinition($listenerId, new DefinitionDecorator('security.authentication.listener.basic'));
        $listener->replaceArgument(2, $id);
        $listener->replaceArgument(3, new Reference($entryPointId));

        return array($provider, $listenerId, $entryPointId);
    }

    public function getPosition()
    {
        return 'http';
    }

    public function getKey()
    {
        return 'stormpath-http-basic';
    }

    public function addConfiguration(NodeDefinition $node)
    {
        $node
            ->children()
                ->scalarNode('provider')->end()
                ->scalarNode('application')->defaultValue('redeye_stormpath.default_application')->end()
                ->scalarNode('realm')->defaultValue('Secured Area')->end()
            ->end()
        ;
    }

    protected function createEntryPoint($container, $id, $config, $defaultEntryPoint)
    {
        if (null !== $defaultEntryPoint) {
            return $defaultEntryPoint;
        }

        $entryPointId = 'security.authentication.basic_entry_point.'.$id;
        $container
            ->setDefinition($entryPointId, new DefinitionDecorator('security.authentication.basic_entry_point'))
            ->addArgument($config['realm'])
        ;

        return $entryPointId;
    }
}
