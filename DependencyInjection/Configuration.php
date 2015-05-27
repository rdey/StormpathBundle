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
                    ->scalarNode('cache_manager')
                        ->defaultValue('array')
                        ->cannotBeEmpty()
                        ->beforeNormalization()
                            ->ifTrue(function($v) {
                                return in_array(strtolower($v), ['array', 'memcached', 'null', 'redis']);
                            })
                            ->then(function ($v) { return "Stormpath\\Cache\\".ucfirst($v)."CacheManager"; })
                        ->end()
                    ->end()
                    ->arrayNode('cache_manager_options')
                        ->children()
                            ->arrayNode('stash')
                                ->children()
                                    ->scalarNode('pool_service')->cannotBeEmpty()->end()
                                ->end()
                            ->end()
                            ->arrayNode('memcached')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('host')->isRequired()->cannotBeEmpty()->end()
                                        ->scalarNode('port')->defaultValue(11211)->cannotBeEmpty()->end()
                                        ->scalarNode('weight')->defaultValue(1)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->scalarNode('ttl')->defaultValue(60)->cannotBeEmpty()->end()
                            ->scalarNode('tti')->defaultValue(60)->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()->end()
                ->arrayNode('token_store')
                    ->children()
                        ->scalarNode('type')
                            ->validate()
                            ->ifNotInArray(array('stash'))
                                ->thenInvalid('Invalid token store "%s"')
                            ->end()
                        ->end()
                        ->arrayNode('stash')
                            ->children()
                                ->scalarNode('pool_service')->end()
                            ->end()
                        ->end()
                    ->end()
                    ->beforeNormalization()
                        ->ifTrue(function($v) {
                            return !isset($v['type']) && count($v) == 1;
                        })
                        ->then(function ($v) {
                            $driver = key($v);
                            $v['type'] = $driver;
                            return $v;
                        })
                    ->end()
                ->end()
                ->scalarNode('tenant_href')->end()
                ->scalarNode('default_application_name')->end()
                ->scalarNode('default_application_href')->end()
                ->arrayNode('resource_registries')
                    ->children()
                        ->arrayNode('groups')
                            ->prototype('scalar')->cannotBeEmpty()->end()
                        ->end()
                        ->arrayNode('directories')
                            ->prototype('scalar')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ->validate()
                ->ifTrue(function($v) {
                    return !isset($v['default_application_name']) && !isset($v['default_application_href']);
                })
                ->thenInvalid('Either default_application_name or default_application_href needs to be set.')
            ->end()
        ;

        return $treeBuilder;
    }
}
