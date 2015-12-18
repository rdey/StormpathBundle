<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * TestsTestDebugProjectContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class TestsTestDebugProjectContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $dir = __DIR__;
        for ($i = 1; $i <= 5; ++$i) {
            $this->targetDirs[$i] = $dir = dirname($dir);
        }
        $this->parameters = $this->getDefaultParameters();

        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
        $this->methodMap = array(
            'annotation_reader' => 'getAnnotationReaderService',
            'assets.context' => 'getAssets_ContextService',
            'assets.packages' => 'getAssets_PackagesService',
            'cache_clearer' => 'getCacheClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'config_cache_factory' => 'getConfigCacheFactoryService',
            'debug.controller_resolver' => 'getDebug_ControllerResolverService',
            'debug.debug_handlers_listener' => 'getDebug_DebugHandlersListenerService',
            'debug.event_dispatcher' => 'getDebug_EventDispatcherService',
            'debug.stopwatch' => 'getDebug_StopwatchService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'fragment.handler' => 'getFragment_HandlerService',
            'fragment.renderer.esi' => 'getFragment_Renderer_EsiService',
            'fragment.renderer.hinclude' => 'getFragment_Renderer_HincludeService',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService',
            'fragment.renderer.ssi' => 'getFragment_Renderer_SsiService',
            'http_kernel' => 'getHttpKernelService',
            'kernel' => 'getKernelService',
            'kernel.class_cache.cache_warmer' => 'getKernel_ClassCache_CacheWarmerService',
            'locale_listener' => 'getLocaleListenerService',
            'property_accessor' => 'getPropertyAccessorService',
            'redeye_stormpath.api_key' => 'getRedeyeStormpath_ApiKeyService',
            'redeye_stormpath.client' => 'getRedeyeStormpath_ClientService',
            'redeye_stormpath.data_store' => 'getRedeyeStormpath_DataStoreService',
            'redeye_stormpath.default_application' => 'getRedeyeStormpath_DefaultApplicationService',
            'redeye_stormpath.id_site.callback_validator' => 'getRedeyeStormpath_IdSite_CallbackValidatorService',
            'redeye_stormpath.id_site.url_builder' => 'getRedeyeStormpath_IdSite_UrlBuilderService',
            'redeye_stormpath.resource_registry.directory_href' => 'getRedeyeStormpath_ResourceRegistry_DirectoryHrefService',
            'redeye_stormpath.resource_registry.group_href' => 'getRedeyeStormpath_ResourceRegistry_GroupHrefService',
            'redeye_stormpath.security.user_provider' => 'getRedeyeStormpath_Security_UserProviderService',
            'redeye_stormpath.stormpath.authentication.provider.usernamepassword' => 'getRedeyeStormpath_Stormpath_Authentication_Provider_UsernamepasswordService',
            'redeye_stormpath.tenant' => 'getRedeyeStormpath_TenantService',
            'request' => 'getRequestService',
            'request_stack' => 'getRequestStackService',
            'response_listener' => 'getResponseListenerService',
            'security.secure_random' => 'getSecurity_SecureRandomService',
            'service_container' => 'getServiceContainerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'test.client' => 'getTest_ClientService',
            'test.client.cookiejar' => 'getTest_Client_CookiejarService',
            'test.client.history' => 'getTest_Client_HistoryService',
            'test.session.listener' => 'getTest_Session_ListenerService',
            'translation.dumper.csv' => 'getTranslation_Dumper_CsvService',
            'translation.dumper.ini' => 'getTranslation_Dumper_IniService',
            'translation.dumper.json' => 'getTranslation_Dumper_JsonService',
            'translation.dumper.mo' => 'getTranslation_Dumper_MoService',
            'translation.dumper.php' => 'getTranslation_Dumper_PhpService',
            'translation.dumper.po' => 'getTranslation_Dumper_PoService',
            'translation.dumper.qt' => 'getTranslation_Dumper_QtService',
            'translation.dumper.res' => 'getTranslation_Dumper_ResService',
            'translation.dumper.xliff' => 'getTranslation_Dumper_XliffService',
            'translation.dumper.yml' => 'getTranslation_Dumper_YmlService',
            'translation.extractor' => 'getTranslation_ExtractorService',
            'translation.extractor.php' => 'getTranslation_Extractor_PhpService',
            'translation.loader' => 'getTranslation_LoaderService',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService',
            'translation.loader.dat' => 'getTranslation_Loader_DatService',
            'translation.loader.ini' => 'getTranslation_Loader_IniService',
            'translation.loader.json' => 'getTranslation_Loader_JsonService',
            'translation.loader.mo' => 'getTranslation_Loader_MoService',
            'translation.loader.php' => 'getTranslation_Loader_PhpService',
            'translation.loader.po' => 'getTranslation_Loader_PoService',
            'translation.loader.qt' => 'getTranslation_Loader_QtService',
            'translation.loader.res' => 'getTranslation_Loader_ResService',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService',
            'translation.writer' => 'getTranslation_WriterService',
            'translator' => 'getTranslatorService',
            'translator.default' => 'getTranslator_DefaultService',
            'translator.selector' => 'getTranslator_SelectorService',
            'translator_listener' => 'getTranslatorListenerService',
            'uri_signer' => 'getUriSignerService',
        );
        $this->aliases = array(
            'event_dispatcher' => 'debug.event_dispatcher',
            'stormpath_application' => 'redeye_stormpath.default_application',
            'stormpath_tenant' => 'redeye_stormpath.tenant',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }

    /**
     * Gets the 'annotation_reader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader A Doctrine\Common\Annotations\CachedReader instance.
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\CachedReader(new \Doctrine\Common\Annotations\AnnotationReader(), new \Doctrine\Common\Cache\FilesystemCache((__DIR__.'/annotations')), true);
    }

    /**
     * Gets the 'assets.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Asset\Context\RequestStackContext A Symfony\Component\Asset\Context\RequestStackContext instance.
     */
    protected function getAssets_ContextService()
    {
        return $this->services['assets.context'] = new \Symfony\Component\Asset\Context\RequestStackContext($this->get('request_stack'));
    }

    /**
     * Gets the 'assets.packages' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Asset\Packages A Symfony\Component\Asset\Packages instance.
     */
    protected function getAssets_PackagesService()
    {
        return $this->services['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy(), $this->get('assets.context')), array());
    }

    /**
     * Gets the 'cache_clearer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer A Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer instance.
     */
    protected function getCacheClearerService()
    {
        return $this->services['cache_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(array());
    }

    /**
     * Gets the 'cache_warmer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate A Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate instance.
     */
    protected function getCacheWarmerService()
    {
        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => $this->get('kernel.class_cache.cache_warmer'), 1 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TranslationsCacheWarmer($this->get('translator'))));
    }

    /**
     * Gets the 'config_cache_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory A Symfony\Component\Config\ResourceCheckerConfigCacheFactory instance.
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->services['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(array(0 => new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker(), 1 => new \Symfony\Component\Config\Resource\BCResourceInterfaceChecker()));
    }

    /**
     * Gets the 'debug.controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver A Symfony\Component\HttpKernel\Controller\TraceableControllerResolver instance.
     */
    protected function getDebug_ControllerResolverService()
    {
        return $this->services['debug.controller_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel')), NULL), $this->get('debug.stopwatch'));
    }

    /**
     * Gets the 'debug.debug_handlers_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener A Symfony\Component\HttpKernel\EventListener\DebugHandlersListener instance.
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->services['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, NULL, NULL, NULL, true, NULL);
    }

    /**
     * Gets the 'debug.event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher A Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher instance.
     */
    protected function getDebug_EventDispatcherService()
    {
        $this->services['debug.event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this), $this->get('debug.stopwatch'), NULL);

        $instance->addSubscriberService('response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener');
        $instance->addSubscriberService('streamed_response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener');
        $instance->addSubscriberService('locale_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener');
        $instance->addSubscriberService('translator_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\TranslatorListener');
        $instance->addSubscriberService('test.session.listener', 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\TestSessionListener');
        $instance->addSubscriberService('debug.debug_handlers_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener');

        return $instance;
    }

    /**
     * Gets the 'debug.stopwatch' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Stopwatch\Stopwatch A Symfony\Component\Stopwatch\Stopwatch instance.
     */
    protected function getDebug_StopwatchService()
    {
        return $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch();
    }

    /**
     * Gets the 'file_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Config\FileLocator A Symfony\Component\HttpKernel\Config\FileLocator instance.
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), ($this->targetDirs[2].'/Resources'));
    }

    /**
     * Gets the 'filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem A Symfony\Component\Filesystem\Filesystem instance.
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /**
     * Gets the 'fragment.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler A Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler instance.
     */
    protected function getFragment_HandlerService()
    {
        $this->services['fragment.handler'] = $instance = new \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler($this, $this->get('request_stack'), true);

        $instance->addRendererService('inline', 'fragment.renderer.inline');
        $instance->addRendererService('esi', 'fragment.renderer.esi');
        $instance->addRendererService('ssi', 'fragment.renderer.ssi');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer A Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer instance.
     */
    protected function getFragment_Renderer_EsiService()
    {
        $this->services['fragment.renderer.esi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.hinclude' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer A Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer instance.
     */
    protected function getFragment_Renderer_HincludeService()
    {
        $this->services['fragment.renderer.hinclude'] = $instance = new \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer('', $this->get('uri_signer'), '');

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.inline' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer A Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer instance.
     */
    protected function getFragment_Renderer_InlineService()
    {
        $this->services['fragment.renderer.inline'] = $instance = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer($this->get('http_kernel'), $this->get('debug.event_dispatcher'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.ssi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer A Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer instance.
     */
    protected function getFragment_Renderer_SsiService()
    {
        $this->services['fragment.renderer.ssi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel A Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel instance.
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel($this->get('debug.event_dispatcher'), $this, $this->get('debug.controller_resolver'), $this->get('request_stack'), false);
    }

    /**
     * Gets the 'kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'kernel.class_cache.cache_warmer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer A Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer instance.
     */
    protected function getKernel_ClassCache_CacheWarmerService()
    {
        return $this->services['kernel.class_cache.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer();
    }

    /**
     * Gets the 'locale_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener A Symfony\Component\HttpKernel\EventListener\LocaleListener instance.
     */
    protected function getLocaleListenerService()
    {
        return $this->services['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener($this->get('request_stack'), 'en', NULL);
    }

    /**
     * Gets the 'property_accessor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor A Symfony\Component\PropertyAccess\PropertyAccessor instance.
     */
    protected function getPropertyAccessorService()
    {
        return $this->services['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(false, false);
    }

    /**
     * Gets the 'redeye_stormpath.client' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Stormpath\Client A Stormpath\Client instance.
     */
    protected function getRedeyeStormpath_ClientService()
    {
        return $this->services['redeye_stormpath.client'] = call_user_func(array(new \Redeye\StormpathBundle\Factory\ClientFactory(NULL, NULL, NULL), 'createClient'), $this->get('redeye_stormpath.api_key'), 'Stormpath\\Cache\\NullCacheManager', array('memcached' => array(), 'ttl' => 60, 'tti' => 60));
    }

    /**
     * Gets the 'redeye_stormpath.data_store' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Stormpath\DataStore\DataStore A Stormpath\DataStore\DataStore instance.
     */
    protected function getRedeyeStormpath_DataStoreService()
    {
        return $this->services['redeye_stormpath.data_store'] = $this->get('redeye_stormpath.client')->getDataStore();
    }

    /**
     * Gets the 'redeye_stormpath.default_application' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @param bool    $lazyLoad whether to try lazy-loading the service with a proxy
     *
     * @return \Stormpath\Resource\Application A Stormpath\Resource\Application instance.
     */
    public function getRedeyeStormpath_DefaultApplicationService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;

            return $this->services['redeye_stormpath.default_application'] = new StormpathResourceApplication_0000000041be42aa000000015b8897682ffd7328cdce335252e9c27a4442da96(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getRedeyeStormpath_DefaultApplicationService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                }
            );
        }

        return call_user_func(array(new \Redeye\StormpathBundle\ApplicationFinder($this->get('redeye_stormpath.data_store'), $this->get('redeye_stormpath.tenant')), 'findApplicationWithHref'), 'https://api.stormpath.com/v1/applications/abcdefghijk12345678901');
    }

    /**
     * Gets the 'redeye_stormpath.id_site.callback_validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redeye\StormpathBundle\IdSite\IdSiteCallbackValidator A Redeye\StormpathBundle\IdSite\IdSiteCallbackValidator instance.
     */
    protected function getRedeyeStormpath_IdSite_CallbackValidatorService()
    {
        return $this->services['redeye_stormpath.id_site.callback_validator'] = new \Redeye\StormpathBundle\IdSite\IdSiteCallbackValidator($this->get('redeye_stormpath.api_key'), NULL);
    }

    /**
     * Gets the 'redeye_stormpath.id_site.url_builder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redeye\StormpathBundle\IdSite\IdSiteUrlBuilder A Redeye\StormpathBundle\IdSite\IdSiteUrlBuilder instance.
     */
    protected function getRedeyeStormpath_IdSite_UrlBuilderService()
    {
        return $this->services['redeye_stormpath.id_site.url_builder'] = new \Redeye\StormpathBundle\IdSite\IdSiteUrlBuilder($this->get('redeye_stormpath.api_key'));
    }

    /**
     * Gets the 'redeye_stormpath.resource_registry.directory_href' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redeye\StormpathBundle\Registry\ResourceHrefRegistry A Redeye\StormpathBundle\Registry\ResourceHrefRegistry instance.
     */
    protected function getRedeyeStormpath_ResourceRegistry_DirectoryHrefService()
    {
        return $this->services['redeye_stormpath.resource_registry.directory_href'] = new \Redeye\StormpathBundle\Registry\ResourceHrefRegistry();
    }

    /**
     * Gets the 'redeye_stormpath.resource_registry.group_href' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redeye\StormpathBundle\Registry\ResourceHrefRegistry A Redeye\StormpathBundle\Registry\ResourceHrefRegistry instance.
     */
    protected function getRedeyeStormpath_ResourceRegistry_GroupHrefService()
    {
        return $this->services['redeye_stormpath.resource_registry.group_href'] = new \Redeye\StormpathBundle\Registry\ResourceHrefRegistry();
    }

    /**
     * Gets the 'redeye_stormpath.security.user_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redeye\StormpathBundle\User\StormpathUserProvider A Redeye\StormpathBundle\User\StormpathUserProvider instance.
     */
    protected function getRedeyeStormpath_Security_UserProviderService()
    {
        return $this->services['redeye_stormpath.security.user_provider'] = new \Redeye\StormpathBundle\User\StormpathUserProvider($this->get('redeye_stormpath.client'), $this->get('redeye_stormpath.default_application'));
    }

    /**
     * Gets the 'redeye_stormpath.stormpath.authentication.provider.usernamepassword' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redeye\StormpathBundle\Security\Authentication\StormpathUsernamePasswordAuthenticationProvider A Redeye\StormpathBundle\Security\Authentication\StormpathUsernamePasswordAuthenticationProvider instance.
     */
    protected function getRedeyeStormpath_Stormpath_Authentication_Provider_UsernamepasswordService()
    {
        return $this->services['redeye_stormpath.stormpath.authentication.provider.usernamepassword'] = new \Redeye\StormpathBundle\Security\Authentication\StormpathUsernamePasswordAuthenticationProvider($this->get('redeye_stormpath.default_application'), NULL, NULL);
    }

    /**
     * Gets the 'redeye_stormpath.tenant' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @param bool    $lazyLoad whether to try lazy-loading the service with a proxy
     *
     * @return \Stormpath\Resource\Tenant A Stormpath\Resource\Tenant instance.
     */
    public function getRedeyeStormpath_TenantService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;

            return $this->services['redeye_stormpath.tenant'] = new StormpathResourceTenant_0000000041be42a6000000015b8897682ffd7328cdce335252e9c27a4442da96(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getRedeyeStormpath_TenantService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                }
            );
        }

        return $this->get('redeye_stormpath.client')->getCurrentTenant();
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     * @throws InactiveScopeException when the 'request' service is requested while the 'request' scope is not active
     * @deprecated The "request" service is deprecated since Symfony 2.7 and will be removed in 3.0. Use the "request_stack" service instead.
     */
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }

        throw new RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'request_stack' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack A Symfony\Component\HttpFoundation\RequestStack instance.
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the 'response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener A Symfony\Component\HttpKernel\EventListener\ResponseListener instance.
     */
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the 'security.secure_random' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Util\SecureRandom A Symfony\Component\Security\Core\Util\SecureRandom instance.
     *
     * @deprecated The "security.secure_random" service is deprecated since Symfony 2.8 and will be removed in 3.0. Use the random_bytes() function instead.
     */
    protected function getSecurity_SecureRandomService()
    {
        @trigger_error('The "security.secure_random" service is deprecated since Symfony 2.8 and will be removed in 3.0. Use the random_bytes() function instead.', E_USER_DEPRECATED);

        return $this->services['security.secure_random'] = new \Symfony\Component\Security\Core\Util\SecureRandom((__DIR__.'/secure_random.seed'), NULL);
    }

    /**
     * Gets the 'service_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'streamed_response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener A Symfony\Component\HttpKernel\EventListener\StreamedResponseListener instance.
     */
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }

    /**
     * Gets the 'test.client' service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Client A Symfony\Bundle\FrameworkBundle\Client instance.
     */
    protected function getTest_ClientService()
    {
        return new \Symfony\Bundle\FrameworkBundle\Client($this->get('kernel'), array(), new \Symfony\Component\BrowserKit\History(), new \Symfony\Component\BrowserKit\CookieJar());
    }

    /**
     * Gets the 'test.client.cookiejar' service.
     *
     * @return \Symfony\Component\BrowserKit\CookieJar A Symfony\Component\BrowserKit\CookieJar instance.
     */
    protected function getTest_Client_CookiejarService()
    {
        return new \Symfony\Component\BrowserKit\CookieJar();
    }

    /**
     * Gets the 'test.client.history' service.
     *
     * @return \Symfony\Component\BrowserKit\History A Symfony\Component\BrowserKit\History instance.
     */
    protected function getTest_Client_HistoryService()
    {
        return new \Symfony\Component\BrowserKit\History();
    }

    /**
     * Gets the 'test.session.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\TestSessionListener A Symfony\Bundle\FrameworkBundle\EventListener\TestSessionListener instance.
     */
    protected function getTest_Session_ListenerService()
    {
        return $this->services['test.session.listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\TestSessionListener($this);
    }

    /**
     * Gets the 'translation.dumper.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\CsvFileDumper A Symfony\Component\Translation\Dumper\CsvFileDumper instance.
     */
    protected function getTranslation_Dumper_CsvService()
    {
        return $this->services['translation.dumper.csv'] = new \Symfony\Component\Translation\Dumper\CsvFileDumper();
    }

    /**
     * Gets the 'translation.dumper.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\IniFileDumper A Symfony\Component\Translation\Dumper\IniFileDumper instance.
     */
    protected function getTranslation_Dumper_IniService()
    {
        return $this->services['translation.dumper.ini'] = new \Symfony\Component\Translation\Dumper\IniFileDumper();
    }

    /**
     * Gets the 'translation.dumper.json' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\JsonFileDumper A Symfony\Component\Translation\Dumper\JsonFileDumper instance.
     */
    protected function getTranslation_Dumper_JsonService()
    {
        return $this->services['translation.dumper.json'] = new \Symfony\Component\Translation\Dumper\JsonFileDumper();
    }

    /**
     * Gets the 'translation.dumper.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\MoFileDumper A Symfony\Component\Translation\Dumper\MoFileDumper instance.
     */
    protected function getTranslation_Dumper_MoService()
    {
        return $this->services['translation.dumper.mo'] = new \Symfony\Component\Translation\Dumper\MoFileDumper();
    }

    /**
     * Gets the 'translation.dumper.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\PhpFileDumper A Symfony\Component\Translation\Dumper\PhpFileDumper instance.
     */
    protected function getTranslation_Dumper_PhpService()
    {
        return $this->services['translation.dumper.php'] = new \Symfony\Component\Translation\Dumper\PhpFileDumper();
    }

    /**
     * Gets the 'translation.dumper.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\PoFileDumper A Symfony\Component\Translation\Dumper\PoFileDumper instance.
     */
    protected function getTranslation_Dumper_PoService()
    {
        return $this->services['translation.dumper.po'] = new \Symfony\Component\Translation\Dumper\PoFileDumper();
    }

    /**
     * Gets the 'translation.dumper.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\QtFileDumper A Symfony\Component\Translation\Dumper\QtFileDumper instance.
     */
    protected function getTranslation_Dumper_QtService()
    {
        return $this->services['translation.dumper.qt'] = new \Symfony\Component\Translation\Dumper\QtFileDumper();
    }

    /**
     * Gets the 'translation.dumper.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\IcuResFileDumper A Symfony\Component\Translation\Dumper\IcuResFileDumper instance.
     */
    protected function getTranslation_Dumper_ResService()
    {
        return $this->services['translation.dumper.res'] = new \Symfony\Component\Translation\Dumper\IcuResFileDumper();
    }

    /**
     * Gets the 'translation.dumper.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\XliffFileDumper A Symfony\Component\Translation\Dumper\XliffFileDumper instance.
     */
    protected function getTranslation_Dumper_XliffService()
    {
        return $this->services['translation.dumper.xliff'] = new \Symfony\Component\Translation\Dumper\XliffFileDumper();
    }

    /**
     * Gets the 'translation.dumper.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\YamlFileDumper A Symfony\Component\Translation\Dumper\YamlFileDumper instance.
     */
    protected function getTranslation_Dumper_YmlService()
    {
        return $this->services['translation.dumper.yml'] = new \Symfony\Component\Translation\Dumper\YamlFileDumper();
    }

    /**
     * Gets the 'translation.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Extractor\ChainExtractor A Symfony\Component\Translation\Extractor\ChainExtractor instance.
     */
    protected function getTranslation_ExtractorService()
    {
        $this->services['translation.extractor'] = $instance = new \Symfony\Component\Translation\Extractor\ChainExtractor();

        $instance->addExtractor('php', $this->get('translation.extractor.php'));

        return $instance;
    }

    /**
     * Gets the 'translation.extractor.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor A Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor instance.
     */
    protected function getTranslation_Extractor_PhpService()
    {
        return $this->services['translation.extractor.php'] = new \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor();
    }

    /**
     * Gets the 'translation.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader A Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader instance.
     */
    protected function getTranslation_LoaderService()
    {
        $a = $this->get('translation.loader.xliff');

        $this->services['translation.loader'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader();

        $instance->addLoader('php', $this->get('translation.loader.php'));
        $instance->addLoader('yml', $this->get('translation.loader.yml'));
        $instance->addLoader('xlf', $a);
        $instance->addLoader('xliff', $a);
        $instance->addLoader('po', $this->get('translation.loader.po'));
        $instance->addLoader('mo', $this->get('translation.loader.mo'));
        $instance->addLoader('ts', $this->get('translation.loader.qt'));
        $instance->addLoader('csv', $this->get('translation.loader.csv'));
        $instance->addLoader('res', $this->get('translation.loader.res'));
        $instance->addLoader('dat', $this->get('translation.loader.dat'));
        $instance->addLoader('ini', $this->get('translation.loader.ini'));
        $instance->addLoader('json', $this->get('translation.loader.json'));

        return $instance;
    }

    /**
     * Gets the 'translation.loader.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\CsvFileLoader A Symfony\Component\Translation\Loader\CsvFileLoader instance.
     */
    protected function getTranslation_Loader_CsvService()
    {
        return $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }

    /**
     * Gets the 'translation.loader.dat' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuDatFileLoader A Symfony\Component\Translation\Loader\IcuDatFileLoader instance.
     */
    protected function getTranslation_Loader_DatService()
    {
        return $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader();
    }

    /**
     * Gets the 'translation.loader.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IniFileLoader A Symfony\Component\Translation\Loader\IniFileLoader instance.
     */
    protected function getTranslation_Loader_IniService()
    {
        return $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }

    /**
     * Gets the 'translation.loader.json' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\JsonFileLoader A Symfony\Component\Translation\Loader\JsonFileLoader instance.
     */
    protected function getTranslation_Loader_JsonService()
    {
        return $this->services['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader();
    }

    /**
     * Gets the 'translation.loader.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\MoFileLoader A Symfony\Component\Translation\Loader\MoFileLoader instance.
     */
    protected function getTranslation_Loader_MoService()
    {
        return $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }

    /**
     * Gets the 'translation.loader.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PhpFileLoader A Symfony\Component\Translation\Loader\PhpFileLoader instance.
     */
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }

    /**
     * Gets the 'translation.loader.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PoFileLoader A Symfony\Component\Translation\Loader\PoFileLoader instance.
     */
    protected function getTranslation_Loader_PoService()
    {
        return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }

    /**
     * Gets the 'translation.loader.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\QtFileLoader A Symfony\Component\Translation\Loader\QtFileLoader instance.
     */
    protected function getTranslation_Loader_QtService()
    {
        return $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }

    /**
     * Gets the 'translation.loader.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuResFileLoader A Symfony\Component\Translation\Loader\IcuResFileLoader instance.
     */
    protected function getTranslation_Loader_ResService()
    {
        return $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }

    /**
     * Gets the 'translation.loader.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\XliffFileLoader A Symfony\Component\Translation\Loader\XliffFileLoader instance.
     */
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }

    /**
     * Gets the 'translation.loader.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\YamlFileLoader A Symfony\Component\Translation\Loader\YamlFileLoader instance.
     */
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }

    /**
     * Gets the 'translation.writer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Writer\TranslationWriter A Symfony\Component\Translation\Writer\TranslationWriter instance.
     */
    protected function getTranslation_WriterService()
    {
        $this->services['translation.writer'] = $instance = new \Symfony\Component\Translation\Writer\TranslationWriter();

        $instance->addDumper('php', $this->get('translation.dumper.php'));
        $instance->addDumper('xlf', $this->get('translation.dumper.xliff'));
        $instance->addDumper('po', $this->get('translation.dumper.po'));
        $instance->addDumper('mo', $this->get('translation.dumper.mo'));
        $instance->addDumper('yml', $this->get('translation.dumper.yml'));
        $instance->addDumper('ts', $this->get('translation.dumper.qt'));
        $instance->addDumper('csv', $this->get('translation.dumper.csv'));
        $instance->addDumper('ini', $this->get('translation.dumper.ini'));
        $instance->addDumper('json', $this->get('translation.dumper.json'));
        $instance->addDumper('res', $this->get('translation.dumper.res'));

        return $instance;
    }

    /**
     * Gets the 'translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\IdentityTranslator A Symfony\Component\Translation\IdentityTranslator instance.
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\IdentityTranslator($this->get('translator.selector'));
    }

    /**
     * Gets the 'translator.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator A Symfony\Bundle\FrameworkBundle\Translation\Translator instance.
     */
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, $this->get('translator.selector'), array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini'), 'translation.loader.json' => array(0 => 'json')), array('cache_dir' => (__DIR__.'/translations'), 'debug' => true), array());

        $instance->setConfigCacheFactory($this->get('config_cache_factory'));

        return $instance;
    }

    /**
     * Gets the 'translator_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\TranslatorListener A Symfony\Component\HttpKernel\EventListener\TranslatorListener instance.
     */
    protected function getTranslatorListenerService()
    {
        return $this->services['translator_listener'] = new \Symfony\Component\HttpKernel\EventListener\TranslatorListener($this->get('translator'), $this->get('request_stack'));
    }

    /**
     * Gets the 'uri_signer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\UriSigner A Symfony\Component\HttpKernel\UriSigner instance.
     */
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('asdf1234');
    }

    /**
     * Gets the 'redeye_stormpath.api_key' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Stormpath\ApiKey A Stormpath\ApiKey instance.
     */
    protected function getRedeyeStormpath_ApiKeyService()
    {
        return $this->services['redeye_stormpath.api_key'] = call_user_func(array(new \Redeye\StormpathBundle\Factory\ApiKeyFactory('apiKey.id', 'apiKey.secret'), 'createFromFile'), ($this->targetDirs[2].'/stormpath.properties'));
    }

    /**
     * Gets the 'translator.selector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Translation\MessageSelector A Symfony\Component\Translation\MessageSelector instance.
     */
    protected function getTranslator_SelectorService()
    {
        return $this->services['translator.selector'] = new \Symfony\Component\Translation\MessageSelector();
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        $name = strtolower($name);

        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => $this->targetDirs[2],
            'kernel.environment' => 'test',
            'kernel.debug' => true,
            'kernel.name' => 'Tests',
            'kernel.cache_dir' => __DIR__,
            'kernel.logs_dir' => ($this->targetDirs[2].'/logs'),
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'RedeyeStormpathBundle' => 'Redeye\\StormpathBundle\\RedeyeStormpathBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'TestsTestDebugProjectContainer',
            'kernel.secret' => 'asdf1234',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'controller_name_converter.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
            'response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener',
            'streamed_response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener',
            'locale_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener',
            'event_dispatcher.class' => 'Symfony\\Component\\EventDispatcher\\ContainerAwareEventDispatcher',
            'http_kernel.class' => 'Symfony\\Component\\HttpKernel\\DependencyInjection\\ContainerAwareHttpKernel',
            'filesystem.class' => 'Symfony\\Component\\Filesystem\\Filesystem',
            'cache_warmer.class' => 'Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerAggregate',
            'cache_clearer.class' => 'Symfony\\Component\\HttpKernel\\CacheClearer\\ChainCacheClearer',
            'file_locator.class' => 'Symfony\\Component\\HttpKernel\\Config\\FileLocator',
            'uri_signer.class' => 'Symfony\\Component\\HttpKernel\\UriSigner',
            'request_stack.class' => 'Symfony\\Component\\HttpFoundation\\RequestStack',
            'fragment.handler.class' => 'Symfony\\Component\\HttpKernel\\DependencyInjection\\LazyLoadingFragmentHandler',
            'fragment.renderer.inline.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\InlineFragmentRenderer',
            'fragment.renderer.hinclude.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\HIncludeFragmentRenderer',
            'fragment.renderer.hinclude.global_template' => '',
            'fragment.renderer.esi.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\EsiFragmentRenderer',
            'fragment.path' => '/_fragment',
            'translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\Translator',
            'translator.identity.class' => 'Symfony\\Component\\Translation\\IdentityTranslator',
            'translator.selector.class' => 'Symfony\\Component\\Translation\\MessageSelector',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'translation.loader.po.class' => 'Symfony\\Component\\Translation\\Loader\\PoFileLoader',
            'translation.loader.mo.class' => 'Symfony\\Component\\Translation\\Loader\\MoFileLoader',
            'translation.loader.qt.class' => 'Symfony\\Component\\Translation\\Loader\\QtFileLoader',
            'translation.loader.csv.class' => 'Symfony\\Component\\Translation\\Loader\\CsvFileLoader',
            'translation.loader.res.class' => 'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader',
            'translation.loader.dat.class' => 'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader',
            'translation.loader.ini.class' => 'Symfony\\Component\\Translation\\Loader\\IniFileLoader',
            'translation.loader.json.class' => 'Symfony\\Component\\Translation\\Loader\\JsonFileLoader',
            'translation.dumper.php.class' => 'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper',
            'translation.dumper.xliff.class' => 'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper',
            'translation.dumper.po.class' => 'Symfony\\Component\\Translation\\Dumper\\PoFileDumper',
            'translation.dumper.mo.class' => 'Symfony\\Component\\Translation\\Dumper\\MoFileDumper',
            'translation.dumper.yml.class' => 'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper',
            'translation.dumper.qt.class' => 'Symfony\\Component\\Translation\\Dumper\\QtFileDumper',
            'translation.dumper.csv.class' => 'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper',
            'translation.dumper.ini.class' => 'Symfony\\Component\\Translation\\Dumper\\IniFileDumper',
            'translation.dumper.json.class' => 'Symfony\\Component\\Translation\\Dumper\\JsonFileDumper',
            'translation.dumper.res.class' => 'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper',
            'translation.extractor.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\PhpExtractor',
            'translation.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\TranslationLoader',
            'translation.extractor.class' => 'Symfony\\Component\\Translation\\Extractor\\ChainExtractor',
            'translation.writer.class' => 'Symfony\\Component\\Translation\\Writer\\TranslationWriter',
            'property_accessor.class' => 'Symfony\\Component\\PropertyAccess\\PropertyAccessor',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(

            ),
            'kernel.trusted_proxies' => array(

            ),
            'kernel.default_locale' => 'en',
            'test.client.class' => 'Symfony\\Bundle\\FrameworkBundle\\Client',
            'test.client.parameters' => array(

            ),
            'test.client.history.class' => 'Symfony\\Component\\BrowserKit\\History',
            'test.client.cookiejar.class' => 'Symfony\\Component\\BrowserKit\\CookieJar',
            'test.session.listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\TestSessionListener',
            'security.secure_random.class' => 'Symfony\\Component\\Security\\Core\\Util\\SecureRandom',
            'data_collector.templates' => array(

            ),
            'annotations.reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'annotations.cached_reader.class' => 'Doctrine\\Common\\Annotations\\CachedReader',
            'annotations.file_cache_reader.class' => 'Doctrine\\Common\\Annotations\\FileCacheReader',
            'debug.debug_handlers_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener',
            'debug.stopwatch.class' => 'Symfony\\Component\\Stopwatch\\Stopwatch',
            'debug.error_handler.throw_at' => -1,
            'debug.event_dispatcher.class' => 'Symfony\\Component\\HttpKernel\\Debug\\TraceableEventDispatcher',
            'debug.container.dump' => (__DIR__.'/TestsTestDebugProjectContainer.xml'),
            'debug.controller_resolver.class' => 'Symfony\\Component\\HttpKernel\\Controller\\TraceableControllerResolver',
            'redeye_stormpath.api_key.id_property_name' => 'apiKey.id',
            'redeye_stormpath.api_key.secret_property_name' => 'apiKey.secret',
            'redeye_stormpath.api_key.api_key_file' => ($this->targetDirs[2].'/stormpath.properties'),
            'redeye_stormpath.client.cache_manager_class' => 'Stormpath\\Cache\\NullCacheManager',
            'console.command.ids' => array(

            ),
        );
    }
}

class StormpathResourceTenant_0000000041be42a6000000015b8897682ffd7328cdce335252e9c27a4442da96 extends \Stormpath\Resource\Tenant implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder567447e768563128800303 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer567447e7685cc826885128 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties567447e768214069848338 = array(
        
    );

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getName', array(), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getKey()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getKey', array(), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getKey();
    }

    /**
     * {@inheritDoc}
     */
    public function createApplication(\Stormpath\Resource\Application $application, array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'createApplication', array('application' => $application, 'options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->createApplication($application, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function createDirectory(\Stormpath\Resource\Directory $directory, array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'createDirectory', array('directory' => $directory, 'options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->createDirectory($directory, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function createOrganization(\Stormpath\Resource\Organization $organization, array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'createOrganization', array('organization' => $organization, 'options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->createOrganization($organization, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function getApplications(array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getApplications', array('options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getApplications($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getDirectories(array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getDirectories', array('options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getDirectories($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomData(array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getCustomData', array('options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getCustomData($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrganizations(array $options = array())
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getOrganizations', array('options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getOrganizations($options);
    }

    /**
     * {@inheritDoc}
     */
    public function verifyEmailToken($token)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'verifyEmailToken', array('token' => $token), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->verifyEmailToken($token);
    }

    /**
     * {@inheritDoc}
     */
    public function save()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'save', array(), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->save();
    }

    /**
     * {@inheritDoc}
     */
    public function setProperties(\stdClass $properties = null)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'setProperties', array('properties' => $properties), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->setProperties($properties);
    }

    /**
     * {@inheritDoc}
     */
    public function getProperty($name)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getProperty', array('name' => $name), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getProperty($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getPropertyNames($retrieveDirtyProperties = false)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getPropertyNames', array('retrieveDirtyProperties' => $retrieveDirtyProperties), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getPropertyNames($retrieveDirtyProperties);
    }

    /**
     * {@inheritDoc}
     */
    public function getHref()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getHref', array(), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getHref();
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions($options)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'setOptions', array('options' => $options), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->setOptions($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'getOptions', array(), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->getOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__toString', array(), $this->initializer567447e7685cc826885128);

        return $this->valueHolder567447e768563128800303->__toString();
    }

    /**
     * @override constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public function __construct($initializer)
    {
        $this->initializer567447e7685cc826885128 = $initializer;
    }

    /**
     * {@inheritDoc}
     * @param string $name
     */
    public function __get($name)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__get', array('name' => $name), $this->initializer567447e7685cc826885128);

        if (isset(self::$publicProperties567447e768214069848338[$name])) {
            return $this->valueHolder567447e768563128800303->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e768563128800303;

            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }

        $targetObject = $this->valueHolder567447e768563128800303;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * {@inheritDoc}
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer567447e7685cc826885128);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e768563128800303;

            return $targetObject->$name = $value;;
            return;
        }

        $targetObject = $this->valueHolder567447e768563128800303;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __isset($name)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__isset', array('name' => $name), $this->initializer567447e7685cc826885128);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e768563128800303;

            return isset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder567447e768563128800303;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __unset($name)
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__unset', array('name' => $name), $this->initializer567447e7685cc826885128);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e768563128800303;

            unset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder567447e768563128800303;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__clone', array(), $this->initializer567447e7685cc826885128);

        $this->valueHolder567447e768563128800303 = clone $this->valueHolder567447e768563128800303;
    }

    public function __sleep()
    {
        $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, '__sleep', array(), $this->initializer567447e7685cc826885128);

        return array('valueHolder567447e768563128800303');
    }

    public function __wakeup()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer567447e7685cc826885128 = $initializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyInitializer()
    {
        return $this->initializer567447e7685cc826885128;
    }

    /**
     * {@inheritDoc}
     */
    public function initializeProxy()
    {
        return $this->initializer567447e7685cc826885128 && $this->initializer567447e7685cc826885128->__invoke($this->valueHolder567447e768563128800303, $this, 'initializeProxy', array(), $this->initializer567447e7685cc826885128);
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder567447e768563128800303;
    }

    /**
     * {@inheritDoc}
     */
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder567447e768563128800303;
    }


}

class StormpathResourceApplication_0000000041be42aa000000015b8897682ffd7328cdce335252e9c27a4442da96 extends \Stormpath\Resource\Application implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder567447e76c38c216476852 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer567447e76c399432319986 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties567447e76c36e422649781 = array(
        
    );

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getName', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'setName', array('name' => $name), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getDescription', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'setDescription', array('description' => $description), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getStatus', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'setStatus', array('status' => $status), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getTenant(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getTenant', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getTenant($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccounts(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getAccounts', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getAccounts($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultAccountStoreMapping(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getDefaultAccountStoreMapping', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getDefaultAccountStoreMapping($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultGroupStoreMapping(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getDefaultGroupStoreMapping', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getDefaultGroupStoreMapping($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getGroups(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getGroups', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getGroups($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getOauthPolicy(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getOauthPolicy', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getOauthPolicy($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomData(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getCustomData', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getCustomData($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccountStoreMappings(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getAccountStoreMappings', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getAccountStoreMappings($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getLoginAttempts(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getLoginAttempts', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getLoginAttempts($options);
    }

    /**
     * {@inheritDoc}
     */
    public function createAccount(\Stormpath\Resource\Account $account, array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'createAccount', array('account' => $account, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->createAccount($account, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function createGroup(\Stormpath\Resource\Group $group, array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'createGroup', array('group' => $group, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->createGroup($group, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function createAccountStoreMapping(\Stormpath\Resource\AccountStoreMapping $accountStoreMapping, array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'createAccountStoreMapping', array('accountStoreMapping' => $accountStoreMapping, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->createAccountStoreMapping($accountStoreMapping, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function sendPasswordResetEmail($accountUsernameOrEmail, array $options = array(), $returnTokenResource = false)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'sendPasswordResetEmail', array('accountUsernameOrEmail' => $accountUsernameOrEmail, 'options' => $options, 'returnTokenResource' => $returnTokenResource), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->sendPasswordResetEmail($accountUsernameOrEmail, $options, $returnTokenResource);
    }

    /**
     * {@inheritDoc}
     */
    public function verifyPasswordResetToken($token, array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'verifyPasswordResetToken', array('token' => $token, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->verifyPasswordResetToken($token, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function resetPassword($token, $password)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'resetPassword', array('token' => $token, 'password' => $password), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->resetPassword($token, $password);
    }

    /**
     * {@inheritDoc}
     */
    public function authenticateAccount(\Stormpath\Authc\AuthenticationRequest $request, array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'authenticateAccount', array('request' => $request, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->authenticateAccount($request, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function authenticate($username, $password, array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'authenticate', array('username' => $username, 'password' => $password, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->authenticate($username, $password, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function createIdSiteUrl(array $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'createIdSiteUrl', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->createIdSiteUrl($options);
    }

    /**
     * {@inheritDoc}
     */
    public function handleIdSiteCallback($responseUri)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'handleIdSiteCallback', array('responseUri' => $responseUri), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->handleIdSiteCallback($responseUri);
    }

    /**
     * {@inheritDoc}
     */
    public function delete()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'delete', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function getAccount(\Stormpath\Provider\ProviderAccountRequest $request)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getAccount', array('request' => $request), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getAccount($request);
    }

    /**
     * {@inheritDoc}
     */
    public function sendVerificationEmail($login, $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'sendVerificationEmail', array('login' => $login, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->sendVerificationEmail($login, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function getApiKey($apiKeyId, $options = array())
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getApiKey', array('apiKeyId' => $apiKeyId, 'options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getApiKey($apiKeyId, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function save()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'save', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->save();
    }

    /**
     * {@inheritDoc}
     */
    public function setProperties(\stdClass $properties = null)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'setProperties', array('properties' => $properties), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->setProperties($properties);
    }

    /**
     * {@inheritDoc}
     */
    public function getProperty($name)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getProperty', array('name' => $name), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getProperty($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getPropertyNames($retrieveDirtyProperties = false)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getPropertyNames', array('retrieveDirtyProperties' => $retrieveDirtyProperties), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getPropertyNames($retrieveDirtyProperties);
    }

    /**
     * {@inheritDoc}
     */
    public function getHref()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getHref', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getHref();
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions($options)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'setOptions', array('options' => $options), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->setOptions($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'getOptions', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->getOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__toString', array(), $this->initializer567447e76c399432319986);

        return $this->valueHolder567447e76c38c216476852->__toString();
    }

    /**
     * @override constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public function __construct($initializer)
    {
        $this->initializer567447e76c399432319986 = $initializer;
    }

    /**
     * {@inheritDoc}
     * @param string $name
     */
    public function __get($name)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__get', array('name' => $name), $this->initializer567447e76c399432319986);

        if (isset(self::$publicProperties567447e76c36e422649781[$name])) {
            return $this->valueHolder567447e76c38c216476852->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e76c38c216476852;

            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }

        $targetObject = $this->valueHolder567447e76c38c216476852;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * {@inheritDoc}
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer567447e76c399432319986);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e76c38c216476852;

            return $targetObject->$name = $value;;
            return;
        }

        $targetObject = $this->valueHolder567447e76c38c216476852;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __isset($name)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__isset', array('name' => $name), $this->initializer567447e76c399432319986);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e76c38c216476852;

            return isset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder567447e76c38c216476852;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __unset($name)
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__unset', array('name' => $name), $this->initializer567447e76c399432319986);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder567447e76c38c216476852;

            unset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder567447e76c38c216476852;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__clone', array(), $this->initializer567447e76c399432319986);

        $this->valueHolder567447e76c38c216476852 = clone $this->valueHolder567447e76c38c216476852;
    }

    public function __sleep()
    {
        $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, '__sleep', array(), $this->initializer567447e76c399432319986);

        return array('valueHolder567447e76c38c216476852');
    }

    public function __wakeup()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer567447e76c399432319986 = $initializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyInitializer()
    {
        return $this->initializer567447e76c399432319986;
    }

    /**
     * {@inheritDoc}
     */
    public function initializeProxy()
    {
        return $this->initializer567447e76c399432319986 && $this->initializer567447e76c399432319986->__invoke($this->valueHolder567447e76c38c216476852, $this, 'initializeProxy', array(), $this->initializer567447e76c399432319986);
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder567447e76c38c216476852;
    }

    /**
     * {@inheritDoc}
     */
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder567447e76c38c216476852;
    }


}
