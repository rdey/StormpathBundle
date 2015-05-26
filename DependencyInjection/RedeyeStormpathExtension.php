<?php

namespace Redeye\StormpathBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;

use Stormpath\Resource\Tenant;

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

        $this->configureTenant($config, $container);
        $this->configureDefaultApplication($config, $container);

        $this->configureClient($config, $container);
        if (isset($config['token_store'])) {
            $tokenStoreRef = $this->configureTokenStore($config['token_store'], $container);
            $callbackValidatorRef = $container->getDefinition('redeye_stormpath.id_site.callback_validator');
            $callbackValidatorRef->replaceArgument(1, $tokenStoreRef);
        }

        $container->setParameter('redeye_stormpath.api_key.id_property_name', $config['client']['id_property_name']);
        $container->setParameter('redeye_stormpath.api_key.secret_property_name', $config['client']['secret_property_name']);
        $container->setParameter('redeye_stormpath.api_key.api_key_file', $config['client']['api_key_file']);
        $container->setParameter('redeye_stormpath.client.cache_manager_class', $config['client']['cache_manager']);

        if (isset($config['resource_registries'])) {
            $groupHrefRegistryDefinition = $container->getDefinition('redeye_stormpath.resource_registry.group_href');
            foreach ($config['resource_registries']['groups'] as $key => $href) {
                $groupHrefRegistryDefinition->addMethodCall('add', [$key, $href]);
            }

            $directoryHrefRegistryDefinition = $container->getDefinition('redeye_stormpath.resource_registry.directory_href');
            foreach ($config['resource_registries']['directories'] as $key => $href) {
                $directoryHrefRegistryDefinition->addMethodCall('add', [$key, $href]);
            }
        }
    }

    public function configureTenant($config, ContainerBuilder $container)
    {
        $def = $container->getDefinition('redeye_stormpath.tenant');

        if (isset($config['tenant_href'])) {
            $def->setFactory([new Reference('redeye_stormpath.data_store'), 'getResource']);
            $def->setArguments([$config['tenant_href'], Tenant::class]);
        } else {
            $def->setFactory([new Reference('redeye_stormpath.client'), 'getCurrentTenant']);
        }
    }

    public function configureDefaultApplication($config, ContainerBuilder $container)
    {
        $def = $container->getDefinition('redeye_stormpath.default_application');

        if (isset($config['default_application_name'])) {
            $def->setFactory([new Reference('redeye_stormpath.default_application.factory'), 'findApplicationNamed']);
            $def->setArguments([$config['default_application_name']]);
        } elseif (isset($config['default_application_href'])) {
            $def->setFactory([new Reference('redeye_stormpath.default_application.factory'), 'findApplicationWithHref']);
            $def->setArguments([$config['default_application_href']]);
        } else {
            throw new \LogicException("Application specifier not set");
        }
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
