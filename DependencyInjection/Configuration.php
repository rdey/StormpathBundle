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
                ->arrayNode('client')
                    ->isRequired()
                        ->validate()
                            ->ifTrue(function($node) {
                                return !isset($node['api_key_file']) && !(isset($node['id']) && isset($node['secret']));
                            })
                            ->thenInvalid('Either api_key_file or id and secret need to be set.')
                    ->end()
                    ->children()
                        ->scalarNode('api_key_file')->end()
                        ->scalarNode('id_property_name')->defaultValue('apiKey.id')->cannotBeEmpty()->end()
                        ->scalarNode('secret_property_name')->defaultValue('apiKey.secret')->cannotBeEmpty()->end()
                        ->scalarNode('id')->end()
                        ->scalarNode('secret')->end()
                    ->end()
                ->end()
                ->arrayNode('cache')
                    ->addDefaultsIfNotSet()
                    ->beforeNormalization()
                        ->ifTrue(function($node) {
                            return !isset($node['type']);
                        })
                        ->then(function($node) {
                            if (isset($node['memcached']) && !isset($node['service'], $node['redis'])) {
                                $node['type'] = 'memcached';
                            } elseif (isset($node['service']) && !isset($node['memcached'], $node['redis'])) {
                                $node['type'] = 'service';
                            } elseif (isset($node['redis']) && !isset($node['memcached'], $node['service'])) {
                                $node['type'] = 'redis';
                            }

                            return $node;
                        })
                    ->end()
                    ->validate()
                        ->ifTrue(function($node) {
                            return strtolower($node['type']) === 'memcached' && !isset($node['memcached'][0]['host']);
                        })
                        ->thenInvalid('Cache type memcached requires at least one host.')
                        ->ifTrue(function($node) {
                            return strtolower($node['type']) === 'redis' && !isset($node['redis']['host']);
                        })
                        ->thenInvalid('Cache type redis requires host to be set.')
                        ->ifTrue(function($node) {
                            return strtolower($node['type']) === 'service' && !isset($node['service']);
                        })
                        ->thenInvalid('Cache type service requires service to be set.')
                    ->end()
                    ->children()
                        ->enumNode('type')
                            ->values(['array', 'memcached', 'null', 'redis', 'service'])
                            ->defaultValue('array')
                            ->isRequired()
                        ->end()
                        ->scalarNode('service')->end()
                        ->arrayNode('memcached')
                            ->beforeNormalization()
                                ->ifTrue(function($node) {
                                    return isset($node['host']);
                                })
                                ->then(function($node) {
                                    return [$node];
                                })
                            ->end()
                            ->prototype('array')
                                ->children()
                                    ->scalarNode('host')->end()
                                    ->scalarNode('port')->defaultValue(11211)->end()
                                    ->scalarNode('weight')->defaultValue(1)->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('redis')
                            ->children()
                                ->scalarNode('host')->end()
                            ->scalarNode('port')->defaultValue(6379)->end()
                            ->end()
                        ->end()
                        ->integerNode('ttl')->defaultValue(60)->end()
                        ->integerNode('tti')->defaultValue(120)->end()
                        ->arrayNode('regions')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->arrayNode('accounts')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->integerNode('ttl')->defaultValue(60)->end()
                                        ->integerNode('tti')->defaultValue(120)->end()
                                    ->end()
                                ->end()
                                ->arrayNode('applications')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->integerNode('ttl')->defaultValue(60)->end()
                                        ->integerNode('tti')->defaultValue(120)->end()
                                    ->end()
                                ->end()
                                ->arrayNode('directories')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->integerNode('ttl')->defaultValue(60)->end()
                                        ->integerNode('tti')->defaultValue(120)->end()
                                    ->end()
                                ->end()
                                ->arrayNode('groups')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->integerNode('ttl')->defaultValue(60)->end()
                                        ->integerNode('tti')->defaultValue(120)->end()
                                    ->end()
                                ->end()
                                ->arrayNode('tenants')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->integerNode('ttl')->defaultValue(60)->end()
                                        ->integerNode('tti')->defaultValue(120)->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
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
