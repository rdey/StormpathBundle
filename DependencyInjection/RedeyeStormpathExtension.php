<?php

namespace Redeye\StormpathBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;

/**
* @author Magnus Nordlander
*/
class RedeyeStormpathExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        if (isset($config['client']['cache_manager_options']['stash'])) {
            $config['client']['cache_manager_options']['stash']['pool'] = new Reference($config['client']['cache_manager_options']['stash']['pool_service']);
        }

        $builder_def = $container->getDefinition('redeye_stormpath.client_builder');
        $builder_def->addMethodCall('setApiKeyFileLocation', [$config['client']['api_key_file']]);
        $builder_def->addMethodCall('setApiKeyIdPropertyName', [$config['client']['id_property_name']]);
        $builder_def->addMethodCall('setApiKeySecretPropertyName', [$config['client']['secret_property_name']]);
        $builder_def->addMethodCall('setCacheManager', [$config['client']['cache_manager']]);
        $builder_def->addMethodCall('setCacheManagerOptions', [$config['client']['cache_manager_options']]);

        $container->setParameter('redeye_stormpath.default_application_name', $config['default_application']);
    }
}
