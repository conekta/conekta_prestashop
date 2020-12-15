<?php
/* Smarty version 3.1.33, created on 2020-12-01 18:50:21
  from '/var/www/html/backoffice/themes/new-theme/template/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc6825d5cf4e0_05047341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '247bc163ad22f36a039f0592394c5792a9ac120f' => 
    array (
      0 => '/var/www/html/backoffice/themes/new-theme/template/layout.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/layout/quick_access.tpl' => 1,
    'file:components/layout/search_form.tpl' => 1,
    'file:components/layout/shop_list.tpl' => 1,
    'file:components/layout/notifications_center.tpl' => 1,
    'file:components/layout/employee_dropdown.tpl' => 1,
    'file:components/layout/nav_bar.tpl' => 1,
    'file:components/layout/error_messages.tpl' => 1,
    'file:components/layout/information_messages.tpl' => 1,
    'file:components/layout/confirmation_messages.tpl' => 1,
    'file:components/layout/warning_messages.tpl' => 1,
    'file:components/layout/non-responsive.tpl' => 1,
    'file:footer.tpl' => 1,
    'file:error.tpl' => 1,
  ),
),false)) {
function content_5fc6825d5cf4e0_05047341 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
<head>
  <?php echo $_smarty_tpl->tpl_vars['header']->value;?>

</head>

<body class="lang-<?php echo $_smarty_tpl->tpl_vars['iso_user']->value;
if ($_smarty_tpl->tpl_vars['lang_is_rtl']->value) {?> lang-rtl<?php }?> <?php echo strtolower(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['controller'] )));
if ($_smarty_tpl->tpl_vars['collapse_menu']->value) {?> page-sidebar-closed<?php }?>">

<?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>
  <header id="header">

    <nav id="header_infos" class="main-header">
      <button class="btn btn-primary-reverse onclick btn-lg unbind ajax-spinner"></button>

            <i class="material-icons js-mobile-menu">menu</i>
      <a id="header_logo" class="logo float-left" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_tab_link']->value,'html','UTF-8' ));?>
"></a>
      <span id="shop_version"><?php echo $_smarty_tpl->tpl_vars['ps_version']->value;?>
</span>

      <div class="component" id="quick-access-container">
        <?php $_smarty_tpl->_subTemplateRender("file:components/layout/quick_access.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="component" id="header-search-container">
        <?php $_smarty_tpl->_subTemplateRender("file:components/layout/search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <?php if (isset($_smarty_tpl->tpl_vars['debug_mode']->value) && $_smarty_tpl->tpl_vars['debug_mode']->value == true) {?>
        <div class="component hide-mobile-sm" id="header-debug-mode-container">
          <a class="link shop-state"
             id="debug-mode"
             data-toggle="pstooltip"
             data-placement="bottom"
             data-html="true"
             title="<p class='text-left'><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your shop is in debug mode.'),$_smarty_tpl ) );?>
</strong></p><p class='text-left'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All the PHP errors and messages are displayed. When you no longer need it, [1]turn off[/1] this mode.','html'=>true,'sprintf'=>array('[1]'=>'<strong>','[/1]'=>'</strong>')),$_smarty_tpl ) );?>
</p>"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPerformance'),'html','UTF-8' ));?>
"
          >
            <i class="material-icons">bug_report</i>
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Debug mode'),$_smarty_tpl ) );?>
</span>
          </a>
        </div>
      <?php }?>

      <?php if (isset($_smarty_tpl->tpl_vars['maintenance_mode']->value) && $_smarty_tpl->tpl_vars['maintenance_mode']->value == true) {?>
        <div class="component hide-mobile-sm" id="header-maintenance-mode-container">
          <a class="link shop-state"
             id="maintenance-mode"
             data-toggle="pstooltip"
             data-placement="bottom"
             data-html="true"
             title="<p class='text-left'><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your shop is in maintenance.'),$_smarty_tpl ) );?>
</strong></p><p class='text-left'><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your visitors and customers cannot access your shop while in maintenance mode.%s To manage the maintenance settings, go to Shop Parameters > Maintenance tab.','sprintf'=>array('<br />')),$_smarty_tpl ) );?>
</p>" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminMaintenance'),'html','UTF-8' ));?>
"
          >
            <i class="material-icons">build</i>
            <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Maintenance mode'),$_smarty_tpl ) );?>
</span>
          </a>
        </div>
      <?php }?>

      <div class="component" id="header-shop-list-container">
        <?php $_smarty_tpl->_subTemplateRender("file:components/layout/shop_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value || $_smarty_tpl->tpl_vars['show_new_customers']->value || $_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
        <div class="component header-right-component" id="header-notifications-container">
          <?php $_smarty_tpl->_subTemplateRender("file:components/layout/notifications_center.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
      <?php }?>

      <div class="component" id="header-employee-container">
        <?php $_smarty_tpl->_subTemplateRender("file:components/layout/employee_dropdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
    </nav>

    <?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeTop']->value)) {
echo $_smarty_tpl->tpl_vars['displayBackOfficeTop']->value;
}?>
  </header>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>
  <?php $_smarty_tpl->_subTemplateRender('file:components/layout/nav_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<div id="main-div">
    <?php if ($_smarty_tpl->tpl_vars['install_dir_exists']->value) {?>
      <div class="alert alert-warning">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For security reasons, you must also delete the /install folder.'),$_smarty_tpl ) );?>

      </div>
    <?php } else { ?>
      <?php if (isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {
echo $_smarty_tpl->tpl_vars['page_header_toolbar']->value;
}?>
      <?php if (isset($_smarty_tpl->tpl_vars['modal_module_list']->value)) {
echo $_smarty_tpl->tpl_vars['modal_module_list']->value;
}?>

      <div class="<?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>content-div<?php }?> <?php if (!isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {?>-notoolbar<?php }?> <?php if ($_smarty_tpl->tpl_vars['current_tab_level']->value == 3) {?>with-tabs<?php }?>">

        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAdminAfterHeader'),$_smarty_tpl ) );?>


        <?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>
          <?php $_smarty_tpl->_subTemplateRender('file:components/layout/error_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php $_smarty_tpl->_subTemplateRender('file:components/layout/information_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php $_smarty_tpl->_subTemplateRender('file:components/layout/confirmation_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php $_smarty_tpl->_subTemplateRender('file:components/layout/warning_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>

        <div class="row ">
          <div class="col-sm-12">
            <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAdminEndContent'),$_smarty_tpl ) );?>

          </div>
        </div>

      </div>
    <?php }?>
</div>

<?php if ((!isset($_smarty_tpl->tpl_vars['lite_display']->value) || (isset($_smarty_tpl->tpl_vars['lite_display']->value) && !$_smarty_tpl->tpl_vars['lite_display']->value))) {?>
  <?php $_smarty_tpl->_subTemplateRender('file:components/layout/non-responsive.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <div class="mobile-layer"></div>

  <?php if ($_smarty_tpl->tpl_vars['display_footer']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php }
}?>

<?php if (isset($_smarty_tpl->tpl_vars['php_errors']->value)) {?>
  <?php $_smarty_tpl->_subTemplateRender("file:error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php if ((!isset($_smarty_tpl->tpl_vars['lite_display']->value) || (isset($_smarty_tpl->tpl_vars['lite_display']->value) && !$_smarty_tpl->tpl_vars['lite_display']->value))) {?>
  <?php if (isset($_smarty_tpl->tpl_vars['modals']->value)) {?>
    <div class="bootstrap">
      <?php echo $_smarty_tpl->tpl_vars['modals']->value;?>

    </div>
  <?php }
}?>

</body>
</html>
<?php }
}
