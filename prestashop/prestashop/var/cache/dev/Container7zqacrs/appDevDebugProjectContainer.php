<?php

namespace Container7zqacrs;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class appDevDebugProjectContainer extends Container
{
    private $buildParameters;
    private $containerDir;
    private $parameters;
    private $targetDirs = [];

    public function __construct(array $buildParameters = [], $containerDir = __DIR__)
    {
        $dir = $this->targetDirs[0] = \dirname($containerDir);
        for ($i = 1; $i <= 4; ++$i) {
            $this->targetDirs[$i] = $dir = \dirname($dir);
        }
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->normalizedIds = [
            'prestashop.core.api.stockmovement.controller' => 'prestashop.core.api.stockMovement.controller',
            'prestashop.core.api.stockmovement.repository' => 'prestashop.core.api.stockMovement.repository',
            'prestashop.twig.extension.dataformatter' => 'prestashop.twig.extension.dataFormatter',
            'symfony\\bundle\\frameworkbundle\\controller\\redirectcontroller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController',
            'symfony\\bundle\\frameworkbundle\\controller\\templatecontroller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController',
        ];
        $this->syntheticIds = [
            'kernel' => true,
        ];
        $this->methodMap = [
            'annotation_reader' => 'getAnnotationReaderService',
            'annotations.reader' => 'getAnnotations_ReaderService',
            'argument_metadata_factory' => 'getArgumentMetadataFactoryService',
            'assets._version__default' => 'getAssets_VersionDefaultService',
            'assets.context' => 'getAssets_ContextService',
            'assets.packages' => 'getAssets_PackagesService',
            'cache.annotations' => 'getCache_AnnotationsService',
            'cache.app' => 'getCache_AppService',
            'cache.serializer' => 'getCache_SerializerService',
            'cache.system' => 'getCache_SystemService',
            'cache.validator' => 'getCache_ValidatorService',
            'config_cache_factory' => 'getConfigCacheFactoryService',
            'controller_name_converter' => 'getControllerNameConverterService',
            'csa_guzzle.client.addons_api' => 'getCsaGuzzle_Client_AddonsApiService',
            'csa_guzzle.data_collector.guzzle' => 'getCsaGuzzle_DataCollector_GuzzleService',
            'csa_guzzle.subscriber.cache' => 'getCsaGuzzle_Subscriber_CacheService',
            'csa_guzzle.subscriber.debug' => 'getCsaGuzzle_Subscriber_DebugService',
            'csa_guzzle.subscriber.stopwatch' => 'getCsaGuzzle_Subscriber_StopwatchService',
            'csa_guzzle.twig.extension' => 'getCsaGuzzle_Twig_ExtensionService',
            'data_collector.dump' => 'getDataCollector_DumpService',
            'data_collector.form' => 'getDataCollector_FormService',
            'data_collector.form.extractor' => 'getDataCollector_Form_ExtractorService',
            'data_collector.request' => 'getDataCollector_RequestService',
            'data_collector.router' => 'getDataCollector_RouterService',
            'data_collector.translation' => 'getDataCollector_TranslationService',
            'debug.argument_resolver' => 'getDebug_ArgumentResolverService',
            'debug.controller_resolver' => 'getDebug_ControllerResolverService',
            'debug.debug_handlers_listener' => 'getDebug_DebugHandlersListenerService',
            'debug.event_dispatcher' => 'getDebug_EventDispatcherService',
            'debug.file_link_formatter' => 'getDebug_FileLinkFormatterService',
            'debug.log_processor' => 'getDebug_LogProcessorService',
            'debug.security.access.decision_manager' => 'getDebug_Security_Access_DecisionManagerService',
            'debug.stopwatch' => 'getDebug_StopwatchService',
            'doctrine' => 'getDoctrineService',
            'doctrine.cache.provider' => 'getDoctrine_Cache_ProviderService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.dbal.logger.profiling.default' => 'getDoctrine_Dbal_Logger_Profiling_DefaultService',
            'doctrine.orm.default_entity_listener_resolver' => 'getDoctrine_Orm_DefaultEntityListenerResolverService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_listeners.attach_entity_listeners' => 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService',
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService',
            'doctrine_cache.providers.doctrine.orm.default_result_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'fragment.listener' => 'getFragment_ListenerService',
            'framework_extra_bundle.argument_name_convertor' => 'getFrameworkExtraBundle_ArgumentNameConvertorService',
            'framework_extra_bundle.event.is_granted' => 'getFrameworkExtraBundle_Event_IsGrantedService',
            'guzzle.cache' => 'getGuzzle_CacheService',
            'http_kernel' => 'getHttpKernelService',
            'locale_listener' => 'getLocaleListenerService',
            'logger' => 'getLoggerService',
            'monolog.handler.console' => 'getMonolog_Handler_ConsoleService',
            'monolog.handler.console_very_verbose' => 'getMonolog_Handler_ConsoleVeryVerboseService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.logger.cache' => 'getMonolog_Logger_CacheService',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService',
            'monolog.logger.event' => 'getMonolog_Logger_EventService',
            'monolog.logger.php' => 'getMonolog_Logger_PhpService',
            'monolog.logger.profiler' => 'getMonolog_Logger_ProfilerService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.translation' => 'getMonolog_Logger_TranslationService',
            'monolog.processor.psr_log_message' => 'getMonolog_Processor_PsrLogMessageService',
            'prestashop.adapter.admin.data_provider.addons' => 'getPrestashop_Adapter_Admin_DataProvider_AddonsService',
            'prestashop.adapter.data_provider.currency' => 'getPrestashop_Adapter_DataProvider_CurrencyService',
            'prestashop.adapter.data_provider.module' => 'getPrestashop_Adapter_DataProvider_ModuleService',
            'prestashop.adapter.legacy.block.helper.subscriber' => 'getPrestashop_Adapter_Legacy_Block_Helper_SubscriberService',
            'prestashop.adapter.legacy.configuration' => 'getPrestashop_Adapter_Legacy_ConfigurationService',
            'prestashop.adapter.legacy.context' => 'getPrestashop_Adapter_Legacy_ContextService',
            'prestashop.adapter.legacy.hook.subscriber' => 'getPrestashop_Adapter_Legacy_Hook_SubscriberService',
            'prestashop.adapter.legacy.logger' => 'getPrestashop_Adapter_Legacy_LoggerService',
            'prestashop.adapter.middleware.ssl' => 'getPrestashop_Adapter_Middleware_SslService',
            'prestashop.adapter.module.prestatrust.checker' => 'getPrestashop_Adapter_Module_Prestatrust_CheckerService',
            'prestashop.adapter.security.admin' => 'getPrestashop_Adapter_Security_AdminService',
            'prestashop.adapter.tools' => 'getPrestashop_Adapter_ToolsService',
            'prestashop.addons.client_api' => 'getPrestashop_Addons_ClientApiService',
            'prestashop.bundle.event_listener.back_url_redirect_response_listener' => 'getPrestashop_Bundle_EventListener_BackUrlRedirectResponseListenerService',
            'prestashop.bundle.routing.converter.cache_provider' => 'getPrestashop_Bundle_Routing_Converter_CacheProviderService',
            'prestashop.bundle.routing.converter.legacy_url_converter' => 'getPrestashop_Bundle_Routing_Converter_LegacyUrlConverterService',
            'prestashop.bundle.routing.converter.router_provider' => 'getPrestashop_Bundle_Routing_Converter_RouterProviderService',
            'prestashop.bundle.routing.converter.routing_cache_key_generator' => 'getPrestashop_Bundle_Routing_Converter_RoutingCacheKeyGeneratorService',
            'prestashop.bundle.twig.extension.column' => 'getPrestashop_Bundle_Twig_Extension_ColumnService',
            'prestashop.bundle.twig.extension.documentation_link_provider_extension' => 'getPrestashop_Bundle_Twig_Extension_DocumentationLinkProviderExtensionService',
            'prestashop.categories_provider' => 'getPrestashop_CategoriesProviderService',
            'prestashop.core.admin.data_provider.module_interface' => 'getPrestashop_Core_Admin_DataProvider_ModuleInterfaceService',
            'prestashop.core.admin.module.repository' => 'getPrestashop_Core_Admin_Module_RepositoryService',
            'prestashop.core.hook.dispatcher' => 'getPrestashop_Core_Hook_DispatcherService',
            'prestashop.core.module.updater' => 'getPrestashop_Core_Module_UpdaterService',
            'prestashop.core.uti.back_url_provider' => 'getPrestashop_Core_Uti_BackUrlProviderService',
            'prestashop.core.util.helper_card.documentation_link_provider' => 'getPrestashop_Core_Util_HelperCard_DocumentationLinkProviderService',
            'prestashop.database.naming_strategy' => 'getPrestashop_Database_NamingStrategyService',
            'prestashop.demo_mode_enabled.listener' => 'getPrestashop_DemoModeEnabled_ListenerService',
            'prestashop.dispatcher.legacy_hooks.subscriber' => 'getPrestashop_Dispatcher_LegacyHooks_SubscriberService',
            'prestashop.handler.log' => 'getPrestashop_Handler_LogService',
            'prestashop.hook.dispatcher' => 'getPrestashop_Hook_DispatcherService',
            'prestashop.hooks_registry' => 'getPrestashop_HooksRegistryService',
            'prestashop.legacy_url_listener' => 'getPrestashop_LegacyUrlListenerService',
            'prestashop.module.zip.manager' => 'getPrestashop_Module_Zip_ManagerService',
            'prestashop.module_activated.listener' => 'getPrestashop_ModuleActivated_ListenerService',
            'prestashop.security.admin.provider' => 'getPrestashop_Security_Admin_ProviderService',
            'prestashop.static_cache.adapter' => 'getPrestashop_StaticCache_AdapterService',
            'prestashop.tokenized_url_listener' => 'getPrestashop_TokenizedUrlListenerService',
            'prestashop.twig.extension.context_iso_code_provider_extension' => 'getPrestashop_Twig_Extension_ContextIsoCodeProviderExtensionService',
            'prestashop.twig.extension.data_formatter' => 'getPrestashop_Twig_Extension_DataFormatterService',
            'prestashop.twig.extension.hook' => 'getPrestashop_Twig_Extension_HookService',
            'prestashop.twig.extension.layout' => 'getPrestashop_Twig_Extension_LayoutService',
            'prestashop.twig.extension.path_with_back_url_extension' => 'getPrestashop_Twig_Extension_PathWithBackUrlExtensionService',
            'prestashop.twig.extension.stringloader' => 'getPrestashop_Twig_Extension_StringloaderService',
            'prestashop.twig.extension.translation' => 'getPrestashop_Twig_Extension_TranslationService',
            'prestashop.twig.modules.loader' => 'getPrestashop_Twig_Modules_LoaderService',
            'prestashop.user_locale.listener' => 'getPrestashop_UserLocale_ListenerService',
            'profiler' => 'getProfilerService',
            'profiler_listener' => 'getProfilerListenerService',
            'request_stack' => 'getRequestStackService',
            'resolve_controller_name_subscriber' => 'getResolveControllerNameSubscriberService',
            'response_listener' => 'getResponseListenerService',
            'router.request_context' => 'getRouter_RequestContextService',
            'router_listener' => 'getRouterListenerService',
            'security.authentication.manager' => 'getSecurity_Authentication_ManagerService',
            'security.authentication.trust_resolver' => 'getSecurity_Authentication_TrustResolverService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService',
            'security.firewall' => 'getSecurity_FirewallService',
            'security.firewall.map' => 'getSecurity_Firewall_MapService',
            'security.logout_url_generator' => 'getSecurity_LogoutUrlGeneratorService',
            'security.rememberme.response_listener' => 'getSecurity_Rememberme_ResponseListenerService',
            'security.role_hierarchy' => 'getSecurity_RoleHierarchyService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'sensio_framework_extra.cache.listener' => 'getSensioFrameworkExtra_Cache_ListenerService',
            'sensio_framework_extra.controller.listener' => 'getSensioFrameworkExtra_Controller_ListenerService',
            'sensio_framework_extra.converter.listener' => 'getSensioFrameworkExtra_Converter_ListenerService',
            'sensio_framework_extra.converter.manager' => 'getSensioFrameworkExtra_Converter_ManagerService',
            'sensio_framework_extra.security.listener' => 'getSensioFrameworkExtra_Security_ListenerService',
            'sensio_framework_extra.view.listener' => 'getSensioFrameworkExtra_View_ListenerService',
            'service_locator.sr6ctxe' => 'getServiceLocator_Sr6ctxeService',
            'session' => 'getSessionService',
            'session.save_listener' => 'getSession_SaveListenerService',
            'session.storage.metadata_bag' => 'getSession_Storage_MetadataBagService',
            'session.storage.native' => 'getSession_Storage_NativeService',
            'session_listener' => 'getSessionListenerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'templating.locator' => 'getTemplating_LocatorService',
            'templating.name_parser' => 'getTemplating_NameParserService',
            'translation_tools.translation.node_visitor' => 'getTranslationTools_Translation_NodeVisitorService',
            'translator' => 'getTranslatorService',
            'translator.default' => 'getTranslator_DefaultService',
            'translator_listener' => 'getTranslatorListenerService',
            'twig' => 'getTwigService',
            'twig.extension.routing' => 'getTwig_Extension_RoutingService',
            'twig.loader' => 'getTwig_LoaderService',
            'twig.profile' => 'getTwig_ProfileService',
            'uri_signer' => 'getUriSignerService',
            'validate_request_listener' => 'getValidateRequestListenerService',
            'validator' => 'getValidatorService',
            'validator.builder' => 'getValidator_BuilderService',
            'var_dumper.cloner' => 'getVarDumper_ClonerService',
            'web_profiler.csp.handler' => 'getWebProfiler_Csp_HandlerService',
            'web_profiler.debug_toolbar' => 'getWebProfiler_DebugToolbarService',
        ];
        $this->fileMap = [
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService.php',
            'annotations.cache' => 'getAnnotations_CacheService.php',
            'annotations.cache_warmer' => 'getAnnotations_CacheWarmerService.php',
            'argument_resolver.default' => 'getArgumentResolver_DefaultService.php',
            'argument_resolver.request' => 'getArgumentResolver_RequestService.php',
            'argument_resolver.request_attribute' => 'getArgumentResolver_RequestAttributeService.php',
            'argument_resolver.service' => 'getArgumentResolver_ServiceService.php',
            'argument_resolver.session' => 'getArgumentResolver_SessionService.php',
            'argument_resolver.variadic' => 'getArgumentResolver_VariadicService.php',
            'cache.default_clearer' => 'getCache_DefaultClearerService.php',
            'cache.global_clearer' => 'getCache_GlobalClearerService.php',
            'cache.system_clearer' => 'getCache_SystemClearerService.php',
            'cache_clearer' => 'getCacheClearerService.php',
            'cache_warmer' => 'getCacheWarmerService.php',
            'config.resource.self_checking_resource_checker' => 'getConfig_Resource_SelfCheckingResourceCheckerService.php',
            'console.command.about' => 'getConsole_Command_AboutService.php',
            'console.command.assets_install' => 'getConsole_Command_AssetsInstallService.php',
            'console.command.cache_clear' => 'getConsole_Command_CacheClearService.php',
            'console.command.cache_pool_clear' => 'getConsole_Command_CachePoolClearService.php',
            'console.command.cache_pool_prune' => 'getConsole_Command_CachePoolPruneService.php',
            'console.command.cache_warmup' => 'getConsole_Command_CacheWarmupService.php',
            'console.command.config_debug' => 'getConsole_Command_ConfigDebugService.php',
            'console.command.config_dump_reference' => 'getConsole_Command_ConfigDumpReferenceService.php',
            'console.command.container_debug' => 'getConsole_Command_ContainerDebugService.php',
            'console.command.debug_autowiring' => 'getConsole_Command_DebugAutowiringService.php',
            'console.command.event_dispatcher_debug' => 'getConsole_Command_EventDispatcherDebugService.php',
            'console.command.form_debug' => 'getConsole_Command_FormDebugService.php',
            'console.command.router_debug' => 'getConsole_Command_RouterDebugService.php',
            'console.command.router_match' => 'getConsole_Command_RouterMatchService.php',
            'console.command.translation_debug' => 'getConsole_Command_TranslationDebugService.php',
            'console.command.translation_update' => 'getConsole_Command_TranslationUpdateService.php',
            'console.command.xliff_lint' => 'getConsole_Command_XliffLintService.php',
            'console.command.yaml_lint' => 'getConsole_Command_YamlLintService.php',
            'console.command_loader' => 'getConsole_CommandLoaderService.php',
            'console.error_listener' => 'getConsole_ErrorListenerService.php',
            'csa_guzzle.cache.adapter.doctrine' => 'getCsaGuzzle_Cache_Adapter_DoctrineService.php',
            'csa_guzzle.cache_warmer.description' => 'getCsaGuzzle_CacheWarmer_DescriptionService.php',
            'csa_guzzle.client_factory' => 'getCsaGuzzle_ClientFactoryService.php',
            'csa_guzzle.description_factory' => 'getCsaGuzzle_DescriptionFactoryService.php',
            'csa_guzzle.description_loader' => 'getCsaGuzzle_DescriptionLoaderService.php',
            'csa_guzzle.description_loader.resolver' => 'getCsaGuzzle_DescriptionLoader_ResolverService.php',
            'debug.dump_listener' => 'getDebug_DumpListenerService.php',
            'debug.file_link_formatter.url_format' => 'getDebug_FileLinkFormatter_UrlFormatService.php',
            'dependency_injection.config.container_parameters_resource_checker' => 'getDependencyInjection_Config_ContainerParametersResourceCheckerService.php',
            'deprecated.form.registry' => 'getDeprecated_Form_RegistryService.php',
            'deprecated.form.registry.csrf' => 'getDeprecated_Form_Registry_CsrfService.php',
            'doctrine.cache_clear_metadata_command' => 'getDoctrine_CacheClearMetadataCommandService.php',
            'doctrine.cache_clear_query_cache_command' => 'getDoctrine_CacheClearQueryCacheCommandService.php',
            'doctrine.cache_clear_result_command' => 'getDoctrine_CacheClearResultCommandService.php',
            'doctrine.cache_collection_region_command' => 'getDoctrine_CacheCollectionRegionCommandService.php',
            'doctrine.clear_entity_region_command' => 'getDoctrine_ClearEntityRegionCommandService.php',
            'doctrine.clear_query_region_command' => 'getDoctrine_ClearQueryRegionCommandService.php',
            'doctrine.database_create_command' => 'getDoctrine_DatabaseCreateCommandService.php',
            'doctrine.database_drop_command' => 'getDoctrine_DatabaseDropCommandService.php',
            'doctrine.database_import_command' => 'getDoctrine_DatabaseImportCommandService.php',
            'doctrine.ensure_production_settings_command' => 'getDoctrine_EnsureProductionSettingsCommandService.php',
            'doctrine.generate_entities_command' => 'getDoctrine_GenerateEntitiesCommandService.php',
            'doctrine.mapping_convert_command' => 'getDoctrine_MappingConvertCommandService.php',
            'doctrine.mapping_import_command' => 'getDoctrine_MappingImportCommandService.php',
            'doctrine.mapping_info_command' => 'getDoctrine_MappingInfoCommandService.php',
            'doctrine.orm.default_entity_manager.property_info_extractor' => 'getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService.php',
            'doctrine.orm.proxy_cache_warmer' => 'getDoctrine_Orm_ProxyCacheWarmerService.php',
            'doctrine.orm.validator.unique' => 'getDoctrine_Orm_Validator_UniqueService.php',
            'doctrine.query_dql_command' => 'getDoctrine_QueryDqlCommandService.php',
            'doctrine.query_sql_command' => 'getDoctrine_QuerySqlCommandService.php',
            'doctrine.schema_create_command' => 'getDoctrine_SchemaCreateCommandService.php',
            'doctrine.schema_drop_command' => 'getDoctrine_SchemaDropCommandService.php',
            'doctrine.schema_update_command' => 'getDoctrine_SchemaUpdateCommandService.php',
            'doctrine.schema_validate_command' => 'getDoctrine_SchemaValidateCommandService.php',
            'doctrine_cache.contains_command' => 'getDoctrineCache_ContainsCommandService.php',
            'doctrine_cache.delete_command' => 'getDoctrineCache_DeleteCommandService.php',
            'doctrine_cache.flush_command' => 'getDoctrineCache_FlushCommandService.php',
            'doctrine_cache.stats_command' => 'getDoctrineCache_StatsCommandService.php',
            'form.extension.help_text' => 'getForm_Extension_HelpTextService.php',
            'form.factory' => 'getForm_FactoryService.php',
            'form.registry' => 'getForm_RegistryService.php',
            'form.resolved_type_factory' => 'getForm_ResolvedTypeFactoryService.php',
            'form.server_params' => 'getForm_ServerParamsService.php',
            'form.type.addons_connect' => 'getForm_Type_AddonsConnectService.php',
            'form.type.admininistration.general' => 'getForm_Type_Admininistration_GeneralService.php',
            'form.type.administration.notification' => 'getForm_Type_Administration_NotificationService.php',
            'form.type.administration.upload_quota' => 'getForm_Type_Administration_UploadQuotaService.php',
            'form.type.birthday' => 'getForm_Type_BirthdayService.php',
            'form.type.button' => 'getForm_Type_ButtonService.php',
            'form.type.catalog.category' => 'getForm_Type_Catalog_CategoryService.php',
            'form.type.catalog.root_category' => 'getForm_Type_Catalog_RootCategoryService.php',
            'form.type.category.delete_categories' => 'getForm_Type_Category_DeleteCategoriesService.php',
            'form.type.change_password' => 'getForm_Type_ChangePasswordService.php',
            'form.type.checkbox' => 'getForm_Type_CheckboxService.php',
            'form.type.choice' => 'getForm_Type_ChoiceService.php',
            'form.type.cms_page' => 'getForm_Type_CmsPageService.php',
            'form.type.cms_page_category' => 'getForm_Type_CmsPageCategoryService.php',
            'form.type.collection' => 'getForm_Type_CollectionService.php',
            'form.type.common.category_choice_tree' => 'getForm_Type_Common_CategoryChoiceTreeService.php',
            'form.type.common.country_choice' => 'getForm_Type_Common_CountryChoiceService.php',
            'form.type.common.shop_choice_tree' => 'getForm_Type_Common_ShopChoiceTreeService.php',
            'form.type.common.team.profile_choice' => 'getForm_Type_Common_Team_ProfileChoiceService.php',
            'form.type.common.translatable' => 'getForm_Type_Common_TranslatableService.php',
            'form.type.configure.advanced_parameters.profile' => 'getForm_Type_Configure_AdvancedParameters_ProfileService.php',
            'form.type.contact' => 'getForm_Type_ContactService.php',
            'form.type.country' => 'getForm_Type_CountryService.php',
            'form.type.currency' => 'getForm_Type_CurrencyService.php',
            'form.type.currency_exchange_rate' => 'getForm_Type_CurrencyExchangeRateService.php',
            'form.type.customer.delete_customer' => 'getForm_Type_Customer_DeleteCustomerService.php',
            'form.type.customer.required_fields' => 'getForm_Type_Customer_RequiredFieldsService.php',
            'form.type.customer_preferences.general' => 'getForm_Type_CustomerPreferences_GeneralService.php',
            'form.type.database.sql_request' => 'getForm_Type_Database_SqlRequestService.php',
            'form.type.date' => 'getForm_Type_DateService.php',
            'form.type.date_picker' => 'getForm_Type_DatePickerService.php',
            'form.type.datetime' => 'getForm_Type_DatetimeService.php',
            'form.type.design.theme.adapt_theme_to_rtl_languages' => 'getForm_Type_Design_Theme_AdaptThemeToRtlLanguagesService.php',
            'form.type.design.theme.import_theme' => 'getForm_Type_Design_Theme_ImportThemeService.php',
            'form.type.design.theme.page_layouts_customization' => 'getForm_Type_Design_Theme_PageLayoutsCustomizationService.php',
            'form.type.email' => 'getForm_Type_EmailService.php',
            'form.type.email.email_configuration' => 'getForm_Type_Email_EmailConfigurationService.php',
            'form.type.entity' => 'getForm_Type_EntityService.php',
            'form.type.extension.money' => 'getForm_Type_Extension_MoneyService.php',
            'form.type.extension.resizable_text' => 'getForm_Type_Extension_ResizableTextService.php',
            'form.type.file' => 'getForm_Type_FileService.php',
            'form.type.form' => 'getForm_Type_FormService.php',
            'form.type.geolocation.options' => 'getForm_Type_Geolocation_OptionsService.php',
            'form.type.hidden' => 'getForm_Type_HiddenService.php',
            'form.type.import.import' => 'getForm_Type_Import_ImportService.php',
            'form.type.import.import_data_configuration' => 'getForm_Type_Import_ImportDataConfigurationService.php',
            'form.type.integer' => 'getForm_Type_IntegerService.php',
            'form.type.international.language' => 'getForm_Type_International_LanguageService.php',
            'form.type.international.tax' => 'getForm_Type_International_TaxService.php',
            'form.type.international.tax_options' => 'getForm_Type_International_TaxOptionsService.php',
            'form.type.language' => 'getForm_Type_LanguageService.php',
            'form.type.locale' => 'getForm_Type_LocaleService.php',
            'form.type.localization.generate_mails' => 'getForm_Type_Localization_GenerateMailsService.php',
            'form.type.localization.import_pack' => 'getForm_Type_Localization_ImportPackService.php',
            'form.type.localization.mail_theme_configuration' => 'getForm_Type_Localization_MailThemeConfigurationService.php',
            'form.type.localization_configuration' => 'getForm_Type_LocalizationConfigurationService.php',
            'form.type.maintenance.general' => 'getForm_Type_Maintenance_GeneralService.php',
            'form.type.manufacturer_address' => 'getForm_Type_ManufacturerAddressService.php',
            'form.type.money' => 'getForm_Type_MoneyService.php',
            'form.type.number' => 'getForm_Type_NumberService.php',
            'form.type.order.delivery.slip.options' => 'getForm_Type_Order_Delivery_Slip_OptionsService.php',
            'form.type.order.invoices.generate_by_date' => 'getForm_Type_Order_Invoices_GenerateByDateService.php',
            'form.type.order.invoices.generate_by_status' => 'getForm_Type_Order_Invoices_GenerateByStatusService.php',
            'form.type.order.invoices.invoice_options' => 'getForm_Type_Order_Invoices_InvoiceOptionsService.php',
            'form.type.order_preferences.general' => 'getForm_Type_OrderPreferences_GeneralService.php',
            'form.type.order_preferences.gift_options' => 'getForm_Type_OrderPreferences_GiftOptionsService.php',
            'form.type.password' => 'getForm_Type_PasswordService.php',
            'form.type.payment.module_currency_restriction' => 'getForm_Type_Payment_ModuleCurrencyRestrictionService.php',
            'form.type.percent' => 'getForm_Type_PercentService.php',
            'form.type.performance.caching' => 'getForm_Type_Performance_CachingService.php',
            'form.type.performance.ccc' => 'getForm_Type_Performance_CccService.php',
            'form.type.performance.debug_mode' => 'getForm_Type_Performance_DebugModeService.php',
            'form.type.performance.media_servers' => 'getForm_Type_Performance_MediaServersService.php',
            'form.type.performance.memcache_servers' => 'getForm_Type_Performance_MemcacheServersService.php',
            'form.type.performance.optional_features' => 'getForm_Type_Performance_OptionalFeaturesService.php',
            'form.type.performance.smarty' => 'getForm_Type_Performance_SmartyService.php',
            'form.type.product.attachment' => 'getForm_Type_Product_AttachmentService.php',
            'form.type.product.categories' => 'getForm_Type_Product_CategoriesService.php',
            'form.type.product.categories_tree' => 'getForm_Type_Product_CategoriesTreeService.php',
            'form.type.product.combination' => 'getForm_Type_Product_CombinationService.php',
            'form.type.product.combination_bulk' => 'getForm_Type_Product_CombinationBulkService.php',
            'form.type.product.custom_field' => 'getForm_Type_Product_CustomFieldService.php',
            'form.type.product.feature' => 'getForm_Type_Product_FeatureService.php',
            'form.type.product.information' => 'getForm_Type_Product_InformationService.php',
            'form.type.product.options' => 'getForm_Type_Product_OptionsService.php',
            'form.type.product.price' => 'getForm_Type_Product_PriceService.php',
            'form.type.product.quantity' => 'getForm_Type_Product_QuantityService.php',
            'form.type.product.seo' => 'getForm_Type_Product_SeoService.php',
            'form.type.product.shipping' => 'getForm_Type_Product_ShippingService.php',
            'form.type.product.simple_category' => 'getForm_Type_Product_SimpleCategoryService.php',
            'form.type.product.specific_price' => 'getForm_Type_Product_SpecificPriceService.php',
            'form.type.product.supplier_combination' => 'getForm_Type_Product_SupplierCombinationService.php',
            'form.type.product.translate' => 'getForm_Type_Product_TranslateService.php',
            'form.type.product.virtual' => 'getForm_Type_Product_VirtualService.php',
            'form.type.product.warehouse_combination' => 'getForm_Type_Product_WarehouseCombinationService.php',
            'form.type.product_preferences.general' => 'getForm_Type_ProductPreferences_GeneralService.php',
            'form.type.product_preferences.stock' => 'getForm_Type_ProductPreferences_StockService.php',
            'form.type.radio' => 'getForm_Type_RadioService.php',
            'form.type.range' => 'getForm_Type_RangeService.php',
            'form.type.repeated' => 'getForm_Type_RepeatedService.php',
            'form.type.reset' => 'getForm_Type_ResetService.php',
            'form.type.search' => 'getForm_Type_SearchService.php',
            'form.type.search_and_reset' => 'getForm_Type_SearchAndResetService.php',
            'form.type.sell.manufacturer' => 'getForm_Type_Sell_ManufacturerService.php',
            'form.type.shipping_preferences.carrier_options' => 'getForm_Type_ShippingPreferences_CarrierOptionsService.php',
            'form.type.shipping_preferences.handling' => 'getForm_Type_ShippingPreferences_HandlingService.php',
            'form.type.shop.traffic_seo.meta' => 'getForm_Type_Shop_TrafficSeo_MetaService.php',
            'form.type.shop.traffic_seo.meta.set_up_url' => 'getForm_Type_Shop_TrafficSeo_Meta_SetUpUrlService.php',
            'form.type.shop.traffic_seo.meta.shop_url' => 'getForm_Type_Shop_TrafficSeo_Meta_ShopUrlService.php',
            'form.type.shop.traffic_seo.meta.url_schema' => 'getForm_Type_Shop_TrafficSeo_Meta_UrlSchemaService.php',
            'form.type.shop_logos' => 'getForm_Type_ShopLogosService.php',
            'form.type.shop_parameters.general' => 'getForm_Type_ShopParameters_GeneralService.php',
            'form.type.submit' => 'getForm_Type_SubmitService.php',
            'form.type.team.employee.employee_options' => 'getForm_Type_Team_Employee_EmployeeOptionsService.php',
            'form.type.text' => 'getForm_Type_TextService.php',
            'form.type.textarea' => 'getForm_Type_TextareaService.php',
            'form.type.time' => 'getForm_Type_TimeService.php',
            'form.type.timezone' => 'getForm_Type_TimezoneService.php',
            'form.type.translations.add_update_language' => 'getForm_Type_Translations_AddUpdateLanguageService.php',
            'form.type.translations.copy_language' => 'getForm_Type_Translations_CopyLanguageService.php',
            'form.type.translations.export_language' => 'getForm_Type_Translations_ExportLanguageService.php',
            'form.type.translations.modify' => 'getForm_Type_Translations_ModifyService.php',
            'form.type.typeahead.customer' => 'getForm_Type_Typeahead_CustomerService.php',
            'form.type.typeahead.product' => 'getForm_Type_Typeahead_ProductService.php',
            'form.type.typeahead.product_pack' => 'getForm_Type_Typeahead_ProductPackService.php',
            'form.type.url' => 'getForm_Type_UrlService.php',
            'form.type.webservice.webservice_key_type' => 'getForm_Type_Webservice_WebserviceKeyTypeService.php',
            'form.type_extension.csrf' => 'getForm_TypeExtension_CsrfService.php',
            'form.type_extension.form.data_collector' => 'getForm_TypeExtension_Form_DataCollectorService.php',
            'form.type_extension.form.http_foundation' => 'getForm_TypeExtension_Form_HttpFoundationService.php',
            'form.type_extension.form.transformation_failure_handling' => 'getForm_TypeExtension_Form_TransformationFailureHandlingService.php',
            'form.type_extension.form.validator' => 'getForm_TypeExtension_Form_ValidatorService.php',
            'form.type_extension.repeated.validator' => 'getForm_TypeExtension_Repeated_ValidatorService.php',
            'form.type_extension.submit.validator' => 'getForm_TypeExtension_Submit_ValidatorService.php',
            'form.type_extension.upload.validator' => 'getForm_TypeExtension_Upload_ValidatorService.php',
            'form.type_guesser.doctrine' => 'getForm_TypeGuesser_DoctrineService.php',
            'form.type_guesser.validator' => 'getForm_TypeGuesser_ValidatorService.php',
            'fragment.handler' => 'getFragment_HandlerService.php',
            'fragment.renderer.hinclude' => 'getFragment_Renderer_HincludeService.php',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService.php',
            'from.type.yes_and_no_choice' => 'getFrom_Type_YesAndNoChoiceService.php',
            'kernel.class_cache.cache_warmer' => 'getKernel_ClassCache_CacheWarmerService.php',
            'main.warmer.cache_warmer' => 'getMain_Warmer_CacheWarmerService.php',
            'mbo.adapter.module_collection_data_provider' => 'getMbo_Adapter_ModuleCollectionDataProviderService.php',
            'mbo.addons_selection_link_provider' => 'getMbo_AddonsSelectionLinkProviderService.php',
            'mbo.controller.modules.catalog' => 'getMbo_Controller_Modules_CatalogService.php',
            'mbo.controller.modules.recommended' => 'getMbo_Controller_Modules_RecommendedService.php',
            'mbo.controller.modules.selection' => 'getMbo_Controller_Modules_SelectionService.php',
            'mbo.controller.themes.catalog' => 'getMbo_Controller_Themes_CatalogService.php',
            'mbo.externalcontent.provider' => 'getMbo_Externalcontent_ProviderService.php',
            'mbo.recommendedlinks.provider' => 'getMbo_Recommendedlinks_ProviderService.php',
            'mbo.recommendedmodules.presenter' => 'getMbo_Recommendedmodules_PresenterService.php',
            'mbo.tab.collection.factory' => 'getMbo_Tab_Collection_FactoryService.php',
            'mbo.tab.collection.provider' => 'getMbo_Tab_Collection_ProviderService.php',
            'monolog.handler.null_internal' => 'getMonolog_Handler_NullInternalService.php',
            'monolog.logger.console' => 'getMonolog_Logger_ConsoleService.php',
            'monolog.logger.security' => 'getMonolog_Logger_SecurityService.php',
            'monolog.logger.templating' => 'getMonolog_Logger_TemplatingService.php',
            'prestashop.access_denied.listener' => 'getPrestashop_AccessDenied_ListenerService.php',
            'prestashop.adapter.address.command_handler.add_manufacturer_address_handler' => 'getPrestashop_Adapter_Address_CommandHandler_AddManufacturerAddressHandlerService.php',
            'prestashop.adapter.address.command_handler.bulk_delete_address_handler' => 'getPrestashop_Adapter_Address_CommandHandler_BulkDeleteAddressHandlerService.php',
            'prestashop.adapter.address.command_handler.delete_address_handler' => 'getPrestashop_Adapter_Address_CommandHandler_DeleteAddressHandlerService.php',
            'prestashop.adapter.address.command_handler.edit_manufacturer_address_handler' => 'getPrestashop_Adapter_Address_CommandHandler_EditManufacturerAddressHandlerService.php',
            'prestashop.adapter.address.query_handler.get_manufacturer_address_for_editing_handler' => 'getPrestashop_Adapter_Address_QueryHandler_GetManufacturerAddressForEditingHandlerService.php',
            'prestashop.adapter.admin.controller.attribute_generator' => 'getPrestashop_Adapter_Admin_Controller_AttributeGeneratorService.php',
            'prestashop.adapter.admin.controller.category' => 'getPrestashop_Adapter_Admin_Controller_CategoryService.php',
            'prestashop.adapter.admin.model.product' => 'getPrestashop_Adapter_Admin_Model_ProductService.php',
            'prestashop.adapter.admin.wrapper.product' => 'getPrestashop_Adapter_Admin_Wrapper_ProductService.php',
            'prestashop.adapter.administration.form_handler' => 'getPrestashop_Adapter_Administration_FormHandlerService.php',
            'prestashop.adapter.administration.form_provider' => 'getPrestashop_Adapter_Administration_FormProviderService.php',
            'prestashop.adapter.backup.backup_provider' => 'getPrestashop_Adapter_Backup_BackupProviderService.php',
            'prestashop.adapter.backup.backup_remover' => 'getPrestashop_Adapter_Backup_BackupRemoverService.php',
            'prestashop.adapter.backup.database_creator' => 'getPrestashop_Adapter_Backup_DatabaseCreatorService.php',
            'prestashop.adapter.cache.clearer.class_index_cache_clearer' => 'getPrestashop_Adapter_Cache_Clearer_ClassIndexCacheClearerService.php',
            'prestashop.adapter.cache.clearer.media_cache_clearer' => 'getPrestashop_Adapter_Cache_Clearer_MediaCacheClearerService.php',
            'prestashop.adapter.cache.clearer.smarty_cache_clearer' => 'getPrestashop_Adapter_Cache_Clearer_SmartyCacheClearerService.php',
            'prestashop.adapter.cache.clearer.symfony_cache_clearer' => 'getPrestashop_Adapter_Cache_Clearer_SymfonyCacheClearerService.php',
            'prestashop.adapter.cache.clearer.xml_cache_clearer' => 'getPrestashop_Adapter_Cache_Clearer_XmlCacheClearerService.php',
            'prestashop.adapter.cache_clearer' => 'getPrestashop_Adapter_CacheClearerService.php',
            'prestashop.adapter.caching.configuration' => 'getPrestashop_Adapter_Caching_ConfigurationService.php',
            'prestashop.adapter.category.category_view_data_provider' => 'getPrestashop_Adapter_Category_CategoryViewDataProviderService.php',
            'prestashop.adapter.category.command_handler.add_category_handler' => 'getPrestashop_Adapter_Category_CommandHandler_AddCategoryHandlerService.php',
            'prestashop.adapter.category.command_handler.add_root_category_handler' => 'getPrestashop_Adapter_Category_CommandHandler_AddRootCategoryHandlerService.php',
            'prestashop.adapter.category.command_handler.bulk_delete_categories_handler' => 'getPrestashop_Adapter_Category_CommandHandler_BulkDeleteCategoriesHandlerService.php',
            'prestashop.adapter.category.command_handler.bulk_disable_categories_status_handler' => 'getPrestashop_Adapter_Category_CommandHandler_BulkDisableCategoriesStatusHandlerService.php',
            'prestashop.adapter.category.command_handler.bulk_enable_categories_status_handler' => 'getPrestashop_Adapter_Category_CommandHandler_BulkEnableCategoriesStatusHandlerService.php',
            'prestashop.adapter.category.command_handler.bulk_update_categories_status_handler' => 'getPrestashop_Adapter_Category_CommandHandler_BulkUpdateCategoriesStatusHandlerService.php',
            'prestashop.adapter.category.command_handler.delete_category_cover_image_handler' => 'getPrestashop_Adapter_Category_CommandHandler_DeleteCategoryCoverImageHandlerService.php',
            'prestashop.adapter.category.command_handler.delete_category_handler' => 'getPrestashop_Adapter_Category_CommandHandler_DeleteCategoryHandlerService.php',
            'prestashop.adapter.category.command_handler.delete_category_menu_thumbnail_image_handler' => 'getPrestashop_Adapter_Category_CommandHandler_DeleteCategoryMenuThumbnailImageHandlerService.php',
            'prestashop.adapter.category.command_handler.edit_category_handler' => 'getPrestashop_Adapter_Category_CommandHandler_EditCategoryHandlerService.php',
            'prestashop.adapter.category.command_handler.edit_root_category_handler' => 'getPrestashop_Adapter_Category_CommandHandler_EditRootCategoryHandlerService.php',
            'prestashop.adapter.category.command_handler.get_category_status_handler' => 'getPrestashop_Adapter_Category_CommandHandler_GetCategoryStatusHandlerService.php',
            'prestashop.adapter.category.command_handler.set_category_is_enabled_handler' => 'getPrestashop_Adapter_Category_CommandHandler_SetCategoryIsEnabledHandlerService.php',
            'prestashop.adapter.category.command_handler.update_category_position_handler' => 'getPrestashop_Adapter_Category_CommandHandler_UpdateCategoryPositionHandlerService.php',
            'prestashop.adapter.category.query_handler.get_category_for_editing' => 'getPrestashop_Adapter_Category_QueryHandler_GetCategoryForEditingService.php',
            'prestashop.adapter.ccc.configuration' => 'getPrestashop_Adapter_Ccc_ConfigurationService.php',
            'prestashop.adapter.check_missing_files' => 'getPrestashop_Adapter_CheckMissingFilesService.php',
            'prestashop.adapter.check_requirements' => 'getPrestashop_Adapter_CheckRequirementsService.php',
            'prestashop.adapter.cms_page.categories_provider' => 'getPrestashop_Adapter_CmsPage_CategoriesProviderService.php',
            'prestashop.adapter.cms_page.command_handler.add_cms_page_category_handler' => 'getPrestashop_Adapter_CmsPage_CommandHandler_AddCmsPageCategoryHandlerService.php',
            'prestashop.adapter.cms_page.command_handler.add_cms_page_handler' => 'getPrestashop_Adapter_CmsPage_CommandHandler_AddCmsPageHandlerService.php',
            'prestashop.adapter.cms_page.command_handler.bulk_delete_cms_page' => 'getPrestashop_Adapter_CmsPage_CommandHandler_BulkDeleteCmsPageService.php',
            'prestashop.adapter.cms_page.command_handler.bulk_disable_cms_page' => 'getPrestashop_Adapter_CmsPage_CommandHandler_BulkDisableCmsPageService.php',
            'prestashop.adapter.cms_page.command_handler.bulk_disable_cms_page_category_handler' => 'getPrestashop_Adapter_CmsPage_CommandHandler_BulkDisableCmsPageCategoryHandlerService.php',
            'prestashop.adapter.cms_page.command_handler.bulk_enable_cms_page' => 'getPrestashop_Adapter_CmsPage_CommandHandler_BulkEnableCmsPageService.php',
            'prestashop.adapter.cms_page.command_handler.bulk_enable_cms_page_category_handler' => 'getPrestashop_Adapter_CmsPage_CommandHandler_BulkEnableCmsPageCategoryHandlerService.php',
            'prestashop.adapter.cms_page.command_handler.delete_cms_page' => 'getPrestashop_Adapter_CmsPage_CommandHandler_DeleteCmsPageService.php',
            'prestashop.adapter.cms_page.command_handler.edit_cms_page_category_handler' => 'getPrestashop_Adapter_CmsPage_CommandHandler_EditCmsPageCategoryHandlerService.php',
            'prestashop.adapter.cms_page.command_handler.edit_cms_page_handler' => 'getPrestashop_Adapter_CmsPage_CommandHandler_EditCmsPageHandlerService.php',
            'prestashop.adapter.cms_page.command_handler.toggle_cms_page_status' => 'getPrestashop_Adapter_CmsPage_CommandHandler_ToggleCmsPageStatusService.php',
            'prestashop.adapter.cms_page.query_handler.get_cms_category_id_for_redirection' => 'getPrestashop_Adapter_CmsPage_QueryHandler_GetCmsCategoryIdForRedirectionService.php',
            'prestashop.adapter.cms_page.query_handler.get_cms_page_categories_for_breadcrumbs' => 'getPrestashop_Adapter_CmsPage_QueryHandler_GetCmsPageCategoriesForBreadcrumbsService.php',
            'prestashop.adapter.cms_page.query_handler.get_cms_page_categories_for_redirection' => 'getPrestashop_Adapter_CmsPage_QueryHandler_GetCmsPageCategoriesForRedirectionService.php',
            'prestashop.adapter.cms_page.query_handler.get_cms_page_category_for_editing' => 'getPrestashop_Adapter_CmsPage_QueryHandler_GetCmsPageCategoryForEditingService.php',
            'prestashop.adapter.cms_page.query_handler.get_cms_page_category_name_for_listing' => 'getPrestashop_Adapter_CmsPage_QueryHandler_GetCmsPageCategoryNameForListingService.php',
            'prestashop.adapter.cms_page.query_handler.get_cms_page_for_editing_handler' => 'getPrestashop_Adapter_CmsPage_QueryHandler_GetCmsPageForEditingHandlerService.php',
            'prestashop.adapter.cms_page_category.command_handler.bulk_delete_cms_page_category_handler' => 'getPrestashop_Adapter_CmsPageCategory_CommandHandler_BulkDeleteCmsPageCategoryHandlerService.php',
            'prestashop.adapter.cms_page_category.command_handler.delete_cms_page_category_handler' => 'getPrestashop_Adapter_CmsPageCategory_CommandHandler_DeleteCmsPageCategoryHandlerService.php',
            'prestashop.adapter.cms_page_category.command_handler.toggle_cms_page_category_status_handler' => 'getPrestashop_Adapter_CmsPageCategory_CommandHandler_ToggleCmsPageCategoryStatusHandlerService.php',
            'prestashop.adapter.combination_feature' => 'getPrestashop_Adapter_CombinationFeatureService.php',
            'prestashop.adapter.contact.command_handler.add_contact' => 'getPrestashop_Adapter_Contact_CommandHandler_AddContactService.php',
            'prestashop.adapter.contact.command_handler.edit_contact' => 'getPrestashop_Adapter_Contact_CommandHandler_EditContactService.php',
            'prestashop.adapter.contact.deleter' => 'getPrestashop_Adapter_Contact_DeleterService.php',
            'prestashop.adapter.contact.query_handler.get_contact_for_editing' => 'getPrestashop_Adapter_Contact_QueryHandler_GetContactForEditingService.php',
            'prestashop.adapter.contact.repository' => 'getPrestashop_Adapter_Contact_RepositoryService.php',
            'prestashop.adapter.currency.command_handler.create_currency' => 'getPrestashop_Adapter_Currency_CommandHandler_CreateCurrencyService.php',
            'prestashop.adapter.currency.command_handler.delete_currency' => 'getPrestashop_Adapter_Currency_CommandHandler_DeleteCurrencyService.php',
            'prestashop.adapter.currency.command_handler.toggle_currency_status' => 'getPrestashop_Adapter_Currency_CommandHandler_ToggleCurrencyStatusService.php',
            'prestashop.adapter.currency.command_handler.update_currency' => 'getPrestashop_Adapter_Currency_CommandHandler_UpdateCurrencyService.php',
            'prestashop.adapter.currency.command_handler.update_exchange_rates' => 'getPrestashop_Adapter_Currency_CommandHandler_UpdateExchangeRatesService.php',
            'prestashop.adapter.currency.command_handler.update_live_exchange_rates' => 'getPrestashop_Adapter_Currency_CommandHandler_UpdateLiveExchangeRatesService.php',
            'prestashop.adapter.currency.query_handler.get_currency_for_editing' => 'getPrestashop_Adapter_Currency_QueryHandler_GetCurrencyForEditingService.php',
            'prestashop.adapter.customer.command_handler.add_customer' => 'getPrestashop_Adapter_Customer_CommandHandler_AddCustomerService.php',
            'prestashop.adapter.customer.command_handler.bulk_delete_customer_handler' => 'getPrestashop_Adapter_Customer_CommandHandler_BulkDeleteCustomerHandlerService.php',
            'prestashop.adapter.customer.command_handler.bulk_disable_customer_handler' => 'getPrestashop_Adapter_Customer_CommandHandler_BulkDisableCustomerHandlerService.php',
            'prestashop.adapter.customer.command_handler.bulk_enable_customer_handler' => 'getPrestashop_Adapter_Customer_CommandHandler_BulkEnableCustomerHandlerService.php',
            'prestashop.adapter.customer.command_handler.delete_customer_handler' => 'getPrestashop_Adapter_Customer_CommandHandler_DeleteCustomerHandlerService.php',
            'prestashop.adapter.customer.command_handler.edit_customer_handler' => 'getPrestashop_Adapter_Customer_CommandHandler_EditCustomerHandlerService.php',
            'prestashop.adapter.customer.command_handler.set_private_note_about_customer_handler' => 'getPrestashop_Adapter_Customer_CommandHandler_SetPrivateNoteAboutCustomerHandlerService.php',
            'prestashop.adapter.customer.command_handler.set_required_fields_for_customer' => 'getPrestashop_Adapter_Customer_CommandHandler_SetRequiredFieldsForCustomerService.php',
            'prestashop.adapter.customer.command_handler.transform_guest_to_customer' => 'getPrestashop_Adapter_Customer_CommandHandler_TransformGuestToCustomerService.php',
            'prestashop.adapter.customer.customer_configuration' => 'getPrestashop_Adapter_Customer_CustomerConfigurationService.php',
            'prestashop.adapter.customer.query_handler.get_customer_for_editing' => 'getPrestashop_Adapter_Customer_QueryHandler_GetCustomerForEditingService.php',
            'prestashop.adapter.customer.query_handler.get_customer_for_viewing' => 'getPrestashop_Adapter_Customer_QueryHandler_GetCustomerForViewingService.php',
            'prestashop.adapter.customer.query_handler.get_required_fields_for_customer' => 'getPrestashop_Adapter_Customer_QueryHandler_GetRequiredFieldsForCustomerService.php',
            'prestashop.adapter.customer.query_handler.search_customers' => 'getPrestashop_Adapter_Customer_QueryHandler_SearchCustomersService.php',
            'prestashop.adapter.data_provider.attachment' => 'getPrestashop_Adapter_DataProvider_AttachmentService.php',
            'prestashop.adapter.data_provider.attribute' => 'getPrestashop_Adapter_DataProvider_AttributeService.php',
            'prestashop.adapter.data_provider.carrier' => 'getPrestashop_Adapter_DataProvider_CarrierService.php',
            'prestashop.adapter.data_provider.category' => 'getPrestashop_Adapter_DataProvider_CategoryService.php',
            'prestashop.adapter.data_provider.cms' => 'getPrestashop_Adapter_DataProvider_CmsService.php',
            'prestashop.adapter.data_provider.combination' => 'getPrestashop_Adapter_DataProvider_CombinationService.php',
            'prestashop.adapter.data_provider.country' => 'getPrestashop_Adapter_DataProvider_CountryService.php',
            'prestashop.adapter.data_provider.customer' => 'getPrestashop_Adapter_DataProvider_CustomerService.php',
            'prestashop.adapter.data_provider.default_route' => 'getPrestashop_Adapter_DataProvider_DefaultRouteService.php',
            'prestashop.adapter.data_provider.employee' => 'getPrestashop_Adapter_DataProvider_EmployeeService.php',
            'prestashop.adapter.data_provider.feature' => 'getPrestashop_Adapter_DataProvider_FeatureService.php',
            'prestashop.adapter.data_provider.group' => 'getPrestashop_Adapter_DataProvider_GroupService.php',
            'prestashop.adapter.data_provider.language' => 'getPrestashop_Adapter_DataProvider_LanguageService.php',
            'prestashop.adapter.data_provider.manufacturer' => 'getPrestashop_Adapter_DataProvider_ManufacturerService.php',
            'prestashop.adapter.data_provider.order_invoice' => 'getPrestashop_Adapter_DataProvider_OrderInvoiceService.php',
            'prestashop.adapter.data_provider.order_state' => 'getPrestashop_Adapter_DataProvider_OrderStateService.php',
            'prestashop.adapter.data_provider.pack' => 'getPrestashop_Adapter_DataProvider_PackService.php',
            'prestashop.adapter.data_provider.product' => 'getPrestashop_Adapter_DataProvider_ProductService.php',
            'prestashop.adapter.data_provider.profile' => 'getPrestashop_Adapter_DataProvider_ProfileService.php',
            'prestashop.adapter.data_provider.supplier' => 'getPrestashop_Adapter_DataProvider_SupplierService.php',
            'prestashop.adapter.data_provider.tab' => 'getPrestashop_Adapter_DataProvider_TabService.php',
            'prestashop.adapter.data_provider.tax' => 'getPrestashop_Adapter_DataProvider_TaxService.php',
            'prestashop.adapter.data_provider.warehouse' => 'getPrestashop_Adapter_DataProvider_WarehouseService.php',
            'prestashop.adapter.database' => 'getPrestashop_Adapter_DatabaseService.php',
            'prestashop.adapter.debug_mode' => 'getPrestashop_Adapter_DebugModeService.php',
            'prestashop.adapter.debug_mode.configuration' => 'getPrestashop_Adapter_DebugMode_ConfigurationService.php',
            'prestashop.adapter.email.email_configuration_tester' => 'getPrestashop_Adapter_Email_EmailConfigurationTesterService.php',
            'prestashop.adapter.email.email_log_eraser' => 'getPrestashop_Adapter_Email_EmailLogEraserService.php',
            'prestashop.adapter.employee.avatar_provider' => 'getPrestashop_Adapter_Employee_AvatarProviderService.php',
            'prestashop.adapter.employee.command_handler.add_employee_handler' => 'getPrestashop_Adapter_Employee_CommandHandler_AddEmployeeHandlerService.php',
            'prestashop.adapter.employee.command_handler.edit_employee_handler' => 'getPrestashop_Adapter_Employee_CommandHandler_EditEmployeeHandlerService.php',
            'prestashop.adapter.employee.data_provider' => 'getPrestashop_Adapter_Employee_DataProviderService.php',
            'prestashop.adapter.employee.form_access_checker' => 'getPrestashop_Adapter_Employee_FormAccessCheckerService.php',
            'prestashop.adapter.employee.form_language_changer' => 'getPrestashop_Adapter_Employee_FormLanguageChangerService.php',
            'prestashop.adapter.employee.navigation_menu_toggler' => 'getPrestashop_Adapter_Employee_NavigationMenuTogglerService.php',
            'prestashop.adapter.employee.query_handler.get_employee_for_editing' => 'getPrestashop_Adapter_Employee_QueryHandler_GetEmployeeForEditingService.php',
            'prestashop.adapter.environment' => 'getPrestashop_Adapter_EnvironmentService.php',
            'prestashop.adapter.feature.feature' => 'getPrestashop_Adapter_Feature_FeatureService.php',
            'prestashop.adapter.feature.multistore' => 'getPrestashop_Adapter_Feature_MultistoreService.php',
            'prestashop.adapter.file.htaccess_file_generator' => 'getPrestashop_Adapter_File_HtaccessFileGeneratorService.php',
            'prestashop.adapter.file.robots_text_file_generator' => 'getPrestashop_Adapter_File_RobotsTextFileGeneratorService.php',
            'prestashop.adapter.form.choice_provider.category_tree_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_CategoryTreeChoiceProviderService.php',
            'prestashop.adapter.form.choice_provider.country_state_by_id' => 'getPrestashop_Adapter_Form_ChoiceProvider_CountryStateByIdService.php',
            'prestashop.adapter.form.choice_provider.gender_by_id_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_GenderByIdChoiceProviderService.php',
            'prestashop.adapter.form.choice_provider.group_by_id_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_GroupByIdChoiceProviderService.php',
            'prestashop.adapter.form.choice_provider.manufacturer_name_by_id' => 'getPrestashop_Adapter_Form_ChoiceProvider_ManufacturerNameByIdService.php',
            'prestashop.adapter.form.choice_provider.profile_by_id_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_ProfileByIdChoiceProviderService.php',
            'prestashop.adapter.form.choice_provider.resources_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_ResourcesChoiceProviderService.php',
            'prestashop.adapter.form.choice_provider.risk_by_id_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_RiskByIdChoiceProviderService.php',
            'prestashop.adapter.form.choice_provider.shop_tree_choice_provider' => 'getPrestashop_Adapter_Form_ChoiceProvider_ShopTreeChoiceProviderService.php',
            'prestashop.adapter.formatter.price' => 'getPrestashop_Adapter_Formatter_PriceService.php',
            'prestashop.adapter.general.configuration' => 'getPrestashop_Adapter_General_ConfigurationService.php',
            'prestashop.adapter.geolocation_by_ip_address.configuration' => 'getPrestashop_Adapter_GeolocationByIpAddress_ConfigurationService.php',
            'prestashop.adapter.geolocation_ip_address_whitelist.configuration' => 'getPrestashop_Adapter_GeolocationIpAddressWhitelist_ConfigurationService.php',
            'prestashop.adapter.geolocation_options.configuration' => 'getPrestashop_Adapter_GeolocationOptions_ConfigurationService.php',
            'prestashop.adapter.grid.action.row.accessibility_checker.category_for_view' => 'getPrestashop_Adapter_Grid_Action_Row_AccessibilityChecker_CategoryForViewService.php',
            'prestashop.adapter.grid.search.factory.search_criteria_with_category_parent_id' => 'getPrestashop_Adapter_Grid_Search_Factory_SearchCriteriaWithCategoryParentIdService.php',
            'prestashop.adapter.group.feature' => 'getPrestashop_Adapter_Group_FeatureService.php',
            'prestashop.adapter.group.provider.default_groups_provider' => 'getPrestashop_Adapter_Group_Provider_DefaultGroupsProviderService.php',
            'prestashop.adapter.hosting_information' => 'getPrestashop_Adapter_HostingInformationService.php',
            'prestashop.adapter.image.uploader.category_cover_image_uploader' => 'getPrestashop_Adapter_Image_Uploader_CategoryCoverImageUploaderService.php',
            'prestashop.adapter.image.uploader.category_menu_thumbnail_image_uploader' => 'getPrestashop_Adapter_Image_Uploader_CategoryMenuThumbnailImageUploaderService.php',
            'prestashop.adapter.image.uploader.category_thumbnail_image_uploader' => 'getPrestashop_Adapter_Image_Uploader_CategoryThumbnailImageUploaderService.php',
            'prestashop.adapter.image.uploader.manufacturer_image_uploader' => 'getPrestashop_Adapter_Image_Uploader_ManufacturerImageUploaderService.php',
            'prestashop.adapter.image_manager' => 'getPrestashop_Adapter_ImageManagerService.php',
            'prestashop.adapter.import.data_formatter' => 'getPrestashop_Adapter_Import_DataFormatterService.php',
            'prestashop.adapter.import.data_match_saver' => 'getPrestashop_Adapter_Import_DataMatchSaverService.php',
            'prestashop.adapter.import.entity_deleter' => 'getPrestashop_Adapter_Import_EntityDeleterService.php',
            'prestashop.adapter.import.excel_to_csv_converter' => 'getPrestashop_Adapter_Import_ExcelToCsvConverterService.php',
            'prestashop.adapter.import.file_opener' => 'getPrestashop_Adapter_Import_FileOpenerService.php',
            'prestashop.adapter.import.handler.category' => 'getPrestashop_Adapter_Import_Handler_CategoryService.php',
            'prestashop.adapter.import.handler.product' => 'getPrestashop_Adapter_Import_Handler_ProductService.php',
            'prestashop.adapter.import.handler_finder' => 'getPrestashop_Adapter_Import_HandlerFinderService.php',
            'prestashop.adapter.import.image_copier' => 'getPrestashop_Adapter_Import_ImageCopierService.php',
            'prestashop.adapter.kpi.average_customer_age' => 'getPrestashop_Adapter_Kpi_AverageCustomerAgeService.php',
            'prestashop.adapter.kpi.average_products_in_category' => 'getPrestashop_Adapter_Kpi_AverageProductsInCategoryService.php',
            'prestashop.adapter.kpi.disabled_categories' => 'getPrestashop_Adapter_Kpi_DisabledCategoriesService.php',
            'prestashop.adapter.kpi.empty_categories' => 'getPrestashop_Adapter_Kpi_EmptyCategoriesService.php',
            'prestashop.adapter.kpi.enabled_languages' => 'getPrestashop_Adapter_Kpi_EnabledLanguagesService.php',
            'prestashop.adapter.kpi.main_country' => 'getPrestashop_Adapter_Kpi_MainCountryService.php',
            'prestashop.adapter.kpi.most_common_customers_gender' => 'getPrestashop_Adapter_Kpi_MostCommonCustomersGenderService.php',
            'prestashop.adapter.kpi.newsletter_registrations' => 'getPrestashop_Adapter_Kpi_NewsletterRegistrationsService.php',
            'prestashop.adapter.kpi.order_per_customer' => 'getPrestashop_Adapter_Kpi_OrderPerCustomerService.php',
            'prestashop.adapter.kpi.top_category' => 'getPrestashop_Adapter_Kpi_TopCategoryService.php',
            'prestashop.adapter.kpi.translations' => 'getPrestashop_Adapter_Kpi_TranslationsService.php',
            'prestashop.adapter.language.activator' => 'getPrestashop_Adapter_Language_ActivatorService.php',
            'prestashop.adapter.language.command_handler.add_language_handler' => 'getPrestashop_Adapter_Language_CommandHandler_AddLanguageHandlerService.php',
            'prestashop.adapter.language.command_handler.bulk_delete_languages_handler' => 'getPrestashop_Adapter_Language_CommandHandler_BulkDeleteLanguagesHandlerService.php',
            'prestashop.adapter.language.command_handler.bulk_toggle_languages_status_handler' => 'getPrestashop_Adapter_Language_CommandHandler_BulkToggleLanguagesStatusHandlerService.php',
            'prestashop.adapter.language.command_handler.delete_language_handler' => 'getPrestashop_Adapter_Language_CommandHandler_DeleteLanguageHandlerService.php',
            'prestashop.adapter.language.command_handler.edit_language_handler' => 'getPrestashop_Adapter_Language_CommandHandler_EditLanguageHandlerService.php',
            'prestashop.adapter.language.command_handler.toggle_language_status_handler' => 'getPrestashop_Adapter_Language_CommandHandler_ToggleLanguageStatusHandlerService.php',
            'prestashop.adapter.language.copier' => 'getPrestashop_Adapter_Language_CopierService.php',
            'prestashop.adapter.language.language_flag_thumbnail_provider' => 'getPrestashop_Adapter_Language_LanguageFlagThumbnailProviderService.php',
            'prestashop.adapter.language.language_pack_installer' => 'getPrestashop_Adapter_Language_LanguagePackInstallerService.php',
            'prestashop.adapter.language.pack.importer' => 'getPrestashop_Adapter_Language_Pack_ImporterService.php',
            'prestashop.adapter.language.query_handler.get_language_for_editing' => 'getPrestashop_Adapter_Language_QueryHandler_GetLanguageForEditingService.php',
            'prestashop.adapter.language.rtl.installed_language_checker' => 'getPrestashop_Adapter_Language_Rtl_InstalledLanguageCheckerService.php',
            'prestashop.adapter.language.validator' => 'getPrestashop_Adapter_Language_ValidatorService.php',
            'prestashop.adapter.legacy.hook' => 'getPrestashop_Adapter_Legacy_HookService.php',
            'prestashop.adapter.legacy.kpi_configuration' => 'getPrestashop_Adapter_Legacy_KpiConfigurationService.php',
            'prestashop.adapter.legacy.module' => 'getPrestashop_Adapter_Legacy_ModuleService.php',
            'prestashop.adapter.legacy_db' => 'getPrestashop_Adapter_LegacyDbService.php',
            'prestashop.adapter.local_units.configuration' => 'getPrestashop_Adapter_LocalUnits_ConfigurationService.php',
            'prestashop.adapter.localization.configuration' => 'getPrestashop_Adapter_Localization_ConfigurationService.php',
            'prestashop.adapter.localization_advanced.configuration' => 'getPrestashop_Adapter_LocalizationAdvanced_ConfigurationService.php',
            'prestashop.adapter.logs.configuration' => 'getPrestashop_Adapter_Logs_ConfigurationService.php',
            'prestashop.adapter.logs.form_handler' => 'getPrestashop_Adapter_Logs_FormHandlerService.php',
            'prestashop.adapter.logs.form_provider' => 'getPrestashop_Adapter_Logs_FormProviderService.php',
            'prestashop.adapter.mail_template.preview_variables_builder' => 'getPrestashop_Adapter_MailTemplate_PreviewVariablesBuilderService.php',
            'prestashop.adapter.mail_template.twig_renderer' => 'getPrestashop_Adapter_MailTemplate_TwigRendererService.php',
            'prestashop.adapter.mailing_information' => 'getPrestashop_Adapter_MailingInformationService.php',
            'prestashop.adapter.maintenance.configuration' => 'getPrestashop_Adapter_Maintenance_ConfigurationService.php',
            'prestashop.adapter.maintenance.form_handler' => 'getPrestashop_Adapter_Maintenance_FormHandlerService.php',
            'prestashop.adapter.maintenance.form_provider' => 'getPrestashop_Adapter_Maintenance_FormProviderService.php',
            'prestashop.adapter.manager.currency' => 'getPrestashop_Adapter_Manager_CurrencyService.php',
            'prestashop.adapter.manufacturer.command_handler.add_manufacturer_handler' => 'getPrestashop_Adapter_Manufacturer_CommandHandler_AddManufacturerHandlerService.php',
            'prestashop.adapter.manufacturer.command_handler.bulk_delete_manufacturer_handler' => 'getPrestashop_Adapter_Manufacturer_CommandHandler_BulkDeleteManufacturerHandlerService.php',
            'prestashop.adapter.manufacturer.command_handler.bulk_toggle_manufacturer_status_handler' => 'getPrestashop_Adapter_Manufacturer_CommandHandler_BulkToggleManufacturerStatusHandlerService.php',
            'prestashop.adapter.manufacturer.command_handler.delete_manufacturer_handler' => 'getPrestashop_Adapter_Manufacturer_CommandHandler_DeleteManufacturerHandlerService.php',
            'prestashop.adapter.manufacturer.command_handler.edit_manufacturer_handler' => 'getPrestashop_Adapter_Manufacturer_CommandHandler_EditManufacturerHandlerService.php',
            'prestashop.adapter.manufacturer.command_handler.toggle_manufacturer_status_handler' => 'getPrestashop_Adapter_Manufacturer_CommandHandler_ToggleManufacturerStatusHandlerService.php',
            'prestashop.adapter.manufacturer.manufacturer_logo_thumbnail_provider' => 'getPrestashop_Adapter_Manufacturer_ManufacturerLogoThumbnailProviderService.php',
            'prestashop.adapter.manufacturer.query_handler.get_manufacturer_for_editing' => 'getPrestashop_Adapter_Manufacturer_QueryHandler_GetManufacturerForEditingService.php',
            'prestashop.adapter.manufacturer.query_handler.get_manufacturer_for_viewing_handler' => 'getPrestashop_Adapter_Manufacturer_QueryHandler_GetManufacturerForViewingHandlerService.php',
            'prestashop.adapter.media_servers.configuration' => 'getPrestashop_Adapter_MediaServers_ConfigurationService.php',
            'prestashop.adapter.memcache_server.manager' => 'getPrestashop_Adapter_MemcacheServer_ManagerService.php',
            'prestashop.adapter.meta.command_handler.edit_meta' => 'getPrestashop_Adapter_Meta_CommandHandler_EditMetaService.php',
            'prestashop.adapter.meta.command_handler.save_meta' => 'getPrestashop_Adapter_Meta_CommandHandler_SaveMetaService.php',
            'prestashop.adapter.meta.data_provider' => 'getPrestashop_Adapter_Meta_DataProviderService.php',
            'prestashop.adapter.meta.meta_eraser' => 'getPrestashop_Adapter_Meta_MetaEraserService.php',
            'prestashop.adapter.meta.query_handler.get_meta_for_editing' => 'getPrestashop_Adapter_Meta_QueryHandler_GetMetaForEditingService.php',
            'prestashop.adapter.meta.query_handler.get_pages_for_layout_customization_handler' => 'getPrestashop_Adapter_Meta_QueryHandler_GetPagesForLayoutCustomizationHandlerService.php',
            'prestashop.adapter.meta.seo_options.configuration' => 'getPrestashop_Adapter_Meta_SeoOptions_ConfigurationService.php',
            'prestashop.adapter.meta.set_up_urls.configuration' => 'getPrestashop_Adapter_Meta_SetUpUrls_ConfigurationService.php',
            'prestashop.adapter.meta.shop_url.configuration' => 'getPrestashop_Adapter_Meta_ShopUrl_ConfigurationService.php',
            'prestashop.adapter.meta.url_schema.configuration' => 'getPrestashop_Adapter_Meta_UrlSchema_ConfigurationService.php',
            'prestashop.adapter.module.data_provider.tab_module_list' => 'getPrestashop_Adapter_Module_DataProvider_TabModuleListService.php',
            'prestashop.adapter.module.payment_module_provider' => 'getPrestashop_Adapter_Module_PaymentModuleProviderService.php',
            'prestashop.adapter.module.presenter.payment' => 'getPrestashop_Adapter_Module_Presenter_PaymentService.php',
            'prestashop.adapter.module.prestatrust.eventsubscriber' => 'getPrestashop_Adapter_Module_Prestatrust_EventsubscriberService.php',
            'prestashop.adapter.module.self_configurator' => 'getPrestashop_Adapter_Module_SelfConfiguratorService.php',
            'prestashop.adapter.module.tab.eventsubscriber' => 'getPrestashop_Adapter_Module_Tab_EventsubscriberService.php',
            'prestashop.adapter.module.tab.register' => 'getPrestashop_Adapter_Module_Tab_RegisterService.php',
            'prestashop.adapter.module.tab.unregister' => 'getPrestashop_Adapter_Module_Tab_UnregisterService.php',
            'prestashop.adapter.multistore_feature' => 'getPrestashop_Adapter_MultistoreFeatureService.php',
            'prestashop.adapter.notifications.configuration' => 'getPrestashop_Adapter_Notifications_ConfigurationService.php',
            'prestashop.adapter.optional_features.configuration' => 'getPrestashop_Adapter_OptionalFeatures_ConfigurationService.php',
            'prestashop.adapter.order.delivery.slip.options.configuration' => 'getPrestashop_Adapter_Order_Delivery_Slip_Options_ConfigurationService.php',
            'prestashop.adapter.order.delivery.slip.options.form_handler' => 'getPrestashop_Adapter_Order_Delivery_Slip_Options_FormHandlerService.php',
            'prestashop.adapter.order.delivery.slip.options.form_provider' => 'getPrestashop_Adapter_Order_Delivery_Slip_Options_FormProviderService.php',
            'prestashop.adapter.order.delivery.slip.pdf.configuration' => 'getPrestashop_Adapter_Order_Delivery_Slip_Pdf_ConfigurationService.php',
            'prestashop.adapter.order.delivery.slip.pdf.form_handler' => 'getPrestashop_Adapter_Order_Delivery_Slip_Pdf_FormHandlerService.php',
            'prestashop.adapter.order.delivery.slip.pdf.form_provider' => 'getPrestashop_Adapter_Order_Delivery_Slip_Pdf_FormProviderService.php',
            'prestashop.adapter.order.invoice_options.configuration' => 'getPrestashop_Adapter_Order_InvoiceOptions_ConfigurationService.php',
            'prestashop.adapter.order_general.configuration' => 'getPrestashop_Adapter_OrderGeneral_ConfigurationService.php',
            'prestashop.adapter.order_gift.configuration' => 'getPrestashop_Adapter_OrderGift_ConfigurationService.php',
            'prestashop.adapter.payment_module_preferences.configuration' => 'getPrestashop_Adapter_PaymentModulePreferences_ConfigurationService.php',
            'prestashop.adapter.pdf.generator.invoice' => 'getPrestashop_Adapter_Pdf_Generator_InvoiceService.php',
            'prestashop.adapter.pdf.type_provider.invoice' => 'getPrestashop_Adapter_Pdf_TypeProvider_InvoiceService.php',
            'prestashop.adapter.performance.form_handler' => 'getPrestashop_Adapter_Performance_FormHandlerService.php',
            'prestashop.adapter.performance.form_provider' => 'getPrestashop_Adapter_Performance_FormProviderService.php',
            'prestashop.adapter.php_parameters' => 'getPrestashop_Adapter_PhpParametersService.php',
            'prestashop.adapter.preferences.configuration' => 'getPrestashop_Adapter_Preferences_ConfigurationService.php',
            'prestashop.adapter.preferences.form_handler' => 'getPrestashop_Adapter_Preferences_FormHandlerService.php',
            'prestashop.adapter.preferences.form_provider' => 'getPrestashop_Adapter_Preferences_FormProviderService.php',
            'prestashop.adapter.presenter.module' => 'getPrestashop_Adapter_Presenter_ModuleService.php',
            'prestashop.adapter.product.filter_categories_request_purifier' => 'getPrestashop_Adapter_Product_FilterCategoriesRequestPurifierService.php',
            'prestashop.adapter.product.list_parameters_updater' => 'getPrestashop_Adapter_Product_ListParametersUpdaterService.php',
            'prestashop.adapter.product_general.configuration' => 'getPrestashop_Adapter_ProductGeneral_ConfigurationService.php',
            'prestashop.adapter.product_page.configuration' => 'getPrestashop_Adapter_ProductPage_ConfigurationService.php',
            'prestashop.adapter.product_pagination.configuration' => 'getPrestashop_Adapter_ProductPagination_ConfigurationService.php',
            'prestashop.adapter.product_stock.configuration' => 'getPrestashop_Adapter_ProductStock_ConfigurationService.php',
            'prestashop.adapter.profile.command_handler.add_profile_handler' => 'getPrestashop_Adapter_Profile_CommandHandler_AddProfileHandlerService.php',
            'prestashop.adapter.profile.command_handler.bulk_delete_profile' => 'getPrestashop_Adapter_Profile_CommandHandler_BulkDeleteProfileService.php',
            'prestashop.adapter.profile.command_handler.delete_profile' => 'getPrestashop_Adapter_Profile_CommandHandler_DeleteProfileService.php',
            'prestashop.adapter.profile.command_handler.edit_profile_handler' => 'getPrestashop_Adapter_Profile_CommandHandler_EditProfileHandlerService.php',
            'prestashop.adapter.profile.employee.command_handler.bulk_delete_employee_handler' => 'getPrestashop_Adapter_Profile_Employee_CommandHandler_BulkDeleteEmployeeHandlerService.php',
            'prestashop.adapter.profile.employee.command_handler.bulk_update_employee_status_handler' => 'getPrestashop_Adapter_Profile_Employee_CommandHandler_BulkUpdateEmployeeStatusHandlerService.php',
            'prestashop.adapter.profile.employee.command_handler.delete_employee_handler' => 'getPrestashop_Adapter_Profile_Employee_CommandHandler_DeleteEmployeeHandlerService.php',
            'prestashop.adapter.profile.employee.command_handler.toggle_employee_status_handler' => 'getPrestashop_Adapter_Profile_Employee_CommandHandler_ToggleEmployeeStatusHandlerService.php',
            'prestashop.adapter.profile.query_handler.get_profile_for_editing_handler' => 'getPrestashop_Adapter_Profile_QueryHandler_GetProfileForEditingHandlerService.php',
            'prestashop.adapter.routes.route_validator' => 'getPrestashop_Adapter_Routes_RouteValidatorService.php',
            'prestashop.adapter.shipping_preferences.carrier_options_configuration' => 'getPrestashop_Adapter_ShippingPreferences_CarrierOptionsConfigurationService.php',
            'prestashop.adapter.shipping_preferences.handling_configuration' => 'getPrestashop_Adapter_ShippingPreferences_HandlingConfigurationService.php',
            'prestashop.adapter.shop.command_handler.upload_logos_handler' => 'getPrestashop_Adapter_Shop_CommandHandler_UploadLogosHandlerService.php',
            'prestashop.adapter.shop.context' => 'getPrestashop_Adapter_Shop_ContextService.php',
            'prestashop.adapter.shop.query_handler.get_logos_paths_handler' => 'getPrestashop_Adapter_Shop_QueryHandler_GetLogosPathsHandlerService.php',
            'prestashop.adapter.shop.shop_url' => 'getPrestashop_Adapter_Shop_ShopUrlService.php',
            'prestashop.adapter.shop.url.base_url_provider' => 'getPrestashop_Adapter_Shop_Url_BaseUrlProviderService.php',
            'prestashop.adapter.shop.url.category_provider' => 'getPrestashop_Adapter_Shop_Url_CategoryProviderService.php',
            'prestashop.adapter.shop.url.cms_provider' => 'getPrestashop_Adapter_Shop_Url_CmsProviderService.php',
            'prestashop.adapter.shop_information' => 'getPrestashop_Adapter_ShopInformationService.php',
            'prestashop.adapter.smarty_cache.configuration' => 'getPrestashop_Adapter_SmartyCache_ConfigurationService.php',
            'prestashop.adapter.sql_manager.command_handler.add_request_sql' => 'getPrestashop_Adapter_SqlManager_CommandHandler_AddRequestSqlService.php',
            'prestashop.adapter.sql_manager.command_handler.bulk_delete_request_sql' => 'getPrestashop_Adapter_SqlManager_CommandHandler_BulkDeleteRequestSqlService.php',
            'prestashop.adapter.sql_manager.command_handler.delete_request_sql' => 'getPrestashop_Adapter_SqlManager_CommandHandler_DeleteRequestSqlService.php',
            'prestashop.adapter.sql_manager.command_handler.edit_request_sql' => 'getPrestashop_Adapter_SqlManager_CommandHandler_EditRequestSqlService.php',
            'prestashop.adapter.sql_manager.query_handler.get_database_table_fields_list' => 'getPrestashop_Adapter_SqlManager_QueryHandler_GetDatabaseTableFieldsListService.php',
            'prestashop.adapter.sql_manager.query_handler.get_database_tables_list' => 'getPrestashop_Adapter_SqlManager_QueryHandler_GetDatabaseTablesListService.php',
            'prestashop.adapter.sql_manager.query_handler.get_request_sql_execution_result' => 'getPrestashop_Adapter_SqlManager_QueryHandler_GetRequestSqlExecutionResultService.php',
            'prestashop.adapter.sql_manager.query_handler.get_request_sql_for_editing' => 'getPrestashop_Adapter_SqlManager_QueryHandler_GetRequestSqlForEditingService.php',
            'prestashop.adapter.sql_manager.request_sql_form_data_validator' => 'getPrestashop_Adapter_SqlManager_RequestSqlFormDataValidatorService.php',
            'prestashop.adapter.sql_manager.sql_query_validator' => 'getPrestashop_Adapter_SqlManager_SqlQueryValidatorService.php',
            'prestashop.adapter.supplier.command_handler.bulk_delete_supplier_handler' => 'getPrestashop_Adapter_Supplier_CommandHandler_BulkDeleteSupplierHandlerService.php',
            'prestashop.adapter.supplier.command_handler.bulk_disable_supplier_handler' => 'getPrestashop_Adapter_Supplier_CommandHandler_BulkDisableSupplierHandlerService.php',
            'prestashop.adapter.supplier.command_handler.bulk_enable_supplier_handler' => 'getPrestashop_Adapter_Supplier_CommandHandler_BulkEnableSupplierHandlerService.php',
            'prestashop.adapter.supplier.command_handler.delete_supplier_handler' => 'getPrestashop_Adapter_Supplier_CommandHandler_DeleteSupplierHandlerService.php',
            'prestashop.adapter.supplier.command_handler.toggle_supplier_status_handler' => 'getPrestashop_Adapter_Supplier_CommandHandler_ToggleSupplierStatusHandlerService.php',
            'prestashop.adapter.supplier.provider.supplier_address' => 'getPrestashop_Adapter_Supplier_Provider_SupplierAddressService.php',
            'prestashop.adapter.supplier.provider.supplier_logo' => 'getPrestashop_Adapter_Supplier_Provider_SupplierLogoService.php',
            'prestashop.adapter.supplier.supplier_order_validator' => 'getPrestashop_Adapter_Supplier_SupplierOrderValidatorService.php',
            'prestashop.adapter.system_information' => 'getPrestashop_Adapter_SystemInformationService.php',
            'prestashop.adapter.tax.command_handler.add_tax_handler' => 'getPrestashop_Adapter_Tax_CommandHandler_AddTaxHandlerService.php',
            'prestashop.adapter.tax.command_handler.bulk_delete_tax_handler' => 'getPrestashop_Adapter_Tax_CommandHandler_BulkDeleteTaxHandlerService.php',
            'prestashop.adapter.tax.command_handler.bulk_toggle_tax_status_handler' => 'getPrestashop_Adapter_Tax_CommandHandler_BulkToggleTaxStatusHandlerService.php',
            'prestashop.adapter.tax.command_handler.delete_tax_handler' => 'getPrestashop_Adapter_Tax_CommandHandler_DeleteTaxHandlerService.php',
            'prestashop.adapter.tax.command_handler.edit_tax_handler' => 'getPrestashop_Adapter_Tax_CommandHandler_EditTaxHandlerService.php',
            'prestashop.adapter.tax.command_handler.toggle_tax_status_handler' => 'getPrestashop_Adapter_Tax_CommandHandler_ToggleTaxStatusHandlerService.php',
            'prestashop.adapter.tax.ecotax.ecotax_resetter' => 'getPrestashop_Adapter_Tax_Ecotax_EcotaxResetterService.php',
            'prestashop.adapter.tax.query_handler.get_tax_for_editing_handler' => 'getPrestashop_Adapter_Tax_QueryHandler_GetTaxForEditingHandlerService.php',
            'prestashop.adapter.theme.theme_multi_store_settings_form_data_provider' => 'getPrestashop_Adapter_Theme_ThemeMultiStoreSettingsFormDataProviderService.php',
            'prestashop.adapter.translation_route_finder' => 'getPrestashop_Adapter_TranslationRouteFinderService.php',
            'prestashop.adapter.upload_quota.configuration' => 'getPrestashop_Adapter_UploadQuota_ConfigurationService.php',
            'prestashop.adapter.validate' => 'getPrestashop_Adapter_ValidateService.php',
            'prestashop.adapter.webservice.command_handler.add_webservice_key_handler' => 'getPrestashop_Adapter_Webservice_CommandHandler_AddWebserviceKeyHandlerService.php',
            'prestashop.adapter.webservice.command_handler.edit_webservice_key_handler' => 'getPrestashop_Adapter_Webservice_CommandHandler_EditWebserviceKeyHandlerService.php',
            'prestashop.adapter.webservice.configuration' => 'getPrestashop_Adapter_Webservice_ConfigurationService.php',
            'prestashop.adapter.webservice.form_handler' => 'getPrestashop_Adapter_Webservice_FormHandlerService.php',
            'prestashop.adapter.webservice.query_handler.get_webservice_key_for_editing_handler' => 'getPrestashop_Adapter_Webservice_QueryHandler_GetWebserviceKeyForEditingHandlerService.php',
            'prestashop.adapter.webservice.webservice_key_eraser' => 'getPrestashop_Adapter_Webservice_WebserviceKeyEraserService.php',
            'prestashop.adapter.webservice.webservice_key_status_modifier' => 'getPrestashop_Adapter_Webservice_WebserviceKeyStatusModifierService.php',
            'prestashop.admin.backup.form_data_provider' => 'getPrestashop_Admin_Backup_FormDataProviderService.php',
            'prestashop.admin.backup.form_handler' => 'getPrestashop_Admin_Backup_FormHandlerService.php',
            'prestashop.admin.currency.form_data_provider' => 'getPrestashop_Admin_Currency_FormDataProviderService.php',
            'prestashop.admin.currency_settings.form_handler' => 'getPrestashop_Admin_CurrencySettings_FormHandlerService.php',
            'prestashop.admin.customer_preferences.data_provider' => 'getPrestashop_Admin_CustomerPreferences_DataProviderService.php',
            'prestashop.admin.customer_preferences.form_handler' => 'getPrestashop_Admin_CustomerPreferences_FormHandlerService.php',
            'prestashop.admin.email_configuration.form_data_provider' => 'getPrestashop_Admin_EmailConfiguration_FormDataProviderService.php',
            'prestashop.admin.email_configuration.form_handler' => 'getPrestashop_Admin_EmailConfiguration_FormHandlerService.php',
            'prestashop.admin.employee_options.form_data_provider' => 'getPrestashop_Admin_EmployeeOptions_FormDataProviderService.php',
            'prestashop.admin.employee_options.form_handler' => 'getPrestashop_Admin_EmployeeOptions_FormHandlerService.php',
            'prestashop.admin.geolocation.form_data_provider' => 'getPrestashop_Admin_Geolocation_FormDataProviderService.php',
            'prestashop.admin.geolocation.form_handler' => 'getPrestashop_Admin_Geolocation_FormHandlerService.php',
            'prestashop.admin.import.form_builder' => 'getPrestashop_Admin_Import_FormBuilderService.php',
            'prestashop.admin.import.form_data_provider' => 'getPrestashop_Admin_Import_FormDataProviderService.php',
            'prestashop.admin.import.form_handler' => 'getPrestashop_Admin_Import_FormHandlerService.php',
            'prestashop.admin.import_data_configuration.form_builder' => 'getPrestashop_Admin_ImportDataConfiguration_FormBuilderService.php',
            'prestashop.admin.import_data_configuration.form_data_provider' => 'getPrestashop_Admin_ImportDataConfiguration_FormDataProviderService.php',
            'prestashop.admin.import_data_configuration.form_handler' => 'getPrestashop_Admin_ImportDataConfiguration_FormHandlerService.php',
            'prestashop.admin.improve.design.theme.shop_logos.form_data_provider' => 'getPrestashop_Admin_Improve_Design_Theme_ShopLogos_FormDataProviderService.php',
            'prestashop.admin.localization.form_data_provider' => 'getPrestashop_Admin_Localization_FormDataProviderService.php',
            'prestashop.admin.localization.form_handler' => 'getPrestashop_Admin_Localization_FormHandlerService.php',
            'prestashop.admin.mail_theme.form_data_provider' => 'getPrestashop_Admin_MailTheme_FormDataProviderService.php',
            'prestashop.admin.mail_theme.form_handler' => 'getPrestashop_Admin_MailTheme_FormHandlerService.php',
            'prestashop.admin.meta_settings.form_handler' => 'getPrestashop_Admin_MetaSettings_FormHandlerService.php',
            'prestashop.admin.order.invoices.by_date.data_provider' => 'getPrestashop_Admin_Order_Invoices_ByDate_DataProviderService.php',
            'prestashop.admin.order.invoices.by_date.form_handler' => 'getPrestashop_Admin_Order_Invoices_ByDate_FormHandlerService.php',
            'prestashop.admin.order.invoices.by_status.data_provider' => 'getPrestashop_Admin_Order_Invoices_ByStatus_DataProviderService.php',
            'prestashop.admin.order.invoices.by_status.form_handler' => 'getPrestashop_Admin_Order_Invoices_ByStatus_FormHandlerService.php',
            'prestashop.admin.order.invoices.options.data_provider' => 'getPrestashop_Admin_Order_Invoices_Options_DataProviderService.php',
            'prestashop.admin.order.invoices.options.form_handler' => 'getPrestashop_Admin_Order_Invoices_Options_FormHandlerService.php',
            'prestashop.admin.order_preferences.data_provider' => 'getPrestashop_Admin_OrderPreferences_DataProviderService.php',
            'prestashop.admin.order_preferences.form_handler' => 'getPrestashop_Admin_OrderPreferences_FormHandlerService.php',
            'prestashop.admin.payment_preferences.form_data_provider' => 'getPrestashop_Admin_PaymentPreferences_FormDataProviderService.php',
            'prestashop.admin.payment_preferences.form_handler' => 'getPrestashop_Admin_PaymentPreferences_FormHandlerService.php',
            'prestashop.admin.product_preferences.data_provider' => 'getPrestashop_Admin_ProductPreferences_DataProviderService.php',
            'prestashop.admin.product_preferences.form_handler' => 'getPrestashop_Admin_ProductPreferences_FormHandlerService.php',
            'prestashop.admin.request_sql.form_handler' => 'getPrestashop_Admin_RequestSql_FormHandlerService.php',
            'prestashop.admin.request_sql_settings.form_data_provider' => 'getPrestashop_Admin_RequestSqlSettings_FormDataProviderService.php',
            'prestashop.admin.request_sql_settings.form_handler' => 'getPrestashop_Admin_RequestSqlSettings_FormHandlerService.php',
            'prestashop.admin.shipping_preferences.data_provider' => 'getPrestashop_Admin_ShippingPreferences_DataProviderService.php',
            'prestashop.admin.shipping_preferences.form_handler' => 'getPrestashop_Admin_ShippingPreferences_FormHandlerService.php',
            'prestashop.admin.shop_logos_settings.form_handler' => 'getPrestashop_Admin_ShopLogosSettings_FormHandlerService.php',
            'prestashop.admin.tax_options.form_data_provider' => 'getPrestashop_Admin_TaxOptions_FormDataProviderService.php',
            'prestashop.admin.tax_options.form_handler' => 'getPrestashop_Admin_TaxOptions_FormHandlerService.php',
            'prestashop.admin.traffic_seo.meta_settings.form_data_provider' => 'getPrestashop_Admin_TrafficSeo_MetaSettings_FormDataProviderService.php',
            'prestashop.admin.translations_settings.form_handler' => 'getPrestashop_Admin_TranslationsSettings_FormHandlerService.php',
            'prestashop.admin.webservice.form_data_provider' => 'getPrestashop_Admin_Webservice_FormDataProviderService.php',
            'prestashop.bundle.event_listener.filter_category_search_criteria' => 'getPrestashop_Bundle_EventListener_FilterCategorySearchCriteriaService.php',
            'prestashop.bundle.event_listener.filter_cms_page_category_search_criteria' => 'getPrestashop_Bundle_EventListener_FilterCmsPageCategorySearchCriteriaService.php',
            'prestashop.bundle.event_listener.module_guard_listener' => 'getPrestashop_Bundle_EventListener_ModuleGuardListenerService.php',
            'prestashop.bundle.form.admin.configure.advanced_parameters.employee.employee' => 'getPrestashop_Bundle_Form_Admin_Configure_AdvancedParameters_Employee_EmployeeService.php',
            'prestashop.bundle.form.admin.configure.advanced_parameters.request_sql.form_data_provider' => 'getPrestashop_Bundle_Form_Admin_Configure_AdvancedParameters_RequestSql_FormDataProviderService.php',
            'prestashop.bundle.form.admin.improve.design.theme.page_layout_customization_form_factory' => 'getPrestashop_Bundle_Form_Admin_Improve_Design_Theme_PageLayoutCustomizationFormFactoryService.php',
            'prestashop.bundle.form.admin.sell.customer.customer' => 'getPrestashop_Bundle_Form_Admin_Sell_Customer_CustomerService.php',
            'prestashop.bundle.form.data_transformer.default_language_to_filled_array' => 'getPrestashop_Bundle_Form_DataTransformer_DefaultLanguageToFilledArrayService.php',
            'prestashop.bundle.form.data_transformer.string_array_to_integer_array' => 'getPrestashop_Bundle_Form_DataTransformer_StringArrayToIntegerArrayService.php',
            'prestashop.bundle.grid.response_builder' => 'getPrestashop_Bundle_Grid_ResponseBuilderService.php',
            'prestashop.bundle.repository.module' => 'getPrestashop_Bundle_Repository_ModuleService.php',
            'prestashop.bundle.routing.module_route_loader' => 'getPrestashop_Bundle_Routing_ModuleRouteLoaderService.php',
            'prestashop.cache.refresh' => 'getPrestashop_Cache_RefreshService.php',
            'prestashop.compiler.smarty.template' => 'getPrestashop_Compiler_Smarty_TemplateService.php',
            'prestashop.core.addon.theme.exporter' => 'getPrestashop_Core_Addon_Theme_ExporterService.php',
            'prestashop.core.addon.theme.repository' => 'getPrestashop_Core_Addon_Theme_RepositoryService.php',
            'prestashop.core.addon.theme.theme.page_layouts_customizer' => 'getPrestashop_Core_Addon_Theme_Theme_PageLayoutsCustomizerService.php',
            'prestashop.core.addon.theme.theme_manager' => 'getPrestashop_Core_Addon_Theme_ThemeManagerService.php',
            'prestashop.core.addon.theme.theme_manager_builder' => 'getPrestashop_Core_Addon_Theme_ThemeManagerBuilderService.php',
            'prestashop.core.addon.theme.theme_provider' => 'getPrestashop_Core_Addon_Theme_ThemeProviderService.php',
            'prestashop.core.addon.theme.theme_zip_uploader' => 'getPrestashop_Core_Addon_Theme_ThemeZipUploaderService.php',
            'prestashop.core.admin.admin_filter.repository' => 'getPrestashop_Core_Admin_AdminFilter_RepositoryService.php',
            'prestashop.core.admin.data_provider.product_interface' => 'getPrestashop_Core_Admin_DataProvider_ProductInterfaceService.php',
            'prestashop.core.admin.data_updater.product_interface' => 'getPrestashop_Core_Admin_DataUpdater_ProductInterfaceService.php',
            'prestashop.core.admin.import_match.repository' => 'getPrestashop_Core_Admin_ImportMatch_RepositoryService.php',
            'prestashop.core.admin.lang.repository' => 'getPrestashop_Core_Admin_Lang_RepositoryService.php',
            'prestashop.core.admin.log.repository' => 'getPrestashop_Core_Admin_Log_RepositoryService.php',
            'prestashop.core.admin.page_preference_interface' => 'getPrestashop_Core_Admin_PagePreferenceInterfaceService.php',
            'prestashop.core.admin.request_sql.repository' => 'getPrestashop_Core_Admin_RequestSql_RepositoryService.php',
            'prestashop.core.admin.search_parameters' => 'getPrestashop_Core_Admin_SearchParametersService.php',
            'prestashop.core.admin.shop.repository' => 'getPrestashop_Core_Admin_Shop_RepositoryService.php',
            'prestashop.core.admin.tab.repository' => 'getPrestashop_Core_Admin_Tab_RepositoryService.php',
            'prestashop.core.admin.timezone.repository' => 'getPrestashop_Core_Admin_Timezone_RepositoryService.php',
            'prestashop.core.admin.translation.repository' => 'getPrestashop_Core_Admin_Translation_RepositoryService.php',
            'prestashop.core.admin.url_generator' => 'getPrestashop_Core_Admin_UrlGeneratorService.php',
            'prestashop.core.admin.url_generator_factory' => 'getPrestashop_Core_Admin_UrlGeneratorFactoryService.php',
            'prestashop.core.admin.url_generator_legacy' => 'getPrestashop_Core_Admin_UrlGeneratorLegacyService.php',
            'prestashop.core.api.attribute.controller' => 'getPrestashop_Core_Api_Attribute_ControllerService.php',
            'prestashop.core.api.category.controller' => 'getPrestashop_Core_Api_Category_ControllerService.php',
            'prestashop.core.api.category.repository' => 'getPrestashop_Core_Api_Category_RepositoryService.php',
            'prestashop.core.api.feature.controller' => 'getPrestashop_Core_Api_Feature_ControllerService.php',
            'prestashop.core.api.feature_attribute.repository' => 'getPrestashop_Core_Api_FeatureAttribute_RepositoryService.php',
            'prestashop.core.api.i18n.controller' => 'getPrestashop_Core_Api_I18n_ControllerService.php',
            'prestashop.core.api.improve.design.postions.controller' => 'getPrestashop_Core_Api_Improve_Design_Postions_ControllerService.php',
            'prestashop.core.api.manufacturer.controller' => 'getPrestashop_Core_Api_Manufacturer_ControllerService.php',
            'prestashop.core.api.manufacturer.repository' => 'getPrestashop_Core_Api_Manufacturer_RepositoryService.php',
            'prestashop.core.api.order_invoice.repository' => 'getPrestashop_Core_Api_OrderInvoice_RepositoryService.php',
            'prestashop.core.api.query_stock_movement_params_collection' => 'getPrestashop_Core_Api_QueryStockMovementParamsCollectionService.php',
            'prestashop.core.api.query_stock_params_collection' => 'getPrestashop_Core_Api_QueryStockParamsCollectionService.php',
            'prestashop.core.api.query_translation_params_collection' => 'getPrestashop_Core_Api_QueryTranslationParamsCollectionService.php',
            'prestashop.core.api.stock.controller' => 'getPrestashop_Core_Api_Stock_ControllerService.php',
            'prestashop.core.api.stock.movements_collection' => 'getPrestashop_Core_Api_Stock_MovementsCollectionService.php',
            'prestashop.core.api.stock.repository' => 'getPrestashop_Core_Api_Stock_RepositoryService.php',
            'prestashop.core.api.stock_movement.controller' => 'getPrestashop_Core_Api_StockMovement_ControllerService.php',
            'prestashop.core.api.stock_movement.repository' => 'getPrestashop_Core_Api_StockMovement_RepositoryService.php',
            'prestashop.core.api.supplier.controller' => 'getPrestashop_Core_Api_Supplier_ControllerService.php',
            'prestashop.core.api.supplier.repository' => 'getPrestashop_Core_Api_Supplier_RepositoryService.php',
            'prestashop.core.api.translation.controller' => 'getPrestashop_Core_Api_Translation_ControllerService.php',
            'prestashop.core.b2b.b2b_feature' => 'getPrestashop_Core_B2b_B2bFeatureService.php',
            'prestashop.core.backup.comparator.backup_by_date_comparator' => 'getPrestashop_Core_Backup_Comparator_BackupByDateComparatorService.php',
            'prestashop.core.backup.listing.grid_data_factory' => 'getPrestashop_Core_Backup_Listing_GridDataFactoryService.php',
            'prestashop.core.backup.options_configuration' => 'getPrestashop_Core_Backup_OptionsConfigurationService.php',
            'prestashop.core.cache.clearer.cache_clearer_chain' => 'getPrestashop_Core_Cache_Clearer_CacheClearerChainService.php',
            'prestashop.core.cms_page.data_provider.cms_page_view' => 'getPrestashop_Core_CmsPage_DataProvider_CmsPageViewService.php',
            'prestashop.core.command_bus' => 'getPrestashop_Core_CommandBusService.php',
            'prestashop.core.configuration.ini_configuration' => 'getPrestashop_Core_Configuration_IniConfigurationService.php',
            'prestashop.core.configuration.php_extension_checker' => 'getPrestashop_Core_Configuration_PhpExtensionCheckerService.php',
            'prestashop.core.constraint_validator.default_language_validator' => 'getPrestashop_Core_ConstraintValidator_DefaultLanguageValidatorService.php',
            'prestashop.core.constraint_validator.is_url_rewrite_validator' => 'getPrestashop_Core_ConstraintValidator_IsUrlRewriteValidatorService.php',
            'prestashop.core.crypto.hashing' => 'getPrestashop_Core_Crypto_HashingService.php',
            'prestashop.core.currency.grid_data_factory' => 'getPrestashop_Core_Currency_GridDataFactoryService.php',
            'prestashop.core.data_provider.stock_interface' => 'getPrestashop_Core_DataProvider_StockInterfaceService.php',
            'prestashop.core.domain.showcase_card.query_handler.get_showcase_card_is_closed_handler' => 'getPrestashop_Core_Domain_ShowcaseCard_QueryHandler_GetShowcaseCardIsClosedHandlerService.php',
            'prestashop.core.domain.sql_management.command_handler.save_settings' => 'getPrestashop_Core_Domain_SqlManagement_CommandHandler_SaveSettingsService.php',
            'prestashop.core.domain.sql_management.query_handler.get_sql_request_settings' => 'getPrestashop_Core_Domain_SqlManagement_QueryHandler_GetSqlRequestSettingsService.php',
            'prestashop.core.domain.theme.command_handler.adapt_theme_to_rtl_languages_handler' => 'getPrestashop_Core_Domain_Theme_CommandHandler_AdaptThemeToRtlLanguagesHandlerService.php',
            'prestashop.core.domain.theme.command_handler.delete_theme_handler' => 'getPrestashop_Core_Domain_Theme_CommandHandler_DeleteThemeHandlerService.php',
            'prestashop.core.domain.theme.command_handler.enable_theme_handler' => 'getPrestashop_Core_Domain_Theme_CommandHandler_EnableThemeHandlerService.php',
            'prestashop.core.domain.theme.command_handler.import_theme_handler' => 'getPrestashop_Core_Domain_Theme_CommandHandler_ImportThemeHandlerService.php',
            'prestashop.core.domain.theme.command_handler.reset_theme_layouts_handler' => 'getPrestashop_Core_Domain_Theme_CommandHandler_ResetThemeLayoutsHandlerService.php',
            'prestashop.core.email.email_configurator' => 'getPrestashop_Core_Email_EmailConfiguratorService.php',
            'prestashop.core.email.smtp_configurator' => 'getPrestashop_Core_Email_SmtpConfiguratorService.php',
            'prestashop.core.employee.profile_access_checker' => 'getPrestashop_Core_Employee_ProfileAccessCheckerService.php',
            'prestashop.core.export.dir' => 'getPrestashop_Core_Export_DirService.php',
            'prestashop.core.export.file_writer.export_csv_file_writer' => 'getPrestashop_Core_Export_FileWriter_ExportCsvFileWriterService.php',
            'prestashop.core.file.cached_finder.invoice_model' => 'getPrestashop_Core_File_CachedFinder_InvoiceModelService.php',
            'prestashop.core.file.finder.invoice_model' => 'getPrestashop_Core_File_Finder_InvoiceModelService.php',
            'prestashop.core.form.builder.currency_form_builder' => 'getPrestashop_Core_Form_Builder_CurrencyFormBuilderService.php',
            'prestashop.core.form.builder.form_builder_factory' => 'getPrestashop_Core_Form_Builder_FormBuilderFactoryService.php',
            'prestashop.core.form.builder.meta_form_builder' => 'getPrestashop_Core_Form_Builder_MetaFormBuilderService.php',
            'prestashop.core.form.builder.sql_request_form_builder' => 'getPrestashop_Core_Form_Builder_SqlRequestFormBuilderService.php',
            'prestashop.core.form.choice_provider.accessible_tab' => 'getPrestashop_Core_Form_ChoiceProvider_AccessibleTabService.php',
            'prestashop.core.form.choice_provider.all_languages' => 'getPrestashop_Core_Form_ChoiceProvider_AllLanguagesService.php',
            'prestashop.core.form.choice_provider.canonical_redirect_type' => 'getPrestashop_Core_Form_ChoiceProvider_CanonicalRedirectTypeService.php',
            'prestashop.core.form.choice_provider.carrier_by_reference_id' => 'getPrestashop_Core_Form_ChoiceProvider_CarrierByReferenceIdService.php',
            'prestashop.core.form.choice_provider.category_delete_mode' => 'getPrestashop_Core_Form_ChoiceProvider_CategoryDeleteModeService.php',
            'prestashop.core.form.choice_provider.cms_categories' => 'getPrestashop_Core_Form_ChoiceProvider_CmsCategoriesService.php',
            'prestashop.core.form.choice_provider.contact_by_id' => 'getPrestashop_Core_Form_ChoiceProvider_ContactByIdService.php',
            'prestashop.core.form.choice_provider.country_by_id' => 'getPrestashop_Core_Form_ChoiceProvider_CountryByIdService.php',
            'prestashop.core.form.choice_provider.country_by_iso_code' => 'getPrestashop_Core_Form_ChoiceProvider_CountryByIsoCodeService.php',
            'prestashop.core.form.choice_provider.currency_by_id' => 'getPrestashop_Core_Form_ChoiceProvider_CurrencyByIdService.php',
            'prestashop.core.form.choice_provider.currency_name_by_iso_code' => 'getPrestashop_Core_Form_ChoiceProvider_CurrencyNameByIsoCodeService.php',
            'prestashop.core.form.choice_provider.customer_delete_method' => 'getPrestashop_Core_Form_ChoiceProvider_CustomerDeleteMethodService.php',
            'prestashop.core.form.choice_provider.customer_required_fields' => 'getPrestashop_Core_Form_ChoiceProvider_CustomerRequiredFieldsService.php',
            'prestashop.core.form.choice_provider.default_meta_page_name' => 'getPrestashop_Core_Form_ChoiceProvider_DefaultMetaPageNameService.php',
            'prestashop.core.form.choice_provider.email_content_type' => 'getPrestashop_Core_Form_ChoiceProvider_EmailContentTypeService.php',
            'prestashop.core.form.choice_provider.group_by_id' => 'getPrestashop_Core_Form_ChoiceProvider_GroupByIdService.php',
            'prestashop.core.form.choice_provider.import_entity_field' => 'getPrestashop_Core_Form_ChoiceProvider_ImportEntityFieldService.php',
            'prestashop.core.form.choice_provider.import_match_configuration' => 'getPrestashop_Core_Form_ChoiceProvider_ImportMatchConfigurationService.php',
            'prestashop.core.form.choice_provider.invoice_model_by_name' => 'getPrestashop_Core_Form_ChoiceProvider_InvoiceModelByNameService.php',
            'prestashop.core.form.choice_provider.language_by_id' => 'getPrestashop_Core_Form_ChoiceProvider_LanguageByIdService.php',
            'prestashop.core.form.choice_provider.localization_pack_by_iso_code' => 'getPrestashop_Core_Form_ChoiceProvider_LocalizationPackByIsoCodeService.php',
            'prestashop.core.form.choice_provider.mail_method' => 'getPrestashop_Core_Form_ChoiceProvider_MailMethodService.php',
            'prestashop.core.form.choice_provider.mail_themes' => 'getPrestashop_Core_Form_ChoiceProvider_MailThemesService.php',
            'prestashop.core.form.choice_provider.module_by_name' => 'getPrestashop_Core_Form_ChoiceProvider_ModuleByNameService.php',
            'prestashop.core.form.choice_provider.module_meta_page_name' => 'getPrestashop_Core_Form_ChoiceProvider_ModuleMetaPageNameService.php',
            'prestashop.core.form.choice_provider.non_installed_localization' => 'getPrestashop_Core_Form_ChoiceProvider_NonInstalledLocalizationService.php',
            'prestashop.core.form.choice_provider.order_state_by_id' => 'getPrestashop_Core_Form_ChoiceProvider_OrderStateByIdService.php',
            'prestashop.core.form.choice_provider.permissions_choice_provider' => 'getPrestashop_Core_Form_ChoiceProvider_PermissionsChoiceProviderService.php',
            'prestashop.core.form.choice_provider.profile' => 'getPrestashop_Core_Form_ChoiceProvider_ProfileService.php',
            'prestashop.core.form.choice_provider.status' => 'getPrestashop_Core_Form_ChoiceProvider_StatusService.php',
            'prestashop.core.form.choice_provider.tax_address_type_choice_provider' => 'getPrestashop_Core_Form_ChoiceProvider_TaxAddressTypeChoiceProviderService.php',
            'prestashop.core.form.choice_provider.tax_rule_group_choice_provider' => 'getPrestashop_Core_Form_ChoiceProvider_TaxRuleGroupChoiceProviderService.php',
            'prestashop.core.form.choice_provider.theme' => 'getPrestashop_Core_Form_ChoiceProvider_ThemeService.php',
            'prestashop.core.form.choice_provider.theme_by_name' => 'getPrestashop_Core_Form_ChoiceProvider_ThemeByNameService.php',
            'prestashop.core.form.choice_provider.theme_by_name_with_emails' => 'getPrestashop_Core_Form_ChoiceProvider_ThemeByNameWithEmailsService.php',
            'prestashop.core.form.choice_provider.theme_page_layouts' => 'getPrestashop_Core_Form_ChoiceProvider_ThemePageLayoutsService.php',
            'prestashop.core.form.choice_provider.theme_zip' => 'getPrestashop_Core_Form_ChoiceProvider_ThemeZipService.php',
            'prestashop.core.form.choice_provider.timezone_by_name' => 'getPrestashop_Core_Form_ChoiceProvider_TimezoneByNameService.php',
            'prestashop.core.form.choice_provider.translation_type' => 'getPrestashop_Core_Form_ChoiceProvider_TranslationTypeService.php',
            'prestashop.core.form.identifiable_object.builder.category_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_CategoryFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.cms_page_category_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_CmsPageCategoryFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.cms_page_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_CmsPageFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.contact_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_ContactFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.customer_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_CustomerFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.employee_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_EmployeeFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.language_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_LanguageFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.manufacturer_address_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_ManufacturerAddressFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.manufacturer_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_ManufacturerFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.profile_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_ProfileFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.root_category_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_RootCategoryFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.tax_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_TaxFormBuilderService.php',
            'prestashop.core.form.identifiable_object.builder.webservice_key_form_builder' => 'getPrestashop_Core_Form_IdentifiableObject_Builder_WebserviceKeyFormBuilderService.php',
            'prestashop.core.form.identifiable_object.currency_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_CurrencyFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.currency_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_CurrencyFormHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.category_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_CategoryFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.cms_page_category_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_CmsPageCategoryFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.cms_page_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_CmsPageFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.contact_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_ContactFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.customer_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_CustomerFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.employee_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_EmployeeFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.language_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_LanguageFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.manufacturer_address_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_ManufacturerAddressFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.manufacturer_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_ManufacturerFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.profile_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_ProfileFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.root_category_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_RootCategoryFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.tax_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_TaxFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_handler.webservice_key_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_DataHandler_WebserviceKeyFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.data_provider.category_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_CategoryFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.cms_page_category_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_CmsPageCategoryFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.cms_page_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_CmsPageFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.contact_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_ContactFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.currency_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_CurrencyFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.customer_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_CustomerFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.employee_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_EmployeeFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.language_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_LanguageFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.manufacturer_address_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_ManufacturerAddressFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.manufacturer_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_ManufacturerFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.meta_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_MetaFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.profile_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_ProfileFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.sql_request_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_SqlRequestFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.tax_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_TaxFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.data_provider.webservice_key_form_data_provider' => 'getPrestashop_Core_Form_IdentifiableObject_DataProvider_WebserviceKeyFormDataProviderService.php',
            'prestashop.core.form.identifiable_object.handler.category_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_CategoryFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.cms_page_category_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_CmsPageCategoryFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.cms_page_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_CmsPageFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.contact_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_ContactFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.customer_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_CustomerFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.employee_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_EmployeeFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.form_handler_factory' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_FormHandlerFactoryService.php',
            'prestashop.core.form.identifiable_object.handler.language_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_LanguageFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.manufacturer_address_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_ManufacturerAddressFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.manufacturer_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_ManufacturerFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.profile_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_ProfileFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.root_category_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_RootCategoryFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.tax_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_TaxFormHandlerService.php',
            'prestashop.core.form.identifiable_object.handler.webservice_key_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_Handler_WebserviceKeyFormHandlerService.php',
            'prestashop.core.form.identifiable_object.meta_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_MetaFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.meta_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_MetaFormHandlerService.php',
            'prestashop.core.form.identifiable_object.sql_request_form_data_handler' => 'getPrestashop_Core_Form_IdentifiableObject_SqlRequestFormDataHandlerService.php',
            'prestashop.core.form.identifiable_object.sql_request_form_handler' => 'getPrestashop_Core_Form_IdentifiableObject_SqlRequestFormHandlerService.php',
            'prestashop.core.foundation.version' => 'getPrestashop_Core_Foundation_VersionService.php',
            'prestashop.core.geolocation.geo_lite_city.checker' => 'getPrestashop_Core_Geolocation_GeoLiteCity_CheckerService.php',
            'prestashop.core.grid.action.row.accessibility_checker.delete_profile' => 'getPrestashop_Core_Grid_Action_Row_AccessibilityChecker_DeleteProfileService.php',
            'prestashop.core.grid.cms_page.position_definition' => 'getPrestashop_Core_Grid_CmsPage_PositionDefinitionService.php',
            'prestashop.core.grid.cms_page_category.position_definition' => 'getPrestashop_Core_Grid_CmsPageCategory_PositionDefinitionService.php',
            'prestashop.core.grid.data.factory.category' => 'getPrestashop_Core_Grid_Data_Factory_CategoryService.php',
            'prestashop.core.grid.data.factory.category_decorator' => 'getPrestashop_Core_Grid_Data_Factory_CategoryDecoratorService.php',
            'prestashop.core.grid.data.factory.language' => 'getPrestashop_Core_Grid_Data_Factory_LanguageService.php',
            'prestashop.core.grid.data.factory.manufacturer' => 'getPrestashop_Core_Grid_Data_Factory_ManufacturerService.php',
            'prestashop.core.grid.data.factory.manufacturer_address' => 'getPrestashop_Core_Grid_Data_Factory_ManufacturerAddressService.php',
            'prestashop.core.grid.data.factory.manufacturer_address_decorator' => 'getPrestashop_Core_Grid_Data_Factory_ManufacturerAddressDecoratorService.php',
            'prestashop.core.grid.data.factory.manufacturer_decorator' => 'getPrestashop_Core_Grid_Data_Factory_ManufacturerDecoratorService.php',
            'prestashop.core.grid.data_factory.email_logs' => 'getPrestashop_Core_Grid_DataFactory_EmailLogsService.php',
            'prestashop.core.grid.data_factory.log' => 'getPrestashop_Core_Grid_DataFactory_LogService.php',
            'prestashop.core.grid.data_factory.profiles' => 'getPrestashop_Core_Grid_DataFactory_ProfilesService.php',
            'prestashop.core.grid.data_factory.request_sql' => 'getPrestashop_Core_Grid_DataFactory_RequestSqlService.php',
            'prestashop.core.grid.data_factory.tax' => 'getPrestashop_Core_Grid_DataFactory_TaxService.php',
            'prestashop.core.grid.data_factory.webservice_key' => 'getPrestashop_Core_Grid_DataFactory_WebserviceKeyService.php',
            'prestashop.core.grid.data_provider.cms_page' => 'getPrestashop_Core_Grid_DataProvider_CmsPageService.php',
            'prestashop.core.grid.data_provider.cms_page_category' => 'getPrestashop_Core_Grid_DataProvider_CmsPageCategoryService.php',
            'prestashop.core.grid.data_provider.contacts' => 'getPrestashop_Core_Grid_DataProvider_ContactsService.php',
            'prestashop.core.grid.data_provider.currency' => 'getPrestashop_Core_Grid_DataProvider_CurrencyService.php',
            'prestashop.core.grid.data_provider.customer' => 'getPrestashop_Core_Grid_DataProvider_CustomerService.php',
            'prestashop.core.grid.data_provider.customer_decorator' => 'getPrestashop_Core_Grid_DataProvider_CustomerDecoratorService.php',
            'prestashop.core.grid.data_provider.employee' => 'getPrestashop_Core_Grid_DataProvider_EmployeeService.php',
            'prestashop.core.grid.data_provider.meta' => 'getPrestashop_Core_Grid_DataProvider_MetaService.php',
            'prestashop.core.grid.data_provider.supplier' => 'getPrestashop_Core_Grid_DataProvider_SupplierService.php',
            'prestashop.core.grid.definition.factory.backup' => 'getPrestashop_Core_Grid_Definition_Factory_BackupService.php',
            'prestashop.core.grid.definition.factory.category' => 'getPrestashop_Core_Grid_Definition_Factory_CategoryService.php',
            'prestashop.core.grid.definition.factory.cms_page' => 'getPrestashop_Core_Grid_Definition_Factory_CmsPageService.php',
            'prestashop.core.grid.definition.factory.cms_page_category' => 'getPrestashop_Core_Grid_Definition_Factory_CmsPageCategoryService.php',
            'prestashop.core.grid.definition.factory.contacts' => 'getPrestashop_Core_Grid_Definition_Factory_ContactsService.php',
            'prestashop.core.grid.definition.factory.currency' => 'getPrestashop_Core_Grid_Definition_Factory_CurrencyService.php',
            'prestashop.core.grid.definition.factory.customer' => 'getPrestashop_Core_Grid_Definition_Factory_CustomerService.php',
            'prestashop.core.grid.definition.factory.email_logs' => 'getPrestashop_Core_Grid_Definition_Factory_EmailLogsService.php',
            'prestashop.core.grid.definition.factory.employee' => 'getPrestashop_Core_Grid_Definition_Factory_EmployeeService.php',
            'prestashop.core.grid.definition.factory.language' => 'getPrestashop_Core_Grid_Definition_Factory_LanguageService.php',
            'prestashop.core.grid.definition.factory.logs' => 'getPrestashop_Core_Grid_Definition_Factory_LogsService.php',
            'prestashop.core.grid.definition.factory.manufacturer' => 'getPrestashop_Core_Grid_Definition_Factory_ManufacturerService.php',
            'prestashop.core.grid.definition.factory.manufacturer_address' => 'getPrestashop_Core_Grid_Definition_Factory_ManufacturerAddressService.php',
            'prestashop.core.grid.definition.factory.meta' => 'getPrestashop_Core_Grid_Definition_Factory_MetaService.php',
            'prestashop.core.grid.definition.factory.profile' => 'getPrestashop_Core_Grid_Definition_Factory_ProfileService.php',
            'prestashop.core.grid.definition.factory.request_sql' => 'getPrestashop_Core_Grid_Definition_Factory_RequestSqlService.php',
            'prestashop.core.grid.definition.factory.supplier' => 'getPrestashop_Core_Grid_Definition_Factory_SupplierService.php',
            'prestashop.core.grid.definition.factory.tax' => 'getPrestashop_Core_Grid_Definition_Factory_TaxService.php',
            'prestashop.core.grid.definition.factory.webservice_key' => 'getPrestashop_Core_Grid_Definition_Factory_WebserviceKeyService.php',
            'prestashop.core.grid.factory.backup' => 'getPrestashop_Core_Grid_Factory_BackupService.php',
            'prestashop.core.grid.factory.category' => 'getPrestashop_Core_Grid_Factory_CategoryService.php',
            'prestashop.core.grid.factory.category_decorator' => 'getPrestashop_Core_Grid_Factory_CategoryDecoratorService.php',
            'prestashop.core.grid.factory.cms_page' => 'getPrestashop_Core_Grid_Factory_CmsPageService.php',
            'prestashop.core.grid.factory.cms_page_category' => 'getPrestashop_Core_Grid_Factory_CmsPageCategoryService.php',
            'prestashop.core.grid.factory.contacts' => 'getPrestashop_Core_Grid_Factory_ContactsService.php',
            'prestashop.core.grid.factory.currency' => 'getPrestashop_Core_Grid_Factory_CurrencyService.php',
            'prestashop.core.grid.factory.customer' => 'getPrestashop_Core_Grid_Factory_CustomerService.php',
            'prestashop.core.grid.factory.email_logs' => 'getPrestashop_Core_Grid_Factory_EmailLogsService.php',
            'prestashop.core.grid.factory.employee' => 'getPrestashop_Core_Grid_Factory_EmployeeService.php',
            'prestashop.core.grid.factory.language' => 'getPrestashop_Core_Grid_Factory_LanguageService.php',
            'prestashop.core.grid.factory.language_decorator' => 'getPrestashop_Core_Grid_Factory_LanguageDecoratorService.php',
            'prestashop.core.grid.factory.meta' => 'getPrestashop_Core_Grid_Factory_MetaService.php',
            'prestashop.core.grid.factory.profiles' => 'getPrestashop_Core_Grid_Factory_ProfilesService.php',
            'prestashop.core.grid.factory.request_sql' => 'getPrestashop_Core_Grid_Factory_RequestSqlService.php',
            'prestashop.core.grid.factory.supplier' => 'getPrestashop_Core_Grid_Factory_SupplierService.php',
            'prestashop.core.grid.factory.supplier_decorator' => 'getPrestashop_Core_Grid_Factory_SupplierDecoratorService.php',
            'prestashop.core.grid.factory.tax' => 'getPrestashop_Core_Grid_Factory_TaxService.php',
            'prestashop.core.grid.factory.webservice_key' => 'getPrestashop_Core_Grid_Factory_WebserviceKeyService.php',
            'prestashop.core.grid.filter.category_form_factory' => 'getPrestashop_Core_Grid_Filter_CategoryFormFactoryService.php',
            'prestashop.core.grid.filter.cms_page_form_factory' => 'getPrestashop_Core_Grid_Filter_CmsPageFormFactoryService.php',
            'prestashop.core.grid.filter.form_factory' => 'getPrestashop_Core_Grid_Filter_FormFactoryService.php',
            'prestashop.core.grid.grid_factory.manufacturer' => 'getPrestashop_Core_Grid_GridFactory_ManufacturerService.php',
            'prestashop.core.grid.grid_factory.manufacturer_address' => 'getPrestashop_Core_Grid_GridFactory_ManufacturerAddressService.php',
            'prestashop.core.grid.log_factory' => 'getPrestashop_Core_Grid_LogFactoryService.php',
            'prestashop.core.grid.position.doctrine_grid_position_updater' => 'getPrestashop_Core_Grid_Position_DoctrineGridPositionUpdaterService.php',
            'prestashop.core.grid.position.position_update_factory' => 'getPrestashop_Core_Grid_Position_PositionUpdateFactoryService.php',
            'prestashop.core.grid.position.update_handler.doctrine_position_update_handler' => 'getPrestashop_Core_Grid_Position_UpdateHandler_DoctrinePositionUpdateHandlerService.php',
            'prestashop.core.grid.presenter.grid_presenter' => 'getPrestashop_Core_Grid_Presenter_GridPresenterService.php',
            'prestashop.core.grid.quer_.builder.language' => 'getPrestashop_Core_Grid_Quer_Builder_LanguageService.php',
            'prestashop.core.grid.query.doctrine_query_parser' => 'getPrestashop_Core_Grid_Query_DoctrineQueryParserService.php',
            'prestashop.core.grid.query.webservice_key' => 'getPrestashop_Core_Grid_Query_WebserviceKeyService.php',
            'prestashop.core.grid.query_builder.category' => 'getPrestashop_Core_Grid_QueryBuilder_CategoryService.php',
            'prestashop.core.grid.query_builder.cms_page' => 'getPrestashop_Core_Grid_QueryBuilder_CmsPageService.php',
            'prestashop.core.grid.query_builder.cms_page_category' => 'getPrestashop_Core_Grid_QueryBuilder_CmsPageCategoryService.php',
            'prestashop.core.grid.query_builder.contact' => 'getPrestashop_Core_Grid_QueryBuilder_ContactService.php',
            'prestashop.core.grid.query_builder.currency' => 'getPrestashop_Core_Grid_QueryBuilder_CurrencyService.php',
            'prestashop.core.grid.query_builder.customer' => 'getPrestashop_Core_Grid_QueryBuilder_CustomerService.php',
            'prestashop.core.grid.query_builder.email_logs' => 'getPrestashop_Core_Grid_QueryBuilder_EmailLogsService.php',
            'prestashop.core.grid.query_builder.employee' => 'getPrestashop_Core_Grid_QueryBuilder_EmployeeService.php',
            'prestashop.core.grid.query_builder.manufacturer' => 'getPrestashop_Core_Grid_QueryBuilder_ManufacturerService.php',
            'prestashop.core.grid.query_builder.manufacturer_address' => 'getPrestashop_Core_Grid_QueryBuilder_ManufacturerAddressService.php',
            'prestashop.core.grid.query_builder.meta' => 'getPrestashop_Core_Grid_QueryBuilder_MetaService.php',
            'prestashop.core.grid.query_builder.profile' => 'getPrestashop_Core_Grid_QueryBuilder_ProfileService.php',
            'prestashop.core.grid.query_builder.supplier' => 'getPrestashop_Core_Grid_QueryBuilder_SupplierService.php',
            'prestashop.core.grid.query_builder.tax' => 'getPrestashop_Core_Grid_QueryBuilder_TaxService.php',
            'prestashop.core.grid.query_builder.webservice' => 'getPrestashop_Core_Grid_QueryBuilder_WebserviceService.php',
            'prestashop.core.image.file_deleter' => 'getPrestashop_Core_Image_FileDeleterService.php',
            'prestashop.core.image.parser.image_tag_source_parser' => 'getPrestashop_Core_Image_Parser_ImageTagSourceParserService.php',
            'prestashop.core.import.access_checker' => 'getPrestashop_Core_Import_AccessCheckerService.php',
            'prestashop.core.import.config_factory' => 'getPrestashop_Core_Import_ConfigFactoryService.php',
            'prestashop.core.import.csv_file_reader' => 'getPrestashop_Core_Import_CsvFileReaderService.php',
            'prestashop.core.import.data_row.collection_presenter' => 'getPrestashop_Core_Import_DataRow_CollectionPresenterService.php',
            'prestashop.core.import.data_row.presenter' => 'getPrestashop_Core_Import_DataRow_PresenterService.php',
            'prestashop.core.import.dir' => 'getPrestashop_Core_Import_DirService.php',
            'prestashop.core.import.factory.data_row.collection_factory' => 'getPrestashop_Core_Import_Factory_DataRow_CollectionFactoryService.php',
            'prestashop.core.import.fields_provider.address' => 'getPrestashop_Core_Import_FieldsProvider_AddressService.php',
            'prestashop.core.import.fields_provider.alias' => 'getPrestashop_Core_Import_FieldsProvider_AliasService.php',
            'prestashop.core.import.fields_provider.category' => 'getPrestashop_Core_Import_FieldsProvider_CategoryService.php',
            'prestashop.core.import.fields_provider.combination' => 'getPrestashop_Core_Import_FieldsProvider_CombinationService.php',
            'prestashop.core.import.fields_provider.customer' => 'getPrestashop_Core_Import_FieldsProvider_CustomerService.php',
            'prestashop.core.import.fields_provider.product' => 'getPrestashop_Core_Import_FieldsProvider_ProductService.php',
            'prestashop.core.import.fields_provider.store_contact' => 'getPrestashop_Core_Import_FieldsProvider_StoreContactService.php',
            'prestashop.core.import.fields_provider.supplier' => 'getPrestashop_Core_Import_FieldsProvider_SupplierService.php',
            'prestashop.core.import.fields_provider_finder' => 'getPrestashop_Core_Import_FieldsProviderFinderService.php',
            'prestashop.core.import.file_finder' => 'getPrestashop_Core_Import_FileFinderService.php',
            'prestashop.core.import.file_removal' => 'getPrestashop_Core_Import_FileRemovalService.php',
            'prestashop.core.import.file_uploader' => 'getPrestashop_Core_Import_FileUploaderService.php',
            'prestashop.core.import.importer' => 'getPrestashop_Core_Import_ImporterService.php',
            'prestashop.core.import.normalizer.csv_value_separator' => 'getPrestashop_Core_Import_Normalizer_CsvValueSeparatorService.php',
            'prestashop.core.import.request_validator' => 'getPrestashop_Core_Import_RequestValidatorService.php',
            'prestashop.core.import.runtime_config_factory' => 'getPrestashop_Core_Import_RuntimeConfigFactoryService.php',
            'prestashop.core.import.sample.file_provider' => 'getPrestashop_Core_Import_Sample_FileProviderService.php',
            'prestashop.core.kpi_row.factory.categories' => 'getPrestashop_Core_KpiRow_Factory_CategoriesService.php',
            'prestashop.core.kpi_row.factory.customers' => 'getPrestashop_Core_KpiRow_Factory_CustomersService.php',
            'prestashop.core.kpi_row.factory.translations_page' => 'getPrestashop_Core_KpiRow_Factory_TranslationsPageService.php',
            'prestashop.core.kpi_row.presenter' => 'getPrestashop_Core_KpiRow_PresenterService.php',
            'prestashop.core.language.language_default_fonts_catalog' => 'getPrestashop_Core_Language_LanguageDefaultFontsCatalogService.php',
            'prestashop.core.language.pack.loader.remote' => 'getPrestashop_Core_Language_Pack_Loader_RemoteService.php',
            'prestashop.core.localization.cache.adapter' => 'getPrestashop_Core_Localization_Cache_AdapterService.php',
            'prestashop.core.localization.cldr.cache.adapter' => 'getPrestashop_Core_Localization_Cldr_Cache_AdapterService.php',
            'prestashop.core.localization.cldr.datalayer.locale_cache' => 'getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService.php',
            'prestashop.core.localization.cldr.datalayer.locale_reference' => 'getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService.php',
            'prestashop.core.localization.cldr.locale_data_source' => 'getPrestashop_Core_Localization_Cldr_LocaleDataSourceService.php',
            'prestashop.core.localization.cldr.locale_repository' => 'getPrestashop_Core_Localization_Cldr_LocaleRepositoryService.php',
            'prestashop.core.localization.cldr.reader' => 'getPrestashop_Core_Localization_Cldr_ReaderService.php',
            'prestashop.core.localization.currency.datasource' => 'getPrestashop_Core_Localization_Currency_DatasourceService.php',
            'prestashop.core.localization.currency.middleware.cache' => 'getPrestashop_Core_Localization_Currency_Middleware_CacheService.php',
            'prestashop.core.localization.currency.middleware.database' => 'getPrestashop_Core_Localization_Currency_Middleware_DatabaseService.php',
            'prestashop.core.localization.currency.middleware.installed' => 'getPrestashop_Core_Localization_Currency_Middleware_InstalledService.php',
            'prestashop.core.localization.currency.middleware.reference' => 'getPrestashop_Core_Localization_Currency_Middleware_ReferenceService.php',
            'prestashop.core.localization.currency.repository' => 'getPrestashop_Core_Localization_Currency_RepositoryService.php',
            'prestashop.core.localization.locale.repository' => 'getPrestashop_Core_Localization_Locale_RepositoryService.php',
            'prestashop.core.localization.pack.import.importer' => 'getPrestashop_Core_Localization_Pack_Import_ImporterService.php',
            'prestashop.core.localization.pack.loader.local' => 'getPrestashop_Core_Localization_Pack_Loader_LocalService.php',
            'prestashop.core.localization.pack.loader.remote' => 'getPrestashop_Core_Localization_Pack_Loader_RemoteService.php',
            'prestashop.core.localization.rtl.processor_factory' => 'getPrestashop_Core_Localization_Rtl_ProcessorFactoryService.php',
            'prestashop.core.localozation.pack.factory.localization_pack' => 'getPrestashop_Core_Localozation_Pack_Factory_LocalizationPackService.php',
            'prestashop.core.mail_template.command_handler.generate_theme_mails_handler' => 'getPrestashop_Core_MailTemplate_CommandHandler_GenerateThemeMailsHandlerService.php',
            'prestashop.core.mail_template.generator' => 'getPrestashop_Core_MailTemplate_GeneratorService.php',
            'prestashop.core.mail_template.theme_folder_catalog' => 'getPrestashop_Core_MailTemplate_ThemeFolderCatalogService.php',
            'prestashop.core.mail_template.theme_folder_scanner' => 'getPrestashop_Core_MailTemplate_ThemeFolderScannerService.php',
            'prestashop.core.mail_template.transformation.css_inline' => 'getPrestashop_Core_MailTemplate_Transformation_CssInlineService.php',
            'prestashop.core.mail_template.transformation.html_textify' => 'getPrestashop_Core_MailTemplate_Transformation_HtmlTextifyService.php',
            'prestashop.core.mail_template.variables_builder' => 'getPrestashop_Core_MailTemplate_VariablesBuilderService.php',
            'prestashop.core.mail_theme.configuration' => 'getPrestashop_Core_MailTheme_ConfigurationService.php',
            'prestashop.core.module.configuration.payment_restrictions_configurator' => 'getPrestashop_Core_Module_Configuration_PaymentRestrictionsConfiguratorService.php',
            'prestashop.core.product.csv_exporter' => 'getPrestashop_Core_Product_CsvExporterService.php',
            'prestashop.core.query.doctrine_search_criteria_applicator' => 'getPrestashop_Core_Query_DoctrineSearchCriteriaApplicatorService.php',
            'prestashop.core.query_bus' => 'getPrestashop_Core_QueryBusService.php',
            'prestashop.core.search.builder' => 'getPrestashop_Core_Search_BuilderService.php',
            'prestashop.core.search.builder.class' => 'getPrestashop_Core_Search_Builder_ClassService.php',
            'prestashop.core.search.builder.event' => 'getPrestashop_Core_Search_Builder_EventService.php',
            'prestashop.core.search.builder.persist' => 'getPrestashop_Core_Search_Builder_PersistService.php',
            'prestashop.core.search.builder.repository' => 'getPrestashop_Core_Search_Builder_RepositoryService.php',
            'prestashop.core.search.builder.request' => 'getPrestashop_Core_Search_Builder_RequestService.php',
            'prestashop.core.security.folder_guard.vendor' => 'getPrestashop_Core_Security_FolderGuard_VendorService.php',
            'prestashop.core.shop.logo_uploader' => 'getPrestashop_Core_Shop_LogoUploaderService.php',
            'prestashop.core.showcase_card.command_handler.close_showcase_card' => 'getPrestashop_Core_ShowcaseCard_CommandHandler_CloseShowcaseCardService.php',
            'prestashop.core.showcase_card.configuration_map' => 'getPrestashop_Core_ShowcaseCard_ConfigurationMapService.php',
            'prestashop.core.sql_manager.configuration.sql_request_configuration' => 'getPrestashop_Core_SqlManager_Configuration_SqlRequestConfigurationService.php',
            'prestashop.core.sql_manager.exporter.sql_request_exporter' => 'getPrestashop_Core_SqlManager_Exporter_SqlRequestExporterService.php',
            'prestashop.core.tax.tax_options_configuration' => 'getPrestashop_Core_Tax_TaxOptionsConfigurationService.php',
            'prestashop.core.team.employee.configuration.employee_options_configuration' => 'getPrestashop_Core_Team_Employee_Configuration_EmployeeOptionsConfigurationService.php',
            'prestashop.core.team.employee.configuration.options_checker' => 'getPrestashop_Core_Team_Employee_Configuration_OptionsCheckerService.php',
            'prestashop.core.translation.locale.converter' => 'getPrestashop_Core_Translation_Locale_ConverterService.php',
            'prestashop.core.util.url.url_file_checker' => 'getPrestashop_Core_Util_Url_UrlFileCheckerService.php',
            'prestashop.core.validation.validator' => 'getPrestashop_Core_Validation_ValidatorService.php',
            'prestashop.core.webservice.server_requirements_checker' => 'getPrestashop_Core_Webservice_ServerRequirementsCheckerService.php',
            'prestashop.data_provider.modules.recommended' => 'getPrestashop_DataProvider_Modules_RecommendedService.php',
            'prestashop.dumper.xliff' => 'getPrestashop_Dumper_XliffService.php',
            'prestashop.filters_builder.resolver' => 'getPrestashop_FiltersBuilder_ResolverService.php',
            'prestashop.hook.finder' => 'getPrestashop_Hook_FinderService.php',
            'prestashop.module.link_block.cache' => 'getPrestashop_Module_LinkBlock_CacheService.php',
            'prestashop.module.link_block.choice_provider.cms_category' => 'getPrestashop_Module_LinkBlock_ChoiceProvider_CmsCategoryService.php',
            'prestashop.module.link_block.choice_provider.cms_page' => 'getPrestashop_Module_LinkBlock_ChoiceProvider_CmsPageService.php',
            'prestashop.module.link_block.choice_provider.hook' => 'getPrestashop_Module_LinkBlock_ChoiceProvider_HookService.php',
            'prestashop.module.link_block.choice_provider.product_page' => 'getPrestashop_Module_LinkBlock_ChoiceProvider_ProductPageService.php',
            'prestashop.module.link_block.choice_provider.static_page' => 'getPrestashop_Module_LinkBlock_ChoiceProvider_StaticPageService.php',
            'prestashop.module.link_block.custom_url_type' => 'getPrestashop_Module_LinkBlock_CustomUrlTypeService.php',
            'prestashop.module.link_block.form_handler' => 'getPrestashop_Module_LinkBlock_FormHandlerService.php',
            'prestashop.module.link_block.form_provider' => 'getPrestashop_Module_LinkBlock_FormProviderService.php',
            'prestashop.module.link_block.form_type' => 'getPrestashop_Module_LinkBlock_FormTypeService.php',
            'prestashop.module.link_block.grid.data_factory' => 'getPrestashop_Module_LinkBlock_Grid_DataFactoryService.php',
            'prestashop.module.link_block.grid.factory' => 'getPrestashop_Module_LinkBlock_Grid_FactoryService.php',
            'prestashop.module.link_block.grid.position_definition' => 'getPrestashop_Module_LinkBlock_Grid_PositionDefinitionService.php',
            'prestashop.module.link_block.grid.query_builder' => 'getPrestashop_Module_LinkBlock_Grid_QueryBuilderService.php',
            'prestashop.module.link_block.repository' => 'getPrestashop_Module_LinkBlock_RepositoryService.php',
            'prestashop.module.manager' => 'getPrestashop_Module_ManagerService.php',
            'prestashop.module.ps_facetedsearch.constraint.url_segment_validator' => 'getPrestashop_Module_PsFacetedsearch_Constraint_UrlSegmentValidatorService.php',
            'prestashop.module_kernel.repository' => 'getPrestashop_ModuleKernel_RepositoryService.php',
            'prestashop.multishop_command_listener' => 'getPrestashop_MultishopCommandListenerService.php',
            'prestashop.router' => 'getPrestashop_RouterService.php',
            'prestashop.search_parameters.resolver' => 'getPrestashop_SearchParameters_ResolverService.php',
            'prestashop.security.role.dynamic_role_hierarchy' => 'getPrestashop_Security_Role_DynamicRoleHierarchyService.php',
            'prestashop.security.voter.product' => 'getPrestashop_Security_Voter_ProductService.php',
            'prestashop.service.product' => 'getPrestashop_Service_ProductService.php',
            'prestashop.service.translation' => 'getPrestashop_Service_TranslationService.php',
            'prestashop.smarty' => 'getPrestashop_SmartyService.php',
            'prestashop.translation.api.international' => 'getPrestashop_Translation_Api_InternationalService.php',
            'prestashop.translation.api.stock' => 'getPrestashop_Translation_Api_StockService.php',
            'prestashop.translation.backoffice_provider' => 'getPrestashop_Translation_BackofficeProviderService.php',
            'prestashop.translation.chainextractor' => 'getPrestashop_Translation_ChainextractorService.php',
            'prestashop.translation.database_loader' => 'getPrestashop_Translation_DatabaseLoaderService.php',
            'prestashop.translation.dumper.xliff' => 'getPrestashop_Translation_Dumper_XliffService.php',
            'prestashop.translation.external_module_provider' => 'getPrestashop_Translation_ExternalModuleProviderService.php',
            'prestashop.translation.extractor.crowdin.php' => 'getPrestashop_Translation_Extractor_Crowdin_PhpService.php',
            'prestashop.translation.extractor.php' => 'getPrestashop_Translation_Extractor_PhpService.php',
            'prestashop.translation.extractor.smarty' => 'getPrestashop_Translation_Extractor_SmartyService.php',
            'prestashop.translation.extractor.smarty.legacy' => 'getPrestashop_Translation_Extractor_Smarty_LegacyService.php',
            'prestashop.translation.extractor.twig' => 'getPrestashop_Translation_Extractor_TwigService.php',
            'prestashop.translation.frontoffice_provider' => 'getPrestashop_Translation_FrontofficeProviderService.php',
            'prestashop.translation.helper.smarty.smarty_resource_module' => 'getPrestashop_Translation_Helper_Smarty_SmartyResourceModuleService.php',
            'prestashop.translation.helper.smarty.smarty_resource_parent' => 'getPrestashop_Translation_Helper_Smarty_SmartyResourceParentService.php',
            'prestashop.translation.legacy_file_loader' => 'getPrestashop_Translation_LegacyFileLoaderService.php',
            'prestashop.translation.legacy_file_reader' => 'getPrestashop_Translation_LegacyFileReaderService.php',
            'prestashop.translation.legacy_module.extractor' => 'getPrestashop_Translation_LegacyModule_ExtractorService.php',
            'prestashop.translation.mails_provider' => 'getPrestashop_Translation_MailsProviderService.php',
            'prestashop.translation.manager.original_string_manager' => 'getPrestashop_Translation_Manager_OriginalStringManagerService.php',
            'prestashop.translation.manager.translation_manager' => 'getPrestashop_Translation_Manager_TranslationManagerService.php',
            'prestashop.translation.module_provider' => 'getPrestashop_Translation_ModuleProviderService.php',
            'prestashop.translation.modules_provider' => 'getPrestashop_Translation_ModulesProviderService.php',
            'prestashop.translation.others_provider' => 'getPrestashop_Translation_OthersProviderService.php',
            'prestashop.translation.parser.crowdin_php_parser' => 'getPrestashop_Translation_Parser_CrowdinPhpParserService.php',
            'prestashop.translation.search_provider' => 'getPrestashop_Translation_SearchProviderService.php',
            'prestashop.translation.sql_loader' => 'getPrestashop_Translation_SqlLoaderService.php',
            'prestashop.translation.theme.exporter' => 'getPrestashop_Translation_Theme_ExporterService.php',
            'prestashop.translation.theme_extractor' => 'getPrestashop_Translation_ThemeExtractorService.php',
            'prestashop.translation.theme_provider' => 'getPrestashop_Translation_ThemeProviderService.php',
            'prestashop.translation.theme_translations_factory' => 'getPrestashop_Translation_ThemeTranslationsFactoryService.php',
            'prestashop.translation.translations_factory' => 'getPrestashop_Translation_TranslationsFactoryService.php',
            'prestashop.user_provider' => 'getPrestashop_UserProviderService.php',
            'prestashop.utils.zip_manager' => 'getPrestashop_Utils_ZipManagerService.php',
            'property_accessor' => 'getPropertyAccessorService.php',
            'router.cache_warmer' => 'getRouter_CacheWarmerService.php',
            'routing.loader' => 'getRouting_LoaderService.php',
            'security.access.authenticated_voter' => 'getSecurity_Access_AuthenticatedVoterService.php',
            'security.access.expression_voter' => 'getSecurity_Access_ExpressionVoterService.php',
            'security.access.simple_role_voter' => 'getSecurity_Access_SimpleRoleVoterService.php',
            'security.access_listener' => 'getSecurity_AccessListenerService.php',
            'security.access_map' => 'getSecurity_AccessMapService.php',
            'security.authentication.guard_handler' => 'getSecurity_Authentication_GuardHandlerService.php',
            'security.authentication.listener.anonymous.main' => 'getSecurity_Authentication_Listener_Anonymous_MainService.php',
            'security.authentication.provider.anonymous.main' => 'getSecurity_Authentication_Provider_Anonymous_MainService.php',
            'security.authentication.session_strategy.main' => 'getSecurity_Authentication_SessionStrategy_MainService.php',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService.php',
            'security.channel_listener' => 'getSecurity_ChannelListenerService.php',
            'security.command.user_password_encoder' => 'getSecurity_Command_UserPasswordEncoderService.php',
            'security.context_listener.0' => 'getSecurity_ContextListener_0Service.php',
            'security.encoder_factory' => 'getSecurity_EncoderFactoryService.php',
            'security.firewall.map.context.dev' => 'getSecurity_Firewall_Map_Context_DevService.php',
            'security.firewall.map.context.main' => 'getSecurity_Firewall_Map_Context_MainService.php',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService.php',
            'security.request_matcher.zfhj2lw' => 'getSecurity_RequestMatcher_Zfhj2lwService.php',
            'security.user.provider.concrete.in_memory' => 'getSecurity_User_Provider_Concrete_InMemoryService.php',
            'security.user_value_resolver' => 'getSecurity_UserValueResolverService.php',
            'security.validator.user_password' => 'getSecurity_Validator_UserPasswordService.php',
            'sensio_distribution.security_checker' => 'getSensioDistribution_SecurityCheckerService.php',
            'sensio_distribution.security_checker.command' => 'getSensioDistribution_SecurityChecker_CommandService.php',
            'sensio_framework_extra.routing.loader.annot_class' => 'getSensioFrameworkExtra_Routing_Loader_AnnotClassService.php',
            'sensio_framework_extra.routing.loader.annot_dir' => 'getSensioFrameworkExtra_Routing_Loader_AnnotDirService.php',
            'sensio_framework_extra.routing.loader.annot_file' => 'getSensioFrameworkExtra_Routing_Loader_AnnotFileService.php',
            'serializer' => 'getSerializerService.php',
            'serializer.mapping.cache.symfony' => 'getSerializer_Mapping_Cache_SymfonyService.php',
            'serializer.mapping.cache_warmer' => 'getSerializer_Mapping_CacheWarmerService.php',
            'services_resetter' => 'getServicesResetterService.php',
            'session.storage.filesystem' => 'getSession_Storage_FilesystemService.php',
            'session.storage.php_bridge' => 'getSession_Storage_PhpBridgeService.php',
            'swiftmailer.email_sender.listener' => 'getSwiftmailer_EmailSender_ListenerService.php',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService.php',
            'swiftmailer.mailer.default.plugin.messagelogger' => 'getSwiftmailer_Mailer_Default_Plugin_MessageloggerService.php',
            'swiftmailer.mailer.default.spool' => 'getSwiftmailer_Mailer_Default_SpoolService.php',
            'swiftmailer.mailer.default.transport' => 'getSwiftmailer_Mailer_Default_TransportService.php',
            'swiftmailer.mailer.default.transport.eventdispatcher' => 'getSwiftmailer_Mailer_Default_Transport_EventdispatcherService.php',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService.php',
            'tactician.commandbus.default' => 'getTactician_Commandbus_DefaultService.php',
            'tactician.handler.command_name_extractor.class_name' => 'getTactician_Handler_CommandNameExtractor_ClassNameService.php',
            'tactician.handler.locator.symfony' => 'getTactician_Handler_Locator_SymfonyService.php',
            'tactician.handler.method_name_inflector.handle' => 'getTactician_Handler_MethodNameInflector_HandleService.php',
            'tactician.handler.method_name_inflector.handle_class_name' => 'getTactician_Handler_MethodNameInflector_HandleClassNameService.php',
            'tactician.handler.method_name_inflector.handle_class_name_without_suffix' => 'getTactician_Handler_MethodNameInflector_HandleClassNameWithoutSuffixService.php',
            'tactician.handler.method_name_inflector.invoke' => 'getTactician_Handler_MethodNameInflector_InvokeService.php',
            'tactician.middleware.command_handler' => 'getTactician_Middleware_CommandHandlerService.php',
            'tactician.middleware.locking' => 'getTactician_Middleware_LockingService.php',
            'tactician.middleware.validator' => 'getTactician_Middleware_ValidatorService.php',
            'tactician.plugins.named_command.extractor' => 'getTactician_Plugins_NamedCommand_ExtractorService.php',
            'templating' => 'getTemplatingService.php',
            'templating.cache_warmer.template_paths' => 'getTemplating_CacheWarmer_TemplatePathsService.php',
            'templating.filename_parser' => 'getTemplating_FilenameParserService.php',
            'templating.finder' => 'getTemplating_FinderService.php',
            'templating.helper.logout_url' => 'getTemplating_Helper_LogoutUrlService.php',
            'templating.helper.security' => 'getTemplating_Helper_SecurityService.php',
            'templating.loader' => 'getTemplating_LoaderService.php',
            'translation.dumper.csv' => 'getTranslation_Dumper_CsvService.php',
            'translation.dumper.ini' => 'getTranslation_Dumper_IniService.php',
            'translation.dumper.json' => 'getTranslation_Dumper_JsonService.php',
            'translation.dumper.mo' => 'getTranslation_Dumper_MoService.php',
            'translation.dumper.php' => 'getTranslation_Dumper_PhpService.php',
            'translation.dumper.po' => 'getTranslation_Dumper_PoService.php',
            'translation.dumper.qt' => 'getTranslation_Dumper_QtService.php',
            'translation.dumper.res' => 'getTranslation_Dumper_ResService.php',
            'translation.dumper.xliff' => 'getTranslation_Dumper_XliffService.php',
            'translation.dumper.yml' => 'getTranslation_Dumper_YmlService.php',
            'translation.extractor' => 'getTranslation_ExtractorService.php',
            'translation.extractor.php' => 'getTranslation_Extractor_PhpService.php',
            'translation.loader' => 'getTranslation_LoaderService.php',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService.php',
            'translation.loader.dat' => 'getTranslation_Loader_DatService.php',
            'translation.loader.ini' => 'getTranslation_Loader_IniService.php',
            'translation.loader.json' => 'getTranslation_Loader_JsonService.php',
            'translation.loader.mo' => 'getTranslation_Loader_MoService.php',
            'translation.loader.php' => 'getTranslation_Loader_PhpService.php',
            'translation.loader.po' => 'getTranslation_Loader_PoService.php',
            'translation.loader.qt' => 'getTranslation_Loader_QtService.php',
            'translation.loader.res' => 'getTranslation_Loader_ResService.php',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService.php',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService.php',
            'translation.reader' => 'getTranslation_ReaderService.php',
            'translation.warmer' => 'getTranslation_WarmerService.php',
            'translation.writer' => 'getTranslation_WriterService.php',
            'twig.cache_warmer' => 'getTwig_CacheWarmerService.php',
            'twig.command.debug' => 'getTwig_Command_DebugService.php',
            'twig.command.lint' => 'getTwig_Command_LintService.php',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService.php',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService.php',
            'twig.exception_listener' => 'getTwig_ExceptionListenerService.php',
            'twig.form.renderer' => 'getTwig_Form_RendererService.php',
            'twig.runtime.httpkernel' => 'getTwig_Runtime_HttpkernelService.php',
            'twig.template_cache_warmer' => 'getTwig_TemplateCacheWarmerService.php',
            'twig.translation.extractor' => 'getTwig_Translation_ExtractorService.php',
            'validator.email' => 'getValidator_EmailService.php',
            'validator.expression' => 'getValidator_ExpressionService.php',
            'validator.mapping.cache_warmer' => 'getValidator_Mapping_CacheWarmerService.php',
            'var_dumper.cli_dumper' => 'getVarDumper_CliDumperService.php',
            'web_profiler.controller.exception' => 'getWebProfiler_Controller_ExceptionService.php',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService.php',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService.php',
            'web_server.command.server_log' => 'getWebServer_Command_ServerLogService.php',
            'web_server.command.server_run' => 'getWebServer_Command_ServerRunService.php',
            'web_server.command.server_start' => 'getWebServer_Command_ServerStartService.php',
            'web_server.command.server_status' => 'getWebServer_Command_ServerStatusService.php',
            'web_server.command.server_stop' => 'getWebServer_Command_ServerStopService.php',
        ];
        $this->privates = [
            'csa_guzzle.default_cache_adapter' => true,
            'monolog.handler.legacy' => true,
            'prestashop.bundle.routing.converter.cache' => true,
            'session.storage' => true,
            'swiftmailer.mailer' => true,
            'swiftmailer.plugin.messagelogger' => true,
            'swiftmailer.spool' => true,
            'swiftmailer.transport' => true,
            'swiftmailer.transport.real' => true,
            'tactician.commandbus' => true,
            'annotation_reader' => true,
            'annotations.cache' => true,
            'annotations.cache_warmer' => true,
            'annotations.reader' => true,
            'argument_metadata_factory' => true,
            'argument_resolver.default' => true,
            'argument_resolver.request' => true,
            'argument_resolver.request_attribute' => true,
            'argument_resolver.service' => true,
            'argument_resolver.session' => true,
            'argument_resolver.variadic' => true,
            'assets._version__default' => true,
            'assets.context' => true,
            'assets.packages' => true,
            'cache.annotations' => true,
            'cache.default_clearer' => true,
            'cache.serializer' => true,
            'cache.validator' => true,
            'config.resource.self_checking_resource_checker' => true,
            'config_cache_factory' => true,
            'console.command.about' => true,
            'console.command.assets_install' => true,
            'console.command.cache_clear' => true,
            'console.command.cache_pool_clear' => true,
            'console.command.cache_pool_prune' => true,
            'console.command.cache_warmup' => true,
            'console.command.config_debug' => true,
            'console.command.config_dump_reference' => true,
            'console.command.container_debug' => true,
            'console.command.debug_autowiring' => true,
            'console.command.event_dispatcher_debug' => true,
            'console.command.form_debug' => true,
            'console.command.router_debug' => true,
            'console.command.router_match' => true,
            'console.command.translation_debug' => true,
            'console.command.translation_update' => true,
            'console.command.xliff_lint' => true,
            'console.command.yaml_lint' => true,
            'console.error_listener' => true,
            'controller_name_converter' => true,
            'csa_guzzle.cache.adapter.doctrine' => true,
            'csa_guzzle.cache_warmer.description' => true,
            'csa_guzzle.client.addons_api' => true,
            'csa_guzzle.client_factory' => true,
            'csa_guzzle.data_collector.guzzle' => true,
            'csa_guzzle.description_factory' => true,
            'csa_guzzle.description_loader' => true,
            'csa_guzzle.description_loader.resolver' => true,
            'csa_guzzle.subscriber.cache' => true,
            'csa_guzzle.subscriber.debug' => true,
            'csa_guzzle.subscriber.stopwatch' => true,
            'csa_guzzle.twig.extension' => true,
            'data_collector.form' => true,
            'data_collector.form.extractor' => true,
            'data_collector.request' => true,
            'data_collector.router' => true,
            'data_collector.translation' => true,
            'debug.argument_resolver' => true,
            'debug.controller_resolver' => true,
            'debug.debug_handlers_listener' => true,
            'debug.dump_listener' => true,
            'debug.event_dispatcher' => true,
            'debug.file_link_formatter' => true,
            'debug.file_link_formatter.url_format' => true,
            'debug.log_processor' => true,
            'debug.security.access.decision_manager' => true,
            'debug.stopwatch' => true,
            'dependency_injection.config.container_parameters_resource_checker' => true,
            'deprecated.form.registry' => true,
            'deprecated.form.registry.csrf' => true,
            'doctrine.cache_clear_metadata_command' => true,
            'doctrine.cache_clear_query_cache_command' => true,
            'doctrine.cache_clear_result_command' => true,
            'doctrine.cache_collection_region_command' => true,
            'doctrine.clear_entity_region_command' => true,
            'doctrine.clear_query_region_command' => true,
            'doctrine.database_create_command' => true,
            'doctrine.database_drop_command' => true,
            'doctrine.database_import_command' => true,
            'doctrine.dbal.connection_factory' => true,
            'doctrine.dbal.logger.profiling.default' => true,
            'doctrine.ensure_production_settings_command' => true,
            'doctrine.generate_entities_command' => true,
            'doctrine.mapping_convert_command' => true,
            'doctrine.mapping_import_command' => true,
            'doctrine.mapping_info_command' => true,
            'doctrine.orm.default_entity_listener_resolver' => true,
            'doctrine.orm.default_entity_manager.property_info_extractor' => true,
            'doctrine.orm.default_listeners.attach_entity_listeners' => true,
            'doctrine.orm.default_manager_configurator' => true,
            'doctrine.orm.proxy_cache_warmer' => true,
            'doctrine.orm.validator.unique' => true,
            'doctrine.orm.validator_initializer' => true,
            'doctrine.query_dql_command' => true,
            'doctrine.query_sql_command' => true,
            'doctrine.schema_create_command' => true,
            'doctrine.schema_drop_command' => true,
            'doctrine.schema_update_command' => true,
            'doctrine.schema_validate_command' => true,
            'doctrine_cache.contains_command' => true,
            'doctrine_cache.delete_command' => true,
            'doctrine_cache.flush_command' => true,
            'doctrine_cache.stats_command' => true,
            'file_locator' => true,
            'form.registry' => true,
            'form.resolved_type_factory' => true,
            'form.server_params' => true,
            'form.type.choice' => true,
            'form.type.entity' => true,
            'form.type.form' => true,
            'form.type_extension.csrf' => true,
            'form.type_extension.form.data_collector' => true,
            'form.type_extension.form.http_foundation' => true,
            'form.type_extension.form.transformation_failure_handling' => true,
            'form.type_extension.form.validator' => true,
            'form.type_extension.repeated.validator' => true,
            'form.type_extension.submit.validator' => true,
            'form.type_extension.upload.validator' => true,
            'form.type_guesser.doctrine' => true,
            'form.type_guesser.validator' => true,
            'fragment.handler' => true,
            'fragment.listener' => true,
            'fragment.renderer.hinclude' => true,
            'fragment.renderer.inline' => true,
            'framework_extra_bundle.argument_name_convertor' => true,
            'framework_extra_bundle.event.is_granted' => true,
            'kernel.class_cache.cache_warmer' => true,
            'locale_listener' => true,
            'logger' => true,
            'monolog.handler.console' => true,
            'monolog.handler.console_very_verbose' => true,
            'monolog.handler.main' => true,
            'monolog.handler.null_internal' => true,
            'monolog.logger.cache' => true,
            'monolog.logger.console' => true,
            'monolog.logger.doctrine' => true,
            'monolog.logger.event' => true,
            'monolog.logger.php' => true,
            'monolog.logger.profiler' => true,
            'monolog.logger.request' => true,
            'monolog.logger.security' => true,
            'monolog.logger.templating' => true,
            'monolog.logger.translation' => true,
            'monolog.processor.psr_log_message' => true,
            'prestashop.bundle.routing.converter.cache_provider' => true,
            'prestashop.bundle.routing.converter.router_provider' => true,
            'prestashop.bundle.routing.converter.routing_cache_key_generator' => true,
            'prestashop.bundle.routing.module_route_loader' => true,
            'prestashop.compiler.smarty.template' => true,
            'prestashop.dumper.xliff' => true,
            'prestashop.security.voter.product' => true,
            'prestashop.smarty' => true,
            'prestashop.translation.chainextractor' => true,
            'prestashop.translation.extractor.crowdin.php' => true,
            'prestashop.translation.extractor.php' => true,
            'prestashop.translation.extractor.smarty' => true,
            'prestashop.translation.extractor.twig' => true,
            'prestashop.translation.helper.smarty.smarty_resource_module' => true,
            'prestashop.translation.helper.smarty.smarty_resource_parent' => true,
            'prestashop.translation.manager.original_string_manager' => true,
            'prestashop.translation.manager.translation_manager' => true,
            'prestashop.translation.parser.crowdin_php_parser' => true,
            'profiler_listener' => true,
            'property_accessor' => true,
            'resolve_controller_name_subscriber' => true,
            'response_listener' => true,
            'router.cache_warmer' => true,
            'router.request_context' => true,
            'router_listener' => true,
            'security.access.authenticated_voter' => true,
            'security.access.expression_voter' => true,
            'security.access.simple_role_voter' => true,
            'security.access_listener' => true,
            'security.access_map' => true,
            'security.authentication.guard_handler' => true,
            'security.authentication.listener.anonymous.main' => true,
            'security.authentication.manager' => true,
            'security.authentication.provider.anonymous.main' => true,
            'security.authentication.session_strategy.main' => true,
            'security.authentication.trust_resolver' => true,
            'security.channel_listener' => true,
            'security.command.user_password_encoder' => true,
            'security.context_listener.0' => true,
            'security.encoder_factory' => true,
            'security.firewall' => true,
            'security.firewall.map' => true,
            'security.firewall.map.context.dev' => true,
            'security.firewall.map.context.main' => true,
            'security.logout_url_generator' => true,
            'security.rememberme.response_listener' => true,
            'security.request_matcher.zfhj2lw' => true,
            'security.role_hierarchy' => true,
            'security.user.provider.concrete.in_memory' => true,
            'security.user_value_resolver' => true,
            'security.validator.user_password' => true,
            'sensio_distribution.security_checker' => true,
            'sensio_distribution.security_checker.command' => true,
            'sensio_framework_extra.cache.listener' => true,
            'sensio_framework_extra.controller.listener' => true,
            'sensio_framework_extra.converter.listener' => true,
            'sensio_framework_extra.converter.manager' => true,
            'sensio_framework_extra.routing.loader.annot_class' => true,
            'sensio_framework_extra.routing.loader.annot_dir' => true,
            'sensio_framework_extra.routing.loader.annot_file' => true,
            'sensio_framework_extra.security.listener' => true,
            'sensio_framework_extra.view.listener' => true,
            'serializer.mapping.cache.symfony' => true,
            'serializer.mapping.cache_warmer' => true,
            'service_locator.sr6ctxe' => true,
            'session.save_listener' => true,
            'session.storage.filesystem' => true,
            'session.storage.metadata_bag' => true,
            'session.storage.native' => true,
            'session.storage.php_bridge' => true,
            'session_listener' => true,
            'streamed_response_listener' => true,
            'swiftmailer.email_sender.listener' => true,
            'swiftmailer.mailer.default.spool' => true,
            'swiftmailer.mailer.default.transport' => true,
            'swiftmailer.mailer.default.transport.eventdispatcher' => true,
            'tactician.commandbus.default' => true,
            'tactician.handler.command_name_extractor.class_name' => true,
            'tactician.handler.locator.symfony' => true,
            'tactician.handler.method_name_inflector.handle' => true,
            'tactician.handler.method_name_inflector.handle_class_name' => true,
            'tactician.handler.method_name_inflector.handle_class_name_without_suffix' => true,
            'tactician.handler.method_name_inflector.invoke' => true,
            'tactician.middleware.command_handler' => true,
            'tactician.middleware.locking' => true,
            'tactician.middleware.validator' => true,
            'tactician.plugins.named_command.extractor' => true,
            'templating.cache_warmer.template_paths' => true,
            'templating.filename_parser' => true,
            'templating.finder' => true,
            'templating.helper.logout_url' => true,
            'templating.helper.security' => true,
            'templating.locator' => true,
            'templating.name_parser' => true,
            'translation.dumper.csv' => true,
            'translation.dumper.ini' => true,
            'translation.dumper.json' => true,
            'translation.dumper.mo' => true,
            'translation.dumper.php' => true,
            'translation.dumper.po' => true,
            'translation.dumper.qt' => true,
            'translation.dumper.res' => true,
            'translation.dumper.xliff' => true,
            'translation.dumper.yml' => true,
            'translation.extractor' => true,
            'translation.extractor.php' => true,
            'translation.loader' => true,
            'translation.loader.csv' => true,
            'translation.loader.dat' => true,
            'translation.loader.ini' => true,
            'translation.loader.json' => true,
            'translation.loader.mo' => true,
            'translation.loader.php' => true,
            'translation.loader.po' => true,
            'translation.loader.qt' => true,
            'translation.loader.res' => true,
            'translation.loader.xliff' => true,
            'translation.loader.yml' => true,
            'translation.reader' => true,
            'translation.warmer' => true,
            'translation.writer' => true,
            'translation_tools.translation.node_visitor' => true,
            'translator.default' => true,
            'translator_listener' => true,
            'twig.cache_warmer' => true,
            'twig.command.debug' => true,
            'twig.command.lint' => true,
            'twig.exception_listener' => true,
            'twig.extension.routing' => true,
            'twig.form.renderer' => true,
            'twig.loader' => true,
            'twig.profile' => true,
            'twig.runtime.httpkernel' => true,
            'twig.template_cache_warmer' => true,
            'twig.translation.extractor' => true,
            'uri_signer' => true,
            'validate_request_listener' => true,
            'validator.builder' => true,
            'validator.email' => true,
            'validator.expression' => true,
            'validator.mapping.cache_warmer' => true,
            'var_dumper.cli_dumper' => true,
            'web_profiler.csp.handler' => true,
            'web_profiler.debug_toolbar' => true,
            'web_server.command.server_log' => true,
            'web_server.command.server_run' => true,
            'web_server.command.server_start' => true,
            'web_server.command.server_status' => true,
            'web_server.command.server_stop' => true,
        ];
        $this->aliases = [
            'cache.app_clearer' => 'cache.default_clearer',
            'console.command.doctrine_bundle_doctrinecachebundle_command_containscommand' => 'doctrine_cache.contains_command',
            'console.command.doctrine_bundle_doctrinecachebundle_command_deletecommand' => 'doctrine_cache.delete_command',
            'console.command.doctrine_bundle_doctrinecachebundle_command_flushcommand' => 'doctrine_cache.flush_command',
            'console.command.doctrine_bundle_doctrinecachebundle_command_statscommand' => 'doctrine_cache.stats_command',
            'csa_guzzle.default_cache_adapter' => 'guzzle.cache',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.default_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.default_metadata_cache',
            'doctrine.orm.default_query_cache' => 'doctrine_cache.providers.doctrine.orm.default_query_cache',
            'doctrine.orm.default_result_cache' => 'doctrine_cache.providers.doctrine.orm.default_result_cache',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'event_dispatcher' => 'debug.event_dispatcher',
            'mailer' => 'swiftmailer.mailer.default',
            'monolog.handler.legacy' => 'prestashop.handler.log',
            'prestashop.bundle.routing.converter.cache' => 'cache.app',
            'prestashop.core.admin.data_provider.addons_interface' => 'prestashop.adapter.admin.data_provider.addons',
            'prestashop.core.api.stockMovement.controller' => 'prestashop.core.api.stock_movement.controller',
            'prestashop.core.api.stockMovement.repository' => 'prestashop.core.api.stock_movement.repository',
            'prestashop.core.localization.cldr.datalayer.top_layer' => 'prestashop.core.localization.cldr.datalayer.locale_cache',
            'prestashop.core.localization.currency.middleware.top_layer' => 'prestashop.core.localization.currency.middleware.cache',
            'prestashop.core.mail_template.mail_template_renderer' => 'prestashop.adapter.mail_template.twig_renderer',
            'prestashop.core.mail_template.theme_catalog' => 'prestashop.core.mail_template.theme_folder_catalog',
            'prestashop.twig.extension.dataFormatter' => 'prestashop.twig.extension.data_formatter',
            'ps.theme_translations_factory' => 'prestashop.translation.theme_translations_factory',
            'ps.translations_factory' => 'prestashop.translation.translations_factory',
            'router' => 'prestashop.router',
            'session.storage' => 'session.storage.native',
            'swiftmailer.mailer' => 'swiftmailer.mailer.default',
            'swiftmailer.plugin.messagelogger' => 'swiftmailer.mailer.default.plugin.messagelogger',
            'swiftmailer.spool' => 'swiftmailer.mailer.default.spool',
            'swiftmailer.transport' => 'swiftmailer.mailer.default.transport',
            'swiftmailer.transport.real' => 'swiftmailer.mailer.default.transport.real',
            'tactician.commandbus' => 'tactician.commandbus.default',
        ];
    }

    public function getRemovedIds()
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.'removed-ids.php';
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    protected function load($file, $lazyLoad = true)
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.$file;
    }

    /**
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AppService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('czXZ4LM8Gd', 0, ($this->targetDirs[0].'/pools'));
        $a->setLogger(${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'});

        return $this->services['cache.app'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('y07GajEjel', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the public 'data_collector.dump' shared service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector
     */
    protected function getDataCollector_DumpService()
    {
        return $this->services['data_collector.dump'] = new \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector(${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'}, ${($_ = isset($this->services['debug.file_link_formatter']) ? $this->services['debug.file_link_formatter'] : $this->getDebug_FileLinkFormatterService()) && false ?: '_'}, 'UTF-8', ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, NULL);
    }

    /**
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'doctrine.cache.provider' shared service.
     *
     * @return \Doctrine\Common\Cache\FilesystemCache
     */
    protected function getDoctrine_Cache_ProviderService()
    {
        return $this->services['doctrine.cache.provider'] = new \Doctrine\Common\Cache\FilesystemCache(($this->targetDirs[0].'/doctrine'));
    }

    /**
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Configuration();

        $b = new \Doctrine\DBAL\Logging\LoggerChain();
        $b->addLogger(new \Symfony\Bridge\Doctrine\Logger\DbalLogger(${($_ = isset($this->services['monolog.logger.doctrine']) ? $this->services['monolog.logger.doctrine'] : $this->getMonolog_Logger_DoctrineService()) && false ?: '_'}, ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'}));
        $b->addLogger(${($_ = isset($this->services['doctrine.dbal.logger.profiling.default']) ? $this->services['doctrine.dbal.logger.profiling.default'] : ($this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack())) && false ?: '_'});

        $a->setSQLLogger($b);
        $c = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $c->addEventListener([0 => 'loadClassMetadata'], ${($_ = isset($this->services['doctrine.orm.default_listeners.attach_entity_listeners']) ? $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] : ($this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener())) && false ?: '_'});

        return $this->services['doctrine.dbal.default_connection'] = ${($_ = isset($this->services['doctrine.dbal.connection_factory']) ? $this->services['doctrine.dbal.connection_factory'] : ($this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))) && false ?: '_'}->createConnection(['driver' => 'pdo_mysql', 'host' => 'db', 'port' => '3306', 'dbname' => 'ps_db1', 'user' => 'serfe', 'password' => '123456789', 'charset' => 'UTF8', 'driverOptions' => [1002 => 'SET sql_mode=(SELECT REPLACE(@@sql_mode,\'ONLY_FULL_GROUP_BY\',\'\'))'], 'serverVersion' => 5.0999999999999996, 'defaultTableOptions' => []], $a, $c, ['enum' => 'string']);
    }

    /**
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        $a = new \Doctrine\ORM\Configuration();

        $b = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'}, [0 => ($this->targetDirs[3].'/src/PrestaShopBundle/Entity')]), 'PrestaShopBundle\\Entity');

        $a->setEntityNamespaces(['PrestaShopBundle' => 'PrestaShopBundle\\Entity']);
        $a->setMetadataCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()) && false ?: '_'});
        $a->setQueryCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_query_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()) && false ?: '_'});
        $a->setResultCacheImpl(${($_ = isset($this->services['doctrine_cache.providers.doctrine.orm.default_result_cache']) ? $this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] : $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()) && false ?: '_'});
        $a->setMetadataDriverImpl($b);
        $a->setProxyDir(($this->targetDirs[0].'/doctrine/orm/Proxies'));
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(true);
        $a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(${($_ = isset($this->services['prestashop.database.naming_strategy']) ? $this->services['prestashop.database.naming_strategy'] : ($this->services['prestashop.database.naming_strategy'] = new \PrestaShopBundle\Service\Database\DoctrineNamingStrategy('ps_'))) && false ?: '_'});
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(${($_ = isset($this->services['doctrine.orm.default_entity_listener_resolver']) ? $this->services['doctrine.orm.default_entity_listener_resolver'] : ($this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this))) && false ?: '_'});
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(${($_ = isset($this->services['service_locator.sr6ctxe']) ? $this->services['service_locator.sr6ctxe'] : ($this->services['service_locator.sr6ctxe'] = new \Symfony\Component\DependencyInjection\ServiceLocator([]))) && false ?: '_'}));
        $a->addCustomStringFunction('regexp', 'DoctrineExtensions\\Query\\Mysql\\Regexp');

        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, $a);

        ${($_ = isset($this->services['doctrine.orm.default_manager_configurator']) ? $this->services['doctrine.orm.default_manager_configurator'] : ($this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))) && false ?: '_'}->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_metadata_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_66864dba639a21c191524d1e9526c9907f2f6bed19275dbb37255b784a60cd6d');

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_query_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_66864dba639a21c191524d1e9526c9907f2f6bed19275dbb37255b784a60cd6d');

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_result_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_66864dba639a21c191524d1e9526c9907f2f6bed19275dbb37255b784a60cd6d');

        return $instance;
    }

    /**
     * Gets the public 'filesystem' shared service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /**
     * Gets the public 'guzzle.cache' service.
     *
     * @return \Csa\Bundle\GuzzleBundle\GuzzleHttp\Cache\DoctrineAdapter
     */
    protected function getGuzzle_CacheService()
    {
        return new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Cache\DoctrineAdapter(${($_ = isset($this->services['doctrine.cache.provider']) ? $this->services['doctrine.cache.provider'] : ($this->services['doctrine.cache.provider'] = new \Doctrine\Common\Cache\FilesystemCache(($this->targetDirs[0].'/doctrine')))) && false ?: '_'}, 300);
    }

    /**
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['debug.controller_resolver']) ? $this->services['debug.controller_resolver'] : $this->getDebug_ControllerResolverService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, ${($_ = isset($this->services['debug.argument_resolver']) ? $this->services['debug.argument_resolver'] : $this->getDebug_ArgumentResolverService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.admin.data_provider.addons' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Addons\AddonsDataProvider
     */
    protected function getPrestashop_Adapter_Admin_DataProvider_AddonsService()
    {
        $this->services['prestashop.adapter.admin.data_provider.addons'] = $instance = new \PrestaShop\PrestaShop\Adapter\Addons\AddonsDataProvider(${($_ = isset($this->services['prestashop.addons.client_api']) ? $this->services['prestashop.addons.client_api'] : $this->getPrestashop_Addons_ClientApiService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.module.zip.manager']) ? $this->services['prestashop.module.zip.manager'] : $this->getPrestashop_Module_Zip_ManagerService()) && false ?: '_'});

        $instance->cacheDir = $this->targetDirs[0];

        return $instance;
    }

    /**
     * Gets the public 'prestashop.adapter.data_provider.currency' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider
     */
    protected function getPrestashop_Adapter_DataProvider_CurrencyService()
    {
        return $this->services['prestashop.adapter.data_provider.currency'] = new \PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider(${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}, ((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop) ? (${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop->id) : (null)));
    }

    /**
     * Gets the public 'prestashop.adapter.data_provider.module' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider
     */
    protected function getPrestashop_Adapter_DataProvider_ModuleService()
    {
        $this->services['prestashop.adapter.data_provider.module'] = $instance = new \PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider(${($_ = isset($this->services['prestashop.adapter.legacy.logger']) ? $this->services['prestashop.adapter.legacy.logger'] : ($this->services['prestashop.adapter.legacy.logger'] = new \PrestaShop\PrestaShop\Adapter\LegacyLogger())) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['doctrine.orm.default_entity_manager']) ? $this->services['doctrine.orm.default_entity_manager'] : $this->getDoctrine_Orm_DefaultEntityManagerService()) && false ?: '_'});

        $instance->setEmployeeId(((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->employee) ? (${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->employee->id) : (0)));

        return $instance;
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.block.helper.subscriber' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Admin\LegacyBlockHelperSubscriber
     */
    protected function getPrestashop_Adapter_Legacy_Block_Helper_SubscriberService()
    {
        return $this->services['prestashop.adapter.legacy.block.helper.subscriber'] = new \PrestaShop\PrestaShop\Adapter\Admin\LegacyBlockHelperSubscriber();
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.configuration' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Configuration
     */
    protected function getPrestashop_Adapter_Legacy_ConfigurationService()
    {
        return $this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration();
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.context' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\LegacyContext
     */
    protected function getPrestashop_Adapter_Legacy_ContextService()
    {
        return $this->services['prestashop.adapter.legacy.context'] = new \PrestaShop\PrestaShop\Adapter\LegacyContext('/mails/themes', ${($_ = isset($this->services['prestashop.adapter.tools']) ? $this->services['prestashop.adapter.tools'] : ($this->services['prestashop.adapter.tools'] = new \PrestaShop\PrestaShop\Adapter\Tools())) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.hook.subscriber' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\LegacyHookSubscriber
     */
    protected function getPrestashop_Adapter_Legacy_Hook_SubscriberService()
    {
        return $this->services['prestashop.adapter.legacy.hook.subscriber'] = new \PrestaShop\PrestaShop\Adapter\LegacyHookSubscriber();
    }

    /**
     * Gets the public 'prestashop.adapter.legacy.logger' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\LegacyLogger
     */
    protected function getPrestashop_Adapter_Legacy_LoggerService()
    {
        return $this->services['prestashop.adapter.legacy.logger'] = new \PrestaShop\PrestaShop\Adapter\LegacyLogger();
    }

    /**
     * Gets the public 'prestashop.adapter.middleware.ssl' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Security\SslMiddleware
     */
    protected function getPrestashop_Adapter_Middleware_SslService()
    {
        return $this->services['prestashop.adapter.middleware.ssl'] = new \PrestaShop\PrestaShop\Adapter\Security\SslMiddleware();
    }

    /**
     * Gets the public 'prestashop.adapter.module.prestatrust.checker' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Module\PrestaTrust\PrestaTrustChecker
     */
    protected function getPrestashop_Adapter_Module_Prestatrust_CheckerService()
    {
        return $this->services['prestashop.adapter.module.prestatrust.checker'] = new \PrestaShop\PrestaShop\Adapter\Module\PrestaTrust\PrestaTrustChecker(${($_ = isset($this->services['doctrine.cache.provider']) ? $this->services['doctrine.cache.provider'] : ($this->services['doctrine.cache.provider'] = new \Doctrine\Common\Cache\FilesystemCache(($this->targetDirs[0].'/doctrine')))) && false ?: '_'}, ${($_ = isset($this->services['prestashop.addons.client_api']) ? $this->services['prestashop.addons.client_api'] : $this->getPrestashop_Addons_ClientApiService()) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.security.admin' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Security\Admin
     */
    protected function getPrestashop_Adapter_Security_AdminService()
    {
        return $this->services['prestashop.adapter.security.admin'] = new \PrestaShop\PrestaShop\Adapter\Security\Admin(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.security.admin.provider']) ? $this->services['prestashop.security.admin.provider'] : $this->getPrestashop_Security_Admin_ProviderService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.adapter.tools' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Tools
     */
    protected function getPrestashop_Adapter_ToolsService()
    {
        return $this->services['prestashop.adapter.tools'] = new \PrestaShop\PrestaShop\Adapter\Tools();
    }

    /**
     * Gets the public 'prestashop.addons.client_api' shared service.
     *
     * @return \PrestaShopBundle\Service\DataProvider\Marketplace\ApiClient
     */
    protected function getPrestashop_Addons_ClientApiService()
    {
        $this->services['prestashop.addons.client_api'] = $instance = new \PrestaShopBundle\Service\DataProvider\Marketplace\ApiClient(${($_ = isset($this->services['csa_guzzle.client.addons_api']) ? $this->services['csa_guzzle.client.addons_api'] : $this->getCsaGuzzle_Client_AddonsApiService()) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}->getLocale(), ${($_ = isset($this->services['prestashop.adapter.data_provider.country']) ? $this->services['prestashop.adapter.data_provider.country'] : ($this->services['prestashop.adapter.data_provider.country'] = new \PrestaShop\PrestaShop\Adapter\Country\CountryDataProvider())) && false ?: '_'}->getIsoCodebyId(), ${($_ = isset($this->services['prestashop.adapter.tools']) ? $this->services['prestashop.adapter.tools'] : ($this->services['prestashop.adapter.tools'] = new \PrestaShop\PrestaShop\Adapter\Tools())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}->get("_PS_BASE_URL_"), ${($_ = isset($this->services['prestashop.core.foundation.version']) ? $this->services['prestashop.core.foundation.version'] : $this->load('getPrestashop_Core_Foundation_VersionService.php')) && false ?: '_'}->getVersion());

        $instance->setSslVerification(($this->targetDirs[0].'/cacert.pem'));

        return $instance;
    }

    /**
     * Gets the public 'prestashop.bundle.event_listener.back_url_redirect_response_listener' shared service.
     *
     * @return \PrestaShopBundle\EventListener\BackUrlRedirectResponseListener
     */
    protected function getPrestashop_Bundle_EventListener_BackUrlRedirectResponseListenerService()
    {
        return $this->services['prestashop.bundle.event_listener.back_url_redirect_response_listener'] = new \PrestaShopBundle\EventListener\BackUrlRedirectResponseListener(${($_ = isset($this->services['prestashop.core.uti.back_url_provider']) ? $this->services['prestashop.core.uti.back_url_provider'] : ($this->services['prestashop.core.uti.back_url_provider'] = new \PrestaShop\PrestaShop\Core\Util\Url\BackUrlProvider())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.bundle.routing.converter.legacy_url_converter' shared service.
     *
     * @return \PrestaShopBundle\Routing\Converter\LegacyUrlConverter
     */
    protected function getPrestashop_Bundle_Routing_Converter_LegacyUrlConverterService()
    {
        return $this->services['prestashop.bundle.routing.converter.legacy_url_converter'] = new \PrestaShopBundle\Routing\Converter\LegacyUrlConverter(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.bundle.routing.converter.cache_provider']) ? $this->services['prestashop.bundle.routing.converter.cache_provider'] : $this->getPrestashop_Bundle_Routing_Converter_CacheProviderService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.bundle.twig.extension.column' shared service.
     *
     * @return \PrestaShopBundle\Twig\Extension\GridExtension
     */
    protected function getPrestashop_Bundle_Twig_Extension_ColumnService()
    {
        $a = ${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'};

        if (isset($this->services['prestashop.bundle.twig.extension.column'])) {
            return $this->services['prestashop.bundle.twig.extension.column'];
        }

        return $this->services['prestashop.bundle.twig.extension.column'] = new \PrestaShopBundle\Twig\Extension\GridExtension($a, ${($_ = isset($this->services['prestashop.static_cache.adapter']) ? $this->services['prestashop.static_cache.adapter'] : $this->getPrestashop_StaticCache_AdapterService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.bundle.twig.extension.documentation_link_provider_extension' shared service.
     *
     * @return \PrestaShopBundle\Twig\Extension\DocumentationLinkExtension
     */
    protected function getPrestashop_Bundle_Twig_Extension_DocumentationLinkProviderExtensionService()
    {
        return $this->services['prestashop.bundle.twig.extension.documentation_link_provider_extension'] = new \PrestaShopBundle\Twig\Extension\DocumentationLinkExtension(${($_ = isset($this->services['prestashop.core.util.helper_card.documentation_link_provider']) ? $this->services['prestashop.core.util.helper_card.documentation_link_provider'] : $this->getPrestashop_Core_Util_HelperCard_DocumentationLinkProviderService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.categories_provider' shared service.
     *
     * @return \PrestaShopBundle\Service\DataProvider\Admin\CategoriesProvider
     */
    protected function getPrestashop_CategoriesProviderService()
    {
        return $this->services['prestashop.categories_provider'] = new \PrestaShopBundle\Service\DataProvider\Admin\CategoriesProvider(${($_ = isset($this->services['prestashop.addons.client_api']) ? $this->services['prestashop.addons.client_api'] : $this->getPrestashop_Addons_ClientApiService()) && false ?: '_'}, ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'}, $this->parameters['prestashop.addons.categories'], ((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop->theme_name) ? (${($_ = isset($this->services['prestashop.core.addon.theme.repository']) ? $this->services['prestashop.core.addon.theme.repository'] : $this->load('getPrestashop_Core_Addon_Theme_RepositoryService.php')) && false ?: '_'}->getInstanceByName(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop->theme_name)->getModulesToEnable()) : ([])));
    }

    /**
     * Gets the public 'prestashop.core.admin.data_provider.module_interface' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider
     */
    protected function getPrestashop_Core_Admin_DataProvider_ModuleInterfaceService()
    {
        $this->services['prestashop.core.admin.data_provider.module_interface'] = $instance = new \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.admin.data_provider.addons']) ? $this->services['prestashop.adapter.admin.data_provider.addons'] : $this->getPrestashop_Adapter_Admin_DataProvider_AddonsService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.categories_provider']) ? $this->services['prestashop.categories_provider'] : $this->getPrestashop_CategoriesProviderService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.data_provider.module']) ? $this->services['prestashop.adapter.data_provider.module'] : $this->getPrestashop_Adapter_DataProvider_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['doctrine.cache.provider']) ? $this->services['doctrine.cache.provider'] : ($this->services['doctrine.cache.provider'] = new \Doctrine\Common\Cache\FilesystemCache(($this->targetDirs[0].'/doctrine')))) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->employee);

        $instance->setRouter(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.admin.module.repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Addon\Module\ModuleRepository
     */
    protected function getPrestashop_Core_Admin_Module_RepositoryService()
    {
        $this->services['prestashop.core.admin.module.repository'] = $instance = new \PrestaShop\PrestaShop\Core\Addon\Module\ModuleRepository(${($_ = isset($this->services['prestashop.core.admin.data_provider.module_interface']) ? $this->services['prestashop.core.admin.data_provider.module_interface'] : $this->getPrestashop_Core_Admin_DataProvider_ModuleInterfaceService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.data_provider.module']) ? $this->services['prestashop.adapter.data_provider.module'] : $this->getPrestashop_Adapter_DataProvider_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.module.updater']) ? $this->services['prestashop.core.module.updater'] : $this->getPrestashop_Core_Module_UpdaterService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.logger']) ? $this->services['prestashop.adapter.legacy.logger'] : ($this->services['prestashop.adapter.legacy.logger'] = new \PrestaShop\PrestaShop\Adapter\LegacyLogger())) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}->get("_PS_MODULE_DIR_"), ${($_ = isset($this->services['doctrine.cache.provider']) ? $this->services['doctrine.cache.provider'] : ($this->services['doctrine.cache.provider'] = new \Doctrine\Common\Cache\FilesystemCache(($this->targetDirs[0].'/doctrine')))) && false ?: '_'});

        $instance->setPrestaTrustChecker(${($_ = isset($this->services['prestashop.adapter.module.prestatrust.checker']) ? $this->services['prestashop.adapter.module.prestatrust.checker'] : $this->getPrestashop_Adapter_Module_Prestatrust_CheckerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.hook.dispatcher' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Hook\HookDispatcher
     */
    protected function getPrestashop_Core_Hook_DispatcherService()
    {
        return $this->services['prestashop.core.hook.dispatcher'] = new \PrestaShop\PrestaShop\Core\Hook\HookDispatcher(${($_ = isset($this->services['prestashop.hook.dispatcher']) ? $this->services['prestashop.hook.dispatcher'] : $this->getPrestashop_Hook_DispatcherService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.module.updater' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Module\ModuleDataUpdater
     */
    protected function getPrestashop_Core_Module_UpdaterService()
    {
        return $this->services['prestashop.core.module.updater'] = new \PrestaShop\PrestaShop\Adapter\Module\ModuleDataUpdater(${($_ = isset($this->services['prestashop.adapter.admin.data_provider.addons']) ? $this->services['prestashop.adapter.admin.data_provider.addons'] : $this->getPrestashop_Adapter_Admin_DataProvider_AddonsService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.admin.data_provider.module_interface']) ? $this->services['prestashop.core.admin.data_provider.module_interface'] : $this->getPrestashop_Core_Admin_DataProvider_ModuleInterfaceService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.core.uti.back_url_provider' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Util\Url\BackUrlProvider
     */
    protected function getPrestashop_Core_Uti_BackUrlProviderService()
    {
        return $this->services['prestashop.core.uti.back_url_provider'] = new \PrestaShop\PrestaShop\Core\Util\Url\BackUrlProvider();
    }

    /**
     * Gets the public 'prestashop.core.util.helper_card.documentation_link_provider' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Util\HelperCard\DocumentationLinkProvider
     */
    protected function getPrestashop_Core_Util_HelperCard_DocumentationLinkProviderService()
    {
        return $this->services['prestashop.core.util.helper_card.documentation_link_provider'] = new \PrestaShop\PrestaShop\Core\Util\HelperCard\DocumentationLinkProvider(((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language) ? (${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language->iso_code) : ("en-US")), ['team' => ['en' => 'http://doc.prestashop.com/display/PS17/Team', 'fr' => 'http://doc.prestashop.com/pages/viewpage.action?pageId=51840334', 'es' => 'http://doc.prestashop.com/display/PS17/Equipo', 'it' => 'http://doc.prestashop.com/pages/viewpage.action?pageId=54266520', '_fallback' => 'http://doc.prestashop.com/display/PS17/Team'], 'meta' => ['fr' => 'http://doc.prestashop.com/display/PS17/SEO+et+URL', 'es' => 'http://doc.prestashop.com/display/PS17/SEO+y+URLs', 'it' => 'http://doc.prestashop.com/display/PS17/SEO+e+URL', '_fallback' => 'http://doc.prestashop.com/display/PS17/SEO+and+URLs'], 'customer' => ['fr' => 'http://doc.prestashop.com/display/PS17/Vos+clients', 'es' => 'http://doc.prestashop.com/display/PS17/Tus+clientes', 'it' => 'http://doc.prestashop.com/display/PS17/I+Tuoi+Clienti', '_fallback' => 'http://doc.prestashop.com/display/PS17/Your+customers'], 'supplier' => ['en' => 'http://doc.prestashop.com/display/PS17/Managing+Suppliers', 'fr' => 'http://doc.prestashop.com/display/PS17/Gerer+les+fournisseurs', 'es' => 'http://doc.prestashop.com/display/PS17/Gestionar+Proveedores', 'it' => 'http://doc.prestashop.com/display/PS17/Gestire+Fornitori', '_fallback' => 'http://doc.prestashop.com/display/PS17/Managing+Suppliers'], 'category' => ['en' => 'http://doc.prestashop.com/display/PS17/Managing+Categories', 'fr' => 'http://doc.prestashop.com/display/PS17/Gerer+les+categories', 'es' => 'http://doc.prestashop.com/display/PS17/Gestionar+las+categorias', 'it' => 'http://doc.prestashop.com/display/PS17/Gestire+Categorie', '_fallback' => 'http://doc.prestashop.com/display/PS17/Managing+Categories'], 'cms_pages' => ['en' => 'http://doc.prestashop.com/display/PS17/Pages+-+Managing+Static+Content', 'fr' => 'http://doc.prestashop.com/display/PS17/Gerer+votre+contenu+statique+grace+aux+pages', 'es' => 'http://doc.prestashop.com/display/PS17/Paginas+-+Gestionar+el+Contenido+Estatico', 'it' => 'http://doc.prestashop.com/display/PS17/Pagine+-+Gestione+Contenuti+Statici', '_fallback' => 'http://doc.prestashop.com/display/PS17/Pages+-+Managing+Static+Content']]);
    }

    /**
     * Gets the public 'prestashop.database.naming_strategy' shared service.
     *
     * @return \PrestaShopBundle\Service\Database\DoctrineNamingStrategy
     */
    protected function getPrestashop_Database_NamingStrategyService()
    {
        return $this->services['prestashop.database.naming_strategy'] = new \PrestaShopBundle\Service\Database\DoctrineNamingStrategy('ps_');
    }

    /**
     * Gets the public 'prestashop.demo_mode_enabled.listener' shared service.
     *
     * @return \PrestaShopBundle\EventListener\DemoModeEnabledListener
     */
    protected function getPrestashop_DemoModeEnabled_ListenerService()
    {
        return $this->services['prestashop.demo_mode_enabled.listener'] = new \PrestaShopBundle\EventListener\DemoModeEnabledListener(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['session']) ? $this->services['session'] : $this->getSessionService()) && false ?: '_'}, ${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}->getBoolean("_PS_MODE_DEMO_"));
    }

    /**
     * Gets the public 'prestashop.dispatcher.legacy_hooks.subscriber' shared service.
     *
     * @return \PrestaShopBundle\EventListener\ActionDispatcherLegacyHooksSubscriber
     */
    protected function getPrestashop_Dispatcher_LegacyHooks_SubscriberService()
    {
        return $this->services['prestashop.dispatcher.legacy_hooks.subscriber'] = new \PrestaShopBundle\EventListener\ActionDispatcherLegacyHooksSubscriber(${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.handler.log' shared service.
     *
     * @return \PrestaShopBundle\Service\Log\LogHandler
     */
    protected function getPrestashop_Handler_LogService()
    {
        return $this->services['prestashop.handler.log'] = new \PrestaShopBundle\Service\Log\LogHandler($this);
    }

    /**
     * Gets the public 'prestashop.hook.dispatcher' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Hook\HookDispatcher
     */
    protected function getPrestashop_Hook_DispatcherService()
    {
        $this->services['prestashop.hook.dispatcher'] = $instance = new \PrestaShop\PrestaShop\Adapter\Hook\HookDispatcher();

        $instance->addSubscriber(${($_ = isset($this->services['prestashop.adapter.legacy.hook.subscriber']) ? $this->services['prestashop.adapter.legacy.hook.subscriber'] : ($this->services['prestashop.adapter.legacy.hook.subscriber'] = new \PrestaShop\PrestaShop\Adapter\LegacyHookSubscriber())) && false ?: '_'});
        $instance->addSubscriber(${($_ = isset($this->services['prestashop.adapter.legacy.block.helper.subscriber']) ? $this->services['prestashop.adapter.legacy.block.helper.subscriber'] : ($this->services['prestashop.adapter.legacy.block.helper.subscriber'] = new \PrestaShop\PrestaShop\Adapter\Admin\LegacyBlockHelperSubscriber())) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the public 'prestashop.hooks_registry' shared service.
     *
     * @return \PrestaShopBundle\DataCollector\HookRegistry
     */
    protected function getPrestashop_HooksRegistryService()
    {
        return $this->services['prestashop.hooks_registry'] = new \PrestaShopBundle\DataCollector\HookRegistry();
    }

    /**
     * Gets the public 'prestashop.legacy_url_listener' shared service.
     *
     * @return \PrestaShopBundle\EventListener\LegacyUrlListener
     */
    protected function getPrestashop_LegacyUrlListenerService()
    {
        return $this->services['prestashop.legacy_url_listener'] = new \PrestaShopBundle\EventListener\LegacyUrlListener(${($_ = isset($this->services['prestashop.bundle.routing.converter.legacy_url_converter']) ? $this->services['prestashop.bundle.routing.converter.legacy_url_converter'] : $this->getPrestashop_Bundle_Routing_Converter_LegacyUrlConverterService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.module.zip.manager' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Module\ModuleZipManager
     */
    protected function getPrestashop_Module_Zip_ManagerService()
    {
        return $this->services['prestashop.module.zip.manager'] = new \PrestaShop\PrestaShop\Adapter\Module\ModuleZipManager(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem())) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.module_activated.listener' shared service.
     *
     * @return \PrestaShopBundle\EventListener\ModuleActivatedListener
     */
    protected function getPrestashop_ModuleActivated_ListenerService()
    {
        return $this->services['prestashop.module_activated.listener'] = new \PrestaShopBundle\EventListener\ModuleActivatedListener(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['session']) ? $this->services['session'] : $this->getSessionService()) && false ?: '_'}, ${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.admin.module.repository']) ? $this->services['prestashop.core.admin.module.repository'] : $this->getPrestashop_Core_Admin_Module_RepositoryService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.security.admin.provider' shared service.
     *
     * @return \PrestaShopBundle\Security\Admin\EmployeeProvider
     */
    protected function getPrestashop_Security_Admin_ProviderService()
    {
        return $this->services['prestashop.security.admin.provider'] = new \PrestaShopBundle\Security\Admin\EmployeeProvider(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.static_cache.adapter']) ? $this->services['prestashop.static_cache.adapter'] : $this->getPrestashop_StaticCache_AdapterService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.static_cache.adapter' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getPrestashop_StaticCache_AdapterService()
    {
        $a = new \Symfony\Component\Cache\Adapter\ArrayAdapter();
        $a->setLogger(${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'});

        return $this->services['prestashop.static_cache.adapter'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'prestashop.tokenized_url_listener' shared service.
     *
     * @return \PrestaShopBundle\EventListener\TokenizedUrlsListener
     */
    protected function getPrestashop_TokenizedUrlListenerService()
    {
        return $this->services['prestashop.tokenized_url_listener'] = new \PrestaShopBundle\EventListener\TokenizedUrlsListener(${($_ = isset($this->services['security.csrf.token_manager']) ? $this->services['security.csrf.token_manager'] : $this->getSecurity_Csrf_TokenManagerService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.user_provider']) ? $this->services['prestashop.user_provider'] : $this->load('getPrestashop_UserProviderService.php')) && false ?: '_'}->getUsername(), ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.twig.extension.context_iso_code_provider_extension' shared service.
     *
     * @return \PrestaShopBundle\Twig\ContextIsoCodeProviderExtension
     */
    protected function getPrestashop_Twig_Extension_ContextIsoCodeProviderExtensionService()
    {
        $this->services['prestashop.twig.extension.context_iso_code_provider_extension'] = $instance = new \PrestaShopBundle\Twig\ContextIsoCodeProviderExtension(((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language) ? (${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language->iso_code) : ("en")));

        $instance->logger = ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'};
        $instance->translator = ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'};

        return $instance;
    }

    /**
     * Gets the public 'prestashop.twig.extension.data_formatter' shared service.
     *
     * @return \PrestaShopBundle\Twig\DataFormatterExtension
     */
    protected function getPrestashop_Twig_Extension_DataFormatterService()
    {
        return $this->services['prestashop.twig.extension.data_formatter'] = new \PrestaShopBundle\Twig\DataFormatterExtension();
    }

    /**
     * Gets the public 'prestashop.twig.extension.hook' shared service.
     *
     * @return \PrestaShopBundle\Twig\HookExtension
     */
    protected function getPrestashop_Twig_Extension_HookService()
    {
        return $this->services['prestashop.twig.extension.hook'] = new \PrestaShopBundle\Twig\HookExtension(${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.data_provider.module']) ? $this->services['prestashop.adapter.data_provider.module'] : $this->getPrestashop_Adapter_DataProvider_ModuleService()) && false ?: '_'}, ((${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->employee) ? (${($_ = isset($this->services['prestashop.core.admin.module.repository']) ? $this->services['prestashop.core.admin.module.repository'] : $this->getPrestashop_Core_Admin_Module_RepositoryService()) && false ?: '_'}) : (null)));
    }

    /**
     * Gets the public 'prestashop.twig.extension.layout' shared service.
     *
     * @return \PrestaShopBundle\Twig\LayoutExtension
     */
    protected function getPrestashop_Twig_Extension_LayoutService()
    {
        return $this->services['prestashop.twig.extension.layout'] = new \PrestaShopBundle\Twig\LayoutExtension(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}, 'dev', ${($_ = isset($this->services['prestashop.adapter.legacy.configuration']) ? $this->services['prestashop.adapter.legacy.configuration'] : ($this->services['prestashop.adapter.legacy.configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.data_provider.currency']) ? $this->services['prestashop.adapter.data_provider.currency'] : $this->getPrestashop_Adapter_DataProvider_CurrencyService()) && false ?: '_'});
    }

    /**
     * Gets the public 'prestashop.twig.extension.path_with_back_url_extension' shared service.
     *
     * @return \PrestaShopBundle\Twig\Extension\PathWithBackUrlExtension
     */
    protected function getPrestashop_Twig_Extension_PathWithBackUrlExtensionService()
    {
        return $this->services['prestashop.twig.extension.path_with_back_url_extension'] = new \PrestaShopBundle\Twig\Extension\PathWithBackUrlExtension(${($_ = isset($this->services['twig.extension.routing']) ? $this->services['twig.extension.routing'] : $this->getTwig_Extension_RoutingService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.uti.back_url_provider']) ? $this->services['prestashop.core.uti.back_url_provider'] : ($this->services['prestashop.core.uti.back_url_provider'] = new \PrestaShop\PrestaShop\Core\Util\Url\BackUrlProvider())) && false ?: '_'}, ((${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}) ? (${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}) : (null)));
    }

    /**
     * Gets the public 'prestashop.twig.extension.stringloader' shared service.
     *
     * @return \Twig_Extension_StringLoader
     */
    protected function getPrestashop_Twig_Extension_StringloaderService()
    {
        return $this->services['prestashop.twig.extension.stringloader'] = new \Twig_Extension_StringLoader();
    }

    /**
     * Gets the public 'prestashop.twig.extension.translation' shared service.
     *
     * @return \PrestaShopBundle\Twig\TranslationsExtension
     */
    protected function getPrestashop_Twig_Extension_TranslationService()
    {
        $this->services['prestashop.twig.extension.translation'] = $instance = new \PrestaShopBundle\Twig\TranslationsExtension($this, ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'});

        $instance->logger = ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'};
        $instance->translator = ${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'};

        return $instance;
    }

    /**
     * Gets the public 'prestashop.twig.modules.loader' shared service.
     *
     * @return \PrestaShopBundle\Twig\Locator\ModuleTemplateLoader
     */
    protected function getPrestashop_Twig_Modules_LoaderService()
    {
        return $this->services['prestashop.twig.modules.loader'] = new \PrestaShopBundle\Twig\Locator\ModuleTemplateLoader(['PrestaShop' => '', 'Product' => '/Admin/Product', 'Twig' => '/Admin/TwigTemplateForm', 'AdvancedParameters' => '/Admin/Configure/AdvancedParameters', 'ShopParameters' => '/Admin/Configure/ShopParameters'], ${($_ = isset($this->services['prestashop.module_kernel.repository']) ? $this->services['prestashop.module_kernel.repository'] : $this->load('getPrestashop_ModuleKernel_RepositoryService.php')) && false ?: '_'}->getActiveModulesPaths());
    }

    /**
     * Gets the public 'prestashop.user_locale.listener' shared service.
     *
     * @return \PrestaShopBundle\EventListener\UserLocaleListener
     */
    protected function getPrestashop_UserLocale_ListenerService()
    {
        return $this->services['prestashop.user_locale.listener'] = new \PrestaShopBundle\EventListener\UserLocaleListener(${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'});
    }

    /**
     * Gets the public 'profiler' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler
     */
    protected function getProfilerService()
    {
        $a = ${($_ = isset($this->services['monolog.logger.profiler']) ? $this->services['monolog.logger.profiler'] : $this->getMonolog_Logger_ProfilerService()) && false ?: '_'};

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:'.$this->targetDirs[0].'/profiler')), $a, true);

        $b = ${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'};
        $c = new \Symfony\Component\Cache\DataCollector\CacheDataCollector();
        $c->addInstance('cache.app', ${($_ = isset($this->services['cache.app']) ? $this->services['cache.app'] : $this->getCache_AppService()) && false ?: '_'});
        $c->addInstance('cache.system', ${($_ = isset($this->services['cache.system']) ? $this->services['cache.system'] : $this->getCache_SystemService()) && false ?: '_'});
        $c->addInstance('cache.validator', ${($_ = isset($this->services['cache.validator']) ? $this->services['cache.validator'] : $this->getCache_ValidatorService()) && false ?: '_'});
        $c->addInstance('cache.serializer', ${($_ = isset($this->services['cache.serializer']) ? $this->services['cache.serializer'] : $this->getCache_SerializerService()) && false ?: '_'});
        $c->addInstance('cache.annotations', ${($_ = isset($this->services['cache.annotations']) ? $this->services['cache.annotations'] : $this->getCache_AnnotationsService()) && false ?: '_'});
        $c->addInstance('prestashop.static_cache.adapter', ${($_ = isset($this->services['prestashop.static_cache.adapter']) ? $this->services['prestashop.static_cache.adapter'] : $this->getPrestashop_StaticCache_AdapterService()) && false ?: '_'});
        $d = new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
        $d->addLogger('default', ${($_ = isset($this->services['doctrine.dbal.logger.profiling.default']) ? $this->services['doctrine.dbal.logger.profiling.default'] : ($this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack())) && false ?: '_'});
        $e = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector('PrestaShop', ${($_ = isset($this->services['prestashop.core.foundation.version']) ? $this->services['prestashop.core.foundation.version'] : $this->load('getPrestashop_Core_Foundation_VersionService.php')) && false ?: '_'}->getVersion());
        $e->setKernel($b);

        $instance->add(${($_ = isset($this->services['data_collector.request']) ? $this->services['data_collector.request'] : ($this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector())) && false ?: '_'});
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'}));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\Validator\DataCollector\ValidatorDataCollector(${($_ = isset($this->services['validator']) ? $this->services['validator'] : $this->getValidatorService()) && false ?: '_'}));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add(${($_ = isset($this->services['data_collector.form']) ? $this->services['data_collector.form'] : $this->getDataCollector_FormService()) && false ?: '_'});
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a, ($this->targetDirs[0].'/appDevDebugProjectContainer')));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}));
        $instance->add(${($_ = isset($this->services['data_collector.router']) ? $this->services['data_collector.router'] : ($this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector())) && false ?: '_'});
        $instance->add($c);
        $instance->add(${($_ = isset($this->services['data_collector.translation']) ? $this->services['data_collector.translation'] : $this->getDataCollector_TranslationService()) && false ?: '_'});
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'}, ${($_ = isset($this->services['security.role_hierarchy']) ? $this->services['security.role_hierarchy'] : ($this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]))) && false ?: '_'}, ${($_ = isset($this->services['security.logout_url_generator']) ? $this->services['security.logout_url_generator'] : $this->getSecurity_LogoutUrlGeneratorService()) && false ?: '_'}, ${($_ = isset($this->services['debug.security.access.decision_manager']) ? $this->services['debug.security.access.decision_manager'] : $this->getDebug_Security_Access_DecisionManagerService()) && false ?: '_'}, ${($_ = isset($this->services['security.firewall.map']) ? $this->services['security.firewall.map'] : $this->getSecurity_Firewall_MapService()) && false ?: '_'}, ${($_ = isset($this->services['security.firewall']) ? $this->services['security.firewall'] : $this->getSecurity_FirewallService()) && false ?: '_'}));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector(${($_ = isset($this->services['twig.profile']) ? $this->services['twig.profile'] : ($this->services['twig.profile'] = new \Twig\Profiler\Profile())) && false ?: '_'}, ${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}));
        $instance->add($d);
        $instance->add(new \Symfony\Bundle\SwiftmailerBundle\DataCollector\MessageDataCollector($this));
        $instance->add(${($_ = isset($this->services['data_collector.dump']) ? $this->services['data_collector.dump'] : $this->getDataCollector_DumpService()) && false ?: '_'});
        $instance->add(new \PrestaShopBundle\DataCollector\HookDataCollector(${($_ = isset($this->services['prestashop.hooks_registry']) ? $this->services['prestashop.hooks_registry'] : ($this->services['prestashop.hooks_registry'] = new \PrestaShopBundle\DataCollector\HookRegistry())) && false ?: '_'}));
        $instance->add(${($_ = isset($this->services['csa_guzzle.data_collector.guzzle']) ? $this->services['csa_guzzle.data_collector.guzzle'] : $this->getCsaGuzzle_DataCollector_GuzzleService()) && false ?: '_'});
        $instance->add($e);

        return $instance;
    }

    /**
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the public 'security.authorization_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'}, ${($_ = isset($this->services['security.authentication.manager']) ? $this->services['security.authentication.manager'] : $this->getSecurity_Authentication_ManagerService()) && false ?: '_'}, ${($_ = isset($this->services['debug.security.access.decision_manager']) ? $this->services['debug.security.access.decision_manager'] : $this->getDebug_Security_Access_DecisionManagerService()) && false ?: '_'}, false);
    }

    /**
     * Gets the public 'security.csrf.token_manager' shared service.
     *
     * @return \Symfony\Component\Security\Csrf\CsrfTokenManager
     */
    protected function getSecurity_Csrf_TokenManagerService()
    {
        return $this->services['security.csrf.token_manager'] = new \Symfony\Component\Security\Csrf\CsrfTokenManager(new \Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator(), new \Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage(${($_ = isset($this->services['session']) ? $this->services['session'] : $this->getSessionService()) && false ?: '_'}), ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'});
    }

    /**
     * Gets the public 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage();
    }

    /**
     * Gets the public 'session' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Session
     */
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session\Session(${($_ = isset($this->services['session.storage.native']) ? $this->services['session.storage.native'] : $this->getSession_Storage_NativeService()) && false ?: '_'}, new \Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag(), new \Symfony\Component\HttpFoundation\Session\Flash\FlashBag());
    }

    /**
     * Gets the public 'translator' shared service.
     *
     * @return \PrestaShopBundle\Translation\DataCollectorTranslator
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \PrestaShopBundle\Translation\DataCollectorTranslator(new \Symfony\Component\Translation\LoggingTranslator(${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.translation']) ? $this->services['monolog.logger.translation'] : $this->getMonolog_Logger_TranslationService()) && false ?: '_'}));
    }

    /**
     * Gets the public 'twig' shared service.
     *
     * @return \Twig\Environment
     */
    protected function getTwigService()
    {
        $this->services['twig'] = $instance = new \Twig\Environment(${($_ = isset($this->services['twig.loader']) ? $this->services['twig.loader'] : $this->getTwig_LoaderService()) && false ?: '_'}, ['autoescape' => 'name', 'debug' => true, 'strict_variables' => true, 'form_themes' => $this->parameters['twig.form.resources'], 'paths' => [($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/Product') => 'Product', ($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm') => 'Twig', ($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters') => 'AdvancedParameters', ($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters') => 'ShopParameters', ($this->targetDirs[3].'/app/../modules') => 'Modules', ($this->targetDirs[3].'/mails/themes') => 'MailThemes'], 'exception_controller' => 'twig.controller.exception:showAction', 'cache' => ($this->targetDirs[0].'/twig'), 'charset' => 'UTF-8', 'default_path' => ($this->targetDirs[3].'/templates'), 'date' => ['format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL], 'number_format' => ['decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',']]);

        $a = ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'};
        $b = ${($_ = isset($this->services['debug.file_link_formatter']) ? $this->services['debug.file_link_formatter'] : $this->getDebug_FileLinkFormatterService()) && false ?: '_'};
        $c = ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'};
        $d = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 0);
        $d->setDisplayOptions(['fileLinkFormat' => $b]);
        $e = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 1);
        $e->setDisplayOptions(['maxStringLength' => 4096, 'fileLinkFormat' => $b]);
        $f = new \Symfony\Bridge\Twig\AppVariable();
        $f->setEnvironment('dev');
        $f->setDebug(true);
        if ($this->has('security.token_storage')) {
            $f->setTokenStorage(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'});
        }
        if ($this->has('request_stack')) {
            $f->setRequestStack($c);
        }

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension(${($_ = isset($this->services['security.logout_url_generator']) ? $this->services['security.logout_url_generator'] : $this->getSecurity_LogoutUrlGeneratorService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(${($_ = isset($this->services['security.authorization_checker']) ? $this->services['security.authorization_checker'] : $this->getSecurity_AuthorizationCheckerService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(${($_ = isset($this->services['twig.profile']) ? $this->services['twig.profile'] : ($this->services['twig.profile'] = new \Twig\Profiler\Profile())) && false ?: '_'}, $a));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['translation_tools.translation.node_visitor']) ? $this->services['translation_tools.translation.node_visitor'] : ($this->services['translation_tools.translation.node_visitor'] = new \PrestaShop\TranslationToolsBundle\Twig\NodeVisitor\TranslationNodeVisitor())) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(${($_ = isset($this->services['assets.packages']) ? $this->services['assets.packages'] : $this->getAssets_PackagesService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension($b, ($this->targetDirs[3].'/app'), 'UTF-8'));
        $instance->addExtension(${($_ = isset($this->services['twig.extension.routing']) ? $this->services['twig.extension.routing'] : $this->getTwig_Extension_RoutingService()) && false ?: '_'});
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($a, true));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension($c, ${($_ = isset($this->services['router.request_context']) ? $this->services['router.request_context'] : $this->getRouter_RequestContextService()) && false ?: '_'}));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension([0 => $this, 1 => 'twig.form.renderer']));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\DumpExtension(${($_ = isset($this->services['var_dumper.cloner']) ? $this->services['var_dumper.cloner'] : $this->getVarDumper_ClonerService()) && false ?: '_'}, $d));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.stringloader']) ? $this->services['prestashop.twig.extension.stringloader'] : ($this->services['prestashop.twig.extension.stringloader'] = new \Twig_Extension_StringLoader())) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.layout']) ? $this->services['prestashop.twig.extension.layout'] : $this->getPrestashop_Twig_Extension_LayoutService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.translation']) ? $this->services['prestashop.twig.extension.translation'] : $this->getPrestashop_Twig_Extension_TranslationService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.data_formatter']) ? $this->services['prestashop.twig.extension.data_formatter'] : ($this->services['prestashop.twig.extension.data_formatter'] = new \PrestaShopBundle\Twig\DataFormatterExtension())) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.hook']) ? $this->services['prestashop.twig.extension.hook'] : $this->getPrestashop_Twig_Extension_HookService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.bundle.twig.extension.column']) ? $this->services['prestashop.bundle.twig.extension.column'] : $this->getPrestashop_Bundle_Twig_Extension_ColumnService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.bundle.twig.extension.documentation_link_provider_extension']) ? $this->services['prestashop.bundle.twig.extension.documentation_link_provider_extension'] : $this->getPrestashop_Bundle_Twig_Extension_DocumentationLinkProviderExtensionService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.context_iso_code_provider_extension']) ? $this->services['prestashop.twig.extension.context_iso_code_provider_extension'] : $this->getPrestashop_Twig_Extension_ContextIsoCodeProviderExtensionService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['prestashop.twig.extension.path_with_back_url_extension']) ? $this->services['prestashop.twig.extension.path_with_back_url_extension'] : $this->getPrestashop_Twig_Extension_PathWithBackUrlExtensionService()) && false ?: '_'});
        $instance->addExtension(${($_ = isset($this->services['csa_guzzle.twig.extension']) ? $this->services['csa_guzzle.twig.extension'] : ($this->services['csa_guzzle.twig.extension'] = new \Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension())) && false ?: '_'});
        $instance->addExtension(new \Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension($e));
        $instance->addGlobal('app', $f);
        $instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\ServiceLocator(['Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => function () {
            return ${($_ = isset($this->services['twig.runtime.httpkernel']) ? $this->services['twig.runtime.httpkernel'] : $this->load('getTwig_Runtime_HttpkernelService.php')) && false ?: '_'};
        }, 'Symfony\\Component\\Form\\FormRenderer' => function () {
            return ${($_ = isset($this->services['twig.form.renderer']) ? $this->services['twig.form.renderer'] : $this->load('getTwig_Form_RendererService.php')) && false ?: '_'};
        }])));
        $instance->addGlobal('webpack_server', false);
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\TraceableValidator
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator\TraceableValidator(${($_ = isset($this->services['validator.builder']) ? $this->services['validator.builder'] : $this->getValidator_BuilderService()) && false ?: '_'}->getValidator());
    }

    /**
     * Gets the public 'var_dumper.cloner' shared service.
     *
     * @return \Symfony\Component\VarDumper\Cloner\VarCloner
     */
    protected function getVarDumper_ClonerService()
    {
        $this->services['var_dumper.cloner'] = $instance = new \Symfony\Component\VarDumper\Cloner\VarCloner();

        $instance->setMaxItems(2500);
        $instance->setMinDepth(1);
        $instance->setMaxString(-1);

        return $instance;
    }

    /**
     * Gets the private 'annotation_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\CachedReader(${($_ = isset($this->services['annotations.reader']) ? $this->services['annotations.reader'] : $this->getAnnotations_ReaderService()) && false ?: '_'}, ${($_ = isset($this->services['annotations.cache']) ? $this->services['annotations.cache'] : $this->load('getAnnotations_CacheService.php')) && false ?: '_'}, true);
    }

    /**
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->services['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /**
     * Gets the private 'argument_metadata_factory' shared service.
     *
     * @return \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory
     */
    protected function getArgumentMetadataFactoryService()
    {
        return $this->services['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory();
    }

    /**
     * Gets the private 'assets._version__default' shared service.
     *
     * @return \Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy
     */
    protected function getAssets_VersionDefaultService()
    {
        return $this->services['assets._version__default'] = new \Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy('1.7.6.8', '%s?%s');
    }

    /**
     * Gets the private 'assets.context' shared service.
     *
     * @return \Symfony\Component\Asset\Context\RequestStackContext
     */
    protected function getAssets_ContextService()
    {
        return $this->services['assets.context'] = new \Symfony\Component\Asset\Context\RequestStackContext(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, '', false);
    }

    /**
     * Gets the private 'assets.packages' shared service.
     *
     * @return \Symfony\Component\Asset\Packages
     */
    protected function getAssets_PackagesService()
    {
        return $this->services['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', ${($_ = isset($this->services['assets._version__default']) ? $this->services['assets._version__default'] : $this->getAssets_VersionDefaultService()) && false ?: '_'}, ${($_ = isset($this->services['assets.context']) ? $this->services['assets.context'] : $this->getAssets_ContextService()) && false ?: '_'}), []);
    }

    /**
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AnnotationsService()
    {
        return $this->services['cache.annotations'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('zjgXxX8mSM', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SerializerService()
    {
        return $this->services['cache.serializer'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('erfzXbFn3c', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorService()
    {
        return $this->services['cache.validator'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('Jb5bVUNkWK', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->getMonolog_Logger_CacheService()) && false ?: '_'}));
    }

    /**
     * Gets the private 'config_cache_factory' shared service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->services['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['dependency_injection.config.container_parameters_resource_checker']) ? $this->services['dependency_injection.config.container_parameters_resource_checker'] : ($this->services['dependency_injection.config.container_parameters_resource_checker'] = new \Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker($this))) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['config.resource.self_checking_resource_checker']) ? $this->services['config.resource.self_checking_resource_checker'] : ($this->services['config.resource.self_checking_resource_checker'] = new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker())) && false ?: '_'};
        }, 2));
    }

    /**
     * Gets the private 'controller_name_converter' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser
     */
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'});
    }

    /**
     * Gets the private 'csa_guzzle.client.addons_api' shared service.
     *
     * @return \GuzzleHttp\Client
     */
    protected function getCsaGuzzle_Client_AddonsApiService()
    {
        $this->services['csa_guzzle.client.addons_api'] = $instance = new \GuzzleHttp\Client(['base_url' => 'https://api-addons.prestashop.com', 'defaults' => ['timeout' => '5.0'], 'headers' => ['Accept' => 'application/json']]);

        (new \Csa\Bundle\GuzzleBundle\DependencyInjection\Configurator\ClientConfigurator([0 => ${($_ = isset($this->services['csa_guzzle.subscriber.stopwatch']) ? $this->services['csa_guzzle.subscriber.stopwatch'] : $this->getCsaGuzzle_Subscriber_StopwatchService()) && false ?: '_'}, 1 => ${($_ = isset($this->services['csa_guzzle.subscriber.debug']) ? $this->services['csa_guzzle.subscriber.debug'] : ($this->services['csa_guzzle.subscriber.debug'] = new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\DebugSubscriber())) && false ?: '_'}, 2 => ${($_ = isset($this->services['csa_guzzle.subscriber.cache']) ? $this->services['csa_guzzle.subscriber.cache'] : $this->getCsaGuzzle_Subscriber_CacheService()) && false ?: '_'}], NULL))->configure($instance);

        return $instance;
    }

    /**
     * Gets the private 'csa_guzzle.data_collector.guzzle' shared service.
     *
     * @return \Csa\Bundle\GuzzleBundle\DataCollector\GuzzleCollector
     */
    protected function getCsaGuzzle_DataCollector_GuzzleService()
    {
        return $this->services['csa_guzzle.data_collector.guzzle'] = new \Csa\Bundle\GuzzleBundle\DataCollector\GuzzleCollector(${($_ = isset($this->services['csa_guzzle.subscriber.debug']) ? $this->services['csa_guzzle.subscriber.debug'] : ($this->services['csa_guzzle.subscriber.debug'] = new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\DebugSubscriber())) && false ?: '_'}, 65536);
    }

    /**
     * Gets the private 'csa_guzzle.subscriber.cache' shared service.
     *
     * @return \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\CacheSubscriber
     */
    protected function getCsaGuzzle_Subscriber_CacheService()
    {
        return $this->services['csa_guzzle.subscriber.cache'] = new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\CacheSubscriber(new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Cache\DoctrineAdapter(${($_ = isset($this->services['doctrine.cache.provider']) ? $this->services['doctrine.cache.provider'] : ($this->services['doctrine.cache.provider'] = new \Doctrine\Common\Cache\FilesystemCache(($this->targetDirs[0].'/doctrine')))) && false ?: '_'}, 300));
    }

    /**
     * Gets the private 'csa_guzzle.subscriber.debug' shared service.
     *
     * @return \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\DebugSubscriber
     */
    protected function getCsaGuzzle_Subscriber_DebugService()
    {
        return $this->services['csa_guzzle.subscriber.debug'] = new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\DebugSubscriber();
    }

    /**
     * Gets the private 'csa_guzzle.subscriber.stopwatch' shared service.
     *
     * @return \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\StopwatchSubscriber
     */
    protected function getCsaGuzzle_Subscriber_StopwatchService()
    {
        return $this->services['csa_guzzle.subscriber.stopwatch'] = new \Csa\Bundle\GuzzleBundle\GuzzleHttp\Subscriber\StopwatchSubscriber(${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'});
    }

    /**
     * Gets the private 'csa_guzzle.twig.extension' shared service.
     *
     * @return \Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension
     */
    protected function getCsaGuzzle_Twig_ExtensionService()
    {
        return $this->services['csa_guzzle.twig.extension'] = new \Csa\Bundle\GuzzleBundle\Twig\Extension\GuzzleExtension();
    }

    /**
     * Gets the private 'data_collector.form' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataCollector
     */
    protected function getDataCollector_FormService()
    {
        return $this->services['data_collector.form'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataCollector(${($_ = isset($this->services['data_collector.form.extractor']) ? $this->services['data_collector.form.extractor'] : ($this->services['data_collector.form.extractor'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor())) && false ?: '_'});
    }

    /**
     * Gets the private 'data_collector.form.extractor' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor
     */
    protected function getDataCollector_Form_ExtractorService()
    {
        return $this->services['data_collector.form.extractor'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor();
    }

    /**
     * Gets the private 'data_collector.request' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector
     */
    protected function getDataCollector_RequestService()
    {
        return $this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector();
    }

    /**
     * Gets the private 'data_collector.router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector
     */
    protected function getDataCollector_RouterService()
    {
        return $this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector();
    }

    /**
     * Gets the private 'data_collector.translation' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollector\TranslationDataCollector
     */
    protected function getDataCollector_TranslationService()
    {
        return $this->services['data_collector.translation'] = new \Symfony\Component\Translation\DataCollector\TranslationDataCollector(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'debug.argument_resolver' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver
     */
    protected function getDebug_ArgumentResolverService()
    {
        return $this->services['debug.argument_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(${($_ = isset($this->services['argument_metadata_factory']) ? $this->services['argument_metadata_factory'] : ($this->services['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())) && false ?: '_'}, new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['argument_resolver.request_attribute']) ? $this->services['argument_resolver.request_attribute'] : ($this->services['argument_resolver.request_attribute'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver())) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['prestashop.filters_builder.resolver']) ? $this->services['prestashop.filters_builder.resolver'] : $this->load('getPrestashop_FiltersBuilder_ResolverService.php')) && false ?: '_'};
            yield 2 => ${($_ = isset($this->services['argument_resolver.request']) ? $this->services['argument_resolver.request'] : ($this->services['argument_resolver.request'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver())) && false ?: '_'};
            yield 3 => ${($_ = isset($this->services['argument_resolver.session']) ? $this->services['argument_resolver.session'] : ($this->services['argument_resolver.session'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver())) && false ?: '_'};
            yield 4 => ${($_ = isset($this->services['security.user_value_resolver']) ? $this->services['security.user_value_resolver'] : $this->load('getSecurity_UserValueResolverService.php')) && false ?: '_'};
            yield 5 => ${($_ = isset($this->services['argument_resolver.service']) ? $this->services['argument_resolver.service'] : $this->load('getArgumentResolver_ServiceService.php')) && false ?: '_'};
            yield 6 => ${($_ = isset($this->services['argument_resolver.default']) ? $this->services['argument_resolver.default'] : ($this->services['argument_resolver.default'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver())) && false ?: '_'};
            yield 7 => ${($_ = isset($this->services['argument_resolver.variadic']) ? $this->services['argument_resolver.variadic'] : ($this->services['argument_resolver.variadic'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver())) && false ?: '_'};
        }, 8)), ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'});
    }

    /**
     * Gets the private 'debug.controller_resolver' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver
     */
    protected function getDebug_ControllerResolverService()
    {
        return $this->services['debug.controller_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ${($_ = isset($this->services['controller_name_converter']) ? $this->services['controller_name_converter'] : ($this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}))) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.request']) ? $this->services['monolog.logger.request'] : $this->getMonolog_Logger_RequestService()) && false ?: '_'}), ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'}, ${($_ = isset($this->services['debug.argument_resolver']) ? $this->services['debug.argument_resolver'] : $this->getDebug_ArgumentResolverService()) && false ?: '_'});
    }

    /**
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->services['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, ${($_ = isset($this->services['monolog.logger.php']) ? $this->services['monolog.logger.php'] : $this->getMonolog_Logger_PhpService()) && false ?: '_'}, -1, -1, true, ${($_ = isset($this->services['debug.file_link_formatter']) ? $this->services['debug.file_link_formatter'] : $this->getDebug_FileLinkFormatterService()) && false ?: '_'}, true);
    }

    /**
     * Gets the private 'debug.event_dispatcher' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher
     */
    protected function getDebug_EventDispatcherService()
    {
        $this->services['debug.event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this), ${($_ = isset($this->services['debug.stopwatch']) ? $this->services['debug.stopwatch'] : ($this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.event']) ? $this->services['monolog.logger.event'] : $this->getMonolog_Logger_EventService()) && false ?: '_'});

        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['data_collector.router']) ? $this->services['data_collector.router'] : ($this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector())) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['prestashop.user_locale.listener']) ? $this->services['prestashop.user_locale.listener'] : $this->getPrestashop_UserLocale_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 15);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['prestashop.tokenized_url_listener']) ? $this->services['prestashop.tokenized_url_listener'] : $this->getPrestashop_TokenizedUrlListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['prestashop.legacy_url_listener']) ? $this->services['prestashop.legacy_url_listener'] : $this->getPrestashop_LegacyUrlListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 40);
        $instance->addListener('console.command', [0 => function () {
            return ${($_ = isset($this->services['prestashop.multishop_command_listener']) ? $this->services['prestashop.multishop_command_listener'] : $this->load('getPrestashop_MultishopCommandListenerService.php')) && false ?: '_'};
        }, 1 => 'onConsoleCommand'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['prestashop.access_denied.listener']) ? $this->services['prestashop.access_denied.listener'] : $this->load('getPrestashop_AccessDenied_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['prestashop.demo_mode_enabled.listener']) ? $this->services['prestashop.demo_mode_enabled.listener'] : $this->getPrestashop_DemoModeEnabled_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['prestashop.module_activated.listener']) ? $this->services['prestashop.module_activated.listener'] : $this->getPrestashop_ModuleActivated_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('prestashop.search_criteria.filter', [0 => function () {
            return ${($_ = isset($this->services['prestashop.bundle.event_listener.filter_category_search_criteria']) ? $this->services['prestashop.bundle.event_listener.filter_category_search_criteria'] : $this->load('getPrestashop_Bundle_EventListener_FilterCategorySearchCriteriaService.php')) && false ?: '_'};
        }, 1 => 'onFilterSearchCriteria'], 0);
        $instance->addListener('prestashop.search_criteria.filter', [0 => function () {
            return ${($_ = isset($this->services['prestashop.bundle.event_listener.filter_cms_page_category_search_criteria']) ? $this->services['prestashop.bundle.event_listener.filter_cms_page_category_search_criteria'] : $this->load('getPrestashop_Bundle_EventListener_FilterCmsPageCategorySearchCriteriaService.php')) && false ?: '_'};
        }, 1 => 'onFilterSearchCriteria'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['prestashop.bundle.event_listener.back_url_redirect_response_listener']) ? $this->services['prestashop.bundle.event_listener.back_url_redirect_response_listener'] : $this->getPrestashop_Bundle_EventListener_BackUrlRedirectResponseListenerService()) && false ?: '_'};
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['prestashop.adapter.security.admin']) ? $this->services['prestashop.adapter.security.admin'] : $this->getPrestashop_Adapter_Security_AdminService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['prestashop.adapter.middleware.ssl']) ? $this->services['prestashop.adapter.middleware.ssl'] : ($this->services['prestashop.adapter.middleware.ssl'] = new \PrestaShop\PrestaShop\Adapter\Security\SslMiddleware())) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['response_listener']) ? $this->services['response_listener'] : ($this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8'))) && false ?: '_'};
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['streamed_response_listener']) ? $this->services['streamed_response_listener'] : ($this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener())) && false ?: '_'};
        }, 1 => 'onKernelResponse'], -1024);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['locale_listener']) ? $this->services['locale_listener'] : $this->getLocaleListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ${($_ = isset($this->services['locale_listener']) ? $this->services['locale_listener'] : $this->getLocaleListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['validate_request_listener']) ? $this->services['validate_request_listener'] : ($this->services['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener())) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 256);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['resolve_controller_name_subscriber']) ? $this->services['resolve_controller_name_subscriber'] : $this->getResolveControllerNameSubscriberService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 24);
        $instance->addListener('console.error', [0 => function () {
            return ${($_ = isset($this->services['console.error_listener']) ? $this->services['console.error_listener'] : $this->load('getConsole_ErrorListenerService.php')) && false ?: '_'};
        }, 1 => 'onConsoleError'], -128);
        $instance->addListener('console.terminate', [0 => function () {
            return ${($_ = isset($this->services['console.error_listener']) ? $this->services['console.error_listener'] : $this->load('getConsole_ErrorListenerService.php')) && false ?: '_'};
        }, 1 => 'onConsoleTerminate'], -128);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['session_listener']) ? $this->services['session_listener'] : $this->getSessionListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 128);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['session_listener']) ? $this->services['session_listener'] : $this->getSessionListenerService()) && false ?: '_'};
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ${($_ = isset($this->services['session_listener']) ? $this->services['session_listener'] : $this->getSessionListenerService()) && false ?: '_'};
        }, 1 => 'onFinishRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['session.save_listener']) ? $this->services['session.save_listener'] : ($this->services['session.save_listener'] = new \Symfony\Component\HttpKernel\EventListener\SaveSessionListener())) && false ?: '_'};
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['fragment.listener']) ? $this->services['fragment.listener'] : $this->getFragment_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 48);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['translator_listener']) ? $this->services['translator_listener'] : $this->getTranslatorListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 10);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ${($_ = isset($this->services['translator_listener']) ? $this->services['translator_listener'] : $this->getTranslatorListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['profiler_listener']) ? $this->services['profiler_listener'] : $this->getProfilerListenerService()) && false ?: '_'};
        }, 1 => 'onKernelResponse'], -100);
        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['profiler_listener']) ? $this->services['profiler_listener'] : $this->getProfilerListenerService()) && false ?: '_'};
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ${($_ = isset($this->services['profiler_listener']) ? $this->services['profiler_listener'] : $this->getProfilerListenerService()) && false ?: '_'};
        }, 1 => 'onKernelTerminate'], -1024);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['data_collector.request']) ? $this->services['data_collector.request'] : ($this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector())) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['data_collector.request']) ? $this->services['data_collector.request'] : ($this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector())) && false ?: '_'};
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['debug.debug_handlers_listener']) ? $this->services['debug.debug_handlers_listener'] : $this->getDebug_DebugHandlersListenerService()) && false ?: '_'};
        }, 1 => 'configure'], 2048);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['router_listener']) ? $this->services['router_listener'] : $this->getRouterListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ${($_ = isset($this->services['router_listener']) ? $this->services['router_listener'] : $this->getRouterListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['router_listener']) ? $this->services['router_listener'] : $this->getRouterListenerService()) && false ?: '_'};
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['security.rememberme.response_listener']) ? $this->services['security.rememberme.response_listener'] : ($this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener())) && false ?: '_'};
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['security.firewall']) ? $this->services['security.firewall'] : $this->getSecurity_FirewallService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 8);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ${($_ = isset($this->services['security.firewall']) ? $this->services['security.firewall'] : $this->getSecurity_FirewallService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['twig.exception_listener']) ? $this->services['twig.exception_listener'] : $this->load('getTwig_ExceptionListenerService.php')) && false ?: '_'};
        }, 1 => 'onKernelException'], -128);
        $instance->addListener('console.command', [0 => function () {
            return ${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'};
        }, 1 => 'onCommand'], 255);
        $instance->addListener('console.terminate', [0 => function () {
            return ${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'};
        }, 1 => 'onTerminate'], -255);
        $instance->addListener('console.command', [0 => function () {
            return ${($_ = isset($this->services['monolog.handler.console_very_verbose']) ? $this->services['monolog.handler.console_very_verbose'] : $this->getMonolog_Handler_ConsoleVeryVerboseService()) && false ?: '_'};
        }, 1 => 'onCommand'], 255);
        $instance->addListener('console.terminate', [0 => function () {
            return ${($_ = isset($this->services['monolog.handler.console_very_verbose']) ? $this->services['monolog.handler.console_very_verbose'] : $this->getMonolog_Handler_ConsoleVeryVerboseService()) && false ?: '_'};
        }, 1 => 'onTerminate'], -255);
        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load('getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load('getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('console.error', [0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load('getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onException'], 0);
        $instance->addListener('console.terminate', [0 => function () {
            return ${($_ = isset($this->services['swiftmailer.email_sender.listener']) ? $this->services['swiftmailer.email_sender.listener'] : $this->load('getSwiftmailer_EmailSender_ListenerService.php')) && false ?: '_'};
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.controller.listener']) ? $this->services['sensio_framework_extra.controller.listener'] : $this->getSensioFrameworkExtra_Controller_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.converter.listener']) ? $this->services['sensio_framework_extra.converter.listener'] : $this->getSensioFrameworkExtra_Converter_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.view.listener']) ? $this->services['sensio_framework_extra.view.listener'] : $this->getSensioFrameworkExtra_View_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelController'], -128);
        $instance->addListener('kernel.view', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.view.listener']) ? $this->services['sensio_framework_extra.view.listener'] : $this->getSensioFrameworkExtra_View_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelView'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.cache.listener']) ? $this->services['sensio_framework_extra.cache.listener'] : ($this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener())) && false ?: '_'};
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.cache.listener']) ? $this->services['sensio_framework_extra.cache.listener'] : ($this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener())) && false ?: '_'};
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ${($_ = isset($this->services['sensio_framework_extra.security.listener']) ? $this->services['sensio_framework_extra.security.listener'] : $this->getSensioFrameworkExtra_Security_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ${($_ = isset($this->services['framework_extra_bundle.event.is_granted']) ? $this->services['framework_extra_bundle.event.is_granted'] : $this->getFrameworkExtraBundle_Event_IsGrantedService()) && false ?: '_'};
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ${($_ = isset($this->services['prestashop.dispatcher.legacy_hooks.subscriber']) ? $this->services['prestashop.dispatcher.legacy_hooks.subscriber'] : $this->getPrestashop_Dispatcher_LegacyHooks_SubscriberService()) && false ?: '_'};
        }, 1 => 'callActionDispatcherBeforeHook'], 100);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['prestashop.dispatcher.legacy_hooks.subscriber']) ? $this->services['prestashop.dispatcher.legacy_hooks.subscriber'] : $this->getPrestashop_Dispatcher_LegacyHooks_SubscriberService()) && false ?: '_'};
        }, 1 => 'callActionDispatcherAfterHook'], 255);
        $instance->addListener('module.install', [0 => function () {
            return ${($_ = isset($this->services['prestashop.bundle.event_listener.module_guard_listener']) ? $this->services['prestashop.bundle.event_listener.module_guard_listener'] : $this->load('getPrestashop_Bundle_EventListener_ModuleGuardListenerService.php')) && false ?: '_'};
        }, 1 => 'protectModule'], 0);
        $instance->addListener('module.upgrade', [0 => function () {
            return ${($_ = isset($this->services['prestashop.bundle.event_listener.module_guard_listener']) ? $this->services['prestashop.bundle.event_listener.module_guard_listener'] : $this->load('getPrestashop_Bundle_EventListener_ModuleGuardListenerService.php')) && false ?: '_'};
        }, 1 => 'protectModule'], 0);
        $instance->addListener('module.enable', [0 => function () {
            return ${($_ = isset($this->services['prestashop.bundle.event_listener.module_guard_listener']) ? $this->services['prestashop.bundle.event_listener.module_guard_listener'] : $this->load('getPrestashop_Bundle_EventListener_ModuleGuardListenerService.php')) && false ?: '_'};
        }, 1 => 'protectModule'], 0);
        $instance->addListener('module.install', [0 => function () {
            return ${($_ = isset($this->services['prestashop.adapter.module.tab.eventsubscriber']) ? $this->services['prestashop.adapter.module.tab.eventsubscriber'] : $this->load('getPrestashop_Adapter_Module_Tab_EventsubscriberService.php')) && false ?: '_'};
        }, 1 => 'onModuleInstall'], 0);
        $instance->addListener('module.uninstall', [0 => function () {
            return ${($_ = isset($this->services['prestashop.adapter.module.tab.eventsubscriber']) ? $this->services['prestashop.adapter.module.tab.eventsubscriber'] : $this->load('getPrestashop_Adapter_Module_Tab_EventsubscriberService.php')) && false ?: '_'};
        }, 1 => 'onModuleUninstall'], 0);
        $instance->addListener('module.download', [0 => function () {
            return ${($_ = isset($this->services['prestashop.adapter.module.prestatrust.eventsubscriber']) ? $this->services['prestashop.adapter.module.prestatrust.eventsubscriber'] : $this->load('getPrestashop_Adapter_Module_Prestatrust_EventsubscriberService.php')) && false ?: '_'};
        }, 1 => 'onNewModule'], 0);
        $instance->addListener('console.command', [0 => function () {
            return ${($_ = isset($this->services['debug.dump_listener']) ? $this->services['debug.dump_listener'] : $this->load('getDebug_DumpListenerService.php')) && false ?: '_'};
        }, 1 => 'configure'], 1024);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['web_profiler.debug_toolbar']) ? $this->services['web_profiler.debug_toolbar'] : $this->getWebProfiler_DebugToolbarService()) && false ?: '_'};
        }, 1 => 'onKernelResponse'], -128);

        return $instance;
    }

    /**
     * Gets the private 'debug.file_link_formatter' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\FileLinkFormatter
     */
    protected function getDebug_FileLinkFormatterService()
    {
        return $this->services['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, $this->targetDirs[3], function () {
            return ${($_ = isset($this->services['debug.file_link_formatter.url_format']) ? $this->services['debug.file_link_formatter.url_format'] : $this->load('getDebug_FileLinkFormatter_UrlFormatService.php')) && false ?: '_'};
        });
    }

    /**
     * Gets the private 'debug.log_processor' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Processor\DebugProcessor
     */
    protected function getDebug_LogProcessorService()
    {
        return $this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor();
    }

    /**
     * Gets the private 'debug.security.access.decision_manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager
     */
    protected function getDebug_Security_Access_DecisionManagerService()
    {
        return $this->services['debug.security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['security.access.authenticated_voter']) ? $this->services['security.access.authenticated_voter'] : $this->load('getSecurity_Access_AuthenticatedVoterService.php')) && false ?: '_'};
            yield 1 => ${($_ = isset($this->services['security.access.simple_role_voter']) ? $this->services['security.access.simple_role_voter'] : ($this->services['security.access.simple_role_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\RoleVoter())) && false ?: '_'};
            yield 2 => ${($_ = isset($this->services['security.access.expression_voter']) ? $this->services['security.access.expression_voter'] : $this->load('getSecurity_Access_ExpressionVoterService.php')) && false ?: '_'};
            yield 3 => ${($_ = isset($this->services['prestashop.security.voter.product']) ? $this->services['prestashop.security.voter.product'] : ($this->services['prestashop.security.voter.product'] = new \PrestaShopBundle\Security\Voter\PageVoter())) && false ?: '_'};
        }, 4), 'affirmative', false, true));
    }

    /**
     * Gets the private 'debug.stopwatch' shared service.
     *
     * @return \Symfony\Component\Stopwatch\Stopwatch
     */
    protected function getDebug_StopwatchService()
    {
        return $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true);
    }

    /**
     * Gets the private 'doctrine.dbal.connection_factory' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ConnectionFactory
     */
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]);
    }

    /**
     * Gets the private 'doctrine.dbal.logger.profiling.default' shared service.
     *
     * @return \Doctrine\DBAL\Logging\DebugStack
     */
    protected function getDoctrine_Dbal_Logger_Profiling_DefaultService()
    {
        return $this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack();
    }

    /**
     * Gets the private 'doctrine.orm.default_entity_listener_resolver' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver
     */
    protected function getDoctrine_Orm_DefaultEntityListenerResolverService()
    {
        return $this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this);
    }

    /**
     * Gets the private 'doctrine.orm.default_listeners.attach_entity_listeners' shared service.
     *
     * @return \Doctrine\ORM\Tools\AttachEntityListenersListener
     */
    protected function getDoctrine_Orm_DefaultListeners_AttachEntityListenersService()
    {
        return $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener();
    }

    /**
     * Gets the private 'doctrine.orm.default_manager_configurator' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator
     */
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []);
    }

    /**
     * Gets the private 'doctrine.orm.validator_initializer' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer
     */
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'});
    }

    /**
     * Gets the private 'file_locator' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Config\FileLocator
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}, ($this->targetDirs[3].'/app/Resources'), [0 => ($this->targetDirs[3].'/app')]);
    }

    /**
     * Gets the private 'fragment.listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\FragmentListener
     */
    protected function getFragment_ListenerService()
    {
        return $this->services['fragment.listener'] = new \Symfony\Component\HttpKernel\EventListener\FragmentListener(${($_ = isset($this->services['uri_signer']) ? $this->services['uri_signer'] : ($this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('25foVuOe9IE6IfUpL34UIxaDVHNiN50o9hggvdXdyItAnvWH3848XLEI'))) && false ?: '_'}, '/_fragment');
    }

    /**
     * Gets the private 'framework_extra_bundle.argument_name_convertor' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter
     */
    protected function getFrameworkExtraBundle_ArgumentNameConvertorService()
    {
        return $this->services['framework_extra_bundle.argument_name_convertor'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter(${($_ = isset($this->services['argument_metadata_factory']) ? $this->services['argument_metadata_factory'] : ($this->services['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())) && false ?: '_'});
    }

    /**
     * Gets the private 'framework_extra_bundle.event.is_granted' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener
     */
    protected function getFrameworkExtraBundle_Event_IsGrantedService()
    {
        return $this->services['framework_extra_bundle.event.is_granted'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener(${($_ = isset($this->services['framework_extra_bundle.argument_name_convertor']) ? $this->services['framework_extra_bundle.argument_name_convertor'] : $this->getFrameworkExtraBundle_ArgumentNameConvertorService()) && false ?: '_'}, ${($_ = isset($this->services['security.authorization_checker']) ? $this->services['security.authorization_checker'] : $this->getSecurity_AuthorizationCheckerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->services['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, 'en-US', ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'});
    }

    /**
     * Gets the private 'logger' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['prestashop.handler.log']) ? $this->services['prestashop.handler.log'] : ($this->services['prestashop.handler.log'] = new \PrestaShopBundle\Service\Log\LogHandler($this))) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.handler.console' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler
     */
    protected function getMonolog_Handler_ConsoleService()
    {
        $this->services['monolog.handler.console'] = $instance = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, false, [64 => 200, 128 => 100, 16 => 400, 32 => 300, 256 => 100]);

        $instance->pushProcessor(${($_ = isset($this->services['monolog.processor.psr_log_message']) ? $this->services['monolog.processor.psr_log_message'] : ($this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor())) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.handler.console_very_verbose' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler
     */
    protected function getMonolog_Handler_ConsoleVeryVerboseService()
    {
        $this->services['monolog.handler.console_very_verbose'] = $instance = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, false, [64 => 250, 128 => 250, 256 => 100, 16 => 400, 32 => 300]);

        $instance->pushProcessor(${($_ = isset($this->services['monolog.processor.psr_log_message']) ? $this->services['monolog.processor.psr_log_message'] : ($this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor())) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $this->services['monolog.handler.main'] = $instance = new \Monolog\Handler\StreamHandler($this->getEnv('PS_LOG_OUTPUT'), 100, true, NULL);

        $instance->pushProcessor(${($_ = isset($this->services['monolog.processor.psr_log_message']) ? $this->services['monolog.processor.psr_log_message'] : ($this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor())) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.cache' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->services['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.doctrine' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console_very_verbose']) ? $this->services['monolog.handler.console_very_verbose'] : $this->getMonolog_Handler_ConsoleVeryVerboseService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.event' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_EventService()
    {
        $this->services['monolog.logger.event'] = $instance = new \Symfony\Bridge\Monolog\Logger('event');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.php' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_PhpService()
    {
        $this->services['monolog.logger.php'] = $instance = new \Symfony\Bridge\Monolog\Logger('php');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.profiler' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_ProfilerService()
    {
        $this->services['monolog.logger.profiler'] = $instance = new \Symfony\Bridge\Monolog\Logger('profiler');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.request' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.translation' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_TranslationService()
    {
        $this->services['monolog.logger.translation'] = $instance = new \Symfony\Bridge\Monolog\Logger('translation');

        $instance->pushProcessor(${($_ = isset($this->services['debug.log_processor']) ? $this->services['debug.log_processor'] : ($this->services['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor())) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.console']) ? $this->services['monolog.handler.console'] : $this->getMonolog_Handler_ConsoleService()) && false ?: '_'});
        $instance->pushHandler(${($_ = isset($this->services['monolog.handler.main']) ? $this->services['monolog.handler.main'] : $this->getMonolog_Handler_MainService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'monolog.processor.psr_log_message' shared service.
     *
     * @return \Monolog\Processor\PsrLogMessageProcessor
     */
    protected function getMonolog_Processor_PsrLogMessageService()
    {
        return $this->services['monolog.processor.psr_log_message'] = new \Monolog\Processor\PsrLogMessageProcessor();
    }

    /**
     * Gets the private 'prestashop.bundle.routing.converter.cache_provider' shared service.
     *
     * @return \PrestaShopBundle\Routing\Converter\CacheProvider
     */
    protected function getPrestashop_Bundle_Routing_Converter_CacheProviderService()
    {
        return $this->services['prestashop.bundle.routing.converter.cache_provider'] = new \PrestaShopBundle\Routing\Converter\CacheProvider(${($_ = isset($this->services['prestashop.bundle.routing.converter.router_provider']) ? $this->services['prestashop.bundle.routing.converter.router_provider'] : $this->getPrestashop_Bundle_Routing_Converter_RouterProviderService()) && false ?: '_'}, ${($_ = isset($this->services['cache.app']) ? $this->services['cache.app'] : $this->getCache_AppService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.bundle.routing.converter.routing_cache_key_generator']) ? $this->services['prestashop.bundle.routing.converter.routing_cache_key_generator'] : $this->getPrestashop_Bundle_Routing_Converter_RoutingCacheKeyGeneratorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'prestashop.bundle.routing.converter.router_provider' shared service.
     *
     * @return \PrestaShopBundle\Routing\Converter\RouterProvider
     */
    protected function getPrestashop_Bundle_Routing_Converter_RouterProviderService()
    {
        return $this->services['prestashop.bundle.routing.converter.router_provider'] = new \PrestaShopBundle\Routing\Converter\RouterProvider(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'});
    }

    /**
     * Gets the private 'prestashop.bundle.routing.converter.routing_cache_key_generator' shared service.
     *
     * @return \PrestaShopBundle\Routing\Converter\RoutingCacheKeyGenerator
     */
    protected function getPrestashop_Bundle_Routing_Converter_RoutingCacheKeyGeneratorService()
    {
        return $this->services['prestashop.bundle.routing.converter.routing_cache_key_generator'] = new \PrestaShopBundle\Routing\Converter\RoutingCacheKeyGenerator([0 => ($this->targetDirs[3].'/src/PrestaShopBundle/Resources/config/routing/admin')], ${($_ = isset($this->services['prestashop.module_kernel.repository']) ? $this->services['prestashop.module_kernel.repository'] : $this->load('getPrestashop_ModuleKernel_RepositoryService.php')) && false ?: '_'}->getActiveModulesPaths(), 'dev');
    }

    /**
     * Gets the private 'profiler_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener
     */
    protected function getProfilerListenerService()
    {
        return $this->services['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener(${($_ = isset($this->services['profiler']) ? $this->services['profiler'] : $this->getProfilerService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, NULL, false, false);
    }

    /**
     * Gets the private 'resolve_controller_name_subscriber' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber
     */
    protected function getResolveControllerNameSubscriberService()
    {
        return $this->services['resolve_controller_name_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber(${($_ = isset($this->services['controller_name_converter']) ? $this->services['controller_name_converter'] : ($this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}))) && false ?: '_'});
    }

    /**
     * Gets the private 'response_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener
     */
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        return $this->services['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, ${($_ = isset($this->services['router.request_context']) ? $this->services['router.request_context'] : $this->getRouter_RequestContextService()) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.request']) ? $this->services['monolog.logger.request'] : $this->getMonolog_Logger_RequestService()) && false ?: '_'}, $this->targetDirs[3], true);
    }

    /**
     * Gets the private 'security.authentication.manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->services['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(new RewindableGenerator(function () {
            yield 0 => ${($_ = isset($this->services['security.authentication.provider.anonymous.main']) ? $this->services['security.authentication.provider.anonymous.main'] : ($this->services['security.authentication.provider.anonymous.main'] = new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider($this->getParameter('container.build_hash')))) && false ?: '_'};
        }, 1), true);

        $instance->setEventDispatcher(${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'security.authentication.trust_resolver' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver
     */
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }

    /**
     * Gets the private 'security.firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener
     */
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener(${($_ = isset($this->services['security.firewall.map']) ? $this->services['security.firewall.map'] : $this->getSecurity_Firewall_MapService()) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['security.logout_url_generator']) ? $this->services['security.logout_url_generator'] : $this->getSecurity_LogoutUrlGeneratorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'security.firewall.map' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallMap
     */
    protected function getSecurity_Firewall_MapService()
    {
        return $this->services['security.firewall.map'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallMap(new \Symfony\Component\DependencyInjection\ServiceLocator(['security.firewall.map.context.dev' => function () {
            return ${($_ = isset($this->services['security.firewall.map.context.dev']) ? $this->services['security.firewall.map.context.dev'] : $this->load('getSecurity_Firewall_Map_Context_DevService.php')) && false ?: '_'};
        }, 'security.firewall.map.context.main' => function () {
            return ${($_ = isset($this->services['security.firewall.map.context.main']) ? $this->services['security.firewall.map.context.main'] : $this->load('getSecurity_Firewall_Map_Context_MainService.php')) && false ?: '_'};
        }]), new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ${($_ = isset($this->services['security.request_matcher.zfhj2lw']) ? $this->services['security.request_matcher.zfhj2lw'] : ($this->services['security.request_matcher.zfhj2lw'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/(_(profiler|wdt)|css|images|js)/'))) && false ?: '_'};
            yield 'security.firewall.map.context.main' => NULL;
        }, 2));
    }

    /**
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        return $this->services['security.logout_url_generator'] = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator(${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'}, ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, ${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'});
    }

    /**
     * Gets the private 'security.rememberme.response_listener' shared service.
     *
     * @return \Symfony\Component\Security\Http\RememberMe\ResponseListener
     */
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener();
    }

    /**
     * Gets the private 'security.role_hierarchy' shared service.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]);
    }

    /**
     * Gets the private 'sensio_framework_extra.cache.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener
     */
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener();
    }

    /**
     * Gets the private 'sensio_framework_extra.controller.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener(${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'});
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener(${($_ = isset($this->services['sensio_framework_extra.converter.manager']) ? $this->services['sensio_framework_extra.converter.manager'] : $this->getSensioFrameworkExtra_Converter_ManagerService()) && false ?: '_'}, true);
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.manager' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager
     */
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();

        $instance->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter(${($_ = isset($this->services['doctrine']) ? $this->services['doctrine'] : $this->getDoctrineService()) && false ?: '_'}, new \Symfony\Component\ExpressionLanguage\ExpressionLanguage()), 0, 'doctrine.orm');
        $instance->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter(), 0, 'datetime');

        return $instance;
    }

    /**
     * Gets the private 'sensio_framework_extra.security.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->services['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(${($_ = isset($this->services['framework_extra_bundle.argument_name_convertor']) ? $this->services['framework_extra_bundle.argument_name_convertor'] : $this->getFrameworkExtraBundle_ArgumentNameConvertorService()) && false ?: '_'}, new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage(), ${($_ = isset($this->services['security.authentication.trust_resolver']) ? $this->services['security.authentication.trust_resolver'] : ($this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken'))) && false ?: '_'}, ${($_ = isset($this->services['security.role_hierarchy']) ? $this->services['security.role_hierarchy'] : ($this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]))) && false ?: '_'}, ${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'}, ${($_ = isset($this->services['security.authorization_checker']) ? $this->services['security.authorization_checker'] : $this->getSecurity_AuthorizationCheckerService()) && false ?: '_'}, ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'sensio_framework_extra.view.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener(new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}), ${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'});
    }

    /**
     * Gets the private 'service_locator.sr6ctxe' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function getServiceLocator_Sr6ctxeService()
    {
        return $this->services['service_locator.sr6ctxe'] = new \Symfony\Component\DependencyInjection\ServiceLocator([]);
    }

    /**
     * Gets the private 'session.save_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SaveSessionListener
     */
    protected function getSession_SaveListenerService()
    {
        return $this->services['session.save_listener'] = new \Symfony\Component\HttpKernel\EventListener\SaveSessionListener();
    }

    /**
     * Gets the private 'session.storage.metadata_bag' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag
     */
    protected function getSession_Storage_MetadataBagService()
    {
        return $this->services['session.storage.metadata_bag'] = new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', '0');
    }

    /**
     * Gets the private 'session.storage.native' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
     */
    protected function getSession_Storage_NativeService()
    {
        return $this->services['session.storage.native'] = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage($this->parameters['session.storage.options'], NULL, ${($_ = isset($this->services['session.storage.metadata_bag']) ? $this->services['session.storage.metadata_bag'] : ($this->services['session.storage.metadata_bag'] = new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', '0'))) && false ?: '_'});
    }

    /**
     * Gets the private 'session_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\ServiceLocator(['session' => function () {
            return ${($_ = isset($this->services['session']) ? $this->services['session'] : $this->getSessionService()) && false ?: '_'};
        }]));
    }

    /**
     * Gets the private 'streamed_response_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener
     */
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }

    /**
     * Gets the private 'templating.locator' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator
     */
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator(${($_ = isset($this->services['file_locator']) ? $this->services['file_locator'] : ($this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}, ($this->targetDirs[3].'/app/Resources'), [0 => ($this->targetDirs[3].'/app')]))) && false ?: '_'}, $this->targetDirs[0]);
    }

    /**
     * Gets the private 'templating.name_parser' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser
     */
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'});
    }

    /**
     * Gets the private 'translation_tools.translation.node_visitor' shared service.
     *
     * @return \PrestaShop\TranslationToolsBundle\Twig\NodeVisitor\TranslationNodeVisitor
     */
    protected function getTranslationTools_Translation_NodeVisitorService()
    {
        return $this->services['translation_tools.translation.node_visitor'] = new \PrestaShop\TranslationToolsBundle\Twig\NodeVisitor\TranslationNodeVisitor();
    }

    /**
     * Gets the private 'translator.default' shared service.
     *
     * @return \PrestaShopBundle\Translation\Translator
     */
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \PrestaShopBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\ServiceLocator(['prestashop.translation.database_loader' => function () {
            return ${($_ = isset($this->services['prestashop.translation.database_loader']) ? $this->services['prestashop.translation.database_loader'] : $this->load('getPrestashop_Translation_DatabaseLoaderService.php')) && false ?: '_'};
        }, 'prestashop.translation.legacy_file_loader' => function () {
            return ${($_ = isset($this->services['prestashop.translation.legacy_file_loader']) ? $this->services['prestashop.translation.legacy_file_loader'] : $this->load('getPrestashop_Translation_LegacyFileLoaderService.php')) && false ?: '_'};
        }, 'prestashop.translation.sql_loader' => function () {
            return ${($_ = isset($this->services['prestashop.translation.sql_loader']) ? $this->services['prestashop.translation.sql_loader'] : ($this->services['prestashop.translation.sql_loader'] = new \PrestaShopBundle\Translation\Loader\SqlTranslationLoader())) && false ?: '_'};
        }, 'translation.loader.csv' => function () {
            return ${($_ = isset($this->services['translation.loader.csv']) ? $this->services['translation.loader.csv'] : ($this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader())) && false ?: '_'};
        }, 'translation.loader.dat' => function () {
            return ${($_ = isset($this->services['translation.loader.dat']) ? $this->services['translation.loader.dat'] : ($this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader())) && false ?: '_'};
        }, 'translation.loader.ini' => function () {
            return ${($_ = isset($this->services['translation.loader.ini']) ? $this->services['translation.loader.ini'] : ($this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader())) && false ?: '_'};
        }, 'translation.loader.json' => function () {
            return ${($_ = isset($this->services['translation.loader.json']) ? $this->services['translation.loader.json'] : ($this->services['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader())) && false ?: '_'};
        }, 'translation.loader.mo' => function () {
            return ${($_ = isset($this->services['translation.loader.mo']) ? $this->services['translation.loader.mo'] : ($this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader())) && false ?: '_'};
        }, 'translation.loader.php' => function () {
            return ${($_ = isset($this->services['translation.loader.php']) ? $this->services['translation.loader.php'] : ($this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader())) && false ?: '_'};
        }, 'translation.loader.po' => function () {
            return ${($_ = isset($this->services['translation.loader.po']) ? $this->services['translation.loader.po'] : ($this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader())) && false ?: '_'};
        }, 'translation.loader.qt' => function () {
            return ${($_ = isset($this->services['translation.loader.qt']) ? $this->services['translation.loader.qt'] : ($this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader())) && false ?: '_'};
        }, 'translation.loader.res' => function () {
            return ${($_ = isset($this->services['translation.loader.res']) ? $this->services['translation.loader.res'] : ($this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader())) && false ?: '_'};
        }, 'translation.loader.xliff' => function () {
            return ${($_ = isset($this->services['translation.loader.xliff']) ? $this->services['translation.loader.xliff'] : ($this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader())) && false ?: '_'};
        }, 'translation.loader.yml' => function () {
            return ${($_ = isset($this->services['translation.loader.yml']) ? $this->services['translation.loader.yml'] : ($this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader())) && false ?: '_'};
        }]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\MessageSelector()), 'en-US', ['translation.loader.php' => [0 => 'php'], 'translation.loader.yml' => [0 => 'yaml', 1 => 'yml'], 'translation.loader.xliff' => [0 => 'xlf', 1 => 'xliff'], 'translation.loader.po' => [0 => 'po'], 'translation.loader.mo' => [0 => 'mo'], 'translation.loader.qt' => [0 => 'ts'], 'translation.loader.csv' => [0 => 'csv'], 'translation.loader.res' => [0 => 'res'], 'translation.loader.dat' => [0 => 'dat'], 'translation.loader.ini' => [0 => 'ini'], 'translation.loader.json' => [0 => 'json'], 'prestashop.translation.database_loader' => [0 => 'db'], 'prestashop.translation.sql_loader' => [0 => 'db'], 'prestashop.translation.legacy_file_loader' => [0 => 'legacy_files']], ['cache_dir' => ($this->targetDirs[0].'/translations'), 'debug' => true, 'resource_files' => ['af' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.af.xlf')], 'ar' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ar.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ar.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ar.xlf')], 'az' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.az.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.az.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.az.xlf')], 'bg' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bg.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bg.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.bg.xlf')], 'ca' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ca.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ca.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ca.xlf')], 'cs' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cs.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.cs.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.cs.xlf')], 'cy' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cy.xlf')], 'da' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.da.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.da.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.da.xlf')], 'de' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.de.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.de.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.de.xlf')], 'el' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.el.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.el.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.el.xlf')], 'en' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.en.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.en.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.en.xlf')], 'es' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.es.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.es.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.es.xlf')], 'et' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.et.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.et.xlf')], 'eu' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.eu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.eu.xlf')], 'fa' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fa.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fa.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fa.xlf')], 'fi' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fi.xlf')], 'fr' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fr.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.fr.xlf')], 'gl' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.gl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.gl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.gl.xlf')], 'he' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.he.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.he.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.he.xlf')], 'hr' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hr.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.hr.xlf')], 'hu' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hu.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.hu.xlf')], 'hy' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hy.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hy.xlf')], 'id' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.id.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.id.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.id.xlf')], 'it' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.it.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.it.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.it.xlf')], 'ja' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ja.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ja.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ja.xlf')], 'lb' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lb.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lb.xlf')], 'lt' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lt.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lt.xlf')], 'lv' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lv.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.lv.xlf')], 'mn' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.mn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.mn.xlf')], 'nb' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nb.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nb.xlf')], 'nl' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nl.xlf')], 'nn' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nn.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.nn.xlf')], 'no' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.no.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.no.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.no.xlf')], 'pl' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pl.xlf')], 'pt' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt.xlf')], 'pt_BR' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt_BR.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt_BR.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pt_BR.xlf')], 'ro' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ro.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ro.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ro.xlf')], 'ru' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ru.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ru.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.ru.xlf')], 'sk' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sk.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sk.xlf')], 'sl' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sl.xlf')], 'sq' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sq.xlf')], 'sr_Cyrl' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Cyrl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Cyrl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sr_Cyrl.xlf')], 'sr_Latn' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Latn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Latn.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sr_Latn.xlf')], 'sv' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sv.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.sv.xlf')], 'th' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.th.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.th.xlf')], 'tl' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.tl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.tl.xlf')], 'tr' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.tr.xlf')], 'uk' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.uk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.uk.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.uk.xlf')], 'vi' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.vi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.vi.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.vi.xlf')], 'zh_CN' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_CN.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_CN.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.zh_CN.xlf')], 'zh_TW' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_TW.xlf')], 'pt_PT' => [0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Resources/translations/security.pt_PT.xlf')], 'en-US' => [0 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminActions.en-US.xlf'), 1 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminAdvparametersFeature.en-US.xlf'), 2 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminAdvparametersHelp.en-US.xlf'), 3 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminAdvparametersNotification.en-US.xlf'), 4 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminCatalogFeature.en-US.xlf'), 5 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminCatalogHelp.en-US.xlf'), 6 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminCatalogNotification.en-US.xlf'), 7 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminDashboardFeature.en-US.xlf'), 8 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminDashboardHelp.en-US.xlf'), 9 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminDashboardNotification.en-US.xlf'), 10 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminDesignFeature.en-US.xlf'), 11 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminDesignHelp.en-US.xlf'), 12 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminDesignNotification.en-US.xlf'), 13 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminGlobal.en-US.xlf'), 14 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminGlobalError.en-US.xlf'), 15 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminInternationalFeature.en-US.xlf'), 16 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminInternationalHelp.en-US.xlf'), 17 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminInternationalNotification.en-US.xlf'), 18 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminLoginFeature.en-US.xlf'), 19 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminLoginNotification.en-US.xlf'), 20 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminModulesFeature.en-US.xlf'), 21 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminModulesHelp.en-US.xlf'), 22 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminModulesNotification.en-US.xlf'), 23 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNavigationFooter.en-US.xlf'), 24 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNavigationHeader.en-US.xlf'), 25 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNavigationMenu.en-US.xlf'), 26 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNavigationNotification.en-US.xlf'), 27 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNavigationSearch.en-US.xlf'), 28 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNotificationsError.en-US.xlf'), 29 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNotificationsInfo.en-US.xlf'), 30 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNotificationsSuccess.en-US.xlf'), 31 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminNotificationsWarning.en-US.xlf'), 32 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminOrderscustomersFeature.en-US.xlf'), 33 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminOrderscustomersHelp.en-US.xlf'), 34 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminOrderscustomersNotification.en-US.xlf'), 35 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminPaymentFeature.en-US.xlf'), 36 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminPaymentHelp.en-US.xlf'), 37 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminPaymentNotification.en-US.xlf'), 38 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminShippingFeature.en-US.xlf'), 39 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminShippingHelp.en-US.xlf'), 40 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminShippingNotification.en-US.xlf'), 41 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminShopparametersFeature.en-US.xlf'), 42 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminShopparametersHelp.en-US.xlf'), 43 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminShopparametersNotification.en-US.xlf'), 44 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminStatsFeature.en-US.xlf'), 45 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminStatsHelp.en-US.xlf'), 46 => ($this->targetDirs[3].'/app/Resources/translations/en-US/AdminStatsNotification.en-US.xlf'), 47 => ($this->targetDirs[3].'/app/Resources/translations/en-US/EmailsBody.en-US.xlf'), 48 => ($this->targetDirs[3].'/app/Resources/translations/en-US/EmailsSubject.en-US.xlf'), 49 => ($this->targetDirs[3].'/app/Resources/translations/en-US/GlobalActions.en-US.xlf'), 50 => ($this->targetDirs[3].'/app/Resources/translations/en-US/Install.en-US.xlf'), 51 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModuleWatermarkAdmin.en-US.xlf'), 52 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesAdvertisingAdmin.en-US.xlf'), 53 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesAutoupgradeAdmin.en-US.xlf'), 54 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBannerAdmin.en-US.xlf'), 55 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBannerShop.en-US.xlf'), 56 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBestsellersAdmin.en-US.xlf'), 57 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBestsellersShop.en-US.xlf'), 58 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBlockreassuranceAdmin.en-US.xlf'), 59 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBlockreassuranceShop.en-US.xlf'), 60 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBrandlistAdmin.en-US.xlf'), 61 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBrandlistShop.en-US.xlf'), 62 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesBuybuttonliteAdmin.en-US.xlf'), 63 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCarriercomparisonAdmin.en-US.xlf'), 64 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCarriercomparisonShop.en-US.xlf'), 65 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCashondeliveryAdmin.en-US.xlf'), 66 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCashondeliveryShop.en-US.xlf'), 67 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCategoryproductsAdmin.en-US.xlf'), 68 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCategoryproductsShop.en-US.xlf'), 69 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCategorytreeAdmin.en-US.xlf'), 70 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCheckpaymentAdmin.en-US.xlf'), 71 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCheckpaymentShop.en-US.xlf'), 72 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesContactformAdmin.en-US.xlf'), 73 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesContactformShop.en-US.xlf'), 74 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesContactinfoAdmin.en-US.xlf'), 75 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesContactinfoShop.en-US.xlf'), 76 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCrosssellingAdmin.en-US.xlf'), 77 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCrosssellingShop.en-US.xlf'), 78 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCurrencyselectorAdmin.en-US.xlf'), 79 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCustomeraccountlinksAdmin.en-US.xlf'), 80 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCustomersigninAdmin.en-US.xlf'), 81 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesCustomtextAdmin.en-US.xlf'), 82 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDashactivityAdmin.en-US.xlf'), 83 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDashgoalsAdmin.en-US.xlf'), 84 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDashproductsAdmin.en-US.xlf'), 85 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDashtrendsAdmin.en-US.xlf'), 86 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDataprivacyAdmin.en-US.xlf'), 87 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDataprivacyShop.en-US.xlf'), 88 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDateofdeliveryAdmin.en-US.xlf'), 89 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesDateofdeliveryShop.en-US.xlf'), 90 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesEmailsubscriptionAdmin.en-US.xlf'), 91 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesEmailsubscriptionShop.en-US.xlf'), 92 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesFacetedsearchAdmin.en-US.xlf'), 93 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesFacetedsearchShop.en-US.xlf'), 94 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesFaviconnotificationboAdmin.en-US.xlf'), 95 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesFeaturedproductsAdmin.en-US.xlf'), 96 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesFeaturedproductsShop.en-US.xlf'), 97 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesFeederAdmin.en-US.xlf'), 98 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesGAnalyticsAdmin.en-US.xlf'), 99 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesGraphnvd3Admin.en-US.xlf'), 100 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesGridhtmlAdmin.en-US.xlf'), 101 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesGsitemapAdmin.en-US.xlf'), 102 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesImagesliderAdmin.en-US.xlf'), 103 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLanguageselectorAdmin.en-US.xlf'), 104 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLegalcomplianceAdmin.en-US.xlf'), 105 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLegalcomplianceShop.en-US.xlf'), 106 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLinklistAdmin.en-US.xlf'), 107 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLinklistShop.en-US.xlf'), 108 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLivetranslationAdmin.en-US.xlf'), 109 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesLivetranslationShop.en-US.xlf'), 110 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesMailalertsAdmin.en-US.xlf'), 111 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesMailalertsShop.en-US.xlf'), 112 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesMainmenuAdmin.en-US.xlf'), 113 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesNewproductsAdmin.en-US.xlf'), 114 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesNewproductsShop.en-US.xlf'), 115 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesNewsletterAdmin.en-US.xlf'), 116 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesPagesnotfoundAdmin.en-US.xlf'), 117 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesProductcommentsAdmin.en-US.xlf'), 118 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesProductcommentsShop.en-US.xlf'), 119 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesProductinfoAdmin.en-US.xlf'), 120 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesPscleanerAdmin.en-US.xlf'), 121 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesReminderAdmin.en-US.xlf'), 122 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesRssfeedAdmin.en-US.xlf'), 123 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesRssfeedShop.en-US.xlf'), 124 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSearchbarAdmin.en-US.xlf'), 125 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSearchbarShop.en-US.xlf'), 126 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSekeywordsAdmin.en-US.xlf'), 127 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSharebuttonsAdmin.en-US.xlf'), 128 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSharebuttonsShop.en-US.xlf'), 129 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesShoppingcartAdmin.en-US.xlf'), 130 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSocialfollowAdmin.en-US.xlf'), 131 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSocialfollowShop.en-US.xlf'), 132 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSpecialsAdmin.en-US.xlf'), 133 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSpecialsShop.en-US.xlf'), 134 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsbestcategoriesAdmin.en-US.xlf'), 135 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsbestcustomersAdmin.en-US.xlf'), 136 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsbestmanufacturersAdmin.en-US.xlf'), 137 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsbestproductsAdmin.en-US.xlf'), 138 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsbestsuppliersAdmin.en-US.xlf'), 139 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsbestvouchersAdmin.en-US.xlf'), 140 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatscarrierAdmin.en-US.xlf'), 141 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatscatalogAdmin.en-US.xlf'), 142 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatscheckupAdmin.en-US.xlf'), 143 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsdataAdmin.en-US.xlf'), 144 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsequipmentAdmin.en-US.xlf'), 145 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsforecastAdmin.en-US.xlf'), 146 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsliveAdmin.en-US.xlf'), 147 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsnewsletterAdmin.en-US.xlf'), 148 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsoriginAdmin.en-US.xlf'), 149 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatspersonalinfosAdmin.en-US.xlf'), 150 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsproductAdmin.en-US.xlf'), 151 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsregistrationsAdmin.en-US.xlf'), 152 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatssalesAdmin.en-US.xlf'), 153 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatssearchAdmin.en-US.xlf'), 154 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsstockAdmin.en-US.xlf'), 155 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesStatsvisitsAdmin.en-US.xlf'), 156 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSupplierlistAdmin.en-US.xlf'), 157 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesSupplierlistShop.en-US.xlf'), 158 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesTrackingfrontAdmin.en-US.xlf'), 159 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesTrackingfrontShop.en-US.xlf'), 160 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesViewedproductAdmin.en-US.xlf'), 161 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesViewedproductShop.en-US.xlf'), 162 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesWatermarkAdmin.en-US.xlf'), 163 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesWelcomeAdmin.en-US.xlf'), 164 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesWirepaymentAdmin.en-US.xlf'), 165 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ModulesWirepaymentShop.en-US.xlf'), 166 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopDemoCatalog.en-US.xlf'), 167 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopFormsErrors.en-US.xlf'), 168 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopFormsHelp.en-US.xlf'), 169 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopFormsLabels.en-US.xlf'), 170 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopNavigation.en-US.xlf'), 171 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopNotificationsError.en-US.xlf'), 172 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopNotificationsInfo.en-US.xlf'), 173 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopNotificationsSuccess.en-US.xlf'), 174 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopNotificationsWarning.en-US.xlf'), 175 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopPdf.en-US.xlf'), 176 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopThemeActions.en-US.xlf'), 177 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopThemeCatalog.en-US.xlf'), 178 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopThemeCheckout.en-US.xlf'), 179 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopThemeCustomeraccount.en-US.xlf'), 180 => ($this->targetDirs[3].'/app/Resources/translations/en-US/ShopThemeGlobal.en-US.xlf'), 181 => ($this->targetDirs[3].'/app/Resources/translations/en-US/messages.en-US.xlf')], 'es-AR' => [0 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminActions.es-AR.xlf'), 1 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminAdvparametersFeature.es-AR.xlf'), 2 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminAdvparametersHelp.es-AR.xlf'), 3 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminAdvparametersNotification.es-AR.xlf'), 4 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminCatalogFeature.es-AR.xlf'), 5 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminCatalogHelp.es-AR.xlf'), 6 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminCatalogNotification.es-AR.xlf'), 7 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminDashboardFeature.es-AR.xlf'), 8 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminDashboardHelp.es-AR.xlf'), 9 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminDashboardNotification.es-AR.xlf'), 10 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminDesignFeature.es-AR.xlf'), 11 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminDesignHelp.es-AR.xlf'), 12 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminDesignNotification.es-AR.xlf'), 13 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminGlobal.es-AR.xlf'), 14 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminGlobalError.es-AR.xlf'), 15 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminInternationalFeature.es-AR.xlf'), 16 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminInternationalHelp.es-AR.xlf'), 17 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminInternationalNotification.es-AR.xlf'), 18 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminLoginFeature.es-AR.xlf'), 19 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminLoginNotification.es-AR.xlf'), 20 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminModulesFeature.es-AR.xlf'), 21 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminModulesHelp.es-AR.xlf'), 22 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminModulesNotification.es-AR.xlf'), 23 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNavigationFooter.es-AR.xlf'), 24 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNavigationHeader.es-AR.xlf'), 25 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNavigationMenu.es-AR.xlf'), 26 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNavigationNotification.es-AR.xlf'), 27 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNavigationSearch.es-AR.xlf'), 28 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNotificationsError.es-AR.xlf'), 29 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNotificationsInfo.es-AR.xlf'), 30 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNotificationsSuccess.es-AR.xlf'), 31 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminNotificationsWarning.es-AR.xlf'), 32 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminOrderscustomersFeature.es-AR.xlf'), 33 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminOrderscustomersHelp.es-AR.xlf'), 34 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminOrderscustomersNotification.es-AR.xlf'), 35 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminPaymentFeature.es-AR.xlf'), 36 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminPaymentHelp.es-AR.xlf'), 37 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminPaymentNotification.es-AR.xlf'), 38 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminShippingFeature.es-AR.xlf'), 39 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminShippingHelp.es-AR.xlf'), 40 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminShippingNotification.es-AR.xlf'), 41 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminShopparametersFeature.es-AR.xlf'), 42 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminShopparametersHelp.es-AR.xlf'), 43 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminShopparametersNotification.es-AR.xlf'), 44 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminStatsFeature.es-AR.xlf'), 45 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminStatsHelp.es-AR.xlf'), 46 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/AdminStatsNotification.es-AR.xlf'), 47 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/EmailsBody.es-AR.xlf'), 48 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/EmailsSubject.es-AR.xlf'), 49 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/GlobalActions.es-AR.xlf'), 50 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/Install.es-AR.xlf'), 51 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModuleWatermarkAdmin.es-AR.xlf'), 52 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesAdvertisingAdmin.es-AR.xlf'), 53 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesAutoupgradeAdmin.es-AR.xlf'), 54 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBannerAdmin.es-AR.xlf'), 55 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBannerShop.es-AR.xlf'), 56 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBestsellersAdmin.es-AR.xlf'), 57 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBestsellersShop.es-AR.xlf'), 58 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBlockreassuranceAdmin.es-AR.xlf'), 59 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBlockreassuranceShop.es-AR.xlf'), 60 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBrandlistAdmin.es-AR.xlf'), 61 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBrandlistShop.es-AR.xlf'), 62 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesBuybuttonliteAdmin.es-AR.xlf'), 63 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCarriercomparisonAdmin.es-AR.xlf'), 64 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCarriercomparisonShop.es-AR.xlf'), 65 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCashondeliveryAdmin.es-AR.xlf'), 66 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCashondeliveryShop.es-AR.xlf'), 67 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCategoryproductsAdmin.es-AR.xlf'), 68 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCategoryproductsShop.es-AR.xlf'), 69 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCategorytreeAdmin.es-AR.xlf'), 70 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCheckpaymentAdmin.es-AR.xlf'), 71 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCheckpaymentShop.es-AR.xlf'), 72 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesContactformAdmin.es-AR.xlf'), 73 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesContactformShop.es-AR.xlf'), 74 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesContactinfoAdmin.es-AR.xlf'), 75 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesContactinfoShop.es-AR.xlf'), 76 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCrosssellingAdmin.es-AR.xlf'), 77 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCrosssellingShop.es-AR.xlf'), 78 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCurrencyselectorAdmin.es-AR.xlf'), 79 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCustomeraccountlinksAdmin.es-AR.xlf'), 80 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCustomersigninAdmin.es-AR.xlf'), 81 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesCustomtextAdmin.es-AR.xlf'), 82 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDashactivityAdmin.es-AR.xlf'), 83 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDashgoalsAdmin.es-AR.xlf'), 84 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDashproductsAdmin.es-AR.xlf'), 85 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDashtrendsAdmin.es-AR.xlf'), 86 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDataprivacyAdmin.es-AR.xlf'), 87 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDataprivacyShop.es-AR.xlf'), 88 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDateofdeliveryAdmin.es-AR.xlf'), 89 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesDateofdeliveryShop.es-AR.xlf'), 90 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesEmailsubscriptionAdmin.es-AR.xlf'), 91 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesEmailsubscriptionShop.es-AR.xlf'), 92 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesFacetedsearchAdmin.es-AR.xlf'), 93 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesFacetedsearchShop.es-AR.xlf'), 94 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesFaviconnotificationboAdmin.es-AR.xlf'), 95 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesFeaturedproductsAdmin.es-AR.xlf'), 96 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesFeaturedproductsShop.es-AR.xlf'), 97 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesFeederAdmin.es-AR.xlf'), 98 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesGAnalyticsAdmin.es-AR.xlf'), 99 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesGraphnvd3Admin.es-AR.xlf'), 100 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesGridhtmlAdmin.es-AR.xlf'), 101 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesGsitemapAdmin.es-AR.xlf'), 102 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesImagesliderAdmin.es-AR.xlf'), 103 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLanguageselectorAdmin.es-AR.xlf'), 104 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLegalcomplianceAdmin.es-AR.xlf'), 105 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLegalcomplianceShop.es-AR.xlf'), 106 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLinklistAdmin.es-AR.xlf'), 107 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLinklistShop.es-AR.xlf'), 108 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLivetranslationAdmin.es-AR.xlf'), 109 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesLivetranslationShop.es-AR.xlf'), 110 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesMailalertsAdmin.es-AR.xlf'), 111 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesMailalertsShop.es-AR.xlf'), 112 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesMainmenuAdmin.es-AR.xlf'), 113 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesNewproductsAdmin.es-AR.xlf'), 114 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesNewproductsShop.es-AR.xlf'), 115 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesNewsletterAdmin.es-AR.xlf'), 116 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesPagesnotfoundAdmin.es-AR.xlf'), 117 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesProductcommentsAdmin.es-AR.xlf'), 118 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesProductcommentsShop.es-AR.xlf'), 119 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesProductinfoAdmin.es-AR.xlf'), 120 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesPscleanerAdmin.es-AR.xlf'), 121 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesReminderAdmin.es-AR.xlf'), 122 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesRssfeedAdmin.es-AR.xlf'), 123 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesRssfeedShop.es-AR.xlf'), 124 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSearchbarAdmin.es-AR.xlf'), 125 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSearchbarShop.es-AR.xlf'), 126 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSekeywordsAdmin.es-AR.xlf'), 127 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSharebuttonsAdmin.es-AR.xlf'), 128 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSharebuttonsShop.es-AR.xlf'), 129 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesShoppingcartAdmin.es-AR.xlf'), 130 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSocialfollowAdmin.es-AR.xlf'), 131 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSocialfollowShop.es-AR.xlf'), 132 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSpecialsAdmin.es-AR.xlf'), 133 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSpecialsShop.es-AR.xlf'), 134 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsbestcategoriesAdmin.es-AR.xlf'), 135 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsbestcustomersAdmin.es-AR.xlf'), 136 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsbestmanufacturersAdmin.es-AR.xlf'), 137 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsbestproductsAdmin.es-AR.xlf'), 138 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsbestsuppliersAdmin.es-AR.xlf'), 139 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsbestvouchersAdmin.es-AR.xlf'), 140 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatscarrierAdmin.es-AR.xlf'), 141 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatscatalogAdmin.es-AR.xlf'), 142 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatscheckupAdmin.es-AR.xlf'), 143 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsdataAdmin.es-AR.xlf'), 144 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsequipmentAdmin.es-AR.xlf'), 145 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsforecastAdmin.es-AR.xlf'), 146 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsliveAdmin.es-AR.xlf'), 147 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsnewsletterAdmin.es-AR.xlf'), 148 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsoriginAdmin.es-AR.xlf'), 149 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatspersonalinfosAdmin.es-AR.xlf'), 150 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsproductAdmin.es-AR.xlf'), 151 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsregistrationsAdmin.es-AR.xlf'), 152 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatssalesAdmin.es-AR.xlf'), 153 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatssearchAdmin.es-AR.xlf'), 154 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsstockAdmin.es-AR.xlf'), 155 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesStatsvisitsAdmin.es-AR.xlf'), 156 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSupplierlistAdmin.es-AR.xlf'), 157 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesSupplierlistShop.es-AR.xlf'), 158 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesTrackingfrontAdmin.es-AR.xlf'), 159 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesTrackingfrontShop.es-AR.xlf'), 160 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesViewedproductAdmin.es-AR.xlf'), 161 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesViewedproductShop.es-AR.xlf'), 162 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesWatermarkAdmin.es-AR.xlf'), 163 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesWelcomeAdmin.es-AR.xlf'), 164 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesWirepaymentAdmin.es-AR.xlf'), 165 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ModulesWirepaymentShop.es-AR.xlf'), 166 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopDemoCatalog.es-AR.xlf'), 167 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopFormsErrors.es-AR.xlf'), 168 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopFormsHelp.es-AR.xlf'), 169 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopFormsLabels.es-AR.xlf'), 170 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopNavigation.es-AR.xlf'), 171 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopNotificationsError.es-AR.xlf'), 172 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopNotificationsInfo.es-AR.xlf'), 173 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopNotificationsSuccess.es-AR.xlf'), 174 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopNotificationsWarning.es-AR.xlf'), 175 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopPdf.es-AR.xlf'), 176 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopThemeActions.es-AR.xlf'), 177 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopThemeCatalog.es-AR.xlf'), 178 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopThemeCheckout.es-AR.xlf'), 179 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopThemeCustomeraccount.es-AR.xlf'), 180 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/ShopThemeGlobal.es-AR.xlf'), 181 => ($this->targetDirs[3].'/app/Resources/translations/es-AR/messages.es-AR.xlf')], 'es-ES' => [0 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminActions.es-ES.xlf'), 1 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminAdvparametersFeature.es-ES.xlf'), 2 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminAdvparametersHelp.es-ES.xlf'), 3 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminAdvparametersNotification.es-ES.xlf'), 4 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminCatalogFeature.es-ES.xlf'), 5 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminCatalogHelp.es-ES.xlf'), 6 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminCatalogNotification.es-ES.xlf'), 7 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminDashboardFeature.es-ES.xlf'), 8 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminDashboardHelp.es-ES.xlf'), 9 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminDashboardNotification.es-ES.xlf'), 10 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminDesignFeature.es-ES.xlf'), 11 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminDesignHelp.es-ES.xlf'), 12 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminDesignNotification.es-ES.xlf'), 13 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminGlobal.es-ES.xlf'), 14 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminGlobalError.es-ES.xlf'), 15 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminInternationalFeature.es-ES.xlf'), 16 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminInternationalHelp.es-ES.xlf'), 17 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminInternationalNotification.es-ES.xlf'), 18 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminLoginFeature.es-ES.xlf'), 19 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminLoginNotification.es-ES.xlf'), 20 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminModulesFeature.es-ES.xlf'), 21 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminModulesHelp.es-ES.xlf'), 22 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminModulesNotification.es-ES.xlf'), 23 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNavigationFooter.es-ES.xlf'), 24 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNavigationHeader.es-ES.xlf'), 25 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNavigationMenu.es-ES.xlf'), 26 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNavigationNotification.es-ES.xlf'), 27 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNavigationSearch.es-ES.xlf'), 28 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNotificationsError.es-ES.xlf'), 29 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNotificationsInfo.es-ES.xlf'), 30 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNotificationsSuccess.es-ES.xlf'), 31 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminNotificationsWarning.es-ES.xlf'), 32 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminOrderscustomersFeature.es-ES.xlf'), 33 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminOrderscustomersHelp.es-ES.xlf'), 34 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminOrderscustomersNotification.es-ES.xlf'), 35 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminPaymentFeature.es-ES.xlf'), 36 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminPaymentHelp.es-ES.xlf'), 37 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminPaymentNotification.es-ES.xlf'), 38 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminShippingFeature.es-ES.xlf'), 39 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminShippingHelp.es-ES.xlf'), 40 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminShippingNotification.es-ES.xlf'), 41 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminShopparametersFeature.es-ES.xlf'), 42 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminShopparametersHelp.es-ES.xlf'), 43 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminShopparametersNotification.es-ES.xlf'), 44 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminStatsFeature.es-ES.xlf'), 45 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminStatsHelp.es-ES.xlf'), 46 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/AdminStatsNotification.es-ES.xlf'), 47 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/EmailsBody.es-ES.xlf'), 48 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/EmailsSubject.es-ES.xlf'), 49 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/GlobalActions.es-ES.xlf'), 50 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/Install.es-ES.xlf'), 51 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModuleWatermarkAdmin.es-ES.xlf'), 52 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesAdvertisingAdmin.es-ES.xlf'), 53 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesAutoupgradeAdmin.es-ES.xlf'), 54 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBannerAdmin.es-ES.xlf'), 55 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBannerShop.es-ES.xlf'), 56 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBestsellersAdmin.es-ES.xlf'), 57 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBestsellersShop.es-ES.xlf'), 58 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBlockreassuranceAdmin.es-ES.xlf'), 59 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBlockreassuranceShop.es-ES.xlf'), 60 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBrandlistAdmin.es-ES.xlf'), 61 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBrandlistShop.es-ES.xlf'), 62 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesBuybuttonliteAdmin.es-ES.xlf'), 63 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCarriercomparisonAdmin.es-ES.xlf'), 64 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCarriercomparisonShop.es-ES.xlf'), 65 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCashondeliveryAdmin.es-ES.xlf'), 66 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCashondeliveryShop.es-ES.xlf'), 67 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCategoryproductsAdmin.es-ES.xlf'), 68 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCategoryproductsShop.es-ES.xlf'), 69 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCategorytreeAdmin.es-ES.xlf'), 70 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCheckpaymentAdmin.es-ES.xlf'), 71 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCheckpaymentShop.es-ES.xlf'), 72 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesContactformAdmin.es-ES.xlf'), 73 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesContactformShop.es-ES.xlf'), 74 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesContactinfoAdmin.es-ES.xlf'), 75 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesContactinfoShop.es-ES.xlf'), 76 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCrosssellingAdmin.es-ES.xlf'), 77 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCrosssellingShop.es-ES.xlf'), 78 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCurrencyselectorAdmin.es-ES.xlf'), 79 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCustomeraccountlinksAdmin.es-ES.xlf'), 80 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCustomersigninAdmin.es-ES.xlf'), 81 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesCustomtextAdmin.es-ES.xlf'), 82 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDashactivityAdmin.es-ES.xlf'), 83 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDashgoalsAdmin.es-ES.xlf'), 84 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDashproductsAdmin.es-ES.xlf'), 85 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDashtrendsAdmin.es-ES.xlf'), 86 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDataprivacyAdmin.es-ES.xlf'), 87 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDataprivacyShop.es-ES.xlf'), 88 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDateofdeliveryAdmin.es-ES.xlf'), 89 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesDateofdeliveryShop.es-ES.xlf'), 90 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesEmailsubscriptionAdmin.es-ES.xlf'), 91 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesEmailsubscriptionShop.es-ES.xlf'), 92 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesFacetedsearchAdmin.es-ES.xlf'), 93 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesFacetedsearchShop.es-ES.xlf'), 94 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesFaviconnotificationboAdmin.es-ES.xlf'), 95 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesFeaturedproductsAdmin.es-ES.xlf'), 96 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesFeaturedproductsShop.es-ES.xlf'), 97 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesFeederAdmin.es-ES.xlf'), 98 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesGAnalyticsAdmin.es-ES.xlf'), 99 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesGraphnvd3Admin.es-ES.xlf'), 100 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesGridhtmlAdmin.es-ES.xlf'), 101 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesGsitemapAdmin.es-ES.xlf'), 102 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesImagesliderAdmin.es-ES.xlf'), 103 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLanguageselectorAdmin.es-ES.xlf'), 104 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLegalcomplianceAdmin.es-ES.xlf'), 105 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLegalcomplianceShop.es-ES.xlf'), 106 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLinklistAdmin.es-ES.xlf'), 107 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLinklistShop.es-ES.xlf'), 108 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLivetranslationAdmin.es-ES.xlf'), 109 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesLivetranslationShop.es-ES.xlf'), 110 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesMailalertsAdmin.es-ES.xlf'), 111 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesMailalertsShop.es-ES.xlf'), 112 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesMainmenuAdmin.es-ES.xlf'), 113 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesNewproductsAdmin.es-ES.xlf'), 114 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesNewproductsShop.es-ES.xlf'), 115 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesNewsletterAdmin.es-ES.xlf'), 116 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesPagesnotfoundAdmin.es-ES.xlf'), 117 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesProductcommentsAdmin.es-ES.xlf'), 118 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesProductcommentsShop.es-ES.xlf'), 119 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesProductinfoAdmin.es-ES.xlf'), 120 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesPscleanerAdmin.es-ES.xlf'), 121 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesReminderAdmin.es-ES.xlf'), 122 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesRssfeedAdmin.es-ES.xlf'), 123 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesRssfeedShop.es-ES.xlf'), 124 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSearchbarAdmin.es-ES.xlf'), 125 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSearchbarShop.es-ES.xlf'), 126 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSekeywordsAdmin.es-ES.xlf'), 127 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSharebuttonsAdmin.es-ES.xlf'), 128 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSharebuttonsShop.es-ES.xlf'), 129 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesShoppingcartAdmin.es-ES.xlf'), 130 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSocialfollowAdmin.es-ES.xlf'), 131 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSocialfollowShop.es-ES.xlf'), 132 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSpecialsAdmin.es-ES.xlf'), 133 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSpecialsShop.es-ES.xlf'), 134 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsbestcategoriesAdmin.es-ES.xlf'), 135 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsbestcustomersAdmin.es-ES.xlf'), 136 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsbestmanufacturersAdmin.es-ES.xlf'), 137 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsbestproductsAdmin.es-ES.xlf'), 138 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsbestsuppliersAdmin.es-ES.xlf'), 139 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsbestvouchersAdmin.es-ES.xlf'), 140 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatscarrierAdmin.es-ES.xlf'), 141 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatscatalogAdmin.es-ES.xlf'), 142 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatscheckupAdmin.es-ES.xlf'), 143 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsdataAdmin.es-ES.xlf'), 144 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsequipmentAdmin.es-ES.xlf'), 145 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsforecastAdmin.es-ES.xlf'), 146 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsliveAdmin.es-ES.xlf'), 147 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsnewsletterAdmin.es-ES.xlf'), 148 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsoriginAdmin.es-ES.xlf'), 149 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatspersonalinfosAdmin.es-ES.xlf'), 150 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsproductAdmin.es-ES.xlf'), 151 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsregistrationsAdmin.es-ES.xlf'), 152 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatssalesAdmin.es-ES.xlf'), 153 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatssearchAdmin.es-ES.xlf'), 154 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsstockAdmin.es-ES.xlf'), 155 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesStatsvisitsAdmin.es-ES.xlf'), 156 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSupplierlistAdmin.es-ES.xlf'), 157 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesSupplierlistShop.es-ES.xlf'), 158 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesTrackingfrontAdmin.es-ES.xlf'), 159 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesTrackingfrontShop.es-ES.xlf'), 160 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesViewedproductAdmin.es-ES.xlf'), 161 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesViewedproductShop.es-ES.xlf'), 162 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesWatermarkAdmin.es-ES.xlf'), 163 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesWelcomeAdmin.es-ES.xlf'), 164 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesWirepaymentAdmin.es-ES.xlf'), 165 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ModulesWirepaymentShop.es-ES.xlf'), 166 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopDemoCatalog.es-ES.xlf'), 167 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopFormsErrors.es-ES.xlf'), 168 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopFormsHelp.es-ES.xlf'), 169 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopFormsLabels.es-ES.xlf'), 170 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopNavigation.es-ES.xlf'), 171 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopNotificationsError.es-ES.xlf'), 172 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopNotificationsInfo.es-ES.xlf'), 173 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopNotificationsSuccess.es-ES.xlf'), 174 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopNotificationsWarning.es-ES.xlf'), 175 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopPdf.es-ES.xlf'), 176 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopThemeActions.es-ES.xlf'), 177 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopThemeCatalog.es-ES.xlf'), 178 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopThemeCheckout.es-ES.xlf'), 179 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopThemeCustomeraccount.es-ES.xlf'), 180 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/ShopThemeGlobal.es-ES.xlf'), 181 => ($this->targetDirs[3].'/app/Resources/translations/es-ES/messages.es-ES.xlf')]]]);

        $instance->setConfigCacheFactory(${($_ = isset($this->services['config_cache_factory']) ? $this->services['config_cache_factory'] : $this->getConfigCacheFactoryService()) && false ?: '_'});
        $instance->setFallbackLocales([0 => 'default']);

        return $instance;
    }

    /**
     * Gets the private 'translator_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\TranslatorListener
     */
    protected function getTranslatorListenerService()
    {
        return $this->services['translator_listener'] = new \Symfony\Component\HttpKernel\EventListener\TranslatorListener(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'});
    }

    /**
     * Gets the private 'twig.extension.routing' shared service.
     *
     * @return \Symfony\Bridge\Twig\Extension\RoutingExtension
     */
    protected function getTwig_Extension_RoutingService()
    {
        return $this->services['twig.extension.routing'] = new \Symfony\Bridge\Twig\Extension\RoutingExtension(${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'});
    }

    /**
     * Gets the private 'twig.loader' shared service.
     *
     * @return \Twig\Loader\ChainLoader
     */
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Twig\Loader\ChainLoader();

        $a = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader(${($_ = isset($this->services['templating.locator']) ? $this->services['templating.locator'] : $this->getTemplating_LocatorService()) && false ?: '_'}, ${($_ = isset($this->services['templating.name_parser']) ? $this->services['templating.name_parser'] : ($this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel', 1)) && false ?: '_'}))) && false ?: '_'}, $this->targetDirs[3]);
        $a->addPath(($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/Product'), 'Product');
        $a->addPath(($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm'), 'Twig');
        $a->addPath(($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters'), 'AdvancedParameters');
        $a->addPath(($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin/Configure/ShopParameters'), 'ShopParameters');
        $a->addPath(($this->targetDirs[3].'/app/../modules'), 'Modules');
        $a->addPath(($this->targetDirs[3].'/mails/themes'), 'MailThemes');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views'), 'Framework');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views'), '!Framework');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views'), 'Security');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views'), '!Security');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views'), 'Twig');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views'), '!Twig');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle/Resources/views'), 'Swiftmailer');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle/Resources/views'), '!Swiftmailer');
        $a->addPath(($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Resources/views'), 'Doctrine');
        $a->addPath(($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Resources/views'), '!Doctrine');
        $a->addPath(($this->targetDirs[3].'/src/PrestaShopBundle/Resources/views'), 'PrestaShop');
        $a->addPath(($this->targetDirs[3].'/src/PrestaShopBundle/Resources/views'), '!PrestaShop');
        $a->addPath(($this->targetDirs[3].'/vendor/csa/guzzle-bundle/src/Resources/views'), 'CsaGuzzle');
        $a->addPath(($this->targetDirs[3].'/vendor/csa/guzzle-bundle/src/Resources/views'), '!CsaGuzzle');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle/Resources/views'), 'Debug');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle/Resources/views'), '!Debug');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views'), 'WebProfiler');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views'), '!WebProfiler');
        $a->addPath(($this->targetDirs[3].'/app/Resources/views'));
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form'));

        $instance->addLoader(${($_ = isset($this->services['prestashop.twig.modules.loader']) ? $this->services['prestashop.twig.modules.loader'] : $this->getPrestashop_Twig_Modules_LoaderService()) && false ?: '_'});
        $instance->addLoader($a);

        return $instance;
    }

    /**
     * Gets the private 'twig.profile' shared service.
     *
     * @return \Twig\Profiler\Profile
     */
    protected function getTwig_ProfileService()
    {
        return $this->services['twig.profile'] = new \Twig\Profiler\Profile();
    }

    /**
     * Gets the private 'uri_signer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\UriSigner
     */
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('25foVuOe9IE6IfUpL34UIxaDVHNiN50o9hggvdXdyItAnvWH3848XLEI');
    }

    /**
     * Gets the private 'validate_request_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener
     */
    protected function getValidateRequestListenerService()
    {
        return $this->services['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener();
    }

    /**
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilderInterface
     */
    protected function getValidator_BuilderService()
    {
        $this->services['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\ServiceLocator(['Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => function () {
            return ${($_ = isset($this->services['doctrine.orm.validator.unique']) ? $this->services['doctrine.orm.validator.unique'] : $this->load('getDoctrine_Orm_Validator_UniqueService.php')) && false ?: '_'};
        }, 'PrestaShop\\Module\\FacetedSearch\\Constraint\\UrlSegmentValidator' => function () {
            return ${($_ = isset($this->services['prestashop.module.ps_facetedsearch.constraint.url_segment_validator']) ? $this->services['prestashop.module.ps_facetedsearch.constraint.url_segment_validator'] : $this->load('getPrestashop_Module_PsFacetedsearch_Constraint_UrlSegmentValidatorService.php')) && false ?: '_'};
        }, 'PrestaShop\\PrestaShop\\Core\\ConstraintValidator\\DefaultLanguageValidator' => function () {
            return ${($_ = isset($this->services['prestashop.core.constraint_validator.default_language_validator']) ? $this->services['prestashop.core.constraint_validator.default_language_validator'] : $this->load('getPrestashop_Core_ConstraintValidator_DefaultLanguageValidatorService.php')) && false ?: '_'};
        }, 'PrestaShop\\PrestaShop\\Core\\ConstraintValidator\\IsUrlRewriteValidator' => function () {
            return ${($_ = isset($this->services['prestashop.core.constraint_validator.is_url_rewrite_validator']) ? $this->services['prestashop.core.constraint_validator.is_url_rewrite_validator'] : $this->load('getPrestashop_Core_ConstraintValidator_IsUrlRewriteValidatorService.php')) && false ?: '_'};
        }, 'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => function () {
            return ${($_ = isset($this->services['security.validator.user_password']) ? $this->services['security.validator.user_password'] : $this->load('getSecurity_Validator_UserPasswordService.php')) && false ?: '_'};
        }, 'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => function () {
            return ${($_ = isset($this->services['validator.email']) ? $this->services['validator.email'] : ($this->services['validator.email'] = new \Symfony\Component\Validator\Constraints\EmailValidator(false))) && false ?: '_'};
        }, 'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => function () {
            return ${($_ = isset($this->services['validator.expression']) ? $this->services['validator.expression'] : ($this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator())) && false ?: '_'};
        }, 'doctrine.orm.validator.unique' => function () {
            return ${($_ = isset($this->services['doctrine.orm.validator.unique']) ? $this->services['doctrine.orm.validator.unique'] : $this->load('getDoctrine_Orm_Validator_UniqueService.php')) && false ?: '_'};
        }, 'security.validator.user_password' => function () {
            return ${($_ = isset($this->services['security.validator.user_password']) ? $this->services['security.validator.user_password'] : $this->load('getSecurity_Validator_UserPasswordService.php')) && false ?: '_'};
        }, 'validator.expression' => function () {
            return ${($_ = isset($this->services['validator.expression']) ? $this->services['validator.expression'] : ($this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator())) && false ?: '_'};
        }])));
        $instance->setTranslator(${($_ = isset($this->services['translator']) ? $this->services['translator'] : $this->getTranslatorService()) && false ?: '_'});
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings([0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml')]);
        $instance->enableAnnotationMapping(${($_ = isset($this->services['annotation_reader']) ? $this->services['annotation_reader'] : $this->getAnnotationReaderService()) && false ?: '_'});
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers([0 => ${($_ = isset($this->services['doctrine.orm.validator_initializer']) ? $this->services['doctrine.orm.validator_initializer'] : $this->getDoctrine_Orm_ValidatorInitializerService()) && false ?: '_'}]);

        return $instance;
    }

    /**
     * Gets the private 'web_profiler.csp.handler' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler
     */
    protected function getWebProfiler_Csp_HandlerService()
    {
        return $this->services['web_profiler.csp.handler'] = new \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler(new \Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator());
    }

    /**
     * Gets the private 'web_profiler.debug_toolbar' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->services['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener(${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}, false, 2, 'bottom', ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'}, '^/((index|app(_[\\w]+)?)\\.php/)?_wdt', ${($_ = isset($this->services['web_profiler.csp.handler']) ? $this->services['web_profiler.csp.handler'] : $this->getWebProfiler_Csp_HandlerService()) && false ?: '_'});
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return true;
        }
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [
        'kernel.root_dir' => false,
        'kernel.project_dir' => false,
        'kernel.cache_dir' => false,
        'kernel.logs_dir' => false,
        'kernel.bundles_metadata' => false,
        'admin_page' => false,
        'env(PS_LOG_OUTPUT)' => false,
        'mail_themes_dir' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'translator.default_path' => false,
        'profiler.storage.dsn' => false,
        'debug.container.dump' => false,
        'router.resource' => false,
        'serializer.mapping.cache.file' => false,
        'twig.default_path' => false,
        'swiftmailer.spool.default.memory.path' => false,
        'doctrine.orm.proxy_dir' => false,
        'ps_root_dir' => false,
        'ps_config_dir' => false,
        'translations_dir' => false,
        'themes_translations_dir' => false,
        'modules_dir' => false,
        'themes_dir' => false,
        'ps_cache_dir' => false,
        'prestashop.addons.api_client.verify_ssl' => false,
    ];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        switch ($name) {
            case 'kernel.root_dir': $value = ($this->targetDirs[3].'/app'); break;
            case 'kernel.project_dir': $value = $this->targetDirs[3]; break;
            case 'kernel.cache_dir': $value = $this->targetDirs[0]; break;
            case 'kernel.logs_dir': $value = ($this->targetDirs[2].'/logs'); break;
            case 'kernel.bundles_metadata': $value = [
                'FrameworkBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle'),
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ],
                'SecurityBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle'),
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ],
                'TwigBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle'),
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ],
                'MonologBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/monolog-bundle'),
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ],
                'SwiftmailerBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SwiftmailerBundle',
                ],
                'DoctrineBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ],
                'SensioFrameworkExtraBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/sensio/framework-extra-bundle'),
                    'namespace' => 'Sensio\\Bundle\\FrameworkExtraBundle',
                ],
                'PrestaShopBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/src/PrestaShopBundle'),
                    'namespace' => 'PrestaShopBundle',
                ],
                'TranslationToolsBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/prestashop/translationtools-bundle'),
                    'namespace' => 'PrestaShop\\TranslationToolsBundle',
                ],
                'CsaGuzzleBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/csa/guzzle-bundle/src'),
                    'namespace' => 'Csa\\Bundle\\GuzzleBundle',
                ],
                'TacticianBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/league/tactician-bundle'),
                    'namespace' => 'League\\Tactician\\Bundle',
                ],
                'DebugBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle'),
                    'namespace' => 'Symfony\\Bundle\\DebugBundle',
                ],
                'WebProfilerBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle'),
                    'namespace' => 'Symfony\\Bundle\\WebProfilerBundle',
                ],
                'SensioDistributionBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/sensio/distribution-bundle'),
                    'namespace' => 'Sensio\\Bundle\\DistributionBundle',
                ],
                'WebServerBundle' => [
                    'parent' => NULL,
                    'path' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/WebServerBundle'),
                    'namespace' => 'Symfony\\Bundle\\WebServerBundle',
                ],
            ]; break;
            case 'admin_page': $value = ($this->targetDirs[3].'/app/../src/PrestaShopBundle/Resources/views/Admin'); break;
            case 'env(PS_LOG_OUTPUT)': $value = ($this->targetDirs[2].'/logs/dev.log'); break;
            case 'mail_themes_dir': $value = ($this->targetDirs[3].'/mails/themes'); break;
            case 'session.save_path': $value = ($this->targetDirs[0].'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDirs[0].'/validation.php'); break;
            case 'translator.default_path': $value = ($this->targetDirs[3].'/translations'); break;
            case 'profiler.storage.dsn': $value = ('file:'.$this->targetDirs[0].'/profiler'); break;
            case 'debug.container.dump': $value = ($this->targetDirs[0].'/appDevDebugProjectContainer.xml'); break;
            case 'router.resource': $value = ($this->targetDirs[3].'/app/config/routing_dev.yml'); break;
            case 'serializer.mapping.cache.file': $value = ($this->targetDirs[0].'/serialization.php'); break;
            case 'twig.default_path': $value = ($this->targetDirs[3].'/templates'); break;
            case 'swiftmailer.spool.default.memory.path': $value = ($this->targetDirs[0].'/swiftmailer/spool/default'); break;
            case 'doctrine.orm.proxy_dir': $value = ($this->targetDirs[0].'/doctrine/orm/Proxies'); break;
            case 'ps_root_dir': $value = ($this->targetDirs[3].'/app/../'); break;
            case 'ps_config_dir': $value = ($this->targetDirs[3].'/app/../config'); break;
            case 'translations_dir': $value = ($this->targetDirs[3].'/app/Resources/translations'); break;
            case 'themes_translations_dir': $value = ($this->targetDirs[0].'/themes'); break;
            case 'modules_dir': $value = ($this->targetDirs[3].'/app/../modules'); break;
            case 'themes_dir': $value = ($this->targetDirs[3].'/app/../themes'); break;
            case 'ps_cache_dir': $value = ($this->targetDirs[0].'/'); break;
            case 'prestashop.addons.api_client.verify_ssl': $value = ($this->targetDirs[0].'/cacert.pem'); break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    private $normalizedParameterNames = [
        'env(ps_theme_name)' => 'env(PS_THEME_NAME)',
        'adaptersecurityadminclass' => 'AdapterSecurityAdminClass',
        'env(ps_log_output)' => 'env(PS_LOG_OUTPUT)',
    ];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'app',
            'kernel.bundles' => [
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'PrestaShopBundle' => 'PrestaShopBundle\\PrestaShopBundle',
                'TranslationToolsBundle' => 'PrestaShop\\TranslationToolsBundle\\TranslationToolsBundle',
                'CsaGuzzleBundle' => 'Csa\\Bundle\\GuzzleBundle\\CsaGuzzleBundle',
                'TacticianBundle' => 'League\\Tactician\\Bundle\\TacticianBundle',
                'DebugBundle' => 'Symfony\\Bundle\\DebugBundle\\DebugBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'SensioDistributionBundle' => 'Sensio\\Bundle\\DistributionBundle\\SensioDistributionBundle',
                'WebServerBundle' => 'Symfony\\Bundle\\WebServerBundle\\WebServerBundle',
            ],
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appDevDebugProjectContainer',
            'kernel.active_modules' => [
                0 => 'contactform',
                1 => 'dashactivity',
                2 => 'dashtrends',
                3 => 'dashgoals',
                4 => 'dashproducts',
                5 => 'graphnvd3',
                6 => 'gridhtml',
                7 => 'gsitemap',
                8 => 'ps_banner',
                9 => 'ps_categorytree',
                10 => 'ps_checkpayment',
                11 => 'ps_contactinfo',
                12 => 'ps_currencyselector',
                13 => 'ps_customeraccountlinks',
                14 => 'ps_customersignin',
                15 => 'ps_customtext',
                16 => 'ps_emailsubscription',
                17 => 'ps_faviconnotificationbo',
                18 => 'ps_featuredproducts',
                19 => 'ps_imageslider',
                20 => 'ps_languageselector',
                21 => 'ps_linklist',
                22 => 'ps_mainmenu',
                23 => 'ps_searchbar',
                24 => 'ps_sharebuttons',
                25 => 'ps_shoppingcart',
                26 => 'ps_socialfollow',
                27 => 'ps_themecusto',
                28 => 'ps_wirepayment',
                29 => 'pagesnotfound',
                30 => 'sekeywords',
                31 => 'statsbestcategories',
                32 => 'statsbestcustomers',
                33 => 'statsbestproducts',
                34 => 'statsbestsuppliers',
                35 => 'statsbestvouchers',
                36 => 'statscarrier',
                37 => 'statscatalog',
                38 => 'statscheckup',
                39 => 'statsdata',
                40 => 'statsequipment',
                41 => 'statsforecast',
                42 => 'statslive',
                43 => 'statsnewsletter',
                44 => 'statsorigin',
                45 => 'statspersonalinfos',
                46 => 'statsproduct',
                47 => 'statsregistrations',
                48 => 'statssales',
                49 => 'statssearch',
                50 => 'statsstock',
                51 => 'statsvisits',
                52 => 'welcome',
                53 => 'gamification',
                54 => 'emarketing',
                55 => 'psaddonsconnect',
                56 => 'psgdpr',
                57 => 'ps_mbo',
                58 => 'ps_buybuttonlite',
                59 => 'blockreassurance',
                60 => 'ps_facetedsearch',
                61 => 'conektapaymentsprestashop',
            ],
            'container.autowiring.strict_mode' => true,
            'container.dumper.inline_class_loader' => false,
            'database_host' => 'db',
            'database_port' => '3306',
            'database_name' => 'ps_db1',
            'database_user' => 'serfe',
            'database_password' => '123456789',
            'database_prefix' => 'ps_',
            'database_engine' => 'InnoDB',
            'mailer_transport' => 'smtp',
            'mailer_host' => '127.0.0.1',
            'mailer_user' => NULL,
            'mailer_password' => NULL,
            'secret' => '25foVuOe9IE6IfUpL34UIxaDVHNiN50o9hggvdXdyItAnvWH3848XLEI',
            'ps_caching' => 'CacheMemcache',
            'ps_cache_enable' => false,
            'ps_creation_date' => '2020-12-01',
            'locale' => 'en-US',
            'use_debug_toolbar' => true,
            'cookie_key' => 'mZ2DZhV1isJLazX8Coj0ij449RwBmGbGIL8DQgDaTkTKM4TWV0Hu8y3a',
            'cookie_iv' => 'JRFZuqKy',
            'new_cookie_key' => 'def0000066225a187606131efc967cdc5a1dfbb5d63be115ec3c60f02345c5b761d259e2bd353561f7937e214c6447026a19281543e7aab479b984eac324313dccf9466c',
            'cache.driver' => 'array',
            'env(PS_THEME_NAME)' => 'classic',
            'AdapterSecurityAdminClass' => 'PrestaShop\\PrestaShop\\Adapter\\Security\\Admin',
            'translator.class' => 'PrestaShopBundle\\Translation\\Translator',
            'translator.data_collector' => 'PrestaShopBundle\\Translation\\DataCollectorTranslator',
            'mail_themes_uri' => '/mails/themes',
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.path' => '/_fragment',
            'kernel.secret' => '25foVuOe9IE6IfUpL34UIxaDVHNiN50o9hggvdXdyItAnvWH3848XLEI',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => [

            ],
            'kernel.default_locale' => 'en-US',
            'templating.helper.code.file_link_format' => NULL,
            'debug.file_link_format' => NULL,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => [
                'cache_limiter' => '0',
                'cookie_httponly' => true,
                'gc_probability' => 1,
                'use_strict_mode' => true,
            ],
            'session.metadata.update_threshold' => '0',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'asset.request_context.base_path' => '',
            'asset.request_context.secure' => false,
            'templating.loader.cache.path' => NULL,
            'templating.engines' => [
                0 => 'twig',
            ],
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => true,
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'debug.error_handler.throw_at' => -1,
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.options.matcher.cache_class' => 'appDevDebugProjectContainerUrlMatcher',
            'router.options.generator.cache_class' => 'appDevDebugProjectContainerUrlGenerator',
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.cache_class_prefix' => 'appDevDebugProjectContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'serializer.mapping.cache.prefix' => '',
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.role_hierarchy.roles' => [

            ],
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'twig.exception_listener.controller' => 'twig.controller.exception:showAction',
            'twig.form.resources' => [
                0 => 'form_div_layout.html.twig',
                1 => 'PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_4_horizontal_layout.html.twig',
            ],
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => [

            ],
            'monolog.handlers_to_channels' => [
                'monolog.handler.console_very_verbose' => [
                    'type' => 'inclusive',
                    'elements' => [
                        0 => 'doctrine',
                    ],
                ],
                'monolog.handler.console' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'doctrine',
                    ],
                ],
                'monolog.handler.legacy' => [
                    'type' => 'inclusive',
                    'elements' => [
                        0 => 'app',
                    ],
                ],
                'monolog.handler.main' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'event',
                    ],
                ],
            ],
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.impersonate.class' => 'Swift_Plugins_ImpersonatePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Swift_Plugins_MessageLogger',
            'swiftmailer.plugin.antiflood.class' => 'Swift_Plugins_AntiFloodPlugin',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.spool.file.class' => 'Swift_FileSpool',
            'swiftmailer.spool.memory.class' => 'Swift_MemorySpool',
            'swiftmailer.email_sender.listener.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener',
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.mailer.default.transport.name' => 'smtp',
            'swiftmailer.mailer.default.transport.smtp.encryption' => NULL,
            'swiftmailer.mailer.default.transport.smtp.port' => 25,
            'swiftmailer.mailer.default.transport.smtp.host' => '127.0.0.1',
            'swiftmailer.mailer.default.transport.smtp.username' => NULL,
            'swiftmailer.mailer.default.transport.smtp.password' => NULL,
            'swiftmailer.mailer.default.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.default.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.default.transport.smtp.source_ip' => NULL,
            'swiftmailer.mailer.default.transport.smtp.local_domain' => NULL,
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => [
                'default' => 'swiftmailer.mailer.default',
            ],
            'swiftmailer.default_mailer' => 'default',
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [
                'default' => 'doctrine.orm.default_entity_manager',
            ],
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerAwareEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'prestashop.security.voter.product.class' => 'PrestaShopBundle\\Security\\Voter\\PageVoter',
            'prestashop.core.grid.data.factory.doctrine_grid_data_factory' => 'PrestaShop\\PrestaShop\\Core\\Grid\\Data\\Factory\\DoctrineGridDataFactory',
            'prestashop.addons.categories' => [
                440 => [
                    'id_category' => 440,
                    'order' => 10,
                    'name' => 'Administration',
                    'link' => '/en/440-administration',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '435',
                            'name' => 'Legal',
                            'id_parent' => '440',
                            'link_rewrite' => 'legal',
                            'link' => '/en/435-legal',
                            'tab' => 'administration',
                        ],
                        1 => [
                            'id_category' => '527',
                            'name' => 'Registration & Ordering Process',
                            'id_parent' => '440',
                            'link_rewrite' => 'registration-ordering-process',
                            'link' => '/en/527-registration-ordering-process',
                            'tab' => 'checkout',
                        ],
                        2 => [
                            'id_category' => '437',
                            'name' => 'Notifications & Automatic Emails',
                            'id_parent' => '440',
                            'link_rewrite' => 'emails-notifications',
                            'link' => '/en/437-emails-notifications',
                            'tab' => 'emailing',
                        ],
                        3 => [
                            'id_category' => '448',
                            'name' => 'Price Management',
                            'id_parent' => '440',
                            'link_rewrite' => 'price-management',
                            'link' => '/en/448-price-management',
                            'tab' => 'administration',
                        ],
                        4 => [
                            'id_category' => '441',
                            'name' => 'Order Management',
                            'id_parent' => '440',
                            'link_rewrite' => 'order-management',
                            'link' => '/en/441-order-management',
                            'tab' => 'administration',
                        ],
                        5 => [
                            'id_category' => '446',
                            'name' => 'Accounting & Invoicing',
                            'id_parent' => '440',
                            'link_rewrite' => 'accounting-invoicing',
                            'link' => '/en/446-accounting-invoicing',
                            'tab' => 'billing_invoicing',
                        ],
                        6 => [
                            'id_category' => '433',
                            'name' => 'Fast & Mass Update',
                            'id_parent' => '440',
                            'link_rewrite' => 'fast-mass-updates',
                            'link' => '/en/433-fast-mass-updates',
                            'tab' => 'quick_bulk_update',
                        ],
                        7 => [
                            'id_category' => '451',
                            'name' => 'Data Import & Export',
                            'id_parent' => '440',
                            'link_rewrite' => 'data-import-export',
                            'link' => '/en/451-data-import-export',
                            'tab' => 'export',
                        ],
                        8 => [
                            'id_category' => '452',
                            'name' => 'Third-party Data Integration (CRM, ERP...)',
                            'id_parent' => '440',
                            'link_rewrite' => 'third-party-data-integrations-crm-erp',
                            'link' => '/en/452-third-party-data-integrations-crm-erp',
                            'tab' => 'export',
                        ],
                        9 => [
                            'id_category' => '453',
                            'name' => 'Analytics & Statistics',
                            'id_parent' => '440',
                            'link_rewrite' => 'analytics-statistics',
                            'link' => '/en/453-analytics-statistics',
                            'tab' => 'analytics_stats',
                        ],
                        10 => [
                            'id_category' => '209',
                            'name' => 'Dashboards',
                            'id_parent' => '440',
                            'link_rewrite' => 'dashboards',
                            'link' => '/en/209-dashboards',
                            'tab' => 'administration',
                        ],
                        11 => [
                            'id_category' => '432',
                            'name' => 'Website Performance',
                            'id_parent' => '440',
                            'link_rewrite' => 'website-performance',
                            'link' => '/en/432-website-performance',
                            'tab' => 'administration',
                        ],
                        12 => [
                            'id_category' => '436',
                            'name' => 'International & Localization',
                            'id_parent' => '440',
                            'link_rewrite' => 'international-localization',
                            'link' => '/en/436-international-localization',
                            'tab' => 'i18n_localization',
                        ],
                        13 => [
                            'id_category' => '431',
                            'name' => 'Data migration & Backup',
                            'id_parent' => '440',
                            'link_rewrite' => 'data-migration-backup',
                            'link' => '/en/431-data-migration-backup',
                            'tab' => 'migration_tools',
                        ],
                        14 => [
                            'id_category' => '543',
                            'name' => 'Administrative Tools',
                            'id_parent' => '440',
                            'link_rewrite' => 'administrative-tools',
                            'link' => '/en/543-administrative-tools',
                            'tab' => 'administration',
                        ],
                        15 => [
                            'id_category' => '429',
                            'name' => 'Security & Access',
                            'id_parent' => '440',
                            'link_rewrite' => 'website-security-access',
                            'link' => '/en/429-website-security-access',
                            'tab' => 'administration',
                        ],
                    ],
                    'tab' => 'administration',
                ],
                455 => [
                    'id_category' => 455,
                    'order' => 90,
                    'name' => 'Facebook & Social Networks',
                    'link' => '/en/455-facebook-social-networks',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '456',
                            'name' => 'Share Buttons & Comments',
                            'id_parent' => '455',
                            'link_rewrite' => 'share-buttons-comments',
                            'link' => '/en/456-share-buttons-comments',
                            'tab' => 'social_networks',
                        ],
                        1 => [
                            'id_category' => '457',
                            'name' => 'Social Login & Connect',
                            'id_parent' => '455',
                            'link_rewrite' => 'social-login-connect',
                            'link' => '/en/457-social-login-connect',
                            'tab' => 'social_networks',
                        ],
                        2 => [
                            'id_category' => '458',
                            'name' => 'Social Rewards & Coupons',
                            'id_parent' => '455',
                            'link_rewrite' => 'social-rewards-coupons',
                            'link' => '/en/458-social-rewards-coupons',
                            'tab' => 'social_networks',
                        ],
                        3 => [
                            'id_category' => '459',
                            'name' => 'Products on Facebook & Social Networks',
                            'id_parent' => '455',
                            'link_rewrite' => 'products-on-facebook-social-networks',
                            'link' => '/en/459-products-on-facebook-social-networks',
                            'tab' => 'social_networks',
                        ],
                        4 => [
                            'id_category' => '539',
                            'name' => 'Social Widgets',
                            'id_parent' => '455',
                            'link_rewrite' => 'social-widgets',
                            'link' => '/en/539-social-widgets',
                            'tab' => 'social_networks',
                        ],
                    ],
                    'tab' => 'advertising_marketing',
                ],
                460 => [
                    'id_category' => 460,
                    'order' => 40,
                    'name' => 'Product Page',
                    'link' => '/en/460-product-page',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '462',
                            'name' => 'Visual Products',
                            'id_parent' => '460',
                            'link_rewrite' => 'visual-products',
                            'link' => '/en/462-visual-products',
                            'tab' => 'front_office_features',
                        ],
                        1 => [
                            'id_category' => '463',
                            'name' => 'Videos & Music',
                            'id_parent' => '460',
                            'link_rewrite' => 'videos-music',
                            'link' => '/en/463-videos-music',
                            'tab' => 'front_office_features',
                        ],
                        2 => [
                            'id_category' => '467',
                            'name' => 'Combinations & Product Customization',
                            'id_parent' => '460',
                            'link_rewrite' => 'combinaisons-customization',
                            'link' => '/en/467-combinaisons-customization',
                            'tab' => 'front_office_features',
                        ],
                        3 => [
                            'id_category' => '465',
                            'name' => 'Badges & Logos',
                            'id_parent' => '460',
                            'link_rewrite' => 'labels-logos',
                            'link' => '/en/465-labels-logos',
                            'tab' => 'front_office_features',
                        ],
                        4 => [
                            'id_category' => '466',
                            'name' => 'Sizes & Units',
                            'id_parent' => '460',
                            'link_rewrite' => 'sizes-units',
                            'link' => '/en/466-sizes-units',
                            'tab' => 'front_office_features',
                        ],
                        5 => [
                            'id_category' => '545',
                            'name' => 'Additional Information & Product Tab',
                            'id_parent' => '460',
                            'link_rewrite' => 'additional-information-product-tab',
                            'link' => '/en/545-additional-information-product-tab',
                            'tab' => 'front_office_features',
                        ],
                    ],
                    'tab' => 'administration',
                ],
                469 => [
                    'id_category' => 469,
                    'order' => 100,
                    'name' => 'Specialized Platforms',
                    'link' => '/en/469-specialized-platforms',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '434',
                            'name' => 'B2B',
                            'id_parent' => '469',
                            'link_rewrite' => 'b2b',
                            'link' => '/en/434-b2b',
                            'tab' => 'administration',
                        ],
                        1 => [
                            'id_category' => '443',
                            'name' => 'Dropshipping',
                            'id_parent' => '469',
                            'link_rewrite' => 'dropshipping',
                            'link' => '/en/443-dropshipping',
                            'tab' => 'shipping_logistics',
                        ],
                        2 => [
                            'id_category' => '474',
                            'name' => 'Virtual Products',
                            'id_parent' => '469',
                            'link_rewrite' => 'virtual-products',
                            'link' => '/en/474-virtual-products',
                            'tab' => 'administration',
                        ],
                        3 => [
                            'id_category' => '529',
                            'name' => 'Subscription Products (box)',
                            'id_parent' => '469',
                            'link_rewrite' => 'subscription-products',
                            'link' => '/en/529-subscription-products',
                            'tab' => 'pricing_promotion',
                        ],
                        4 => [
                            'id_category' => '472',
                            'name' => 'Marketplace Creation',
                            'id_parent' => '469',
                            'link_rewrite' => 'marketplace-creation',
                            'link' => '/en/472-marketplace-creation',
                            'tab' => 'administration',
                        ],
                        5 => [
                            'id_category' => '473',
                            'name' => 'Reservation & Rental System',
                            'id_parent' => '469',
                            'link_rewrite' => 'reservation-rental-system',
                            'link' => '/en/473-reservation-rental-system',
                            'tab' => 'administration',
                        ],
                        6 => [
                            'id_category' => '470',
                            'name' => 'Auction Site',
                            'id_parent' => '469',
                            'link_rewrite' => 'build-auction-site',
                            'link' => '/en/470-build-auction-site',
                            'tab' => 'pricing_promotion',
                        ],
                        7 => [
                            'id_category' => '623',
                            'name' => 'Food & Restaurants',
                            'id_parent' => '469',
                            'link_rewrite' => 'food-restaurants',
                            'link' => '/en/623-food-restaurants',
                        ],
                    ],
                    'tab' => 'others',
                ],
                475 => [
                    'id_category' => 475,
                    'order' => 80,
                    'name' => 'Customers',
                    'link' => '/en/475-customers',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '480',
                            'name' => 'Customer Reviews',
                            'id_parent' => '475',
                            'link_rewrite' => 'customer-reviews',
                            'link' => '/en/480-customer-reviews',
                            'tab' => 'front_office_features',
                        ],
                        1 => [
                            'id_category' => '537',
                            'name' => 'Customer Administration',
                            'id_parent' => '475',
                            'link_rewrite' => 'customer-administration',
                            'link' => '/en/537-customer-administration',
                            'tab' => 'administration',
                        ],
                        2 => [
                            'id_category' => '438',
                            'name' => 'Quotes',
                            'id_parent' => '475',
                            'link_rewrite' => 'quotes',
                            'link' => '/en/438-quotes',
                            'tab' => 'front_office_features',
                        ],
                        3 => [
                            'id_category' => '442',
                            'name' => 'Customer Service',
                            'id_parent' => '475',
                            'link_rewrite' => 'customer-service',
                            'link' => '/en/442-customer-service',
                            'tab' => 'administration',
                        ],
                        4 => [
                            'id_category' => '476',
                            'name' => 'Contact Forms & Surveys',
                            'id_parent' => '475',
                            'link_rewrite' => 'contact-forms-surveys',
                            'link' => '/en/476-contact-forms-surveys',
                            'tab' => 'front_office_features',
                        ],
                        5 => [
                            'id_category' => '479',
                            'name' => 'FAQ (Frequently Asked Questions)',
                            'id_parent' => '475',
                            'link_rewrite' => 'faq-frequently-asked-questions',
                            'link' => '/en/479-faq-frequently-asked-questions',
                            'tab' => 'front_office_features',
                        ],
                        6 => [
                            'id_category' => '477',
                            'name' => 'Support & Online Chat',
                            'id_parent' => '475',
                            'link_rewrite' => 'support-online-chat',
                            'link' => '/en/477-support-online-chat',
                            'tab' => 'front_office_features',
                        ],
                    ],
                    'tab' => 'administration',
                ],
                481 => [
                    'id_category' => 481,
                    'order' => 50,
                    'name' => 'Payment',
                    'link' => '/en/481-payment',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '482',
                            'name' => 'Payment by Card or Wallet',
                            'id_parent' => '481',
                            'link_rewrite' => 'payment-card-wallet',
                            'link' => '/en/482-payment-card-wallet',
                            'tab' => 'payments_gateways',
                        ],
                        1 => [
                            'id_category' => '534',
                            'name' => 'Bank Transfer Payment',
                            'id_parent' => '481',
                            'link_rewrite' => 'bank-transfer-payment',
                            'link' => '/en/534-bank-transfer-payment',
                            'tab' => 'payments_gateways',
                        ],
                        2 => [
                            'id_category' => '483',
                            'name' => 'Payment by Invoice',
                            'id_parent' => '481',
                            'link_rewrite' => 'payment-invoice',
                            'link' => '/en/483-payment-invoice',
                            'tab' => 'payments_gateways',
                        ],
                        3 => [
                            'id_category' => '486',
                            'name' => 'Prepayment',
                            'id_parent' => '481',
                            'link_rewrite' => 'prepayment',
                            'link' => '/en/486-prepayment',
                            'tab' => 'payments_gateways',
                        ],
                        4 => [
                            'id_category' => '485',
                            'name' => 'Cash On Delivery (COD)',
                            'id_parent' => '481',
                            'link_rewrite' => 'cash-on-delivery-cod',
                            'link' => '/en/485-cash-on-delivery-cod',
                            'tab' => 'payments_gateways',
                        ],
                        5 => [
                            'id_category' => '484',
                            'name' => 'Payment in Physical Stores',
                            'id_parent' => '481',
                            'link_rewrite' => 'payment-physical-stores',
                            'link' => '/en/484-payment-physical-stores',
                            'tab' => 'payments_gateways',
                        ],
                        6 => [
                            'id_category' => '487',
                            'name' => 'Point of Sale (POS)',
                            'id_parent' => '481',
                            'link_rewrite' => 'point-of-sale-pos',
                            'link' => '/en/487-point-of-sale-pos',
                            'tab' => 'payments_gateways',
                        ],
                        7 => [
                            'id_category' => '530',
                            'name' => 'Other Payment Methods',
                            'id_parent' => '481',
                            'link_rewrite' => 'other-payment-methods',
                            'link' => '/en/530-other-payment-methods',
                            'tab' => 'payments_gateways',
                        ],
                        8 => [
                            'id_category' => '627',
                            'name' => 'Recurring payment (subscription)',
                            'id_parent' => '481',
                            'link_rewrite' => 'recurring-payment-subscription',
                            'link' => '/en/627-recurring-payment-subscription',
                        ],
                    ],
                    'tab' => 'payments_gateways',
                ],
                488 => [
                    'id_category' => 488,
                    'order' => 70,
                    'name' => 'Traffic & Marketplaces',
                    'link' => '/en/488-traffic-marketplaces',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '489',
                            'name' => 'Marketplaces',
                            'id_parent' => '488',
                            'link_rewrite' => 'marketplaces',
                            'link' => '/en/489-marketplaces',
                            'tab' => 'market_place',
                        ],
                        1 => [
                            'id_category' => '490',
                            'name' => 'Price Comparison',
                            'id_parent' => '488',
                            'link_rewrite' => 'price-comparison',
                            'link' => '/en/490-price-comparison',
                            'tab' => 'smart_shopping',
                        ],
                        2 => [
                            'id_category' => '491',
                            'name' => 'SEO',
                            'id_parent' => '488',
                            'link_rewrite' => 'seo-natural-search-engine-optimization',
                            'link' => '/en/491-seo-natural-search-engine-optimization',
                            'tab' => 'seo',
                        ],
                        3 => [
                            'id_category' => '531',
                            'name' => 'URL & Redirects',
                            'id_parent' => '488',
                            'link_rewrite' => 'url-redirects',
                            'link' => '/en/531-url-redirects',
                            'tab' => 'seo',
                        ],
                        4 => [
                            'id_category' => '495',
                            'name' => 'Blog, Forum & News',
                            'id_parent' => '488',
                            'link_rewrite' => 'blog-forum-new',
                            'link' => '/en/495-blog-forum-new',
                            'tab' => 'content_management',
                        ],
                        5 => [
                            'id_category' => '493',
                            'name' => 'SEA SEM (paid advertising) & Affiliation Platforms',
                            'id_parent' => '488',
                            'link_rewrite' => 'sea-paid-advertising-affiliation-platforms',
                            'link' => '/en/493-sea-paid-advertising-affiliation-platforms',
                            'tab' => 'advertising_marketing',
                        ],
                    ],
                    'tab' => 'checkout',
                ],
                496 => [
                    'id_category' => 496,
                    'order' => 30,
                    'name' => 'Promotions & Marketing',
                    'link' => '/en/496-promotions-marketing',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '500',
                            'name' => 'Newsletter & SMS',
                            'id_parent' => '496',
                            'link_rewrite' => 'newsletter-sms',
                            'link' => '/en/500-newsletter-sms',
                            'tab' => 'emailing',
                        ],
                        1 => [
                            'id_category' => '497',
                            'name' => 'Promotions & Gifts',
                            'id_parent' => '496',
                            'link_rewrite' => 'promotions-gifts',
                            'link' => '/en/497-promotions-gifts',
                            'tab' => 'pricing_promotion',
                        ],
                        2 => [
                            'id_category' => '503',
                            'name' => 'Referral & Loyalty Programs',
                            'id_parent' => '496',
                            'link_rewrite' => 'referral-loyalty-programs',
                            'link' => '/en/503-referral-loyalty-programs',
                            'tab' => 'advertising_marketing',
                        ],
                        3 => [
                            'id_category' => '499',
                            'name' => 'Flash & Private Sales',
                            'id_parent' => '496',
                            'link_rewrite' => 'private-sales-flash-sales',
                            'link' => '/en/499-private-sales-flash-sales',
                            'tab' => 'pricing_promotion',
                        ],
                        4 => [
                            'id_category' => '501',
                            'name' => 'Remarketing & Shopping Cart Abandonment',
                            'id_parent' => '496',
                            'link_rewrite' => 'remarketing-shopping-cart-abandonment',
                            'link' => '/en/501-remarketing-shopping-cart-abandonment',
                            'tab' => 'advertising_marketing',
                        ],
                        5 => [
                            'id_category' => '505',
                            'name' => 'Cross-selling & Product Bundles',
                            'id_parent' => '496',
                            'link_rewrite' => 'cross-selling-product-bundles',
                            'link' => '/en/505-cross-selling-product-bundles',
                            'tab' => 'merchandizing',
                        ],
                        6 => [
                            'id_category' => '502',
                            'name' => 'Pop-up',
                            'id_parent' => '496',
                            'link_rewrite' => 'pop-up',
                            'link' => '/en/502-pop-up',
                            'tab' => 'front_office_features',
                        ],
                        7 => [
                            'id_category' => '533',
                            'name' => 'Contests',
                            'id_parent' => '496',
                            'link_rewrite' => 'contests',
                            'link' => '/en/533-contests',
                            'tab' => 'advertising_marketing',
                        ],
                        8 => [
                            'id_category' => '504',
                            'name' => 'Wishlist & Gift Card ',
                            'id_parent' => '496',
                            'link_rewrite' => 'wishlist-gift-card',
                            'link' => '/en/504-wishlist-gift-card',
                            'tab' => 'front_office_features',
                        ],
                    ],
                    'tab' => 'pricing_promotion',
                ],
                507 => [
                    'id_category' => 507,
                    'order' => 20,
                    'name' => 'Design & Navigation',
                    'link' => '/en/507-design-navigation',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '513',
                            'name' => 'Menu',
                            'id_parent' => '507',
                            'link_rewrite' => 'menu',
                            'link' => '/en/513-menu',
                            'tab' => 'front_office_features',
                        ],
                        1 => [
                            'id_category' => '517',
                            'name' => 'Blocks, Tabs & Banners',
                            'id_parent' => '507',
                            'link_rewrite' => 'blocks-tabs-banners',
                            'link' => '/en/517-blocks-tabs-banners',
                            'tab' => 'front_office_features',
                        ],
                        2 => [
                            'id_category' => '461',
                            'name' => 'Sliders & Galleries',
                            'id_parent' => '507',
                            'link_rewrite' => 'sliders-galleries',
                            'link' => '/en/461-sliders-galleries',
                            'tab' => 'slideshows',
                        ],
                        3 => [
                            'id_category' => '510',
                            'name' => 'Search & Filters',
                            'id_parent' => '507',
                            'link_rewrite' => 'search-filters',
                            'link' => '/en/510-search-filters',
                            'tab' => 'search_filter',
                        ],
                        4 => [
                            'id_category' => '516',
                            'name' => 'Page Customization',
                            'id_parent' => '507',
                            'link_rewrite' => 'page-customization',
                            'link' => '/en/516-page-customization',
                            'tab' => 'front_office_features',
                        ],
                        5 => [
                            'id_category' => '511',
                            'name' => 'Navigation Tools',
                            'id_parent' => '507',
                            'link_rewrite' => 'navigation-tools',
                            'link' => '/en/511-navigation-tools',
                            'tab' => 'front_office_features',
                        ],
                        6 => [
                            'id_category' => '538',
                            'name' => 'Products on Homepage',
                            'id_parent' => '507',
                            'link_rewrite' => 'products-homepage',
                            'link' => '/en/538-products-homepage',
                            'tab' => 'front_office_features',
                        ],
                        7 => [
                            'id_category' => '512',
                            'name' => 'Brands & Manufacturers',
                            'id_parent' => '507',
                            'link_rewrite' => 'brands-manufacturers',
                            'link' => '/en/512-brands-manufacturers',
                            'tab' => 'front_office_features',
                        ],
                        8 => [
                            'id_category' => '509',
                            'name' => 'Express Checkout Process',
                            'id_parent' => '507',
                            'link_rewrite' => 'express-checkout-process',
                            'link' => '/en/509-express-checkout-process',
                            'tab' => 'checkout',
                        ],
                        9 => [
                            'id_category' => '508',
                            'name' => 'Mobile',
                            'id_parent' => '507',
                            'link_rewrite' => 'mobile',
                            'link' => '/en/508-mobile',
                            'tab' => 'mobile',
                        ],
                    ],
                    'tab' => 'front_office_features',
                ],
                518 => [
                    'id_category' => 518,
                    'order' => 60,
                    'name' => 'Shipping & Logistics',
                    'link' => '/en/518-shipping-logistics',
                    'parent_link' => '/en/2-prestashop-modules',
                    'id_parent' => 2,
                    'categories' => [
                        0 => [
                            'id_category' => '444',
                            'name' => 'Stock & Supplier Management',
                            'id_parent' => '518',
                            'link_rewrite' => 'stock-supplier-management',
                            'link' => '/en/444-stock-supplier-management',
                            'tab' => 'administration',
                        ],
                        1 => [
                            'id_category' => '519',
                            'name' => 'Preparation & Shipping',
                            'id_parent' => '518',
                            'link_rewrite' => 'preparation-shipping',
                            'link' => '/en/519-preparation-shipping',
                            'tab' => 'shipping_logistics',
                        ],
                        2 => [
                            'id_category' => '520',
                            'name' => 'Shipping Carriers',
                            'id_parent' => '518',
                            'link_rewrite' => 'shipping-carriers',
                            'link' => '/en/520-shipping-carriers',
                            'tab' => 'shipping_logistics',
                        ],
                        3 => [
                            'id_category' => '523',
                            'name' => 'Shipping Costs',
                            'id_parent' => '518',
                            'link_rewrite' => 'shipping-costs',
                            'link' => '/en/523-shipping-costs',
                            'tab' => 'shipping_logistics',
                        ],
                        4 => [
                            'id_category' => '521',
                            'name' => 'Collection Points & In-Store Pick Up',
                            'id_parent' => '518',
                            'link_rewrite' => 'collection-points-in-store-pick-up',
                            'link' => '/en/521-collection-points-in-store-pick-up',
                            'tab' => 'shipping_logistics',
                        ],
                        5 => [
                            'id_category' => '522',
                            'name' => 'Delivery Date',
                            'id_parent' => '518',
                            'link_rewrite' => 'delivery-date',
                            'link' => '/en/522-delivery-date',
                            'tab' => 'shipping_logistics',
                        ],
                        6 => [
                            'id_category' => '524',
                            'name' => 'Delivery Tracking',
                            'id_parent' => '518',
                            'link_rewrite' => 'delivery-tracking',
                            'link' => '/en/524-delivery-tracking',
                            'tab' => 'shipping_logistics',
                        ],
                    ],
                    'tab' => 'shipping_logistics',
                ],
            ],
            'prestashop.addons.prestatrust.enabled' => true,
            'prestashop.addons.api_client.ttl' => 300,
            'tactician.commandbus.class' => 'League\\Tactician\\CommandBus',
            'web_profiler.debug_toolbar.position' => 'bottom',
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'data_collector.templates' => [
                'data_collector.request' => [
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ],
                'data_collector.time' => [
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ],
                'data_collector.memory' => [
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ],
                'data_collector.validator' => [
                    0 => 'validator',
                    1 => '@WebProfiler/Collector/validator.html.twig',
                ],
                'data_collector.ajax' => [
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ],
                'data_collector.form' => [
                    0 => 'form',
                    1 => '@WebProfiler/Collector/form.html.twig',
                ],
                'data_collector.exception' => [
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ],
                'data_collector.logger' => [
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ],
                'data_collector.events' => [
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ],
                'data_collector.router' => [
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ],
                'data_collector.cache' => [
                    0 => 'cache',
                    1 => '@WebProfiler/Collector/cache.html.twig',
                ],
                'data_collector.translation' => [
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ],
                'data_collector.security' => [
                    0 => 'security',
                    1 => '@Security/Collector/security.html.twig',
                ],
                'data_collector.twig' => [
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ],
                'data_collector.doctrine' => [
                    0 => 'db',
                    1 => '@Doctrine/Collector/db.html.twig',
                ],
                'swiftmailer.data_collector' => [
                    0 => 'swiftmailer',
                    1 => '@Swiftmailer/Collector/swiftmailer.html.twig',
                ],
                'data_collector.dump' => [
                    0 => 'dump',
                    1 => '@Debug/Profiler/dump.html.twig',
                ],
                'prestashop.hooks_collector' => [
                    0 => 'ps.hooks_collector',
                    1 => '@PrestaShop/Admin/WebProfiler/hooks_collector.html.twig',
                ],
                'csa_guzzle.data_collector.guzzle' => [
                    0 => 'guzzle',
                    1 => 'CsaGuzzleBundle:Collector:guzzle',
                ],
                'data_collector.config' => [
                    0 => 'config',
                    1 => '@PrestaShop/Admin/WebProfiler/config.html.twig',
                ],
            ],
            'console.command.ids' => [
                'console.command.symfony_bundle_frameworkbundle_command_aboutcommand' => 'console.command.about',
                'console.command.symfony_bundle_frameworkbundle_command_assetsinstallcommand' => 'console.command.assets_install',
                'console.command.symfony_bundle_frameworkbundle_command_cacheclearcommand' => 'console.command.cache_clear',
                'console.command.symfony_bundle_frameworkbundle_command_cachepoolclearcommand' => 'console.command.cache_pool_clear',
                'console.command.symfony_bundle_frameworkbundle_command_cachepoolprunecommand' => 'console.command.cache_pool_prune',
                'console.command.symfony_bundle_frameworkbundle_command_cachewarmupcommand' => 'console.command.cache_warmup',
                'console.command.symfony_bundle_frameworkbundle_command_configdebugcommand' => 'console.command.config_debug',
                'console.command.symfony_bundle_frameworkbundle_command_configdumpreferencecommand' => 'console.command.config_dump_reference',
                'console.command.symfony_bundle_frameworkbundle_command_containerdebugcommand' => 'console.command.container_debug',
                'console.command.symfony_bundle_frameworkbundle_command_debugautowiringcommand' => 'console.command.debug_autowiring',
                'console.command.symfony_bundle_frameworkbundle_command_eventdispatcherdebugcommand' => 'console.command.event_dispatcher_debug',
                'console.command.symfony_bundle_frameworkbundle_command_routerdebugcommand' => 'console.command.router_debug',
                'console.command.symfony_bundle_frameworkbundle_command_routermatchcommand' => 'console.command.router_match',
                'console.command.symfony_bundle_frameworkbundle_command_translationdebugcommand' => 'console.command.translation_debug',
                'console.command.symfony_bundle_frameworkbundle_command_translationupdatecommand' => 'console.command.translation_update',
                'console.command.symfony_bundle_frameworkbundle_command_xlifflintcommand' => 'console.command.xliff_lint',
                'console.command.symfony_bundle_frameworkbundle_command_yamllintcommand' => 'console.command.yaml_lint',
                'console.command.symfony_component_form_command_debugcommand' => 'console.command.form_debug',
                'console.command.symfony_bundle_securitybundle_command_userpasswordencodercommand' => 'security.command.user_password_encoder',
                'console.command.symfony_bridge_twig_command_debugcommand' => 'twig.command.debug',
                'console.command.symfony_bundle_twigbundle_command_lintcommand' => 'twig.command.lint',
                'console.command.doctrine_bundle_doctrinecachebundle_command_containscommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_containscommand',
                'console.command.doctrine_bundle_doctrinecachebundle_command_deletecommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_deletecommand',
                'console.command.doctrine_bundle_doctrinecachebundle_command_flushcommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_flushcommand',
                'console.command.doctrine_bundle_doctrinecachebundle_command_statscommand' => 'console.command.doctrine_bundle_doctrinecachebundle_command_statscommand',
                'console.command.doctrine_bundle_doctrinebundle_command_createdatabasedoctrinecommand' => 'doctrine.database_create_command',
                'console.command.doctrine_bundle_doctrinebundle_command_dropdatabasedoctrinecommand' => 'doctrine.database_drop_command',
                'console.command.doctrine_bundle_doctrinebundle_command_generateentitiesdoctrinecommand' => 'doctrine.generate_entities_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_runsqldoctrinecommand' => 'doctrine.query_sql_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_clearmetadatacachedoctrinecommand' => 'doctrine.cache_clear_metadata_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_clearquerycachedoctrinecommand' => 'doctrine.cache_clear_query_cache_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_clearresultcachedoctrinecommand' => 'doctrine.cache_clear_result_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_collectionregiondoctrinecommand' => 'doctrine.cache_collection_region_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_convertmappingdoctrinecommand' => 'doctrine.mapping_convert_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_createschemadoctrinecommand' => 'doctrine.schema_create_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_dropschemadoctrinecommand' => 'doctrine.schema_drop_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_ensureproductionsettingsdoctrinecommand' => 'doctrine.ensure_production_settings_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_entityregioncachedoctrinecommand' => 'doctrine.clear_entity_region_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_importdoctrinecommand' => 'doctrine.database_import_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_infodoctrinecommand' => 'doctrine.mapping_info_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_queryregioncachedoctrinecommand' => 'doctrine.clear_query_region_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_rundqldoctrinecommand' => 'doctrine.query_dql_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_updateschemadoctrinecommand' => 'doctrine.schema_update_command',
                'console.command.doctrine_bundle_doctrinebundle_command_proxy_validateschemacommand' => 'doctrine.schema_validate_command',
                'console.command.doctrine_bundle_doctrinebundle_command_importmappingdoctrinecommand' => 'doctrine.mapping_import_command',
                'console.command.sensiolabs_security_command_securitycheckercommand' => 'sensio_distribution.security_checker.command',
                'console.command.symfony_bundle_webserverbundle_command_serverruncommand' => 'web_server.command.server_run',
                'console.command.symfony_bundle_webserverbundle_command_serverstartcommand' => 'web_server.command.server_start',
                'console.command.symfony_bundle_webserverbundle_command_serverstopcommand' => 'web_server.command.server_stop',
                'console.command.symfony_bundle_webserverbundle_command_serverstatuscommand' => 'web_server.command.server_status',
                'console.command.symfony_bundle_webserverbundle_command_serverlogcommand' => 'web_server.command.server_log',
            ],
            'console.lazy_command.ids' => [
                'console.command.about' => true,
                'console.command.assets_install' => true,
                'console.command.cache_clear' => true,
                'console.command.cache_pool_clear' => true,
                'console.command.cache_pool_prune' => true,
                'console.command.cache_warmup' => true,
                'console.command.config_debug' => true,
                'console.command.config_dump_reference' => true,
                'console.command.container_debug' => true,
                'console.command.debug_autowiring' => true,
                'console.command.event_dispatcher_debug' => true,
                'console.command.router_debug' => true,
                'console.command.router_match' => true,
                'console.command.translation_debug' => true,
                'console.command.translation_update' => true,
                'console.command.xliff_lint' => true,
                'console.command.yaml_lint' => true,
                'console.command.form_debug' => true,
                'security.command.user_password_encoder' => true,
                'twig.command.debug' => true,
                'twig.command.lint' => true,
                'doctrine.database_create_command' => true,
                'doctrine.database_drop_command' => true,
                'doctrine.generate_entities_command' => true,
                'doctrine.query_sql_command' => true,
                'doctrine.cache_clear_metadata_command' => true,
                'doctrine.cache_clear_query_cache_command' => true,
                'doctrine.cache_clear_result_command' => true,
                'doctrine.cache_collection_region_command' => true,
                'doctrine.mapping_convert_command' => true,
                'doctrine.schema_create_command' => true,
                'doctrine.schema_drop_command' => true,
                'doctrine.ensure_production_settings_command' => true,
                'doctrine.clear_entity_region_command' => true,
                'doctrine.database_import_command' => true,
                'doctrine.mapping_info_command' => true,
                'doctrine.clear_query_region_command' => true,
                'doctrine.query_dql_command' => true,
                'doctrine.schema_update_command' => true,
                'doctrine.schema_validate_command' => true,
                'doctrine.mapping_import_command' => true,
                'sensio_distribution.security_checker.command' => true,
                'web_server.command.server_run' => true,
                'web_server.command.server_start' => true,
                'web_server.command.server_stop' => true,
                'web_server.command.server_status' => true,
                'web_server.command.server_log' => true,
            ],
        ];
    }
}
