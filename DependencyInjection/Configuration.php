<?php

namespace Redeye\StormpathBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('redeye_stormpath');

        $rootNode
            ->children()
                ->arrayNode('client')->isRequired()
                ->children()
                    ->scalarNode('api_key_file')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('id_property_name')->defaultValue('apiKey.id')->cannotBeEmpty()->end()
                    ->scalarNode('secret_property_name')->defaultValue('apiKey.secret')->cannotBeEmpty()->end()
                    ->scalarNode('cache_manager')->defaultValue('Array')->cannotBeEmpty()->end()
                    ->arrayNode('cache_manager_options')
                    ->children()
                        ->arrayNode('stash')
                        ->children()
                            ->scalarNode('pool_service')->cannotBeEmpty()->end()
                        ->end()
                        ->end()
                        ->scalarNode('ttl')->defaultValue(60)->cannotBeEmpty()->end()
                        ->scalarNode('tti')->defaultValue(60)->cannotBeEmpty()->end()
                    ->end()
                    ->end()
                ->end()->end()
                ->scalarNode('default_application')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
