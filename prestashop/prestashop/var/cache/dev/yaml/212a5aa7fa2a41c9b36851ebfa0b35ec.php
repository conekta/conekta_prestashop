<?php return array (
  'imports' => 
  array (
    0 => 
    array (
      'resource' => 'set_parameters.php',
    ),
    1 => 
    array (
      'resource' => 'security.yml',
    ),
    2 => 
    array (
      'resource' => 'services.yml',
    ),
    3 => 
    array (
      'resource' => 'addons/*.yml',
    ),
  ),
  'parameters' => 
  array (
    'env(PS_THEME_NAME)' => 'classic',
    'AdapterSecurityAdminClass' => 'PrestaShop\\PrestaShop\\Adapter\\Security\\Admin',
    'translator.class' => 'PrestaShopBundle\\Translation\\Translator',
    'translator.data_collector' => 'PrestaShopBundle\\Translation\\DataCollectorTranslator',
    'admin_page' => '%kernel.root_dir%/../src/PrestaShopBundle/Resources/views/Admin',
    'env(PS_LOG_OUTPUT)' => '%kernel.logs_dir%/%kernel.environment%.log',
    'mail_themes_uri' => '/mails/themes',
    'mail_themes_dir' => '%kernel.project_dir%%mail_themes_uri%',
  ),
  'framework' => 
  array (
    'assets' => 
    array (
      'version' => NULL,
    ),
    'secret' => '%secret%',
    'translator' => 
    array (
      'fallbacks' => 
      array (
        0 => 'default',
      ),
    ),
    'router' => 
    array (
      'resource' => '%kernel.root_dir%/config/routing.yml',
      'strict_requirements' => NULL,
    ),
    'form' => NULL,
    'csrf_protection' => NULL,
    'validation' => 
    array (
      'enable_annotations' => true,
    ),
    'serializer' => 
    array (
      'enable_annotations' => true,
    ),
    'templating' => 
    array (
      'engines' => 
      array (
        0 => 'twig',
      ),
    ),
    'default_locale' => '%locale%',
    'trusted_hosts' => NULL,
    'session' => 
    array (
      'handler_id' => NULL,
    ),
    'fragments' => NULL,
    'http_method_override' => true,
  ),
  'monolog' => 
  array (
    'handlers' => 
    array (
      'main' => 
      array (
        'type' => 'stream',
        'path' => '%env(PS_LOG_OUTPUT)%',
        'level' => 'notice',
      ),
      'legacy' => 
      array (
        'type' => 'service',
        'id' => 'prestashop.handler.log',
        'level' => 'warning',
        'channels' => 
        array (
          0 => 'app',
        ),
      ),
    ),
  ),
  'twig' => 
  array (
    'autoescape' => 'name',
    'debug' => '%kernel.debug%',
    'strict_variables' => '%kernel.debug%',
    'form_themes' => 
    array (
      0 => 'PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_4_horizontal_layout.html.twig',
    ),
    'paths' => 
    array (
      '%admin_page%/Product' => 'Product',
      '%admin_page%/TwigTemplateForm' => 'Twig',
      '%admin_page%/Configure/AdvancedParameters' => 'AdvancedParameters',
      '%admin_page%/Configure/ShopParameters' => 'ShopParameters',
      '%kernel.root_dir%/../modules' => 'Modules',
      '%mail_themes_dir%' => 'MailThemes',
    ),
    'globals' => 
    array (
      'webpack_server' => false,
    ),
  ),
  'doctrine' => 
  array (
    'dbal' => 
    array (
      'default_connection' => 'default',
      'connections' => 
      array (
        'default' => 
        array (
          'driver' => 'pdo_mysql',
          'host' => '%database_host%',
          'port' => '%database_port%',
          'dbname' => '%database_name%',
          'user' => '%database_user%',
          'password' => '%database_password%',
          'server_version' => 5.0999999999999996,
          'charset' => 'UTF8',
          'mapping_types' => 
          array (
            'enum' => 'string',
          ),
          'options' => 
          array (
            1002 => 'SET sql_mode=(SELECT REPLACE(@@sql_mode,\'ONLY_FULL_GROUP_BY\',\'\'))',
          ),
        ),
      ),
    ),
    'orm' => 
    array (
      'auto_generate_proxy_classes' => '%kernel.debug%',
      'naming_strategy' => 'prestashop.database.naming_strategy',
      'auto_mapping' => true,
      'dql' => 
      array (
        'string_functions' => 
        array (
          'regexp' => 'DoctrineExtensions\\Query\\Mysql\\Regexp',
        ),
      ),
    ),
  ),
  'swiftmailer' => 
  array (
    'transport' => '%mailer_transport%',
    'host' => '%mailer_host%',
    'username' => '%mailer_user%',
    'password' => '%mailer_password%',
    'spool' => 
    array (
      'type' => 'memory',
    ),
  ),
  'csa_guzzle' => 
  array (
    'profiler' => 
    array (
      'enabled' => '%kernel.debug%',
    ),
    'cache' => 
    array (
      'enabled' => true,
      'adapter' => 'guzzle.cache',
    ),
    'clients' => 
    array (
      'addons_api' => 
      array (
        'config' => 
        array (
          'base_url' => 'https://api-addons.prestashop.com',
          'defaults' => 
          array (
            'timeout' => '5.0',
          ),
          'headers' => 
          array (
            'Accept' => 'application/json',
          ),
        ),
      ),
    ),
  ),
  'prestashop' => 
  array (
    'addons' => 
    array (
      'prestatrust' => 
      array (
        'enabled' => true,
      ),
      'api_client' => 
      array (
        'ttl' => 7200,
      ),
    ),
  ),
);
