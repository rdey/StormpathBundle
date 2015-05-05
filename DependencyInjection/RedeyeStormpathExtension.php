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
        $loader->load('security.yml');

        if (isset($config['client']['cache_manager_options']['stash'])) {
            $config['client']['cache_manager_options']['stash']['pool'] = new Reference($config['client']['cache_manager_options']['stash']['pool_service']);
        }

        $this->configureClient($config, $container);
        if (isset($config['token_store'])) {
            $tokenStoreRef = $this->configureTokenStore($config['token_store'], $container);
            $callbackValidatorRef = $container->getDefinition('redeye_stormpath.id_site.callback_validator');
            $callbackValidatorRef->replaceArgument(1, $tokenStoreRef);
        }

        $container->setParameter('redeye_stormpath.default_application_name', $config['default_application']);
        $container->setParameter('redeye_stormpath.api_key.id_property_name', $config['client']['id_property_name']);
        $container->setParameter('redeye_stormpath.api_key.secret_property_name', $config['client']['secret_property_name']);
        $container->setParameter('redeye_stormpath.api_key.api_key_file', $config['client']['api_key_file']);
        $container->setParameter('redeye_stormpath.client.cache_manager_class', $config['client']['cache_manager']);
    }

    protected function configureClient($config, ContainerBuilder $container)
    {
        $factoryDef = $container->getDefinition('redeye_stormpath.client');
        $factoryDef->replaceArgument(2, $config['client']['cache_manager_options']);
    }

    protected function configureTokenStore($config, ContainerBuilder $container)
    {
        switch ($config['type']) {
            case 'stash':
                $this->configureStashTokenStore($config['stash'], $container);
                return new Reference('redeye_stormpath.id_site.token_store.stash');
        }
    }

    protected function configureStashTokenStore($config, ContainerBuilder $container)
    {
        $tsDef = $container->getDefinition('redeye_stormpath.id_site.token_store.stash');
        $tsDef->replaceArgument(0, new Reference($config['pool_service']));
    }
}
