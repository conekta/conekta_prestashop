<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/common')) {
            if (0 === strpos($pathinfo, '/common/notifications')) {
                // admin_common_notifications
                if ('/common/notifications' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::notificationsAction',  '_legacy_controller' => 'AdminCommon',  '_legacy_link' => 'AdminCommon',  '_route' => 'admin_common_notifications',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_common_notifications;
                    }

                    return $ret;
                }
                not_admin_common_notifications:

                // admin_common_notifications_ack
                if ('/common/notifications/ack' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::notificationsAckAction',  '_route' => 'admin_common_notifications_ack',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_common_notifications_ack;
                    }

                    return $ret;
                }
                not_admin_common_notifications_ack:

            }

            // admin_common_pagination
            if (0 === strpos($pathinfo, '/common/pagination') && preg_match('#^/common/pagination(?:/(?P<offset>\\d+)(?:/(?P<limit>\\d+)(?:/(?P<total>\\d+)(?:/(?P<view>full|quicknav))?)?)?)?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_common_pagination']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::paginationAction',  'offset' => 0,  'limit' => 20,  'total' => 0,  'view' => 'full',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_common_pagination;
                }

                return $ret;
            }
            not_admin_common_pagination:

            // admin_common_recommended_modules
            if (0 === strpos($pathinfo, '/common/recommended_modules') && preg_match('#^/common/recommended_modules/(?P<domain>[^/]++)(?:/(?P<limit>\\d+)(?:/(?P<randomize>0|1))?)?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_common_recommended_modules']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::recommendedModulesAction',  'limit' => 0,  'randomize' => 0,));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_common_recommended_modules;
                }

                return $ret;
            }
            not_admin_common_recommended_modules:

            if (0 === strpos($pathinfo, '/common/reset_search')) {
                // admin_common_reset_search
                if (preg_match('#^/common/reset_search/(?P<controller>[^/]++)/(?P<action>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_common_reset_search']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::resetSearchAction',  'filterId' => '',));
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_common_reset_search;
                    }

                    return $ret;
                }
                not_admin_common_reset_search:

                // admin_common_reset_search_by_filter_id
                if (preg_match('#^/common/reset_search/(?P<filterId>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_common_reset_search_by_filter_id']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::resetSearchAction',  'controller' => '',  'action' => '',));
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_common_reset_search_by_filter_id;
                    }

                    return $ret;
                }
                not_admin_common_reset_search_by_filter_id:

            }

            // admin_common_sidebar
            if (0 === strpos($pathinfo, '/common/sidebar') && preg_match('#^/common/sidebar/(?P<url>[^/]++)(?:/(?P<title>[^/]++)(?:/(?P<footer>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_common_sidebar']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::renderSidebarAction',  'title' => '',  'footer' => '',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_common_sidebar;
                }

                return $ret;
            }
            not_admin_common_sidebar:

        }

        elseif (0 === strpos($pathinfo, '/configure')) {
            if (0 === strpos($pathinfo, '/configure/advanced')) {
                if (0 === strpos($pathinfo, '/configure/advanced/logs')) {
                    // admin_logs_index
                    if ('/configure/advanced/logs' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\LogsController::indexAction',  '_legacy_controller' => 'AdminLogs',  '_legacy_link' => 'AdminLogs',  '_route' => 'admin_logs_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_logs_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_logs_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_logs_index;
                        }

                        return $ret;
                    }
                    not_admin_logs_index:

                    // admin_logs_save_settings
                    if ('/configure/advanced/logs/settings' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\LogsController::saveSettingsAction',  '_legacy_controller' => 'AdminLogs',  '_legacy_link' => 'AdminLogs:update',  '_route' => 'admin_logs_save_settings',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_logs_save_settings;
                        }

                        return $ret;
                    }
                    not_admin_logs_save_settings:

                    // admin_logs_delete_all
                    if ('/configure/advanced/logs/delete-all' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\LogsController::deleteAllAction',  '_legacy_controller' => 'AdminLogs',  '_legacy_link' => 'AdminLogs:deletelog',  '_route' => 'admin_logs_delete_all',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_logs_delete_all;
                        }

                        return $ret;
                    }
                    not_admin_logs_delete_all:

                    // admin_logs_search
                    if ('/configure/advanced/logs/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\LogsController::searchAction',  '_legacy_controller' => 'AdminLogs',  '_route' => 'admin_logs_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_logs_search;
                        }

                        return $ret;
                    }
                    not_admin_logs_search:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/administration')) {
                    // admin_administration
                    if ('/configure/advanced/administration' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\AdministrationController::indexAction',  '_legacy_controller' => 'AdminAdminPreferences',  '_legacy_link' => 'AdminAdminPreferences',  '_route' => 'admin_administration',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_administration;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_administration'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_administration;
                        }

                        return $ret;
                    }
                    not_admin_administration:

                    // admin_administration_save
                    if ('/configure/advanced/administration/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\AdministrationController::processFormAction',  '_legacy_controller' => 'AdminAdminPreferences',  '_legacy_link' => 'AdminAdminPreferences:update',  '_route' => 'admin_administration_save',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_administration_save;
                        }

                        return $ret;
                    }
                    not_admin_administration_save:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/import')) {
                    // admin_import
                    if ('/configure/advanced/import' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::importAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport',  '_route' => 'admin_import',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_import;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_import'));
                        }

                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_import;
                        }

                        return $ret;
                    }
                    not_admin_import:

                    if (0 === strpos($pathinfo, '/configure/advanced/import/data')) {
                        // admin_import_data_configuration_index
                        if ('/configure/advanced/import/data' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportDataConfigurationController::indexAction',  '_legacy_controller' => 'AdminImport',  '_route' => 'admin_import_data_configuration_index',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_import_data_configuration_index;
                            }

                            return $ret;
                        }
                        not_admin_import_data_configuration_index:

                        // admin_import_data_configuration_index_redirect
                        if ('/configure/advanced/import/data' === $pathinfo) {
                            $ret = array (  'route' => 'admin_import',  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  '_route' => 'admin_import_data_configuration_index_redirect',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_import_data_configuration_index_redirect;
                            }

                            return $ret;
                        }
                        not_admin_import_data_configuration_index_redirect:

                    }

                    // admin_import_process
                    if ('/configure/advanced/import/process' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::processImportAction',  '_legacy_controller' => 'AdminImport',  '_route' => 'admin_import_process',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_import_process;
                        }

                        return $ret;
                    }
                    not_admin_import_process:

                    if (0 === strpos($pathinfo, '/configure/advanced/import/file')) {
                        // admin_import_file_upload
                        if ('/configure/advanced/import/file/upload' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::uploadAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:uploadCsv',  '_route' => 'admin_import_file_upload',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_import_file_upload;
                            }

                            return $ret;
                        }
                        not_admin_import_file_upload:

                        // admin_import_file_delete
                        if ('/configure/advanced/import/file/delete' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::deleteAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:delete',  '_route' => 'admin_import_file_delete',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_import_file_delete;
                            }

                            return $ret;
                        }
                        not_admin_import_file_delete:

                        // admin_import_file_download
                        if ('/configure/advanced/import/file/download' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::downloadAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:download',  '_route' => 'admin_import_file_download',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_import_file_download;
                            }

                            return $ret;
                        }
                        not_admin_import_file_download:

                    }

                    // admin_import_get_available_fields
                    if ('/configure/advanced/import/fields' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::getAvailableEntityFieldsAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:getAvailableEntityFields',  '_route' => 'admin_import_get_available_fields',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_import_get_available_fields;
                        }

                        return $ret;
                    }
                    not_admin_import_get_available_fields:

                    // admin_import_sample_download
                    if (0 === strpos($pathinfo, '/configure/advanced/import/sample/download') && preg_match('#^/configure/advanced/import/sample/download/(?P<sampleName>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_import_sample_download']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportController::downloadSampleAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:sampleDownload',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_import_sample_download;
                        }

                        return $ret;
                    }
                    not_admin_import_sample_download:

                    if (0 === strpos($pathinfo, '/configure/advanced/import/match')) {
                        // admin_import_data_configuration_create
                        if ('/configure/advanced/import/match' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportDataConfigurationController::createAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:saveImportMatch',  '_route' => 'admin_import_data_configuration_create',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_import_data_configuration_create;
                            }

                            return $ret;
                        }
                        not_admin_import_data_configuration_create:

                        // admin_import_data_configuration_get
                        if ('/configure/advanced/import/match' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportDataConfigurationController::getAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:getImportMatch',  '_route' => 'admin_import_data_configuration_get',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_import_data_configuration_get;
                            }

                            return $ret;
                        }
                        not_admin_import_data_configuration_get:

                        // admin_import_data_configuration_delete
                        if ('/configure/advanced/import/match' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ImportDataConfigurationController::deleteAction',  '_legacy_controller' => 'AdminImport',  '_legacy_link' => 'AdminImport:deleteImportMatch',  '_route' => 'admin_import_data_configuration_delete',);
                            if (!in_array($requestMethod, ['DELETE'])) {
                                $allow = array_merge($allow, ['DELETE']);
                                goto not_admin_import_data_configuration_delete;
                            }

                            return $ret;
                        }
                        not_admin_import_data_configuration_delete:

                    }

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/performance')) {
                    // admin_performance
                    if ('/configure/advanced/performance' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\PerformanceController::indexAction',  '_legacy_controller' => 'AdminPerformance',  '_legacy_link' => 'AdminPerformance',  '_route' => 'admin_performance',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_performance;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_performance'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_performance;
                        }

                        return $ret;
                    }
                    not_admin_performance:

                    // admin_performance_save
                    if ('/configure/advanced/performance/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\PerformanceController::processFormAction',  '_legacy_controller' => 'AdminPerformance',  '_legacy_link' => 'AdminPerformance:update',  '_route' => 'admin_performance_save',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_performance_save;
                        }

                        return $ret;
                    }
                    not_admin_performance_save:

                    // admin_clear_cache
                    if ('/configure/advanced/performance/clear-cache' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\PerformanceController::clearCacheAction',  '_legacy_controller' => 'AdminPerformance',  '_legacy_link' => 'AdminPerformance:empty_smarty_cache',  '_route' => 'admin_clear_cache',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_clear_cache;
                        }

                        return $ret;
                    }
                    not_admin_clear_cache:

                    if (0 === strpos($pathinfo, '/configure/advanced/performance/memcache/servers')) {
                        // admin_servers
                        if ('/configure/advanced/performance/memcache/servers' === $pathinfo && $request->isXmlHttpRequest()) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\MemcacheServerController::listAction',  '_legacy_controller' => 'AdminPerformance',  '_route' => 'admin_servers',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_servers;
                            }

                            return $ret;
                        }
                        not_admin_servers:

                        // admin_servers_add
                        if ('/configure/advanced/performance/memcache/servers' === $pathinfo && $request->isXmlHttpRequest()) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\MemcacheServerController::addAction',  '_legacy_controller' => 'AdminPerformance',  '_legacy_link' => 'AdminPerformance:submitAddServer',  '_route' => 'admin_servers_add',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_servers_add;
                            }

                            return $ret;
                        }
                        not_admin_servers_add:

                        // admin_servers_delete
                        if ('/configure/advanced/performance/memcache/servers' === $pathinfo && $request->isXmlHttpRequest()) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\MemcacheServerController::deleteAction',  '_legacy_controller' => 'AdminPerformance',  '_legacy_link' => 'AdminPerformance:deleteMemcachedServer',  '_route' => 'admin_servers_delete',);
                            if (!in_array($requestMethod, ['DELETE'])) {
                                $allow = array_merge($allow, ['DELETE']);
                                goto not_admin_servers_delete;
                            }

                            return $ret;
                        }
                        not_admin_servers_delete:

                        // admin_servers_test
                        if ('/configure/advanced/performance/memcache/servers/test' === $pathinfo && $request->isXmlHttpRequest()) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\MemcacheServerController::testAction',  '_legacy_controller' => 'AdminPerformance',  '_legacy_link' => 'AdminPerformance:test_server',  '_route' => 'admin_servers_test',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_servers_test;
                            }

                            return $ret;
                        }
                        not_admin_servers_test:

                    }

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/profiles')) {
                    // admin_profiles_index
                    if ('/configure/advanced/profiles' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ProfileController::indexAction',  '_legacy_controller' => 'AdminProfiles',  '_legacy_link' => 'AdminProfiles',  '_route' => 'admin_profiles_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_profiles_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_profiles_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_profiles_index;
                        }

                        return $ret;
                    }
                    not_admin_profiles_index:

                    // admin_profiles_search
                    if ('/configure/advanced/profiles/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ProfileController::searchAction',  '_legacy_controller' => 'AdminProfiles',  '_legacy_link' => 'AdminProfiles:submitFilterprofile',  '_route' => 'admin_profiles_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_profiles_search;
                        }

                        return $ret;
                    }
                    not_admin_profiles_search:

                    // admin_profiles_create
                    if ('/configure/advanced/profiles/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ProfileController::createAction',  '_legacy_controller' => 'AdminProfiles',  '_legacy_link' => 'AdminProfiles:addprofile',  '_route' => 'admin_profiles_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_profiles_create;
                        }

                        return $ret;
                    }
                    not_admin_profiles_create:

                    // admin_profiles_edit
                    if (preg_match('#^/configure/advanced/profiles/(?P<profileId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_profiles_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ProfileController::editAction',  '_legacy_controller' => 'AdminProfiles',  '_legacy_link' => 'AdminProfiles:updateprofile',  '_legacy_parameters' =>   array (    'id_profile' => 'profileId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_profiles_edit;
                        }

                        return $ret;
                    }
                    not_admin_profiles_edit:

                    // admin_profiles_delete
                    if (preg_match('#^/configure/advanced/profiles/(?P<profileId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_profiles_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ProfileController::deleteAction',  '_legacy_controller' => 'AdminProfiles',  '_legacy_link' => 'AdminProfiles:deleteprofile',  '_legacy_parameters' =>   array (    'id_profile' => 'profileId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_profiles_delete;
                        }

                        return $ret;
                    }
                    not_admin_profiles_delete:

                    // admin_profiles_bulk_delete
                    if ('/configure/advanced/profiles/delete/bulk' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\ProfileController::bulkDeleteAction',  '_legacy_controller' => 'AdminProfiles',  '_legacy_link' => 'AdminProfiles:submitBulkdeleteprofile',  '_route' => 'admin_profiles_bulk_delete',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_profiles_bulk_delete;
                        }

                        return $ret;
                    }
                    not_admin_profiles_bulk_delete:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/system-information')) {
                    // admin_system_information
                    if ('/configure/advanced/system-information' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SystemInformationController::indexAction',  '_legacy_controller' => 'AdminInformation',  '_legacy_link' => 'AdminInformation',  '_route' => 'admin_system_information',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_system_information;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_system_information'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_system_information;
                        }

                        return $ret;
                    }
                    not_admin_system_information:

                    // admin_system_information_check_files
                    if ('/configure/advanced/system-information/files' === $pathinfo && $request->isXmlHttpRequest()) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SystemInformationController::displayCheckFilesAction',  '_legacy_controller' => 'AdminInformation',  '_legacy_link' => 'AdminInformation:checkFiles',  '_route' => 'admin_system_information_check_files',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_system_information_check_files;
                        }

                        return $ret;
                    }
                    not_admin_system_information_check_files:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/sql-requests')) {
                    // admin_sql_requests_index
                    if ('/configure/advanced/sql-requests' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::indexAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql',  '_route' => 'admin_sql_requests_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_sql_requests_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_sql_requests_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_sql_requests_index;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_index:

                    // admin_sql_requests_search
                    if ('/configure/advanced/sql-requests/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::searchAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:search',  '_route' => 'admin_sql_requests_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_sql_requests_search;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_search:

                    // admin_sql_requests_process_settings
                    if ('/configure/advanced/sql-requests/process-settings' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::processFormAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:update',  '_route' => 'admin_sql_requests_process_settings',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_sql_requests_process_settings;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_process_settings:

                    // admin_sql_requests_create
                    if ('/configure/advanced/sql-requests/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::createAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:addrequest_sql',  '_route' => 'admin_sql_requests_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_sql_requests_create;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_create:

                    // admin_sql_requests_edit
                    if (preg_match('#^/configure/advanced/sql\\-requests/(?P<sqlRequestId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_sql_requests_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::editAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:updaterequest_sql',  '_legacy_parameters' =>   array (    'id_request_sql' => 'sqlRequestId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_sql_requests_edit;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_edit:

                    // admin_sql_requests_delete
                    if (preg_match('#^/configure/advanced/sql\\-requests/(?P<sqlRequestId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_sql_requests_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::deleteAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:deleterequest_sql',  '_legacy_parameters' =>   array (    'id_request_sql' => 'sqlRequestId',  ),));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_sql_requests_delete;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_delete:

                    // admin_sql_requests_delete_bulk
                    if ('/configure/advanced/sql-requests/delete-bulk' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::deleteBulkAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:submitBulkdeleterequest_sql',  '_route' => 'admin_sql_requests_delete_bulk',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_sql_requests_delete_bulk;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_delete_bulk:

                    // admin_sql_requests_table_columns
                    if (0 === strpos($pathinfo, '/configure/advanced/sql-requests/tables') && preg_match('#^/configure/advanced/sql\\-requests/tables/(?P<mySqlTableName>[^/]++)/columns$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_sql_requests_table_columns']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::ajaxTableColumnsAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:ajax',  '_legacy_parameters' =>   array (    'table' => 'mySqlTableName',  ),));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_sql_requests_table_columns;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_table_columns:

                    // admin_sql_requests_view
                    if (preg_match('#^/configure/advanced/sql\\-requests/(?P<sqlRequestId>\\d+)/view$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_sql_requests_view']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::viewAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:viewsql_request',  '_legacy_parameters' =>   array (    'id_request_sql' => 'sqlRequestId',  ),));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_sql_requests_view;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_view:

                    // admin_sql_requests_export
                    if (preg_match('#^/configure/advanced/sql\\-requests/(?P<sqlRequestId>\\d+)/export$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_sql_requests_export']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController::exportAction',  '_legacy_controller' => 'AdminRequestSql',  '_legacy_link' => 'AdminRequestSql:exportsql_request',  '_legacy_parameters' =>   array (    'id_request_sql' => 'sqlRequestId',  ),));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_sql_requests_export;
                        }

                        return $ret;
                    }
                    not_admin_sql_requests_export:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/emails')) {
                    // admin_emails_index
                    if ('/configure/advanced/emails' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::indexAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails',  '_route' => 'admin_emails_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_emails_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_emails_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_emails_index;
                        }

                        return $ret;
                    }
                    not_admin_emails_index:

                    // admin_emails_search
                    if ('/configure/advanced/emails/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::searchAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails:search',  '_route' => 'admin_emails_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_emails_search;
                        }

                        return $ret;
                    }
                    not_admin_emails_search:

                    // admin_emails_save_options
                    if ('/configure/advanced/emails/options' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::saveOptionsAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails:update',  '_route' => 'admin_emails_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_emails_save_options;
                        }

                        return $ret;
                    }
                    not_admin_emails_save_options:

                    // admin_emails_send_test
                    if ('/configure/advanced/emails/send-testing-email' === $pathinfo && $request->isXmlHttpRequest()) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::sendTestAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails:testEmail',  '_route' => 'admin_emails_send_test',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_emails_send_test;
                        }

                        return $ret;
                    }
                    not_admin_emails_send_test:

                    if (0 === strpos($pathinfo, '/configure/advanced/emails/delete')) {
                        // admin_emails_delete_bulk
                        if ('/configure/advanced/emails/delete-bulk' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::deleteBulkAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails:submitBulkdeletemail',  '_route' => 'admin_emails_delete_bulk',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_emails_delete_bulk;
                            }

                            return $ret;
                        }
                        not_admin_emails_delete_bulk:

                        // admin_emails_delete_all
                        if ('/configure/advanced/emails/delete-all' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::deleteAllAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails:deleteAll',  '_route' => 'admin_emails_delete_all',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_emails_delete_all;
                            }

                            return $ret;
                        }
                        not_admin_emails_delete_all:

                        // admin_emails_delete
                        if (preg_match('#^/configure/advanced/emails/delete/(?P<mailId>\\d+)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_emails_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController::deleteAction',  '_legacy_controller' => 'AdminEmails',  '_legacy_link' => 'AdminEmails:deletemail',  '_legacy_parameters' =>   array (    'id_mail' => 'mailId',  ),));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_emails_delete;
                            }

                            return $ret;
                        }
                        not_admin_emails_delete:

                    }

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/employees')) {
                    // admin_employees_index
                    if ('/configure/advanced/employees' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::indexAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees',  '_route' => 'admin_employees_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_employees_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_employees_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_employees_index;
                        }

                        return $ret;
                    }
                    not_admin_employees_index:

                    // admin_employees_search
                    if ('/configure/advanced/employees/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::searchGridAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:submitFilteremployee',  'gridDefinitionFactoryServiceId' => 'prestashop.core.grid.definition.factory.employee',  'redirectRoute' => 'admin_employees_index',  '_route' => 'admin_employees_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_search;
                        }

                        return $ret;
                    }
                    not_admin_employees_search:

                    // admin_employees_save_options
                    if ('/configure/advanced/employees/save-options' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::saveOptionsAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:submitOptionsemployee',  '_route' => 'admin_employees_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_save_options;
                        }

                        return $ret;
                    }
                    not_admin_employees_save_options:

                    // admin_employees_toggle_status
                    if (preg_match('#^/configure/advanced/employees/(?P<employeeId>[^/]++)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_employees_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::toggleStatusAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:statusemployee',  '_legacy_parameters' =>   array (    'id_employee' => 'employeeId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_employees_toggle_status:

                    // admin_employees_bulk_enable_status
                    if ('/configure/advanced/employees/bulk-enable-status' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::bulkStatusEnableAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:submitBulkenableSelectionemployee',  '_route' => 'admin_employees_bulk_enable_status',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_bulk_enable_status;
                        }

                        return $ret;
                    }
                    not_admin_employees_bulk_enable_status:

                    // admin_employees_bulk_disable_status
                    if ('/configure/advanced/employees/bulk-disable-status' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::bulkStatusDisableAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:submitBulkdisableSelectionemployee',  '_route' => 'admin_employees_bulk_disable_status',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_bulk_disable_status;
                        }

                        return $ret;
                    }
                    not_admin_employees_bulk_disable_status:

                    // admin_employees_delete
                    if (preg_match('#^/configure/advanced/employees/(?P<employeeId>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_employees_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::deleteAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:deleteemployee',  '_legacy_parameters' =>   array (    'id_employee' => 'employeeId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_delete;
                        }

                        return $ret;
                    }
                    not_admin_employees_delete:

                    // admin_employees_bulk_delete
                    if ('/configure/advanced/employees/bulk-delete' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::bulkDeleteAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:submitBulkdeleteemployee',  '_route' => 'admin_employees_bulk_delete',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_bulk_delete;
                        }

                        return $ret;
                    }
                    not_admin_employees_bulk_delete:

                    // admin_employees_create
                    if ('/configure/advanced/employees/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::createAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:addemployee',  '_route' => 'admin_employees_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_employees_create;
                        }

                        return $ret;
                    }
                    not_admin_employees_create:

                    // admin_employees_edit
                    if (preg_match('#^/configure/advanced/employees/(?P<employeeId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_employees_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::editAction',  '_legacy_controller' => 'AdminEmployees',  '_legacy_link' => 'AdminEmployees:updateemployee',  '_legacy_parameters' =>   array (    'id_employee' => 'employeeId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_employees_edit;
                        }

                        return $ret;
                    }
                    not_admin_employees_edit:

                    // admin_employees_toggle_navigation
                    if ('/configure/advanced/employees/toggle-navigation' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::toggleNavigationMenuAction',  '_route' => 'admin_employees_toggle_navigation',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_toggle_navigation;
                        }

                        return $ret;
                    }
                    not_admin_employees_toggle_navigation:

                    // admin_employees_get_tabs
                    if ('/configure/advanced/employees/tabs' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::getAccessibleTabsAction',  '_legacy_controller' => 'AdminEmployees',  '_route' => 'admin_employees_get_tabs',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_employees_get_tabs;
                        }

                        return $ret;
                    }
                    not_admin_employees_get_tabs:

                    // admin_employees_change_form_language
                    if ('/configure/advanced/employees/change-form-language' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmployeeController::changeFormLanguageAction',  '_route' => 'admin_employees_change_form_language',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_employees_change_form_language;
                        }

                        return $ret;
                    }
                    not_admin_employees_change_form_language:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/webservice-keys')) {
                    // admin_webservice_keys_index
                    if ('/configure/advanced/webservice-keys' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::indexAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice',  '_route' => 'admin_webservice_keys_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_webservice_keys_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_webservice_keys_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_webservice_keys_index;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_index:

                    // admin_webservice_keys_search
                    if ('/configure/advanced/webservice-keys/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::searchAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:submitFilterwebservice_account',  '_route' => 'admin_webservice_keys_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_webservice_keys_search;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_search:

                    // admin_webservice_save_settings
                    if ('/configure/advanced/webservice-keys/settings' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::saveSettingsAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:submitOptionswebservice_account',  '_route' => 'admin_webservice_save_settings',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_webservice_save_settings;
                        }

                        return $ret;
                    }
                    not_admin_webservice_save_settings:

                    // admin_webservice_keys_create
                    if ('/configure/advanced/webservice-keys/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::createAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:addwebservice_account',  '_route' => 'admin_webservice_keys_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_webservice_keys_create;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_create:

                    // admin_webservice_keys_edit
                    if (preg_match('#^/configure/advanced/webservice\\-keys/(?P<webserviceKeyId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_webservice_keys_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::editAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:updatewebservice_account',  '_legacy_parameters' =>   array (    'id_webservice_account' => 'webserviceAccountId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_webservice_keys_edit;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_edit:

                    // admin_webservice_keys_delete
                    if (preg_match('#^/configure/advanced/webservice\\-keys/(?P<webserviceKeyId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_webservice_keys_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::deleteAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:deletewebservice_account',  '_legacy_parameters' =>   array (    'id_webservice_account' => 'webserviceAccountId',  ),));
                        if (!in_array($requestMethod, ['DELETE'])) {
                            $allow = array_merge($allow, ['DELETE']);
                            goto not_admin_webservice_keys_delete;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_delete:

                    // admin_webservice_keys_bulk_delete
                    if ('/configure/advanced/webservice-keys/bulk-delete' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::bulkDeleteAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:submitBulkdeletewebservice_account',  '_route' => 'admin_webservice_keys_bulk_delete',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_webservice_keys_bulk_delete;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_bulk_delete:

                    // admin_webservice_keys_toggle_status
                    if (preg_match('#^/configure/advanced/webservice\\-keys/(?P<webserviceKeyId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_webservice_keys_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::toggleStatusAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:statuswebservice_account',  '_legacy_parameters' =>   array (    'id_webservice_account' => 'webserviceKeyId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_webservice_keys_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_toggle_status:

                    // admin_webservice_keys_bulk_enable
                    if ('/configure/advanced/webservice-keys/bulk-enable' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::bulkEnableAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:submitBulkenableSelectionwebservice_account',  '_route' => 'admin_webservice_keys_bulk_enable',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_webservice_keys_bulk_enable;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_bulk_enable:

                    // admin_webservice_keys_bulk_disable
                    if ('/configure/advanced/webservice-keys/bulk-disable' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController::bulkDisableAction',  '_legacy_controller' => 'AdminWebservice',  '_legacy_link' => 'AdminWebservice:submitBulkdisableSelectionwebservice_account',  '_route' => 'admin_webservice_keys_bulk_disable',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_webservice_keys_bulk_disable;
                        }

                        return $ret;
                    }
                    not_admin_webservice_keys_bulk_disable:

                }

                elseif (0 === strpos($pathinfo, '/configure/advanced/backups')) {
                    // admin_backups_index
                    if ('/configure/advanced/backups' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::indexAction',  '_legacy_controller' => 'AdminBackup',  '_legacy_link' => 'AdminBackup',  '_route' => 'admin_backups_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_backups_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_backups_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_backups_index;
                        }

                        return $ret;
                    }
                    not_admin_backups_index:

                    // admin_backups_save_options
                    if ('/configure/advanced/backups/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::saveOptionsAction',  '_legacy_controller' => 'AdminBackup',  '_legacy_link' => 'AdminBackup:update',  '_route' => 'admin_backups_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_backups_save_options;
                        }

                        return $ret;
                    }
                    not_admin_backups_save_options:

                    // admin_backups_create
                    if ('/configure/advanced/backups/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::createAction',  '_legacy_controller' => 'AdminBackup',  '_legacy_link' => 'AdminBackup:addbackup',  '_route' => 'admin_backups_create',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_backups_create;
                        }

                        return $ret;
                    }
                    not_admin_backups_create:

                    // admin_backups_download_view
                    if (0 === strpos($pathinfo, '/configure/advanced/backups/view') && preg_match('#^/configure/advanced/backups/view/(?P<downloadFileName>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_backups_download_view']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::downloadViewAction',  '_legacy_controller' => 'AdminBackup',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_backups_download_view;
                        }

                        return $ret;
                    }
                    not_admin_backups_download_view:

                    // admin_backup_download
                    if (0 === strpos($pathinfo, '/configure/advanced/backups/download') && preg_match('#^/configure/advanced/backups/download/(?P<downloadFileName>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_backup_download']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::downloadContentAction',  '_legacy_controller' => 'AdminBackup',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_backup_download;
                        }

                        return $ret;
                    }
                    not_admin_backup_download:

                    // admin_backups_delete
                    if (preg_match('#^/configure/advanced/backups/(?P<deleteFileName>[^/]++)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_backups_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::deleteAction',  '_legacy_controller' => 'AdminBackup',  '_legacy_link' => 'AdminBackup:delete',  '_legacy_parameters' =>   array (    'filename' => 'deleteFileName',  ),));
                        if (!in_array($requestMethod, ['DELETE'])) {
                            $allow = array_merge($allow, ['DELETE']);
                            goto not_admin_backups_delete;
                        }

                        return $ret;
                    }
                    not_admin_backups_delete:

                    // admin_backups_bulk_delete
                    if ('/configure/advanced/backups/bulk-delete/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\BackupController::bulkDeleteAction',  '_legacy_controller' => 'AdminBackup',  '_legacy_link' => 'AdminBackup:submitBulkdeletebackup',  '_route' => 'admin_backups_bulk_delete',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_backups_bulk_delete;
                        }

                        return $ret;
                    }
                    not_admin_backups_bulk_delete:

                }

            }

            elseif (0 === strpos($pathinfo, '/configure/shop')) {
                if (0 === strpos($pathinfo, '/configure/shop/preferences/preferences')) {
                    // admin_preferences
                    if ('/configure/shop/preferences/preferences' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\PreferencesController::indexAction',  '_legacy_controller' => 'AdminPreferences',  '_legacy_link' => 'AdminPreferences',  '_route' => 'admin_preferences',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_preferences;
                        }

                        return $ret;
                    }
                    not_admin_preferences:

                    // admin_preferences_save
                    if ('/configure/shop/preferences/preferences' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\PreferencesController::processFormAction',  '_legacy_controller' => 'AdminPreferences',  '_legacy_link' => 'AdminPreferences:update',  '_route' => 'admin_preferences_save',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_preferences_save;
                        }

                        return $ret;
                    }
                    not_admin_preferences_save:

                }

                elseif (0 === strpos($pathinfo, '/configure/shop/product-preferences')) {
                    // admin_product_preferences
                    if ('/configure/shop/product-preferences' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ProductPreferencesController::indexAction',  '_legacy_controller' => 'AdminPPreferences',  '_legacy_link' => 'AdminPPreferences',  '_route' => 'admin_product_preferences',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_product_preferences;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_product_preferences'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_product_preferences;
                        }

                        return $ret;
                    }
                    not_admin_product_preferences:

                    // admin_product_preferences_process
                    if ('/configure/shop/product-preferences/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ProductPreferencesController::processAction',  '_legacy_controller' => 'AdminPPreferences',  '_legacy_link' => 'AdminPPreferences:update',  '_route' => 'admin_product_preferences_process',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_product_preferences_process;
                        }

                        return $ret;
                    }
                    not_admin_product_preferences_process:

                }

                elseif (0 === strpos($pathinfo, '/configure/shop/order-preferences')) {
                    // admin_order_preferences
                    if ('/configure/shop/order-preferences' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\OrderPreferencesController::indexAction',  '_legacy_controller' => 'AdminOrderPreferences',  '_legacy_link' => 'AdminOrderPreferences',  '_route' => 'admin_order_preferences',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_order_preferences;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_order_preferences'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_order_preferences;
                        }

                        return $ret;
                    }
                    not_admin_order_preferences:

                    // admin_order_preferences_save
                    if ('/configure/shop/order-preferences/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\OrderPreferencesController::processAction',  '_legacy_controller' => 'AdminOrderPreferences',  '_legacy_link' => 'AdminOrderPreferences:update',  '_route' => 'admin_order_preferences_save',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_order_preferences_save;
                        }

                        return $ret;
                    }
                    not_admin_order_preferences_save:

                }

                elseif (0 === strpos($pathinfo, '/configure/shop/customer-preferences')) {
                    // admin_customer_preferences
                    if ('/configure/shop/customer-preferences' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\CustomerPreferencesController::indexAction',  '_legacy_controller' => 'AdminCustomerPreferences',  '_legacy_link' => 'AdminCustomerPreferences',  '_route' => 'admin_customer_preferences',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_customer_preferences;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_customer_preferences'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_customer_preferences;
                        }

                        return $ret;
                    }
                    not_admin_customer_preferences:

                    // admin_customer_preferences_process
                    if ('/configure/shop/customer-preferences/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\CustomerPreferencesController::processAction',  '_legacy_controller' => 'AdminCustomerPreferences',  '_legacy_link' => 'AdminCustomerPreferences:update',  '_route' => 'admin_customer_preferences_process',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customer_preferences_process;
                        }

                        return $ret;
                    }
                    not_admin_customer_preferences_process:

                }

                elseif (0 === strpos($pathinfo, '/configure/shop/contacts')) {
                    // admin_contacts_index
                    if ('/configure/shop/contacts' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController::indexAction',  '_legacy_controller' => 'AdminContacts',  '_legacy_link' => 'AdminContacts',  '_route' => 'admin_contacts_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_contacts_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_contacts_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_contacts_index;
                        }

                        return $ret;
                    }
                    not_admin_contacts_index:

                    // admin_contacts_search
                    if ('/configure/shop/contacts/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController::searchAction',  '_legacy_controller' => 'AdminContacts',  '_legacy_link' => 'AdminContacts:submitFiltercontact',  '_route' => 'admin_contacts_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_contacts_search;
                        }

                        return $ret;
                    }
                    not_admin_contacts_search:

                    // admin_contacts_create
                    if ('/configure/shop/contacts/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController::createAction',  '_legacy_controller' => 'AdminContacts',  '_legacy_link' => 'AdminContacts:addcontact',  '_route' => 'admin_contacts_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_contacts_create;
                        }

                        return $ret;
                    }
                    not_admin_contacts_create:

                    // admin_contacts_edit
                    if (preg_match('#^/configure/shop/contacts/(?P<contactId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_contacts_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController::editAction',  '_legacy_controller' => 'AdminContacts',  '_legacy_link' => 'AdminContacts:updatecontact',));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_contacts_edit;
                        }

                        return $ret;
                    }
                    not_admin_contacts_edit:

                    // admin_contacts_delete
                    if (preg_match('#^/configure/shop/contacts/(?P<contactId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_contacts_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController::deleteAction',  '_legacy_controller' => 'AdminContacts',  '_legacy_link' => 'AdminContacts:deletecontact',));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_contacts_delete;
                        }

                        return $ret;
                    }
                    not_admin_contacts_delete:

                    // admin_contacts_delete_bulk
                    if ('/configure/shop/contacts/delete/bulk' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController::deleteBulkAction',  '_legacy_controller' => 'AdminContacts',  '_legacy_link' => 'AdminContacts:submitBulkdeletecontact',  '_route' => 'admin_contacts_delete_bulk',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_contacts_delete_bulk;
                        }

                        return $ret;
                    }
                    not_admin_contacts_delete_bulk:

                }

                elseif (0 === strpos($pathinfo, '/configure/shop/maintenance')) {
                    // admin_maintenance
                    if ('/configure/shop/maintenance' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MaintenanceController::indexAction',  '_legacy_controller' => 'AdminMaintenance',  '_legacy_link' => 'AdminMaintenance',  '_route' => 'admin_maintenance',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_maintenance;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_maintenance'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_maintenance;
                        }

                        return $ret;
                    }
                    not_admin_maintenance:

                    // admin_maintenance_save
                    if ('/configure/shop/maintenance/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MaintenanceController::processFormAction',  '_legacy_controller' => 'AdminMaintenance',  '_legacy_link' => 'AdminMaintenance:update',  '_route' => 'admin_maintenance_save',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_maintenance_save;
                        }

                        return $ret;
                    }
                    not_admin_maintenance_save:

                }

                elseif (0 === strpos($pathinfo, '/configure/shop/seo-urls')) {
                    // admin_metas_index
                    if ('/configure/shop/seo-urls' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::indexAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta',  '_route' => 'admin_metas_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_metas_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_metas_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_metas_index;
                        }

                        return $ret;
                    }
                    not_admin_metas_index:

                    // admin_metas_search
                    if ('/configure/shop/seo-urls/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::searchAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:submitFiltermeta',  '_route' => 'admin_metas_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_metas_search;
                        }

                        return $ret;
                    }
                    not_admin_metas_search:

                    // admin_metas_create
                    if ('/configure/shop/seo-urls/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::createAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:addmeta',  '_route' => 'admin_metas_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_metas_create;
                        }

                        return $ret;
                    }
                    not_admin_metas_create:

                    // admin_metas_edit
                    if (preg_match('#^/configure/shop/seo\\-urls/(?P<metaId>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_metas_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::editAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:updatemeta',  '_legacy_parameters' =>   array (    'id_meta' => 'metaId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_metas_edit;
                        }

                        return $ret;
                    }
                    not_admin_metas_edit:

                    // admin_metas_delete
                    if (preg_match('#^/configure/shop/seo\\-urls/(?P<metaId>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_metas_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::deleteAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:deletemeta',  '_legacy_parameters' =>   array (    'id_meta' => 'metaId',  ),));
                        if (!in_array($requestMethod, ['DELETE'])) {
                            $allow = array_merge($allow, ['DELETE']);
                            goto not_admin_metas_delete;
                        }

                        return $ret;
                    }
                    not_admin_metas_delete:

                    // admin_metas_delete_bulk
                    if ('/configure/shop/seo-urls/delete' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::deleteBulkAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:submitBulkdeletemeta',  '_route' => 'admin_metas_delete_bulk',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_metas_delete_bulk;
                        }

                        return $ret;
                    }
                    not_admin_metas_delete_bulk:

                    // admin_metas_save_options
                    if ('/configure/shop/seo-urls/options' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::saveOptionsAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:submitOptionsmeta',  '_route' => 'admin_metas_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_metas_save_options;
                        }

                        return $ret;
                    }
                    not_admin_metas_save_options:

                    // admin_metas_generate_robots_text_file
                    if ('/configure/shop/seo-urls/generate/robots' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController::generateRobotsFileAction',  '_legacy_controller' => 'AdminMeta',  '_legacy_link' => 'AdminMeta:submitRobots',  '_route' => 'admin_metas_generate_robots_text_file',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_metas_generate_robots_text_file;
                        }

                        return $ret;
                    }
                    not_admin_metas_generate_robots_text_file:

                }

            }

            // admin_close_showcase_card
            if ('/configure/showcase-card/close' === $pathinfo) {
                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Configure\\ShowcaseCardController::closeShowcaseCardAction',  '_route' => 'admin_close_showcase_card',);
                if (!in_array($requestMethod, ['POST'])) {
                    $allow = array_merge($allow, ['POST']);
                    goto not_admin_close_showcase_card;
                }

                return $ret;
            }
            not_admin_close_showcase_card:

        }

        elseif (0 === strpos($pathinfo, '/s')) {
            // admin_security_compromised
            if ('/security/compromised' === $pathinfo) {
                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SecurityController::compromisedAccessAction',  '_route' => 'admin_security_compromised',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_security_compromised;
                }

                return $ret;
            }
            not_admin_security_compromised:

            if (0 === strpos($pathinfo, '/sell')) {
                if (0 === strpos($pathinfo, '/sell/catalog')) {
                    if (0 === strpos($pathinfo, '/sell/catalog/products')) {
                        // admin_product_new
                        if ('/sell/catalog/products/new' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::newAction',  '_route' => 'admin_product_new',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_product_new;
                            }

                            return $ret;
                        }
                        not_admin_product_new:

                        // admin_product_form
                        if (preg_match('#^/sell/catalog/products/(?P<id>\\d+)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_form']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::formAction',  '_legacy_controller' => 'AdminProducts',  '_legacy_param_mapper_class' => 'PrestaShop\\PrestaShop\\Adapter\\Product\\AdminProductDataProvider',  '_legacy_param_mapper_method' => 'mapLegacyParametersProductForm',));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_product_form;
                            }

                            return $ret;
                        }
                        not_admin_product_form:

                        if (0 === strpos($pathinfo, '/sell/catalog/products/virtual')) {
                            // admin_product_virtual_save_action
                            if (0 === strpos($pathinfo, '/sell/catalog/products/virtual/save') && preg_match('#^/sell/catalog/products/virtual/save(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_virtual_save_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::saveAction',  'idProduct' => 0,));
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_product_virtual_save_action;
                                }

                                return $ret;
                            }
                            not_admin_product_virtual_save_action:

                            if (0 === strpos($pathinfo, '/sell/catalog/products/virtual/remove')) {
                                // admin_product_virtual_remove_file_action
                                if (0 === strpos($pathinfo, '/sell/catalog/products/virtual/remove-file') && preg_match('#^/sell/catalog/products/virtual/remove\\-file(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                    return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_virtual_remove_file_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::removeFileAction',  'idProduct' => 0,));
                                }

                                // admin_product_virtual_remove_action
                                if (preg_match('#^/sell/catalog/products/virtual/remove(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                    return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_virtual_remove_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::removeAction',  'idProduct' => 0,));
                                }

                            }

                            // admin_product_virtual_download_file_action
                            if (0 === strpos($pathinfo, '/sell/catalog/products/virtual/download-file') && preg_match('#^/sell/catalog/products/virtual/download\\-file(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_virtual_download_file_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\VirtualProductController::downloadFileAction',  'idProduct' => 0,));
                            }

                        }

                        // admin_product_attachement_add_action
                        if (0 === strpos($pathinfo, '/sell/catalog/products/attachment/form/add') && preg_match('#^/sell/catalog/products/attachment/form/add(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_attachement_add_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttachementProductController::addAction',  'idProduct' => 0,));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_product_attachement_add_action;
                            }

                            return $ret;
                        }
                        not_admin_product_attachement_add_action:

                        if (0 === strpos($pathinfo, '/sell/catalog/products/attributes')) {
                            // admin_attribute_get_all
                            if ('/sell/catalog/products/attributes/get-all' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::getAllAttributesAction',  '_format' => 'json',  '_legacy_controller' => 'AdminProducts',  '_route' => 'admin_attribute_get_all',);
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_attribute_get_all;
                                }

                                return $ret;
                            }
                            not_admin_attribute_get_all:

                            // admin_attribute_generator
                            if ('/sell/catalog/products/attributes/generator' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::attributesGeneratorAction',  '_legacy_controller' => 'AdminProducts',  '_route' => 'admin_attribute_generator',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_attribute_generator;
                                }

                                return $ret;
                            }
                            not_admin_attribute_generator:

                            // admin_delete_attribute
                            if (preg_match('#^/sell/catalog/products/attributes/(?P<idProduct>[^/]++)$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_delete_attribute']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::deleteAttributeAction',  '_legacy_controller' => 'AdminProducts',));
                                if (!in_array($requestMethod, ['DELETE'])) {
                                    $allow = array_merge($allow, ['DELETE']);
                                    goto not_admin_delete_attribute;
                                }

                                return $ret;
                            }
                            not_admin_delete_attribute:

                            // admin_delete_all_attributes
                            if (0 === strpos($pathinfo, '/sell/catalog/products/attributes/delete-all') && preg_match('#^/sell/catalog/products/attributes/delete\\-all(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_delete_all_attributes']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::deleteAllAttributeAction',  '_legacy_controller' => 'AdminProducts',  'idProduct' => 0,));
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_delete_all_attributes;
                                }

                                return $ret;
                            }
                            not_admin_delete_all_attributes:

                            // admin_get_form_images_combination
                            if (0 === strpos($pathinfo, '/sell/catalog/products/attributes/form-images') && preg_match('#^/sell/catalog/products/attributes/form\\-images(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_get_form_images_combination']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AttributeController::getFormImagesAction',  '_format' => 'json',  '_legacy_controller' => 'AdminProducts',  'idProduct' => 0,));
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_get_form_images_combination;
                                }

                                return $ret;
                            }
                            not_admin_get_form_images_combination:

                        }

                        elseif (0 === strpos($pathinfo, '/sell/catalog/products/image')) {
                            // admin_product_image_upload
                            if (0 === strpos($pathinfo, '/sell/catalog/products/image/upload') && preg_match('#^/sell/catalog/products/image/upload(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_image_upload']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::uploadImageAction',  'idProduct' => 0,));
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_product_image_upload;
                                }

                                return $ret;
                            }
                            not_admin_product_image_upload:

                            // admin_product_image_positions
                            if ('/sell/catalog/products/image/positions' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::updateImagePositionAction',  '_route' => 'admin_product_image_positions',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_product_image_positions;
                                }

                                return $ret;
                            }
                            not_admin_product_image_positions:

                            // admin_product_image_form
                            if (0 === strpos($pathinfo, '/sell/catalog/products/image/form') && preg_match('#^/sell/catalog/products/image/form(?:/(?P<idImage>\\d+))?$#sD', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_image_form']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::formAction',  'idImage' => 0,));
                            }

                            // admin_product_image_delete
                            if (0 === strpos($pathinfo, '/sell/catalog/products/image/delete') && preg_match('#^/sell/catalog/products/image/delete(?:/(?P<idImage>\\d+))?$#sD', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_image_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductImageController::deleteAction',  'idImage' => 0,));
                            }

                        }

                        elseif (0 === strpos($pathinfo, '/sell/catalog/products/c')) {
                            // admin_category_simple_add_form
                            if ('/sell/catalog/products/categories/add/simple' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CategoryController::addSimpleCategoryFormAction',  '_route' => 'admin_category_simple_add_form',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_category_simple_add_form;
                                }

                                return $ret;
                            }
                            not_admin_category_simple_add_form:

                            // admin_get_ajax_categories
                            if (0 === strpos($pathinfo, '/sell/catalog/products/categories/list') && preg_match('#^/sell/catalog/products/categories/list(?:/(?P<limit>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_get_ajax_categories']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CategoryController::getAjaxCategoriesAction',  '_format' => 'json',  'limit' => 20,));
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_get_ajax_categories;
                                }

                                return $ret;
                            }
                            not_admin_get_ajax_categories:

                            if (0 === strpos($pathinfo, '/sell/catalog/products/combinations')) {
                                // admin_combination_generate_form
                                if (0 === strpos($pathinfo, '/sell/catalog/products/combinations/form') && preg_match('#^/sell/catalog/products/combinations/form(?:/(?P<combinationIds>[^/]++))?$#sD', $pathinfo, $matches)) {
                                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_combination_generate_form']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CombinationController::generateCombinationFormAction',  'combinationIds' => 0,));
                                    if (!in_array($canonicalMethod, ['GET'])) {
                                        $allow = array_merge($allow, ['GET']);
                                        goto not_admin_combination_generate_form;
                                    }

                                    return $ret;
                                }
                                not_admin_combination_generate_form:

                                // admin_get_product_combinations
                                if (preg_match('#^/sell/catalog/products/combinations(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_get_product_combinations']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CombinationController::getProductCombinationsAction',  '_format' => 'json',  'idProduct' => 0,));
                                    if (!in_array($canonicalMethod, ['GET'])) {
                                        $allow = array_merge($allow, ['GET']);
                                        goto not_admin_get_product_combinations;
                                    }

                                    return $ret;
                                }
                                not_admin_get_product_combinations:

                            }

                        }

                        // admin_feature_get_feature_values
                        if (0 === strpos($pathinfo, '/sell/catalog/products/features') && preg_match('#^/sell/catalog/products/features(?:/(?P<idFeature>\\d+))?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_feature_get_feature_values']), array (  'idFeature' => 0,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\FeatureController::getFeatureValuesAction',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_feature_get_feature_values;
                            }

                            return $ret;
                        }
                        not_admin_feature_get_feature_values:

                        if (0 === strpos($pathinfo, '/sell/catalog/products/specific-prices')) {
                            // admin_specific_price_list
                            if (0 === strpos($pathinfo, '/sell/catalog/products/specific-prices/list') && preg_match('#^/sell/catalog/products/specific\\-prices/list(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_specific_price_list']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::listAction',  '_format' => 'json',  'idProduct' => 0,));
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_specific_price_list;
                                }

                                return $ret;
                            }
                            not_admin_specific_price_list:

                            // admin_get_specific_price_update_form
                            if (0 === strpos($pathinfo, '/sell/catalog/products/specific-prices/form') && preg_match('#^/sell/catalog/products/specific\\-prices/form/(?P<idSpecificPrice>\\d+)/?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_get_specific_price_update_form']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::getUpdateFormAction',  'idSpecificPrice' => 0,));
                                if ('/' === substr($pathinfo, -1)) {
                                    // no-op
                                } elseif ('GET' !== $canonicalMethod) {
                                    goto not_admin_get_specific_price_update_form;
                                } else {
                                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_get_specific_price_update_form'));
                                }

                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_get_specific_price_update_form;
                                }

                                return $ret;
                            }
                            not_admin_get_specific_price_update_form:

                            // admin_specific_price_add
                            if ('/sell/catalog/products/specific-prices/add' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::addAction',  '_route' => 'admin_specific_price_add',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_specific_price_add;
                                }

                                return $ret;
                            }
                            not_admin_specific_price_add:

                            // admin_specific_price_update
                            if (0 === strpos($pathinfo, '/sell/catalog/products/specific-prices/update') && preg_match('#^/sell/catalog/products/specific\\-prices/update/(?P<idSpecificPrice>\\d+)/$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_specific_price_update']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::updateAction',  'idSpecificPrice' => 0,));
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_specific_price_update;
                                }

                                return $ret;
                            }
                            not_admin_specific_price_update:

                            // admin_delete_specific_price
                            if (0 === strpos($pathinfo, '/sell/catalog/products/specific-prices/delete') && preg_match('#^/sell/catalog/products/specific\\-prices/delete(?:/(?P<idSpecificPrice>\\d+))?$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_delete_specific_price']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController::deleteAction',  'idSpecificPrice' => 0,));
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_delete_specific_price;
                                }

                                return $ret;
                            }
                            not_admin_delete_specific_price:

                        }

                        // admin_supplier_refresh_product_supplier_combination_form
                        if (0 === strpos($pathinfo, '/sell/catalog/products/suppliers/refresh-product-supplier-combination-form') && preg_match('#^/sell/catalog/products/suppliers/refresh\\-product\\-supplier\\-combination\\-form(?:/(?P<idProduct>\\d+)(?:/(?P<supplierIds>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_supplier_refresh_product_supplier_combination_form']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\SupplierController::refreshProductSupplierCombinationFormAction',  'supplierIds' => 0,  'idProduct' => 0,));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_supplier_refresh_product_supplier_combination_form;
                            }

                            return $ret;
                        }
                        not_admin_supplier_refresh_product_supplier_combination_form:

                        // admin_warehouse_refresh_product_warehouse_combination_form
                        if (0 === strpos($pathinfo, '/sell/catalog/products/warehouses/refresh-product-warehouse-combination-form') && preg_match('#^/sell/catalog/products/warehouses/refresh\\-product\\-warehouse\\-combination\\-form(?:/(?P<idProduct>\\d+))?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_warehouse_refresh_product_warehouse_combination_form']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\WarehouseController::refreshProductWarehouseCombinationFormAction',  'idProduct' => 0,));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_warehouse_refresh_product_warehouse_combination_form;
                            }

                            return $ret;
                        }
                        not_admin_warehouse_refresh_product_warehouse_combination_form:

                        // admin_product_catalog
                        if (preg_match('#^/sell/catalog/products(?:/(?P<offset>last|\\d+)(?:/(?P<limit>_limit|last|\\d+)(?:/(?P<orderBy>last|id_product|name|reference|name_category|price|sav_quantity|position|active|position_ordering)(?:/(?P<sortOrder>last|asc|desc))?)?)?)?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_catalog']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::catalogAction',  '_legacy_controller' => 'AdminProducts',  'limit' => 'last',  'offset' => 0,  'orderBy' => 'last',  'sortOrder' => 'last',));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_product_catalog;
                            }

                            return $ret;
                        }
                        not_admin_product_catalog:

                        // admin_product_catalog_filters
                        if (0 === strpos($pathinfo, '/sell/catalog/products/filters') && preg_match('#^/sell/catalog/products/filters(?:/(?P<quantity>none|<=\\d+|<\\d+|>\\d+|>=\\d+)(?:/(?P<active>none|1|0))?)?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_catalog_filters']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::catalogFiltersAction',  '_legacy_controller' => 'AdminProducts',  'quantity' => 'none',  'active' => 'none',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_product_catalog_filters;
                            }

                            return $ret;
                        }
                        not_admin_product_catalog_filters:

                        // admin_product_list
                        if (0 === strpos($pathinfo, '/sell/catalog/products/list') && preg_match('#^/sell/catalog/products/list(?:/(?P<offset>last|\\d+)(?:/(?P<limit>_limit|last|\\d+)(?:/(?P<orderBy>last|id_product|name|reference|name_category|price|sav_quantity|position|active|position_ordering)(?:/(?P<sortOrder>last|asc|desc)(?:/(?P<view>full|quicknav))?)?)?)?)?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_list']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::listAction',  'limit' => 'last',  'offset' => 0,  'orderBy' => 'last',  'sortOrder' => 'last',  'view' => 'full',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_product_list;
                            }

                            return $ret;
                        }
                        not_admin_product_list:

                        // admin_product_bulk_action
                        if (0 === strpos($pathinfo, '/sell/catalog/products/bulk') && preg_match('#^/sell/catalog/products/bulk/(?P<action>activate_all|deactivate_all|delete_all|duplicate_all)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_bulk_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::bulkAction',));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_product_bulk_action;
                            }

                            return $ret;
                        }
                        not_admin_product_bulk_action:

                        // admin_product_unit_action
                        if (0 === strpos($pathinfo, '/sell/catalog/products/unit') && preg_match('#^/sell/catalog/products/unit/(?P<action>delete|duplicate|activate|deactivate)/(?P<id>\\d+)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_unit_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::unitAction',));
                            if (!in_array($canonicalMethod, ['POST', 'GET'])) {
                                $allow = array_merge($allow, ['POST', 'GET']);
                                goto not_admin_product_unit_action;
                            }

                            return $ret;
                        }
                        not_admin_product_unit_action:

                        // admin_product_mass_edit_action
                        if (0 === strpos($pathinfo, '/sell/catalog/products/massedit') && preg_match('#^/sell/catalog/products/massedit/(?P<action>sort)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_mass_edit_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::massEditAction',));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_product_mass_edit_action;
                            }

                            return $ret;
                        }
                        not_admin_product_mass_edit_action:

                        // admin_product_export_action
                        if (0 === strpos($pathinfo, '/sell/catalog/products/export') && preg_match('#^/sell/catalog/products/export(?:\\.(?P<_format>csv))?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_product_export_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\ProductController::exportAction',  '_format' => 'csv',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_product_export_action;
                            }

                            return $ret;
                        }
                        not_admin_product_export_action:

                    }

                    elseif (0 === strpos($pathinfo, '/sell/catalog/categories')) {
                        // admin_categories_index
                        if (preg_match('#^/sell/catalog/categories(?:/(?P<categoryId>\\d+))?$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_categories_index']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::indexAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),  'categoryId' => NULL,));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_categories_index;
                            }

                            return $ret;
                        }
                        not_admin_categories_index:

                        // admin_categories_search
                        if ('/sell/catalog/categories/search' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::searchGridAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:submitFiltercategory',  'gridDefinitionFactoryServiceId' => 'prestashop.core.grid.definition.factory.category',  'redirectRoute' => 'admin_categories_index',  'redirectQueryParamsToKeep' =>   array (    0 => 'categoryId',  ),  '_route' => 'admin_categories_search',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_search;
                            }

                            return $ret;
                        }
                        not_admin_categories_search:

                        // admin_categories_bulk_enable_status
                        if ('/sell/catalog/categories/bulk-status-enable' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::bulkEnableStatusAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:submitBulkenableSelectioncategory',  '_route' => 'admin_categories_bulk_enable_status',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_bulk_enable_status;
                            }

                            return $ret;
                        }
                        not_admin_categories_bulk_enable_status:

                        // admin_categories_bulk_disable_status
                        if ('/sell/catalog/categories/bulk-status-disable' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::bulkDisableStatusAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:submitBulkdisableSelectioncategory',  '_route' => 'admin_categories_bulk_disable_status',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_bulk_disable_status;
                            }

                            return $ret;
                        }
                        not_admin_categories_bulk_disable_status:

                        // admin_categories_toggle_status
                        if (preg_match('#^/sell/catalog/categories/(?P<categoryId>[^/]++)/toggle\\-status$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_categories_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::toggleStatusAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:statuscategory',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_toggle_status;
                            }

                            return $ret;
                        }
                        not_admin_categories_toggle_status:

                        // admin_categories_bulk_delete
                        if ('/sell/catalog/categories/bulk-delete' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::bulkDeleteAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:submitBulkdeleteSelectioncategory',  '_route' => 'admin_categories_bulk_delete',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_bulk_delete;
                            }

                            return $ret;
                        }
                        not_admin_categories_bulk_delete:

                        // admin_categories_delete
                        if ('/sell/catalog/categories/delete' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::deleteAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:deletecategory',  '_route' => 'admin_categories_delete',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_delete;
                            }

                            return $ret;
                        }
                        not_admin_categories_delete:

                        // admin_categories_export
                        if ('/sell/catalog/categories/export' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::exportAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:exportcategory',  '_route' => 'admin_categories_export',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_categories_export;
                            }

                            return $ret;
                        }
                        not_admin_categories_export:

                        if (0 === strpos($pathinfo, '/sell/catalog/categories/new')) {
                            // admin_categories_create
                            if ('/sell/catalog/categories/new' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::createAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:addcategory',  '_route' => 'admin_categories_create',);
                                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                    $allow = array_merge($allow, ['GET', 'POST']);
                                    goto not_admin_categories_create;
                                }

                                return $ret;
                            }
                            not_admin_categories_create:

                            // admin_categories_create_root
                            if ('/sell/catalog/categories/new-root' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::createRootAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:addcategoryroot',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),  '_route' => 'admin_categories_create_root',);
                                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                    $allow = array_merge($allow, ['GET', 'POST']);
                                    goto not_admin_categories_create_root;
                                }

                                return $ret;
                            }
                            not_admin_categories_create_root:

                        }

                        // admin_categories_edit
                        if (preg_match('#^/sell/catalog/categories/(?P<categoryId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_categories_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::editAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:updatecategory',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_categories_edit;
                            }

                            return $ret;
                        }
                        not_admin_categories_edit:

                        // admin_categories_edit_root
                        if (preg_match('#^/sell/catalog/categories/(?P<categoryId>\\d+)/edit\\-root$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_categories_edit_root']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::editRootAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:updatecategory',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_categories_edit_root;
                            }

                            return $ret;
                        }
                        not_admin_categories_edit_root:

                        // admin_categories_delete_cover_image
                        if (preg_match('#^/sell/catalog/categories/(?P<categoryId>\\d+)/delete\\-cover\\-image$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_categories_delete_cover_image']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::deleteCoverImageAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:deleteImage',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_delete_cover_image;
                            }

                            return $ret;
                        }
                        not_admin_categories_delete_cover_image:

                        // admin_categories_delete_menu_thumbnail
                        if (preg_match('#^/sell/catalog/categories/(?P<categoryId>\\d+)/menu\\-thumbnails/(?P<menuThumbnailId>0|1|2  menu thumbnails only have 3 fixed ids)/delete$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_categories_delete_menu_thumbnail']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::deleteMenuThumbnailAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:forceDeleteThumb',  '_legacy_parameters' =>   array (    'id_category' => 'categoryId',  ),));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_delete_menu_thumbnail;
                            }

                            return $ret;
                        }
                        not_admin_categories_delete_menu_thumbnail:

                        // admin_categories_update_position
                        if ('/sell/catalog/categories/update-positions' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController::updatePositionAction',  '_legacy_controller' => 'AdminCategories',  '_legacy_link' => 'AdminCategories:updatePositions',  '_route' => 'admin_categories_update_position',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_categories_update_position;
                            }

                            return $ret;
                        }
                        not_admin_categories_update_position:

                    }

                    elseif (0 === strpos($pathinfo, '/sell/catalog/suppliers')) {
                        // admin_suppliers_index
                        if ('/sell/catalog/suppliers' === $trimmedPathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::indexAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_index',);
                            if ('/' === substr($pathinfo, -1)) {
                                // no-op
                            } elseif ('GET' !== $canonicalMethod) {
                                goto not_admin_suppliers_index;
                            } else {
                                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_suppliers_index'));
                            }

                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_suppliers_index;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_index:

                        // admin_suppliers_search
                        if ('/sell/catalog/suppliers/' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::searchAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_search',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_suppliers_search;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_search:

                        // admin_suppliers_view
                        if (preg_match('#^/sell/catalog/suppliers/(?P<supplierId>[^/]++)/products$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_suppliers_view']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::viewAction',  '_legacy_controller' => 'AdminSuppliers',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_suppliers_view;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_view:

                        // admin_suppliers_create
                        if ('/sell/catalog/suppliers/new' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::createAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_create',);
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_suppliers_create;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_create:

                        // admin_suppliers_edit
                        if (preg_match('#^/sell/catalog/suppliers/(?P<supplierId>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_suppliers_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::editAction',  '_legacy_controller' => 'AdminSuppliers',));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_suppliers_edit;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_edit:

                        // admin_suppliers_delete
                        if (preg_match('#^/sell/catalog/suppliers/(?P<supplierId>[^/]++)/delete$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_suppliers_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::deleteAction',  '_legacy_controller' => 'AdminSuppliers',));
                            if (!in_array($requestMethod, ['DELETE'])) {
                                $allow = array_merge($allow, ['DELETE']);
                                goto not_admin_suppliers_delete;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_delete:

                        if (0 === strpos($pathinfo, '/sell/catalog/suppliers/bulk-')) {
                            // admin_suppliers_bulk_delete
                            if ('/sell/catalog/suppliers/bulk-delete' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::bulkDeleteAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_bulk_delete',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_suppliers_bulk_delete;
                                }

                                return $ret;
                            }
                            not_admin_suppliers_bulk_delete:

                            // admin_suppliers_bulk_disable
                            if ('/sell/catalog/suppliers/bulk-disable' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::bulkDisableAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_bulk_disable',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_suppliers_bulk_disable;
                                }

                                return $ret;
                            }
                            not_admin_suppliers_bulk_disable:

                            // admin_suppliers_bulk_enable
                            if ('/sell/catalog/suppliers/bulk-enable' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::bulkEnableAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_bulk_enable',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_suppliers_bulk_enable;
                                }

                                return $ret;
                            }
                            not_admin_suppliers_bulk_enable:

                        }

                        // admin_suppliers_toggle_status
                        if (preg_match('#^/sell/catalog/suppliers/(?P<supplierId>[^/]++)/toggle\\-status$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_suppliers_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::toggleStatusAction',  '_legacy_controller' => 'AdminSuppliers',));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_suppliers_toggle_status;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_toggle_status:

                        // admin_suppliers_export
                        if ('/sell/catalog/suppliers/export' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\SupplierController::exportAction',  '_legacy_controller' => 'AdminSuppliers',  '_route' => 'admin_suppliers_export',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_suppliers_export;
                            }

                            return $ret;
                        }
                        not_admin_suppliers_export:

                    }

                    elseif (0 === strpos($pathinfo, '/sell/catalog/brands')) {
                        // admin_manufacturers_index
                        if ('/sell/catalog/brands' === $trimmedPathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::indexAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers',  '_route' => 'admin_manufacturers_index',);
                            if ('/' === substr($pathinfo, -1)) {
                                // no-op
                            } elseif ('GET' !== $canonicalMethod) {
                                goto not_admin_manufacturers_index;
                            } else {
                                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_manufacturers_index'));
                            }

                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_manufacturers_index;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_index:

                        // admin_manufacturers_search
                        if ('/sell/catalog/brands/' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::searchAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:submitFiltermanufacturer',  '_route' => 'admin_manufacturers_search',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_manufacturers_search;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_search:

                        // admin_manufacturers_create
                        if ('/sell/catalog/brands/new' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::createAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:addmanufacturer',  '_route' => 'admin_manufacturers_create',);
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_manufacturers_create;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_create:

                        // admin_manufacturers_view
                        if (preg_match('#^/sell/catalog/brands/(?P<manufacturerId>\\d+)/view$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_manufacturers_view']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::viewAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:viewmanufacturer',  '_legacy_parameters' =>   array (    'id_manufacturer' => 'manufacturerId',  ),));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_manufacturers_view;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_view:

                        // admin_manufacturers_edit
                        if (preg_match('#^/sell/catalog/brands/(?P<manufacturerId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_manufacturers_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::editAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:updatemanufacturer',  '_legacy_parameters' =>   array (    'id_manufacturer' => 'manufacturerId',  ),));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_manufacturers_edit;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_edit:

                        // admin_manufacturers_delete
                        if (preg_match('#^/sell/catalog/brands/(?P<manufacturerId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_manufacturers_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::deleteAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:deletemanufacturer',  '_legacy_parameters' =>   array (    'id_manufacturer' => 'manufacturerId',  ),));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_manufacturers_delete;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_delete:

                        if (0 === strpos($pathinfo, '/sell/catalog/brands/bulk-')) {
                            // admin_manufacturers_bulk_delete
                            if ('/sell/catalog/brands/bulk-delete' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::bulkDeleteAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:submitBulkdeletemanufacturer',  '_route' => 'admin_manufacturers_bulk_delete',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_manufacturers_bulk_delete;
                                }

                                return $ret;
                            }
                            not_admin_manufacturers_bulk_delete:

                            // admin_manufacturers_bulk_disable_status
                            if ('/sell/catalog/brands/bulk-disable' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::bulkDisableAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:submitBulkdisableSelectionmanufacturer',  '_route' => 'admin_manufacturers_bulk_disable_status',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_manufacturers_bulk_disable_status;
                                }

                                return $ret;
                            }
                            not_admin_manufacturers_bulk_disable_status:

                            // admin_manufacturers_bulk_enable_status
                            if ('/sell/catalog/brands/bulk-enable' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::bulkEnableAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:submitBulkenableSelectionmanufacturer',  '_route' => 'admin_manufacturers_bulk_enable_status',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_manufacturers_bulk_enable_status;
                                }

                                return $ret;
                            }
                            not_admin_manufacturers_bulk_enable_status:

                        }

                        // admin_manufacturers_toggle_status
                        if (preg_match('#^/sell/catalog/brands/(?P<manufacturerId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_manufacturers_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::toggleStatusAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:statusmanufacturer',  '_legacy_parameters' =>   array (    'id_manufacturer' => 'manufacturerId',  ),));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_manufacturers_toggle_status;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_toggle_status:

                        // admin_manufacturers_export
                        if ('/sell/catalog/brands/export' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::exportAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:exportmanufacturer',  '_route' => 'admin_manufacturers_export',);
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_manufacturers_export;
                            }

                            return $ret;
                        }
                        not_admin_manufacturers_export:

                        if (0 === strpos($pathinfo, '/sell/catalog/brands/addresses')) {
                            // admin_manufacturer_addresses_create
                            if ('/sell/catalog/brands/addresses/new' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::createAddressAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:addaddress',  '_route' => 'admin_manufacturer_addresses_create',);
                                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                    $allow = array_merge($allow, ['GET', 'POST']);
                                    goto not_admin_manufacturer_addresses_create;
                                }

                                return $ret;
                            }
                            not_admin_manufacturer_addresses_create:

                            // admin_manufacturer_addresses_edit
                            if (preg_match('#^/sell/catalog/brands/addresses/(?P<addressId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_manufacturer_addresses_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::editAddressAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:editaddresses',  '_legacy_parameters' =>   array (    'id_address' => 'addressId',  ),));
                                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                    $allow = array_merge($allow, ['GET', 'POST']);
                                    goto not_admin_manufacturer_addresses_edit;
                                }

                                return $ret;
                            }
                            not_admin_manufacturer_addresses_edit:

                            // admin_manufacturer_addresses_delete
                            if (preg_match('#^/sell/catalog/brands/addresses/(?P<addressId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_manufacturer_addresses_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::deleteAddressAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:deleteaddress',  '_legacy_parameters' =>   array (    'id_address' => 'addressId',  ),));
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_manufacturer_addresses_delete;
                                }

                                return $ret;
                            }
                            not_admin_manufacturer_addresses_delete:

                            // admin_manufacturer_addresses_bulk_delete
                            if ('/sell/catalog/brands/addresses/bulk-delete' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::bulkDeleteAddressAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:submitBulkdeleteaddress',  '_route' => 'admin_manufacturer_addresses_bulk_delete',);
                                if (!in_array($requestMethod, ['POST'])) {
                                    $allow = array_merge($allow, ['POST']);
                                    goto not_admin_manufacturer_addresses_bulk_delete;
                                }

                                return $ret;
                            }
                            not_admin_manufacturer_addresses_bulk_delete:

                            // admin_manufacturer_addresses_export
                            if ('/sell/catalog/brands/addresses/export' === $pathinfo) {
                                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\ManufacturerController::exportAddressAction',  '_legacy_controller' => 'AdminManufacturers',  '_legacy_link' => 'AdminManufacturers:exportaddress',  '_route' => 'admin_manufacturer_addresses_export',);
                                if (!in_array($canonicalMethod, ['GET'])) {
                                    $allow = array_merge($allow, ['GET']);
                                    goto not_admin_manufacturer_addresses_export;
                                }

                                return $ret;
                            }
                            not_admin_manufacturer_addresses_export:

                        }

                    }

                }

                elseif (0 === strpos($pathinfo, '/sell/customers')) {
                    // admin_customers_index
                    if ('/sell/customers' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::indexAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers',  '_route' => 'admin_customers_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_customers_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_customers_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_customers_index;
                        }

                        return $ret;
                    }
                    not_admin_customers_index:

                    // admin_customers_filter
                    if ('/sell/customers/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::searchGridAction',  '_legacy_controller' => 'AdminCustomers',  'gridDefinitionFactoryServiceId' => 'prestashop.core.grid.definition.factory.customer',  'redirectRoute' => 'admin_customers_index',  '_legacy_link' => 'AdminCustomers:submitFiltercustomer',  '_route' => 'admin_customers_filter',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_filter;
                        }

                        return $ret;
                    }
                    not_admin_customers_filter:

                    // admin_customers_create
                    if ('/sell/customers/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::createAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:addcustomer',  '_route' => 'admin_customers_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_customers_create;
                        }

                        return $ret;
                    }
                    not_admin_customers_create:

                    // admin_customers_edit
                    if (preg_match('#^/sell/customers/(?P<customerId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::editAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:updatecustomer',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_customers_edit;
                        }

                        return $ret;
                    }
                    not_admin_customers_edit:

                    // admin_customers_view
                    if (preg_match('#^/sell/customers/(?P<customerId>\\d+)/view$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_view']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::viewAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:viewcustomer',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_customers_view;
                        }

                        return $ret;
                    }
                    not_admin_customers_view:

                    // admin_customers_set_private_note
                    if (preg_match('#^/sell/customers/(?P<customerId>\\d+)/set\\-private\\-note$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_set_private_note']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::setPrivateNoteAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:updateCustomerNote',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_set_private_note;
                        }

                        return $ret;
                    }
                    not_admin_customers_set_private_note:

                    // admin_customers_toggle_status
                    if (preg_match('#^/sell/customers/(?P<customerId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::toggleStatusAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:statuscustomer',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_customers_toggle_status:

                    // admin_customers_transform_guest_to_customer
                    if (preg_match('#^/sell/customers/(?P<customerId>[^/]++)/transform\\-guest\\-to\\-customer$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_transform_guest_to_customer']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::transformGuestToCustomerAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:guesttocustomer',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_transform_guest_to_customer;
                        }

                        return $ret;
                    }
                    not_admin_customers_transform_guest_to_customer:

                    // admin_customers_toggle_newsletter_subscription
                    if (preg_match('#^/sell/customers/(?P<customerId>\\d+)/toggle\\-newsletter\\-subscription$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_toggle_newsletter_subscription']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::toggleNewsletterSubscriptionAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:changeNewsletterVal',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_toggle_newsletter_subscription;
                        }

                        return $ret;
                    }
                    not_admin_customers_toggle_newsletter_subscription:

                    // admin_customers_set_required_fields
                    if ('/sell/customers/set-required-fields' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::setRequiredFieldsAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:submitFields',  '_route' => 'admin_customers_set_required_fields',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_set_required_fields;
                        }

                        return $ret;
                    }
                    not_admin_customers_set_required_fields:

                    // admin_customers_toggle_partner_offer_subscription
                    if (preg_match('#^/sell/customers/(?P<customerId>\\d+)/toggle\\-partner\\-offer\\-subscription$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_customers_toggle_partner_offer_subscription']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::togglePartnerOfferSubscriptionAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:changeOptinVal',  '_legacy_parameters' =>   array (    'id_customer' => 'customerId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_toggle_partner_offer_subscription;
                        }

                        return $ret;
                    }
                    not_admin_customers_toggle_partner_offer_subscription:

                    if (0 === strpos($pathinfo, '/sell/customers/delete')) {
                        // admin_customers_delete_bulk
                        if ('/sell/customers/delete-bulk' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::deleteBulkAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:submitBulkdeletecustomer',  '_route' => 'admin_customers_delete_bulk',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_customers_delete_bulk;
                            }

                            return $ret;
                        }
                        not_admin_customers_delete_bulk:

                        // admin_customers_delete
                        if ('/sell/customers/delete' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::deleteAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:deletecustomer',  '_route' => 'admin_customers_delete',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_customers_delete;
                            }

                            return $ret;
                        }
                        not_admin_customers_delete:

                    }

                    // admin_customers_disable_bulk
                    if ('/sell/customers/disable-bulk' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::disableBulkAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:submitBulkdisableSelectioncustomer',  '_route' => 'admin_customers_disable_bulk',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_disable_bulk;
                        }

                        return $ret;
                    }
                    not_admin_customers_disable_bulk:

                    // admin_customers_enable_bulk
                    if ('/sell/customers/enable-bulk' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::enableBulkAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:submitBulkenableSelectioncustomer',  '_route' => 'admin_customers_enable_bulk',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_customers_enable_bulk;
                        }

                        return $ret;
                    }
                    not_admin_customers_enable_bulk:

                    // admin_customers_export
                    if ('/sell/customers/export' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::exportAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:exportcustomer',  '_route' => 'admin_customers_export',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_customers_export;
                        }

                        return $ret;
                    }
                    not_admin_customers_export:

                    // admin_customers_search
                    if ('/sell/customers/search' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController::searchAction',  '_legacy_controller' => 'AdminCustomers',  '_legacy_link' => 'AdminCustomers:searchCustomers',  '_route' => 'admin_customers_search',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_customers_search;
                        }

                        return $ret;
                    }
                    not_admin_customers_search:

                }

                elseif (0 === strpos($pathinfo, '/sell/orders/delivery-slips')) {
                    // admin_order_delivery_slip
                    if ('/sell/orders/delivery-slips' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\DeliveryController::slipAction',  '_legacy_controller' => 'AdminDeliverySlip',  '_legacy_link' => 'AdminDeliverySlip',  '_route' => 'admin_order_delivery_slip',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_order_delivery_slip;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_order_delivery_slip'));
                        }

                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_order_delivery_slip;
                        }

                        return $ret;
                    }
                    not_admin_order_delivery_slip:

                    // admin_order_delivery_slip_pdf
                    if ('/sell/orders/delivery-slips/pdf' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\DeliveryController::generatePdfAction',  '_legacy_controller' => 'AdminDeliverySlip',  '_legacy_link' => 'AdminDeliverySlip:submitAdddelivery',  '_route' => 'admin_order_delivery_slip_pdf',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_order_delivery_slip_pdf;
                        }

                        return $ret;
                    }
                    not_admin_order_delivery_slip_pdf:

                }

                elseif (0 === strpos($pathinfo, '/sell/orders/invoices')) {
                    // admin_order_invoices
                    if ('/sell/orders/invoices' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\InvoicesController::indexAction',  '_legacy_controller' => 'AdminInvoices',  '_legacy_link' => 'AdminInvoices',  '_route' => 'admin_order_invoices',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_order_invoices;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_order_invoices'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_order_invoices;
                        }

                        return $ret;
                    }
                    not_admin_order_invoices:

                    // admin_order_invoices_process
                    if ('/sell/orders/invoices/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\InvoicesController::processAction',  '_legacy_controller' => 'AdminInvoices',  '_legacy_link' => 'AdminInvoices:update',  '_route' => 'admin_order_invoices_process',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_order_invoices_process;
                        }

                        return $ret;
                    }
                    not_admin_order_invoices_process:

                    // admin_order_invoices_generate_by_date
                    if ('/sell/orders/invoices/by_date' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\InvoicesController::generatePdfByDateAction',  '_legacy_controller' => 'AdminInvoices',  '_legacy_link' => 'AdminInvoices:submitAddinvoice_date',  '_route' => 'admin_order_invoices_generate_by_date',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_order_invoices_generate_by_date;
                        }

                        return $ret;
                    }
                    not_admin_order_invoices_generate_by_date:

                    // admin_order_invoices_generate_by_status
                    if ('/sell/orders/invoices/by_status' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\InvoicesController::generatePdfByStatusAction',  '_legacy_controller' => 'AdminInvoices',  '_legacy_link' => 'AdminInvoices:submitAddinvoice_status',  '_route' => 'admin_order_invoices_generate_by_status',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_order_invoices_generate_by_status;
                        }

                        return $ret;
                    }
                    not_admin_order_invoices_generate_by_status:

                }

                elseif (0 === strpos($pathinfo, '/sell/stocks')) {
                    // admin_stock_overview
                    if ('/sell/stocks' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\StockController::overviewAction',  '_legacy_controller' => 'AdminStockManagement',  '_legacy_link' => 'AdminStockManagement',  '_route' => 'admin_stock_overview',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_stock_overview;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_stock_overview'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_stock_overview;
                        }

                        return $ret;
                    }
                    not_admin_stock_overview:

                    // admin_stock_movements_overview
                    if ('/sell/stocks/movements' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\StockController::overviewAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'admin_stock_movements_overview',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_stock_movements_overview;
                        }

                        return $ret;
                    }
                    not_admin_stock_movements_overview:

                }

            }

            elseif (0 === strpos($pathinfo, '/stock')) {
                // _admin_stock_hot_reload_json
                if (preg_match('#^/stock/(?P<hash>[^/\\.]++)\\.hot\\-update\\.json$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => '_admin_stock_hot_reload_json']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\StockController::hashUpdateJsonAction',));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not__admin_stock_hot_reload_json;
                    }

                    return $ret;
                }
                not__admin_stock_hot_reload_json:

                // _admin_stock_hot_reload_js
                if (preg_match('#^/stock/(?P<hash>.+)\\.hot\\-update\\.js$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => '_admin_stock_hot_reload_js']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\StockController::hashUpdateJsAction',));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not__admin_stock_hot_reload_js;
                    }

                    return $ret;
                }
                not__admin_stock_hot_reload_js:

            }

        }

        elseif (0 === strpos($pathinfo, '/improve')) {
            if (0 === strpos($pathinfo, '/improve/international')) {
                if (0 === strpos($pathinfo, '/improve/international/translations')) {
                    // admin_international_translation_overview
                    if ('/improve/international/translations' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::overviewAction',  '_legacy_controller' => 'AdminTranslations',  '_legacy_link' => 'AdminTranslationSf',  '_route' => 'admin_international_translation_overview',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_international_translation_overview;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_international_translation_overview'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_international_translation_overview;
                        }

                        return $ret;
                    }
                    not_admin_international_translation_overview:

                    // admin_international_translations_export_theme
                    if ('/improve/international/translations/export' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::exportThemeLanguageAction',  '_legacy_controller' => 'AdminTranslations',  '_legacy_link' => 'AdminTranslations:submitExport',  '_route' => 'admin_international_translations_export_theme',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_international_translations_export_theme;
                        }

                        return $ret;
                    }
                    not_admin_international_translations_export_theme:

                    // admin_international_translations_show_settings
                    if ('/improve/international/translations/settings' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::showSettingsAction',  '_legacy_controller' => 'AdminTranslations',  '_legacy_link' => 'AdminTranslations:settings',  '_route' => 'admin_international_translations_show_settings',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_international_translations_show_settings;
                        }

                        return $ret;
                    }
                    not_admin_international_translations_show_settings:

                    // _admin_international_translations_modify
                    if ('/improve/international/translations/modify' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::modifyTranslationsAction',  '_legacy_controller' => 'AdminTranslations',  '_route' => '_admin_international_translations_modify',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not__admin_international_translations_modify;
                        }

                        return $ret;
                    }
                    not__admin_international_translations_modify:

                    // admin_international_translations_add_update_language
                    if ('/improve/international/translations/add-update-language' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::addUpdateLanguageAction',  '_legacy_controller' => 'AdminTranslations',  '_legacy_link' => 'AdminTranslations:submitAddLanguage',  '_route' => 'admin_international_translations_add_update_language',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_international_translations_add_update_language;
                        }

                        return $ret;
                    }
                    not_admin_international_translations_add_update_language:

                    // admin_international_translations_copy_language
                    if ('/improve/international/translations/copy' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::copyLanguageAction',  '_legacy_controller' => 'AdminTranslations',  '_legacy_link' => 'AdminTranslations:submitCopyLang',  '_route' => 'admin_international_translations_copy_language',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_international_translations_copy_language;
                        }

                        return $ret;
                    }
                    not_admin_international_translations_copy_language:

                }

                elseif (0 === strpos($pathinfo, '/improve/international/taxes')) {
                    // admin_taxes_index
                    if ('/improve/international/taxes' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::indexAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes',  '_route' => 'admin_taxes_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_taxes_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_taxes_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_taxes_index;
                        }

                        return $ret;
                    }
                    not_admin_taxes_index:

                    // admin_taxes_save_options
                    if ('/improve/international/taxes/save-options' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::saveOptionsAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:submitOptionstax',  '_route' => 'admin_taxes_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_taxes_save_options;
                        }

                        return $ret;
                    }
                    not_admin_taxes_save_options:

                    // admin_taxes_search
                    if ('/improve/international/taxes/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::searchAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:submitFiltertax',  '_route' => 'admin_taxes_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_taxes_search;
                        }

                        return $ret;
                    }
                    not_admin_taxes_search:

                    // admin_taxes_create
                    if ('/improve/international/taxes/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::createAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:addtax',  '_route' => 'admin_taxes_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_taxes_create;
                        }

                        return $ret;
                    }
                    not_admin_taxes_create:

                    // admin_taxes_edit
                    if (preg_match('#^/improve/international/taxes/(?P<taxId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_taxes_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::editAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:updatetax',  '_legacy_parameters' =>   array (    'id_tax' => 'taxId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_taxes_edit;
                        }

                        return $ret;
                    }
                    not_admin_taxes_edit:

                    // admin_taxes_delete
                    if (preg_match('#^/improve/international/taxes/(?P<taxId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_taxes_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::deleteAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:deletetax',  '_legacy_parameters' =>   array (    'id_tax' => 'taxId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_taxes_delete;
                        }

                        return $ret;
                    }
                    not_admin_taxes_delete:

                    // admin_taxes_toggle_status
                    if (preg_match('#^/improve/international/taxes/(?P<taxId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_taxes_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::toggleStatusAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:statustax',  '_legacy_parameters' =>   array (    'id_tax' => 'taxId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_taxes_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_taxes_toggle_status:

                    if (0 === strpos($pathinfo, '/improve/international/taxes/bulk-')) {
                        // admin_taxes_bulk_enable_status
                        if ('/improve/international/taxes/bulk-enable-status' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::bulkEnableStatusAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:submitBulkenableSelectiontax',  '_route' => 'admin_taxes_bulk_enable_status',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_taxes_bulk_enable_status;
                            }

                            return $ret;
                        }
                        not_admin_taxes_bulk_enable_status:

                        // admin_taxes_bulk_disable_status
                        if ('/improve/international/taxes/bulk-disable-status' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::bulkDisableStatusAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:submitBulkdisableSelectiontax',  '_route' => 'admin_taxes_bulk_disable_status',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_taxes_bulk_disable_status;
                            }

                            return $ret;
                        }
                        not_admin_taxes_bulk_disable_status:

                        // admin_taxes_bulk_delete
                        if ('/improve/international/taxes/bulk-delete' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController::bulkDeleteAction',  '_legacy_controller' => 'AdminTaxes',  '_legacy_link' => 'AdminTaxes:submitBulkdeletetax',  '_route' => 'admin_taxes_bulk_delete',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_taxes_bulk_delete;
                            }

                            return $ret;
                        }
                        not_admin_taxes_bulk_delete:

                    }

                }

                elseif (0 === strpos($pathinfo, '/improve/international/localization')) {
                    // admin_localization_index
                    if ('/improve/international/localization' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LocalizationController::indexAction',  '_legacy_controller' => 'AdminLocalization',  '_legacy_link' => 'AdminLocalization',  '_route' => 'admin_localization_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_localization_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_localization_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_localization_index;
                        }

                        return $ret;
                    }
                    not_admin_localization_index:

                    // admin_localization_save_options
                    if ('/improve/international/localization/options' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LocalizationController::saveOptionsAction',  '_legacy_controller' => 'AdminLocalization',  '_legacy_link' => 'AdminLocalization:update',  '_route' => 'admin_localization_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_localization_save_options;
                        }

                        return $ret;
                    }
                    not_admin_localization_save_options:

                    // admin_localization_import_pack
                    if ('/improve/international/localization/import-pack' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LocalizationController::importPackAction',  '_legacy_controller' => 'AdminLocalization',  '_legacy_link' => 'AdminLocalization:submitLocalizationPack',  '_route' => 'admin_localization_import_pack',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_localization_import_pack;
                        }

                        return $ret;
                    }
                    not_admin_localization_import_pack:

                }

                elseif (0 === strpos($pathinfo, '/improve/international/languages')) {
                    // admin_languages_index
                    if ('/improve/international/languages' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::indexAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages',  '_route' => 'admin_languages_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_languages_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_languages_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_languages_index;
                        }

                        return $ret;
                    }
                    not_admin_languages_index:

                    // admin_languages_search
                    if ('/improve/international/languages/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::searchGridAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' =>   array (    0 => 'AdminLanguages:submitFilterlang',    1 => 'AdminLanguages:submitFiltercurrency',  ),  '_route' => 'admin_languages_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_languages_search;
                        }

                        return $ret;
                    }
                    not_admin_languages_search:

                    // admin_languages_create
                    if ('/improve/international/languages/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::createAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages:addlang',  '_route' => 'admin_languages_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_languages_create;
                        }

                        return $ret;
                    }
                    not_admin_languages_create:

                    // admin_languages_edit
                    if (preg_match('#^/improve/international/languages/(?P<languageId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_languages_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::editAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages:updatelang',));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_languages_edit;
                        }

                        return $ret;
                    }
                    not_admin_languages_edit:

                    // admin_languages_delete
                    if (preg_match('#^/improve/international/languages/(?P<languageId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_languages_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::deleteAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages:deletelang',));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_languages_delete;
                        }

                        return $ret;
                    }
                    not_admin_languages_delete:

                    // admin_languages_bulk_delete
                    if ('/improve/international/languages/bulk-delete' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::bulkDeleteAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages:submitBulkdeletelang',  '_route' => 'admin_languages_bulk_delete',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_languages_bulk_delete;
                        }

                        return $ret;
                    }
                    not_admin_languages_bulk_delete:

                    // admin_languages_toggle_status
                    if (preg_match('#^/improve/international/languages/(?P<languageId>[^/]++)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_languages_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::toggleStatusAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages:statuslang',));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_languages_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_languages_toggle_status:

                    // admin_languages_bulk_toggle_status
                    if (0 === strpos($pathinfo, '/improve/international/languages/bulk-toggle-status') && preg_match('#^/improve/international/languages/bulk\\-toggle\\-status/(?P<status>enable|disable)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_languages_bulk_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController::bulkToggleStatusAction',  '_legacy_controller' => 'AdminLanguages',  '_legacy_link' => 'AdminLanguages:submitBulkupdatelang',));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_languages_bulk_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_languages_bulk_toggle_status:

                }

                elseif (0 === strpos($pathinfo, '/improve/international/geolocation')) {
                    // admin_geolocation_index
                    if ('/improve/international/geolocation' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\GeolocationController::indexAction',  '_legacy_controller' => 'AdminGeolocation',  '_legacy_link' => 'AdminGeolocation',  '_route' => 'admin_geolocation_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_geolocation_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_geolocation_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_geolocation_index;
                        }

                        return $ret;
                    }
                    not_admin_geolocation_index:

                    // admin_geolocation_save_options
                    if ('/improve/international/geolocation/process_form' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\GeolocationController::saveOptionsAction',  '_legacy_controller' => 'AdminGeolocation',  '_legacy_link' => 'AdminGeolocation:update',  '_route' => 'admin_geolocation_save_options',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_geolocation_save_options;
                        }

                        return $ret;
                    }
                    not_admin_geolocation_save_options:

                }

                elseif (0 === strpos($pathinfo, '/improve/international/currencies')) {
                    // admin_currencies_index
                    if ('/improve/international/currencies' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::indexAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies',  '_route' => 'admin_currencies_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_currencies_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_currencies_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_currencies_index;
                        }

                        return $ret;
                    }
                    not_admin_currencies_index:

                    // admin_currencies_search
                    if ('/improve/international/currencies/' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::searchAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies:submitFiltercurrency',  '_route' => 'admin_currencies_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_currencies_search;
                        }

                        return $ret;
                    }
                    not_admin_currencies_search:

                    // admin_currencies_create
                    if ('/improve/international/currencies/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::createAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies:addcurrency',  '_route' => 'admin_currencies_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_currencies_create;
                        }

                        return $ret;
                    }
                    not_admin_currencies_create:

                    // admin_currencies_edit
                    if (preg_match('#^/improve/international/currencies/(?P<currencyId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_currencies_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::editAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies:updatecurrency',  '_legacy_parameters' =>   array (    'id_currency' => 'currencyId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_currencies_edit;
                        }

                        return $ret;
                    }
                    not_admin_currencies_edit:

                    // admin_currencies_delete
                    if (preg_match('#^/improve/international/currencies/(?P<currencyId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_currencies_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::deleteAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies:deletecurrency',  '_legacy_parameters' =>   array (    'id_currency' => 'currencyId',  ),));
                        if (!in_array($requestMethod, ['DELETE'])) {
                            $allow = array_merge($allow, ['DELETE']);
                            goto not_admin_currencies_delete;
                        }

                        return $ret;
                    }
                    not_admin_currencies_delete:

                    // admin_currencies_toggle_status
                    if (preg_match('#^/improve/international/currencies/(?P<currencyId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_currencies_toggle_status']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::toggleStatusAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies:statuscurrency',  '_legacy_parameters' =>   array (    'id_currency' => 'currencyId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_currencies_toggle_status;
                        }

                        return $ret;
                    }
                    not_admin_currencies_toggle_status:

                    // admin_currencies_update_live_exchange_rates
                    if ('/improve/international/currencies/update-live-exchange-rates' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::updateLiveExchangeRatesAction',  '_legacy_controller' => 'AdminCurrencies',  '_route' => 'admin_currencies_update_live_exchange_rates',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_currencies_update_live_exchange_rates;
                        }

                        return $ret;
                    }
                    not_admin_currencies_update_live_exchange_rates:

                    // admin_currencies_refresh_exchange_rates
                    if ('/improve/international/currencies/refresh-exchange-rates' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController::refreshExchangeRatesAction',  '_legacy_controller' => 'AdminCurrencies',  '_legacy_link' => 'AdminCurrencies:SubmitExchangesRates',  '_route' => 'admin_currencies_refresh_exchange_rates',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_currencies_refresh_exchange_rates;
                        }

                        return $ret;
                    }
                    not_admin_currencies_refresh_exchange_rates:

                }

                // admin_country_states
                if ('/improve/international/states' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\StateController::getStatesAction',  '_legacy_controller' => 'AdminStates',  '_route' => 'admin_country_states',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_admin_country_states;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_country_states'));
                    }

                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_country_states;
                    }

                    return $ret;
                }
                not_admin_country_states:

            }

            elseif (0 === strpos($pathinfo, '/improve/modules')) {
                if (0 === strpos($pathinfo, '/improve/modules/addons')) {
                    // admin_addons_login
                    if ('/improve/modules/addons/login' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AddonsController::loginAction',  '_route' => 'admin_addons_login',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_addons_login;
                        }

                        return $ret;
                    }
                    not_admin_addons_login:

                    // admin_addons_logout
                    if ('/improve/modules/addons/logout' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\AddonsController::logoutAction',  '_route' => 'admin_addons_logout',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_addons_logout;
                        }

                        return $ret;
                    }
                    not_admin_addons_logout:

                    // admin_module_addons_store
                    if ('/improve/modules/addons-store' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Modules\\AddonsStoreController::indexAction',  '_legacy_controller' => 'AdminAddonsCatalog',  '_legacy_link' => 'AdminAddonsCatalog',  '_route' => 'admin_module_addons_store',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_addons_store;
                        }

                        return $ret;
                    }
                    not_admin_module_addons_store:

                }

                elseif (0 === strpos($pathinfo, '/improve/modules/alerts')) {
                    // admin_module_notification
                    if ('/improve/modules/alerts' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Modules\\AlertsController::indexAction',  '_legacy_controller' => 'AdminModulesNotifications',  '_legacy_link' => 'AdminModulesNotifications',  '_route' => 'admin_module_notification',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_notification;
                        }

                        return $ret;
                    }
                    not_admin_module_notification:

                    // admin_module_notification_count
                    if ('/improve/modules/alerts/count' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Modules\\AlertsController::notificationsCountAction',  '_legacy_controller' => 'AdminModulesNotifications',  '_legacy_link' => 'AdminModulesNotifications:count',  '_route' => 'admin_module_notification_count',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_notification_count;
                        }

                        return $ret;
                    }
                    not_admin_module_notification_count:

                }

                // admin_module_cart
                if (0 === strpos($pathinfo, '/improve/modules/cart') && preg_match('#^/improve/modules/cart/(?P<moduleId>\\d+)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_module_cart']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::getModuleCartAction',));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_module_cart;
                    }

                    return $ret;
                }
                not_admin_module_cart:

                if (0 === strpos($pathinfo, '/improve/modules/catalog')) {
                    // admin_module_catalog
                    if ('/improve/modules/catalog' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::catalogAction',  '_legacy_controller' => 'AdminModulesCatalog',  '_legacy_link' => 'AdminModulesCatalog',  '_route' => 'admin_module_catalog',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_catalog;
                        }

                        return $ret;
                    }
                    not_admin_module_catalog:

                    // admin_module_catalog_refresh
                    if (0 === strpos($pathinfo, '/improve/modules/catalog/refresh') && preg_match('#^/improve/modules/catalog/refresh(?:/(?P<category>[^/]++)(?:/(?P<keyword>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_module_catalog_refresh']), array (  'category' => NULL,  'keyword' => NULL,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::refreshCatalogAction',  '_legacy_controller' => 'AdminModulesCatalog',  '_legacy_link' => 'AdminModulesCatalog:refresh',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_catalog_refresh;
                        }

                        return $ret;
                    }
                    not_admin_module_catalog_refresh:

                    // admin_module_catalog_post
                    if ('/improve/modules/catalog/recommended' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::getPreferredModulesAction',  '_legacy_controller' => 'AdminModulesCatalog',  '_legacy_link' => 'AdminModulesCatalog:recommended',  '_route' => 'admin_module_catalog_post',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_catalog_post;
                        }

                        return $ret;
                    }
                    not_admin_module_catalog_post:

                }

                elseif (0 === strpos($pathinfo, '/improve/modules/manage')) {
                    // admin_module_manage
                    if (preg_match('#^/improve/modules/manage(?:/(?P<category>[^/]++)(?:/(?P<keyword>[^/]++))?)?$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_module_manage']), array (  'category' => NULL,  'keyword' => NULL,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::manageAction',  '_legacy_controller' => 'AdminModulesManage',  '_legacy_link' =>   array (    0 => 'AdminModulesManage',    1 => 'AdminModulesSf',  ),));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_module_manage;
                        }

                        return $ret;
                    }
                    not_admin_module_manage:

                    if (0 === strpos($pathinfo, '/improve/modules/manage/action')) {
                        // admin_module_manage_action
                        if (preg_match('#^/improve/modules/manage/action/(?P<action>install|uninstall|enable|disable|enable_mobile|disable_mobile|reset|upgrade)/(?P<module_name>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_module_manage_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::moduleAction',));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_module_manage_action;
                            }

                            return $ret;
                        }
                        not_admin_module_manage_action:

                        // admin_module_configure_action
                        if (0 === strpos($pathinfo, '/improve/modules/manage/action/configure') && preg_match('#^/improve/modules/manage/action/configure/(?P<module_name>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_module_configure_action']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::configureModuleAction',  '_legacy_controller' => 'AdminModules',));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_module_configure_action;
                            }

                            return $ret;
                        }
                        not_admin_module_configure_action:

                    }

                    // admin_module_manage_action_bulk
                    if (0 === strpos($pathinfo, '/improve/modules/manage/bulk') && preg_match('#^/improve/modules/manage/bulk/(?P<action>install|uninstall|configure|enable|disable|reset|upgrade)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_module_manage_action_bulk']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::moduleAction',));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_module_manage_action_bulk;
                        }

                        return $ret;
                    }
                    not_admin_module_manage_action_bulk:

                    // admin_module_manage_update_all
                    if ('/improve/modules/manage/update/all' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::moduleAction',  '_route' => 'admin_module_manage_update_all',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_module_manage_update_all;
                        }

                        return $ret;
                    }
                    not_admin_module_manage_update_all:

                }

                // admin_module_import
                if ('/improve/modules/import' === $pathinfo) {
                    $ret = array (  'module_name' => NULL,  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController::importModuleAction',  '_route' => 'admin_module_import',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_module_import;
                    }

                    return $ret;
                }
                not_admin_module_import:

                // admin_module_updates
                if ('/improve/modules/updates' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Modules\\UpdatesController::indexAction',  '_legacy_controller' => 'AdminModulesUpdates',  '_legacy_link' => 'AdminModulesUpdates',  '_route' => 'admin_module_updates',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_module_updates;
                    }

                    return $ret;
                }
                not_admin_module_updates:

            }

            elseif (0 === strpos($pathinfo, '/improve/design')) {
                if (0 === strpos($pathinfo, '/improve/design/themes')) {
                    // admin_theme_catalog
                    if ('/improve/design/themes-catalog' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeCatalogController::indexAction',  '_legacy_controller' => 'AdminThemesCatalog',  '_legacy_link' => 'AdminThemesCatalog',  '_route' => 'admin_theme_catalog',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_theme_catalog;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_theme_catalog'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_theme_catalog;
                        }

                        return $ret;
                    }
                    not_admin_theme_catalog:

                    // admin_themes_index
                    if ('/improve/design/themes' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::indexAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes',  '_route' => 'admin_themes_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_themes_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_themes_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_themes_index;
                        }

                        return $ret;
                    }
                    not_admin_themes_index:

                    // admin_themes_upload_logos
                    if ('/improve/design/themes/upload-logos' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::uploadLogosAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:submitOptionsconfiguration',  '_route' => 'admin_themes_upload_logos',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_themes_upload_logos;
                        }

                        return $ret;
                    }
                    not_admin_themes_upload_logos:

                    // admin_themes_export_current
                    if ('/improve/design/themes/export' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::exportAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:exporttheme',  '_route' => 'admin_themes_export_current',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_themes_export_current;
                        }

                        return $ret;
                    }
                    not_admin_themes_export_current:

                    // admin_themes_import
                    if ('/improve/design/themes/import' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::importAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:importtheme',  '_route' => 'admin_themes_import',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_themes_import;
                        }

                        return $ret;
                    }
                    not_admin_themes_import:

                    // admin_themes_enable
                    if (preg_match('#^/improve/design/themes/(?P<themeName>[a-zA-Z0-9_.-]+)/enable$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_themes_enable']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::enableAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:enableTheme',  '_legacy_parameters' =>   array (    'theme_name' => 'themeName',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_themes_enable;
                        }

                        return $ret;
                    }
                    not_admin_themes_enable:

                    // admin_themes_delete
                    if (preg_match('#^/improve/design/themes/(?P<themeName>[a-zA-Z0-9_.-]+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_themes_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::deleteAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:deleteTheme',  '_legacy_parameters' =>   array (    'theme_name' => 'themeName',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_themes_delete;
                        }

                        return $ret;
                    }
                    not_admin_themes_delete:

                    // admin_themes_adapt_to_rtl_languages
                    if ('/improve/design/themes/adapt-to-rtl-languages' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::adaptToRTLLanguagesAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:submitGenerateRTL',  '_route' => 'admin_themes_adapt_to_rtl_languages',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_themes_adapt_to_rtl_languages;
                        }

                        return $ret;
                    }
                    not_admin_themes_adapt_to_rtl_languages:

                    // admin_theme_customize_layouts
                    if ('/improve/design/themes/customize-layouts' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::customizeLayoutsAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:submitConfigureLayouts',  '_route' => 'admin_theme_customize_layouts',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_theme_customize_layouts;
                        }

                        return $ret;
                    }
                    not_admin_theme_customize_layouts:

                    // admin_themes_reset_layouts
                    if (preg_match('#^/improve/design/themes/(?P<themeName>[a-zA-Z0-9_.-]+)/reset\\-layouts$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_themes_reset_layouts']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeController::resetLayoutsAction',  '_legacy_controller' => 'AdminThemes',  '_legacy_link' => 'AdminThemes:resetToDefaults',  '_legacy_parameters' =>   array (    'theme_name' => 'themeName',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_themes_reset_layouts;
                        }

                        return $ret;
                    }
                    not_admin_themes_reset_layouts:

                }

                elseif (0 === strpos($pathinfo, '/improve/design/modules/positions')) {
                    // admin_modules_positions
                    if ('/improve/design/modules/positions' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\PositionsController::indexAction',  '_legacy_controller' => 'AdminModulesPositions',  '_legacy_link' => 'AdminModulesPositions',  '_route' => 'admin_modules_positions',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_modules_positions;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_modules_positions'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_modules_positions;
                        }

                        return $ret;
                    }
                    not_admin_modules_positions:

                    // admin_modules_positions_unhook
                    if ('/improve/design/modules/positions/unhook' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\PositionsController::unhookAction',  '_legacy_controller' => 'AdminModulesPositions',  '_legacy_link' => 'AdminModulesPositions:unhook',  '_route' => 'admin_modules_positions_unhook',);
                        if (!in_array($canonicalMethod, ['POST', 'GET'])) {
                            $allow = array_merge($allow, ['POST', 'GET']);
                            goto not_admin_modules_positions_unhook;
                        }

                        return $ret;
                    }
                    not_admin_modules_positions_unhook:

                }

                elseif (0 === strpos($pathinfo, '/improve/design/mail_theme')) {
                    // admin_mail_theme_index
                    if ('/improve/design/mail_theme' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::indexAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme',  '_route' => 'admin_mail_theme_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_mail_theme_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_mail_theme_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_mail_theme_index;
                        }

                        return $ret;
                    }
                    not_admin_mail_theme_index:

                    // admin_mail_theme_generate
                    if ('/improve/design/mail_theme/generate' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::generateMailsAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme:postGenerateMails',  '_route' => 'admin_mail_theme_generate',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_mail_theme_generate;
                        }

                        return $ret;
                    }
                    not_admin_mail_theme_generate:

                    // admin_mail_theme_save_configuration
                    if ('/improve/design/mail_theme/saveConfiguration' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::saveConfigurationAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme:saveConfiguration',  '_route' => 'admin_mail_theme_save_configuration',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_mail_theme_save_configuration;
                        }

                        return $ret;
                    }
                    not_admin_mail_theme_save_configuration:

                    if (0 === strpos($pathinfo, '/improve/design/mail_theme/sendTestMail')) {
                        // admin_mail_theme_send_test_mail
                        if (preg_match('#^/improve/design/mail_theme/sendTestMail/(?P<locale>[^/]++)/(?P<theme>[^/]++)/(?P<layout>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_send_test_mail']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::sendTestMailAction',  '_legacy_link' => 'AdminMailTheme:rawModuleLayout',  '_legacy_controller' => 'AdminMailTheme',  'module' => '',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_send_test_mail;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_send_test_mail:

                        // admin_mail_theme_send_test_module_mail
                        if (preg_match('#^/improve/design/mail_theme/sendTestMail/(?P<locale>[^/]++)/(?P<theme>[^/]++)/(?P<module>[^/]++)/(?P<layout>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_send_test_module_mail']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::sendTestMailAction',  '_legacy_link' => 'AdminMailTheme:rawModuleLayout',  '_legacy_controller' => 'AdminMailTheme',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_send_test_module_mail;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_send_test_module_mail:

                    }

                    elseif (0 === strpos($pathinfo, '/improve/design/mail_theme/preview')) {
                        // admin_mail_theme_preview
                        if (preg_match('#^/improve/design/mail_theme/preview/(?P<theme>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_preview']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::previewThemeAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme:previewTheme',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_preview;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_preview:

                        // admin_mail_theme_preview_layout
                        if (preg_match('#^/improve/design/mail_theme/preview/(?P<locale>[^/]++)/(?P<theme>[^/]++)/(?P<layout>[^/\\.]++)\\.(?P<type>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_preview_layout']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::previewLayoutAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme:previewLayout',  'module' => '',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_preview_layout;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_preview_layout:

                        // admin_mail_theme_preview_module_layout
                        if (preg_match('#^/improve/design/mail_theme/preview/(?P<locale>[^/]++)/(?P<theme>[^/]++)/(?P<module>[^/]++)/(?P<layout>[^/\\.]++)\\.(?P<type>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_preview_module_layout']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::previewLayoutAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme:previewModuleLayout',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_preview_module_layout;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_preview_module_layout:

                    }

                    elseif (0 === strpos($pathinfo, '/improve/design/mail_theme/raw')) {
                        // admin_mail_theme_raw_layout
                        if (preg_match('#^/improve/design/mail_theme/raw/(?P<locale>[^/]++)/(?P<theme>[^/]++)/(?P<layout>[^/\\.]++)\\.(?P<type>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_raw_layout']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::rawLayoutAction',  '_legacy_controller' => 'AdminMailTheme',  '_legacy_link' => 'AdminMailTheme:rawLayout',  'module' => '',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_raw_layout;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_raw_layout:

                        // admin_mail_theme_raw_module_layout
                        if (preg_match('#^/improve/design/mail_theme/raw/(?P<locale>[^/]++)/(?P<theme>[^/]++)/(?P<module>[^/]++)/(?P<layout>[^/\\.]++)\\.(?P<type>[^/]++)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_mail_theme_raw_module_layout']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\MailThemeController::rawLayoutAction',  '_legacy_link' => 'AdminMailTheme:rawModuleLayout',  '_legacy_controller' => 'AdminMailTheme',));
                            if (!in_array($canonicalMethod, ['GET'])) {
                                $allow = array_merge($allow, ['GET']);
                                goto not_admin_mail_theme_raw_module_layout;
                            }

                            return $ret;
                        }
                        not_admin_mail_theme_raw_module_layout:

                    }

                }

                elseif (0 === strpos($pathinfo, '/improve/design/cms-pages')) {
                    // admin_cms_pages_index
                    if ('/improve/design/cms-pages' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::indexAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent',  '_route' => 'admin_cms_pages_index',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_admin_cms_pages_index;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_cms_pages_index'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_admin_cms_pages_index;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_index:

                    // admin_cms_pages_search
                    if ('/improve/design/cms-pages/search' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::searchAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitFiltercms',  '_route' => 'admin_cms_pages_search',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_cms_pages_search;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_search:

                    // admin_cms_pages_create
                    if ('/improve/design/cms-pages/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::createAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:addcms',  '_route' => 'admin_cms_pages_create',);
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_cms_pages_create;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_create:

                    // admin_cms_pages_edit
                    if (preg_match('#^/improve/design/cms\\-pages/(?P<cmsPageId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_cms_pages_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::editAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:updatecms',  '_legacy_parameters' =>   array (    'id_cms' => 'cmsPageId',  ),));
                        if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                            $allow = array_merge($allow, ['GET', 'POST']);
                            goto not_admin_cms_pages_edit;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_edit:

                    // admin_cms_pages_toggle
                    if (preg_match('#^/improve/design/cms\\-pages/(?P<cmsId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_cms_pages_toggle']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::toggleCmsAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:statuscms',  '_legacy_parameters' =>   array (    'id_cms' => 'cmsId',  ),));
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_cms_pages_toggle;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_toggle:

                    // admin_cms_pages_delete
                    if (preg_match('#^/improve/design/cms\\-pages/(?P<cmsId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_cms_pages_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::deleteCmsAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:deletecms',  '_legacy_parameters' =>   array (    'id_cms' => 'cmsId',  ),));
                        if (!in_array($requestMethod, ['DELETE'])) {
                            $allow = array_merge($allow, ['DELETE']);
                            goto not_admin_cms_pages_delete;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_delete:

                    if (0 === strpos($pathinfo, '/improve/design/cms-pages/bulk-')) {
                        // admin_cms_pages_bulk_enable_status
                        if ('/improve/design/cms-pages/bulk-enable-status' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::bulkEnableCmsPageStatusAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitBulkenableSelectioncms',  '_route' => 'admin_cms_pages_bulk_enable_status',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_bulk_enable_status;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_bulk_enable_status:

                        // admin_cms_pages_bulk_disable_status
                        if ('/improve/design/cms-pages/bulk-disable-status' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::bulkDisableCmsPageStatusAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitBulkdisableSelectioncms',  '_route' => 'admin_cms_pages_bulk_disable_status',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_bulk_disable_status;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_bulk_disable_status:

                        // admin_cms_pages_bulk_delete
                        if ('/improve/design/cms-pages/bulk-delete' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::bulkDeleteCmsPageAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitBulkdeletecms',  '_route' => 'admin_cms_pages_bulk_delete',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_bulk_delete;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_bulk_delete:

                    }

                    elseif (0 === strpos($pathinfo, '/improve/design/cms-pages/category')) {
                        // admin_cms_pages_search_cms_category
                        if ('/improve/design/cms-pages/category/search' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\CommonController::searchGridAction',  'gridDefinitionFactoryService' => 'prestashop.core.grid.definition.factory.cms_page_category',  'redirectRoute' => 'admin_cms_pages_index',  'redirectQueryParamsToKeep' =>   array (    0 => 'id_cms_category',  ),  '_legacy_link' => 'AdminCmsContent:submitFiltercms_category',  '_route' => 'admin_cms_pages_search_cms_category',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_search_cms_category;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_search_cms_category:

                        // admin_cms_pages_category_create
                        if ('/improve/design/cms-pages/category/new' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::createCmsCategoryAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:addcms_category',  '_route' => 'admin_cms_pages_category_create',);
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_cms_pages_category_create;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_create:

                        // admin_cms_pages_category_edit
                        if (preg_match('#^/improve/design/cms\\-pages/category/(?P<cmsCategoryId>\\d+)/edit$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_cms_pages_category_edit']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::editCmsCategoryAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:updatecms_category',  '_legacy_parameters' =>   array (    'id_cms_category' => 'cmsCategoryId',  ),));
                            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                                $allow = array_merge($allow, ['GET', 'POST']);
                                goto not_admin_cms_pages_category_edit;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_edit:

                        // admin_cms_pages_category_delete
                        if (preg_match('#^/improve/design/cms\\-pages/category/(?P<cmsCategoryId>\\d+)/delete$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_cms_pages_category_delete']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::deleteCmsCategoryAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:deletecms_category',  '_legacy_parameters' =>   array (    'id_cms_category' => 'cmsCategoryId',  ),));
                            if (!in_array($requestMethod, ['DELETE'])) {
                                $allow = array_merge($allow, ['DELETE']);
                                goto not_admin_cms_pages_category_delete;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_delete:

                        // admin_cms_pages_category_delete_bulk
                        if ('/improve/design/cms-pages/category/delete-bulk' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::deleteBulkCmsCategoryAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitBulkdeletecms_category',  '_route' => 'admin_cms_pages_category_delete_bulk',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_category_delete_bulk;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_delete_bulk:

                        // admin_cms_pages_category_toggle
                        if (preg_match('#^/improve/design/cms\\-pages/category/(?P<cmsCategoryId>\\d+)/toggle\\-status$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_cms_pages_category_toggle']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::toggleCmsCategoryAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:statuscms_category',  '_legacy_parameters' =>   array (    'id_cms_category' => 'cmsCategoryId',  ),));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_category_toggle;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_toggle:

                        // admin_cms_pages_category_bulk_status_enable
                        if ('/improve/design/cms-pages/category/bulk-enable-status' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::bulkCmsPageCategoryStatusEnableAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitBulkenableSelectioncms_category',  '_route' => 'admin_cms_pages_category_bulk_status_enable',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_category_bulk_status_enable;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_bulk_status_enable:

                        // admin_cms_pages_category_bulk_status_disable
                        if ('/improve/design/cms-pages/category/bulk-disable-status' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::bulkCmsPageCategoryStatusDisableAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:submitBulkdisableSelectioncms_category',  '_route' => 'admin_cms_pages_category_bulk_status_disable',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_category_bulk_status_disable;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_bulk_status_disable:

                        // admin_cms_pages_category_update_position
                        if ('/improve/design/cms-pages/category/update-position' === $pathinfo) {
                            $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::updateCmsCategoryPositionAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:updatecms_category',  '_route' => 'admin_cms_pages_category_update_position',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_admin_cms_pages_category_update_position;
                            }

                            return $ret;
                        }
                        not_admin_cms_pages_category_update_position:

                    }

                    // admin_cms_pages_update_position
                    if ('/improve/design/cms-pages/update-position' === $pathinfo) {
                        $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\CmsPageController::updateCmsPositionAction',  '_legacy_controller' => 'AdminCmsContent',  '_legacy_link' => 'AdminCmsContent:updatecms',  '_route' => 'admin_cms_pages_update_position',);
                        if (!in_array($requestMethod, ['POST'])) {
                            $allow = array_merge($allow, ['POST']);
                            goto not_admin_cms_pages_update_position;
                        }

                        return $ret;
                    }
                    not_admin_cms_pages_update_position:

                }

            }

            // admin_payment_methods
            if ('/improve/payment/payment_methods' === $pathinfo) {
                $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Payment\\PaymentMethodsController::indexAction',  '_legacy_controller' => 'AdminPayment',  '_legacy_link' => 'AdminPayment',  '_route' => 'admin_payment_methods',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_payment_methods;
                }

                return $ret;
            }
            not_admin_payment_methods:

            if (0 === strpos($pathinfo, '/improve/payment/preferences')) {
                // admin_payment_preferences
                if ('/improve/payment/preferences' === $pathinfo) {
                    $ret = array (  '_legacy_controller' => 'AdminPaymentPreferences',  '_legacy_link' => 'AdminPaymentPreferences',  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Payment\\PaymentPreferencesController::indexAction',  '_route' => 'admin_payment_preferences',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_payment_preferences;
                    }

                    return $ret;
                }
                not_admin_payment_preferences:

                // admin_payment_preferences_process
                if ('/improve/payment/preferences' === $pathinfo) {
                    $ret = array (  '_legacy_controller' => 'AdminPaymentPreferences',  '_legacy_link' => 'AdminPaymentPreferences:update',  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Payment\\PaymentPreferencesController::processFormAction',  '_route' => 'admin_payment_preferences_process',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_payment_preferences_process;
                    }

                    return $ret;
                }
                not_admin_payment_preferences_process:

            }

            elseif (0 === strpos($pathinfo, '/improve/shipping/preferences')) {
                // admin_shipping_preferences
                if ('/improve/shipping/preferences' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Shipping\\PreferencesController::indexAction',  '_legacy_controller' => 'AdminShipping',  '_legacy_link' => 'AdminShipping',  '_route' => 'admin_shipping_preferences',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_shipping_preferences;
                    }

                    return $ret;
                }
                not_admin_shipping_preferences:

                // admin_shipping_preferences_save
                if ('/improve/shipping/preferences' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\Improve\\Shipping\\PreferencesController::processFormAction',  '_legacy_controller' => 'AdminShipping',  '_legacy_link' => 'AdminShipping:update',  '_route' => 'admin_shipping_preferences_save',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_shipping_preferences_save;
                    }

                    return $ret;
                }
                not_admin_shipping_preferences_save:

            }

        }

        elseif (0 === strpos($pathinfo, '/international')) {
            // _admin_translations_hot_reload_json
            if (preg_match('#^/international/(?P<hash>[^/\\.]++)\\.hot\\-update\\.json$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => '_admin_translations_hot_reload_json']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::hashUpdateJsonAction',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not__admin_translations_hot_reload_json;
                }

                return $ret;
            }
            not__admin_translations_hot_reload_json:

            // _admin_translations_hot_reload_js
            if (preg_match('#^/international/(?P<hash>.+)\\.hot\\-update\\.js$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => '_admin_translations_hot_reload_js']), array (  '_controller' => 'PrestaShopBundle\\Controller\\Admin\\TranslationsController::hashUpdateJsAction',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not__admin_translations_hot_reload_js;
                }

                return $ret;
            }
            not__admin_translations_hot_reload_js:

        }

        elseif (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/s')) {
                if (0 === strpos($pathinfo, '/api/stocks')) {
                    // api_stock_list_products
                    if ('/api/stocks' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'prestashop.core.api.stock.controller:listProductsAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'api_stock_list_products',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_api_stock_list_products;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_products'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_list_products;
                        }

                        return $ret;
                    }
                    not_api_stock_list_products:

                    // api_stock_list_products_export
                    if ('/api/stocks/export' === $pathinfo) {
                        $ret = array (  '_controller' => 'prestashop.core.api.stock.controller:listProductsExportAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'api_stock_list_products_export',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_list_products_export;
                        }

                        return $ret;
                    }
                    not_api_stock_list_products_export:

                    // api_stock_list_product_combinations
                    if (preg_match('#^/api/stocks/(?P<productId>\\d+)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_stock_list_product_combinations']), array (  '_controller' => 'prestashop.core.api.stock.controller:listProductsAction',  '_legacy_controller' => 'AdminStockManagement',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_list_product_combinations;
                        }

                        return $ret;
                    }
                    not_api_stock_list_product_combinations:

                    if (0 === strpos($pathinfo, '/api/stocks/product')) {
                        // api_stock_edit_product
                        if (preg_match('#^/api/stocks/product/(?P<productId>\\d+)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_stock_edit_product']), array (  '_controller' => 'prestashop.core.api.stock.controller:editProductAction',  '_legacy_controller' => 'AdminStockManagement',));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_api_stock_edit_product;
                            }

                            return $ret;
                        }
                        not_api_stock_edit_product:

                        // api_stock_edit_product_combination
                        if (preg_match('#^/api/stocks/product/(?P<productId>\\d+)/combination/(?P<combinationId>\\d+)$#sD', $pathinfo, $matches)) {
                            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_stock_edit_product_combination']), array (  '_controller' => 'prestashop.core.api.stock.controller:editProductAction',  '_legacy_controller' => 'AdminStockManagement',));
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_api_stock_edit_product_combination;
                            }

                            return $ret;
                        }
                        not_api_stock_edit_product_combination:

                        // api_stock_bulk_edit_products
                        if ('/api/stocks/products' === $pathinfo) {
                            $ret = array (  '_controller' => 'prestashop.core.api.stock.controller:bulkEditProductsAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'api_stock_bulk_edit_products',);
                            if (!in_array($requestMethod, ['POST'])) {
                                $allow = array_merge($allow, ['POST']);
                                goto not_api_stock_bulk_edit_products;
                            }

                            return $ret;
                        }
                        not_api_stock_bulk_edit_products:

                    }

                }

                elseif (0 === strpos($pathinfo, '/api/stock-movements')) {
                    // api_stock_list_movements
                    if ('/api/stock-movements' === $trimmedPathinfo) {
                        $ret = array (  '_controller' => 'prestashop.core.api.stock_movement.controller:listMovementsAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'api_stock_list_movements',);
                        if ('/' === substr($pathinfo, -1)) {
                            // no-op
                        } elseif ('GET' !== $canonicalMethod) {
                            goto not_api_stock_list_movements;
                        } else {
                            return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_movements'));
                        }

                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_list_movements;
                        }

                        return $ret;
                    }
                    not_api_stock_list_movements:

                    // api_stock_product_list_movements
                    if (0 === strpos($pathinfo, '/api/stock-movements/product') && preg_match('#^/api/stock\\-movements/product/(?P<productId>\\d+)$#sD', $pathinfo, $matches)) {
                        $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_stock_product_list_movements']), array (  '_controller' => 'prestashop.core.api.stock_movement.controller:listMovementsAction',  '_legacy_controller' => 'AdminStockManagement',));
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_product_list_movements;
                        }

                        return $ret;
                    }
                    not_api_stock_product_list_movements:

                    // api_stock_list_movements_employees
                    if ('/api/stock-movements/employees' === $pathinfo) {
                        $ret = array (  '_controller' => 'prestashop.core.api.stock_movement.controller:listMovementsEmployeesAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'api_stock_list_movements_employees',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_list_movements_employees;
                        }

                        return $ret;
                    }
                    not_api_stock_list_movements_employees:

                    // api_stock_list_movements_types
                    if ('/api/stock-movements/types' === $pathinfo) {
                        $ret = array (  '_controller' => 'prestashop.core.api.stock_movement.controller:listMovementsTypesAction',  '_legacy_controller' => 'AdminStockManagement',  '_route' => 'api_stock_list_movements_types',);
                        if (!in_array($canonicalMethod, ['GET'])) {
                            $allow = array_merge($allow, ['GET']);
                            goto not_api_stock_list_movements_types;
                        }

                        return $ret;
                    }
                    not_api_stock_list_movements_types:

                }

                // api_stock_list_suppliers
                if ('/api/suppliers' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'prestashop.core.api.supplier.controller:listSuppliersAction',  '_route' => 'api_stock_list_suppliers',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_api_stock_list_suppliers;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_suppliers'));
                    }

                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_api_stock_list_suppliers;
                    }

                    return $ret;
                }
                not_api_stock_list_suppliers:

            }

            // api_stock_list_manufacturers
            if ('/api/manufacturers' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'prestashop.core.api.manufacturer.controller:listManufacturersAction',  '_route' => 'api_stock_list_manufacturers',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_api_stock_list_manufacturers;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_manufacturers'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_api_stock_list_manufacturers;
                }

                return $ret;
            }
            not_api_stock_list_manufacturers:

            // api_stock_list_categories
            if ('/api/categories' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'prestashop.core.api.category.controller:listCategoriesAction',  '_route' => 'api_stock_list_categories',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_api_stock_list_categories;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_categories'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_api_stock_list_categories;
                }

                return $ret;
            }
            not_api_stock_list_categories:

            // api_stock_list_attributes
            if ('/api/attributes' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'prestashop.core.api.attribute.controller:listAttributesAction',  '_route' => 'api_stock_list_attributes',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_api_stock_list_attributes;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_attributes'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_api_stock_list_attributes;
                }

                return $ret;
            }
            not_api_stock_list_attributes:

            // api_stock_list_features
            if ('/api/features' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'prestashop.core.api.feature.controller:listFeaturesAction',  '_route' => 'api_stock_list_features',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_api_stock_list_features;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'api_stock_list_features'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_api_stock_list_features;
                }

                return $ret;
            }
            not_api_stock_list_features:

            // api_i18n_translations_list
            if (0 === strpos($pathinfo, '/api/i18n') && preg_match('#^/api/i18n/(?P<page>\\w+)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_i18n_translations_list']), array (  '_controller' => 'prestashop.core.api.i18n.controller:listTranslationAction',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_api_i18n_translations_list;
                }

                return $ret;
            }
            not_api_i18n_translations_list:

            // api_improve_design_positions_update
            if ('/api/improve/design/positions/update' === $pathinfo) {
                $ret = array (  '_controller' => 'prestashop.core.api.improve.design.postions.controller:updateAction',  '_legacy_controller' => 'AdminModulesPositions',  '_route' => 'api_improve_design_positions_update',);
                if (!in_array($requestMethod, ['POST'])) {
                    $allow = array_merge($allow, ['POST']);
                    goto not_api_improve_design_positions_update;
                }

                return $ret;
            }
            not_api_improve_design_positions_update:

            if (0 === strpos($pathinfo, '/api/translations')) {
                // api_translation_domains_tree
                if (0 === strpos($pathinfo, '/api/translations/tree') && preg_match('#^/api/translations/tree/(?P<lang>[^/]++)/(?P<type>[^/]++)(?:/(?P<selected>[^/]++))?$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_translation_domains_tree']), array (  '_controller' => 'prestashop.core.api.translation.controller:listTreeAction',  '_legacy_controller' => 'AdminTranslations',  'selected' => NULL,));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_api_translation_domains_tree;
                    }

                    return $ret;
                }
                not_api_translation_domains_tree:

                // api_translation_domain_catalog
                if (preg_match('#^/api/translations/(?P<locale>[^/]++)/(?P<domain>[^/]++)(?:/(?P<theme>[^/]++))?$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'api_translation_domain_catalog']), array (  '_controller' => 'prestashop.core.api.translation.controller:listDomainTranslationAction',  '_legacy_controller' => 'AdminTranslations',  'theme' => NULL,  'module' => NULL,));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_api_translation_domain_catalog;
                    }

                    return $ret;
                }
                not_api_translation_domain_catalog:

                // api_translation_value_edit
                if ('/api/translations/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'prestashop.core.api.translation.controller:translationEditAction',  '_legacy_controller' => 'AdminTranslations',  '_route' => 'api_translation_value_edit',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_api_translation_value_edit;
                    }

                    return $ret;
                }
                not_api_translation_value_edit:

                // api_translation_value_reset
                if ('/api/translations/reset' === $pathinfo) {
                    $ret = array (  '_controller' => 'prestashop.core.api.translation.controller:translationResetAction',  '_legacy_controller' => 'AdminTranslations',  '_route' => 'api_translation_value_reset',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_api_translation_value_reset;
                    }

                    return $ret;
                }
                not_api_translation_value_reset:

            }

        }

        elseif (0 === strpos($pathinfo, '/modules/addons')) {
            if (0 === strpos($pathinfo, '/modules/addons/modules/catalog')) {
                // admin_mbo_catalog_module
                if ('/modules/addons/modules/catalog' === $pathinfo) {
                    $ret = array (  '_controller' => 'mbo.controller.modules.catalog:indexAction',  '_legacy_controller' => 'AdminPsMboModule',  '_legacy_link' => 'AdminPsMboModule',  '_route' => 'admin_mbo_catalog_module',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_mbo_catalog_module;
                    }

                    return $ret;
                }
                not_admin_mbo_catalog_module:

                // admin_mbo_catalog_module_selection
                if ('/modules/addons/modules/catalog/selection' === $pathinfo) {
                    $ret = array (  '_controller' => 'mbo.controller.modules.selection:indexAction',  '_legacy_controller' => 'AdminPsMboAddons',  '_legacy_link' => 'AdminPsMboAddons',  '_route' => 'admin_mbo_catalog_module_selection',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_mbo_catalog_module_selection;
                    }

                    return $ret;
                }
                not_admin_mbo_catalog_module_selection:

            }

            // admin_mbo_recommended_modules
            if ('/modules/addons/modules/recommended' === $pathinfo) {
                $ret = array (  '_controller' => 'mbo.controller.modules.recommended:indexAction',  '_legacy_controller' => 'AdminPsMboRecommended',  '_legacy_link' => 'AdminPsMboRecommended',  '_route' => 'admin_mbo_recommended_modules',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_mbo_recommended_modules;
                }

                return $ret;
            }
            not_admin_mbo_recommended_modules:

            // admin_mbo_catalog_theme
            if ('/modules/addons/themes/catalog' === $pathinfo) {
                $ret = array (  '_controller' => 'mbo.controller.themes.catalog:indexAction',  '_legacy_controller' => 'AdminPsMboTheme',  '_legacy_link' => 'AdminPsMboTheme',  '_route' => 'admin_mbo_catalog_theme',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_mbo_catalog_theme;
                }

                return $ret;
            }
            not_admin_mbo_catalog_theme:

        }

        elseif (0 === strpos($pathinfo, '/modules/link-widget')) {
            // admin_link_block_list
            if ('/modules/link-widget/list' === $pathinfo) {
                $ret = array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::listAction',  '_legacy_controller' => 'AdminLinkWidget',  '_legacy_link' => 'AdminLinkWidget',  '_route' => 'admin_link_block_list',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_admin_link_block_list;
                }

                return $ret;
            }
            not_admin_link_block_list:

            if (0 === strpos($pathinfo, '/modules/link-widget/create')) {
                // admin_link_block_create
                if ('/modules/link-widget/create' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::createAction',  '_legacy_controller' => 'AdminLinkWidget',  '_route' => 'admin_link_block_create',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_link_block_create;
                    }

                    return $ret;
                }
                not_admin_link_block_create:

                // admin_link_block_create_process
                if ('/modules/link-widget/create' === $pathinfo) {
                    $ret = array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::createProcessAction',  '_legacy_controller' => 'AdminLinkWidget',  '_route' => 'admin_link_block_create_process',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_link_block_create_process;
                    }

                    return $ret;
                }
                not_admin_link_block_create_process:

            }

            elseif (0 === strpos($pathinfo, '/modules/link-widget/edit')) {
                // admin_link_block_edit
                if (preg_match('#^/modules/link\\-widget/edit/(?P<linkBlockId>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_link_block_edit']), array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::editAction',  '_legacy_controller' => 'AdminLinkWidget',));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_admin_link_block_edit;
                    }

                    return $ret;
                }
                not_admin_link_block_edit:

                // admin_link_block_edit_process
                if (preg_match('#^/modules/link\\-widget/edit/(?P<linkBlockId>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_link_block_edit_process']), array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::editProcessAction',  '_legacy_controller' => 'AdminLinkWidget',));
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_admin_link_block_edit_process;
                    }

                    return $ret;
                }
                not_admin_link_block_edit_process:

            }

            // admin_link_block_delete
            if (0 === strpos($pathinfo, '/modules/link-widget/delete') && preg_match('#^/modules/link\\-widget/delete/(?P<linkBlockId>\\d+)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_link_block_delete']), array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::deleteAction',  '_legacy_controller' => 'AdminLinkWidget',));
                if (!in_array($requestMethod, ['POST'])) {
                    $allow = array_merge($allow, ['POST']);
                    goto not_admin_link_block_delete;
                }

                return $ret;
            }
            not_admin_link_block_delete:

            // admin_link_block_update_positions
            if (0 === strpos($pathinfo, '/modules/link-widget/update-positions') && preg_match('#^/modules/link\\-widget/update\\-positions/(?P<hookId>\\d+)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_link_block_update_positions']), array (  '_controller' => 'PrestaShop\\Module\\LinkList\\Controller\\Admin\\Improve\\Design\\LinkBlockController::updatePositionsAction',  '_legacy_controller' => 'AdminLinkWidget',));
                if (!in_array($requestMethod, ['POST'])) {
                    $allow = array_merge($allow, ['POST']);
                    goto not_admin_link_block_update_positions;
                }

                return $ret;
            }
            not_admin_link_block_update_positions:

        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
