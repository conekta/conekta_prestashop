<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:43:22
  from '/var/www/html/backoffice/themes/default/template/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc672aa3f6175_05630303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c1aa6dfe16c9b238cd567da779eafd8c07521ae' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/header.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:search_form.tpl' => 1,
    'file:nav.tpl' => 1,
  ),
),false)) {
function content_5fc672aa3f6175_05630303 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!--[if lt IE 7]> <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]> <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js ie9"> <![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
favicon.ico" />
  <link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
app_icon.png" />

  <meta name="robots" content="NOFOLLOW, NOINDEX">
  <title><?php if ($_smarty_tpl->tpl_vars['meta_title']->value != '') {
echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
 • <?php }
echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</title>
  <?php if (!isset($_smarty_tpl->tpl_vars['display_header_javascript']->value) || $_smarty_tpl->tpl_vars['display_header_javascript']->value) {?>
  <?php echo '<script'; ?>
 type="text/javascript">
    var help_class_name = '<?php echo addcslashes($_smarty_tpl->tpl_vars['controller_name']->value,'\'');?>
';
    var iso_user = '<?php echo addcslashes($_smarty_tpl->tpl_vars['iso_user']->value,'\'');?>
';
    var lang_is_rtl = '<?php echo intval($_smarty_tpl->tpl_vars['lang_is_rtl']->value);?>
';
    var full_language_code = '<?php echo addcslashes($_smarty_tpl->tpl_vars['full_language_code']->value,'\'');?>
';
    var full_cldr_language_code = '<?php echo addcslashes($_smarty_tpl->tpl_vars['full_cldr_language_code']->value,'\'');?>
';
    var country_iso_code = '<?php echo addcslashes($_smarty_tpl->tpl_vars['country_iso_code']->value,'\'');?>
';
    var _PS_VERSION_ = '<?php echo addcslashes(@constant('_PS_VERSION_'),'\'');?>
';
    var roundMode = <?php echo intval($_smarty_tpl->tpl_vars['round_mode']->value);?>
;
<?php if (isset($_smarty_tpl->tpl_vars['shop_context']->value)) {?>
  <?php if ($_smarty_tpl->tpl_vars['shop_context']->value == Shop::CONTEXT_ALL) {?>
    var youEditFieldFor = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This field will be modified for all your shops.','js'=>1,'d'=>'Admin.Notifications.Info'),$_smarty_tpl ) );?>
';
  <?php } elseif ($_smarty_tpl->tpl_vars['shop_context']->value == Shop::CONTEXT_GROUP) {?>
    var youEditFieldFor = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This field will be modified for all shops in this shop group:','js'=>1,'d'=>'Admin.Notifications.Info'),$_smarty_tpl ) );?>
 <b><?php echo addcslashes($_smarty_tpl->tpl_vars['shop_name']->value,'\'');?>
</b>';
  <?php } else { ?>
    var youEditFieldFor = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This field will be modified for this shop:','js'=>1,'d'=>'Admin.Notifications.Info'),$_smarty_tpl ) );?>
 <b><?php echo addcslashes($_smarty_tpl->tpl_vars['shop_name']->value,'\'');?>
</b>';
  <?php }
} else { ?>
    var youEditFieldFor = '';
<?php }?>
    var new_order_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A new order has been placed on your shop.','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
';
    var order_number_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order number:','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
 ';
    var total_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','js'=>1,'d'=>'Admin.Global'),$_smarty_tpl ) );?>
 ';
    var from_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From:','js'=>1,'d'=>'Admin.Global'),$_smarty_tpl ) );?>
 ';
    var see_order_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View this order','js'=>1,'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
';
    var new_customer_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A new customer registered on your shop.','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
';
    var customer_name_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'registered','js'=>1,'d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
 ';
    var new_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A new message was posted on your shop.','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
';
    var see_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read this message','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
';
    var token = '<?php echo addslashes($_smarty_tpl->tpl_vars['token']->value);?>
';
    var token_admin_orders = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminOrders'),$_smarty_tpl ) );?>
';
    var token_admin_customers = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminCustomers'),$_smarty_tpl ) );?>
';
    var token_admin_customer_threads = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminCustomerThreads'),$_smarty_tpl ) );?>
';
    var currentIndex = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'javascript','UTF-8' )),'quotes' ));?>
';
    var employee_token = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminEmployees'),$_smarty_tpl ) );?>
';
    var choose_language_translate = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose language:','js'=>1,'d'=>'Admin.Actions'),$_smarty_tpl ) );?>
';
    var default_language = '<?php echo intval($_smarty_tpl->tpl_vars['default_language']->value);?>
';
    var admin_modules_link = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminModulesCatalog",true,array('route'=>"admin_module_catalog_post")));?>
';
    var admin_notification_get_link = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminCommon"));?>
';
    var admin_notification_push_link = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminCommon",true,array('route'=>'admin_common_notifications_ack')));?>
';
    var tab_modules_list = '<?php if (isset($_smarty_tpl->tpl_vars['tab_modules_list']->value) && $_smarty_tpl->tpl_vars['tab_modules_list']->value) {
echo addslashes($_smarty_tpl->tpl_vars['tab_modules_list']->value);
}?>';
    var update_success_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Successful update.','js'=>1,'d'=>'Admin.Notifications.Success'),$_smarty_tpl ) );?>
';
    var errorLogin = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.','js'=>1,'d'=>'Admin.Notifications.Warning'),$_smarty_tpl ) );?>
';
    var search_product_msg = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search for a product','js'=>1,'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
';
  <?php echo '</script'; ?>
>
<?php }
if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['css_files']->value, 'media', false, 'css_uri');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->value => $_smarty_tpl->tpl_vars['media']->value) {
?>
  <link href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['css_uri']->value,'html','UTF-8' ));?>
" rel="stylesheet" type="text/css"/>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
  <?php if ((isset($_smarty_tpl->tpl_vars['js_def']->value) && count($_smarty_tpl->tpl_vars['js_def']->value) || isset($_smarty_tpl->tpl_vars['js_files']->value) && count($_smarty_tpl->tpl_vars['js_files']->value))) {?>
    <?php $_smarty_tpl->_subTemplateRender((@constant('_PS_ALL_THEMES_DIR_')).("javascript.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value;?>

  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['brightness']->value)) {?>
  <!--
    // @todo: multishop color
    <style type="text/css">
      div#header_infos, div#header_infos a#header_shopname, div#header_infos a#header_logout, div#header_infos a#header_foaccess {color:<?php echo $_smarty_tpl->tpl_vars['brightness']->value;?>
}
    </style>
  -->
  <?php }?>
</head>

<?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>
  <body class="lang-<?php echo $_smarty_tpl->tpl_vars['iso_user']->value;
if ($_smarty_tpl->tpl_vars['lang_is_rtl']->value) {?> lang-rtl<?php }?> ps_back-office<?php if ($_smarty_tpl->tpl_vars['employee']->value->bo_menu) {?> page-sidebar<?php if ($_smarty_tpl->tpl_vars['collapse_menu']->value) {?> page-sidebar-closed<?php }
} else { ?> page-topbar<?php }?> <?php echo strtolower(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['controller'] )));?>
">
    <header id="header" class="bootstrap">
    <nav id="header_infos" role="navigation">
      <i class="material-icons js-mobile-menu">menu</i>

            <a id="header_logo" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_tab_link']->value,'html','UTF-8' ));?>
"></a>
      <span id="shop_version"><?php echo $_smarty_tpl->tpl_vars['ps_version']->value;?>
</span>

            <div id="header_quick" class="component">
        <div class="dropdown">
          <button
            id="quick_select"
            class="btn btn-link dropdown-toggle"
            data-toggle="dropdown"
          ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quick Access','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
 <i class="material-icons">arrow_drop_down</i></button>
          <ul class="dropdown-menu">
            <?php if (!empty($_smarty_tpl->tpl_vars['quick_access']->value)) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quick_access']->value, 'quick');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quick']->value) {
?>
                <li <?php ob_start();
echo $_smarty_tpl->tpl_vars['quick']->value['link'];
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['link']->value->matchQuickLink($_prefixVariable1)) {
$_smarty_tpl->_assignInScope('matchQuickLink', $_smarty_tpl->tpl_vars['quick']->value['id_quick_access']);?>class="active"<?php }?>>
                  <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['quick']->value['link'],'html','UTF-8' ));?>
" <?php if ($_smarty_tpl->tpl_vars['quick']->value['new_window']) {?>target="_blank"<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['quick']->value['name'];?>

                  </a>
                </li>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
            <li class="divider"></li>
            <?php if (isset($_smarty_tpl->tpl_vars['matchQuickLink']->value)) {?>
              <li>
                <a href="javascript:void(0);" class="ajax-quick-link" data-method="remove"
                  data-quicklink-id="<?php echo $_smarty_tpl->tpl_vars['matchQuickLink']->value;?>
">
                  <i class="material-icons">remove_circle</i>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remove from QuickAccess','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>

                </a>
              </li>
            <?php } else { ?>
              <li>
                <a href="javascript:void(0);" class="ajax-quick-link" data-method="add">
                  <i class="material-icons">add_circle</i>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add current page to QuickAccess','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>

                </a>
              </li>
            <?php }?>
            <li>
              <a href="<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminQuickAccesses"));?>
">
                <i class="material-icons">settings</i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Manage quick accesses','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>

              </a>
            </li>
          </ul>
        </div>
      </div>
      <?php $_smarty_tpl->_assignInScope('quick_access_current_link_name', explode(" - ",$_smarty_tpl->tpl_vars['quick_access_current_link_name']->value));?>
      <?php echo '<script'; ?>
>
        $(function() {
          $('.ajax-quick-link').on('click', function(e){
            e.preventDefault();

            var method = $(this).data('method');

            if(method == 'add')
              var name = prompt('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please name this shortcut:','js'=>1,'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['quick_access_current_link_name']->value[0],32 ));?>
');

            if(method == 'add' && name || method == 'remove')
            {
              $.ajax({
                type: 'POST',
                headers: { "cache-control": "no-cache" },
                async: false,
                url: "<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminQuickAccesses',true,array(),array('action'=>'GetUrl','rand'=>(rand(1,200)),'ajax'=>1));?>
" + "&method=" + method + ( $(this).data('quicklink-id') ? "&id_quick_access=" + $(this).data('quicklink-id') : ""),
                data: {
                  "url": "<?php echo $_smarty_tpl->tpl_vars['link']->value->getQuickLink(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_SERVER['REQUEST_URI'],'javascript' )));?>
",
                  "name": name,
                  "icon": "<?php echo $_smarty_tpl->tpl_vars['quick_access_current_link_icon']->value;?>
"
                },
                dataType: "json",
                success: function(data) {
                  var quicklink_list ='';
                  $.each(data, function(index,value){
                    if (typeof data[index]['name'] !== 'undefined')
                      quicklink_list += '<li><a href="' + data[index]['link'] + '">' + data[index]['name'] + '</a></li>';
                  });

                  if (typeof data['has_errors'] !== 'undefined' && data['has_errors'])
                    $.each(data, function(index, value)
                      {
                        if (typeof data[index] == 'string')
                          $.growl.error({ title: "", message: data[index]});
                    });
                  else if (quicklink_list)
                  {
                    $('#header_quick ul.dropdown-menu .divider').prevAll().remove();
                    $('#header_quick ul.dropdown-menu').prepend(quicklink_list);
                    $(e.target).remove();
                    showSuccessMessage(update_success_msg);
                  }
                }
              });
            }
          });
        });
      <?php echo '</script'; ?>
>

            <?php $_smarty_tpl->_subTemplateRender("file:search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('show_clear_btn'=>1), 0, false);
?>

      <?php if (isset($_smarty_tpl->tpl_vars['debug_mode']->value) && $_smarty_tpl->tpl_vars['debug_mode']->value == true) {?>
      <div class="component hide-mobile-sm">
          <a class="shop-state label-tooltip" id="debug-mode"
             data-toggle="tooltip"
             data-placement="bottom"
             data-html="true"
             title="<p class='text-left'><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your shop is in debug mode.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
</strong></p><p class='text-left'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All the PHP errors and messages are displayed. When you no longer need it, [1]turn off[/1] this mode.','html'=>true,'sprintf'=>array('[1]'=>'<strong>','[/1]'=>'</strong>'),'d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
</p>"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPerformance'),'html','UTF-8' ));?>
"
          >
            <i class="material-icons">bug_report</i>
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Debug mode','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</span>
          </a>
      </div>
      <?php }?>

      <?php if (isset($_smarty_tpl->tpl_vars['maintenance_mode']->value) && $_smarty_tpl->tpl_vars['maintenance_mode']->value == true) {?>
      <div class="component hide-mobile-sm">
        <a class="shop-state label-tooltip" id="maintenance-mode"
           href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminMaintenance'),'html','UTF-8' ));?>
"
           data-toggle="tooltip"
           data-placement="bottom"
           data-html="true"
           title="<p class='text-left text-nowrap'><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your shop is in maintenance.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
</strong></p><p class='text-left'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your visitors and customers cannot access your shop while in maintenance mode.%s To manage the maintenance settings, go to Shop Parameters > Maintenance tab.','sprintf'=>array('<br />'),'d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
</p>"
        >
          <i class="material-icons">build</i>
          <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Maintenance mode','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</span>
        </a>
      </div>
      <?php }?>

            <?php ob_start();
echo $_smarty_tpl->tpl_vars['base_url']->value;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?>
        <ul id="header-list" class="header-list">
          <li class="shopname" data-mobile="true" data-from="header-list" data-target="menu">
            <?php if (isset($_smarty_tpl->tpl_vars['is_multishop']->value) && $_smarty_tpl->tpl_vars['is_multishop']->value && $_smarty_tpl->tpl_vars['shop_list']->value && (isset($_smarty_tpl->tpl_vars['multishop_context']->value) && $_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_GROUP || $_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_SHOP || $_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_ALL)) {?>
              <ul id="header_shop" class="shop-state">
                <li class="dropdown">
                  <i class="material-icons">visibility</i>
                  <?php echo $_smarty_tpl->tpl_vars['shop_list']->value;?>

                </li>
              </ul>
            <?php } else { ?>
              <a id="header_shopname" class="shop-state" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['base_url']->value,'html','UTF-8' ));?>
" target="_blank">
                <i class="material-icons">visibility</i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View my shop','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>

              </a>
            <?php }?>
          </li>
        </ul>
      <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value || $_smarty_tpl->tpl_vars['show_new_customers']->value || $_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
        <ul class="header-list component">
          <li id="notification" class="dropdown">
            <a href="javascript:void(0);" class="notification dropdown-toggle notifs">
              <i class="material-icons">notifications_none</i>
              <span id="total_notif_number_wrapper" class="notifs_badge hide">
                <span id="total_notif_value">0</span>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right notifs_dropdown">
              <div class="notifications">
                <ul class="nav nav-tabs" role="tablist">
                  <?php $_smarty_tpl->_assignInScope('active', "active");?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value) {?>
                    <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                      <a class="nav-link" data-toggle="tab" data-type="order" href="#orders-notifications" role="tab" id="orders-tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Latest orders','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
<span id="orders_notif_value"></span></a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_customers']->value) {?>
                    <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                      <a class="nav-link" data-toggle="tab" data-type="customer" href="#customers-notifications" role="tab" id="customers-tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New customers','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
<span id="customers_notif_value"></span></a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
                    <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                      <a class="nav-link" data-toggle="tab" data-type="customer_message" href="#messages-notifications" role="tab" id="messages-tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Messages','d'=>'Admin.Global'),$_smarty_tpl ) );?>
<span id="customer_messages_notif_value"></span></a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <?php $_smarty_tpl->_assignInScope('active', "active");?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value) {?>
                    <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="orders-notifications" role="tabpanel">
                      <p class="no-notification">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No new order for now :(','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['no_order_tip']->value;?>

                      </p>
                      <div class="notification-elements"></div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_customers']->value) {?>
                    <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="customers-notifications" role="tabpanel">
                      <p class="no-notification">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No new customer for now :(','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['no_customer_tip']->value;?>

                      </p>
                      <div class="notification-elements"></div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
                    <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="messages-notifications" role="tabpanel">
                      <p class="no-notification">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No new message for now.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl ) );?>
<br>
                        <?php echo $_smarty_tpl->tpl_vars['no_customer_message_tip']->value;?>

                      </p>
                      <div class="notification-elements"></div>
                    </div>
                    <?php $_smarty_tpl->_assignInScope('active', '');?>
                  <?php }?>
                </div>
              </div>
            </div>
          </li>
        </ul>
      <?php }?>

            <ul id="header_employee_box" class="component">
        <li id="employee_infos" class="dropdown hidden-xs">
          <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees',true,array(),array('id_employee'=>intval($_smarty_tpl->tpl_vars['employee']->value->id),'updateemployee'=>1)),'html','UTF-8' ));?>
"
             class="employee_name dropdown-toggle"
             data-toggle="dropdown"
          >
            <i class="material-icons">account_circle</i>
          </a>
          <ul id="employee_links" class="dropdown-menu dropdown-menu-right">
            <li class="employee-wrapper-avatar" data-mobile="true" data-from="employee_links" data-target="menu">
              <span class="employee_avatar">
                <img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee']->value->getImage();?>
" width="60" height="60" />
              </span>
            </li>
            <li class="text-left text-nowrap username" data-mobile="true" data-from="employee_links" data-target="menu"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Welcome back %name%','sprintf'=>array('%name%'=>$_smarty_tpl->tpl_vars['employee']->value->firstname),'d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</li>
            <li class="employee-wrapper-profile"><a class="admin-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees',true,array(),array('id_employee'=>intval($_smarty_tpl->tpl_vars['employee']->value->id),'updateemployee'=>1)),'html','UTF-8' ));?>
"><i class="material-icons">settings</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your profile','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'https://www.prestashop.com/en/resources/documentations?utm_source=back-office&utm_medium=profile&utm_campaign=resources-en&utm_content=download17
','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
" target="_blank"><i class="material-icons">book</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Resources','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
            <li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'https://www.prestashop.com/en/training?utm_source=back-office&utm_medium=profile&utm_campaign=training-en&utm_content=download17','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
" target="_blank"><i class="material-icons">school</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Training','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
            <li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'https://www.prestashop.com/en/experts?utm_source=back-office&utm_medium=profile&utm_campaign=expert-en&utm_content=download17','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
" target="_blank"><i class="material-icons">person_pin_circle</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Find an Expert','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
            <li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'https://addons.prestashop.com?utm_source=back-office&utm_medium=profile&utm_campaign=addons-en&utm_content=download17','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
" target="_blank"><i class="material-icons">extension</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PrestaShop Marketplace','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
            <li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'https://www.prestashop.com/en/contact?utm_source=back-office&utm_medium=profile&utm_campaign=help-center-en&utm_content=download17','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
" target="_blank"><i class="material-icons">help</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Help Center','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>
              <li><a href="https://www.prestashop.com/cloud/" class="_blank"><i class="material-icons">settings_applications</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My PrestaShop account','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
            <?php }?>
            <li class="divider"></li>
            <li class="signout text-center" data-mobile="true" data-from="employee_links" data-target="menu" data-after="true"><a id="header_logout" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['logout_link']->value,'html','UTF-8' ));?>
"><i class="material-icons visible-xs">power_settings_new</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign out','d'=>'Admin.Navigation.Header'),$_smarty_tpl ) );?>
</a></li>
          </ul>
        </li>
      </ul>

            <span id="ajax_running" class="hidden-xs">
        <i class="icon-refresh icon-spin icon-fw"></i>
      </span>

    <?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeTop']->value)) {
echo $_smarty_tpl->tpl_vars['displayBackOfficeTop']->value;
}?>
    </nav>  </header>
    <?php $_smarty_tpl->_subTemplateRender('file:nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div id="main">
    <div id="content" class="<?php if (!$_smarty_tpl->tpl_vars['bootstrap']->value) {?>nobootstrap<?php } else { ?>bootstrap<?php }
if (!isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {?> no-header-toolbar<?php }?> <?php if ($_smarty_tpl->tpl_vars['current_tab_level']->value == 3) {?>with-tabs<?php }?>">
      <?php if (isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {
echo $_smarty_tpl->tpl_vars['page_header_toolbar']->value;
}?>
      <?php if (isset($_smarty_tpl->tpl_vars['modal_module_list']->value)) {
echo $_smarty_tpl->tpl_vars['modal_module_list']->value;
}?>

<?php if ($_smarty_tpl->tpl_vars['install_dir_exists']->value) {?>
      <div class="alert alert-warning">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For security reasons, you must also delete the /install folder.','d'=>'Admin.Login.Notification'),$_smarty_tpl ) );?>

      </div>
<?php }?>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAdminAfterHeader'),$_smarty_tpl ) );?>




<?php } else { ?>
  <body<?php if (isset($_smarty_tpl->tpl_vars['lite_display']->value) && $_smarty_tpl->tpl_vars['lite_display']->value) {?> class="ps_back-office display-modal"<?php }?>>
    <div id="main">
      <div id="content" class="<?php if (!$_smarty_tpl->tpl_vars['bootstrap']->value) {?>nobootstrap<?php } else { ?>bootstrap<?php }?>">
<?php }
}
}
