<?php
/* Smarty version 3.1.33, created on 2020-12-01 18:50:21
  from '/var/www/html/backoffice/themes/new-theme/template/components/layout/search_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc6825d612995_55315137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57886650c71b0da3b19f22af40a933cfe7acbc4b' => 
    array (
      0 => '/var/www/html/backoffice/themes/new-theme/template/components/layout/search_form.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc6825d612995_55315137 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="header_search"
      class="bo_search_form dropdown-form js-dropdown-form collapsed"
      method="post"
      action="<?php echo $_smarty_tpl->tpl_vars['baseAdminUrl']->value;?>
index.php?controller=AdminSearch&amp;token=<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminSearch'),$_smarty_tpl ) );?>
"
      role="search">
  <input type="hidden" name="bo_search_type" id="bo_search_type" class="js-search-type" />
  <?php if (isset($_smarty_tpl->tpl_vars['show_clear_btn']->value) && $_smarty_tpl->tpl_vars['show_clear_btn']->value) {?>
    <a href="#" class="clear_search hide"><i class="icon-remove"></i></a>
  <?php }?>
  <div class="input-group">
    <input type="text" class="form-control js-form-search" id="bo_query" name="bo_query" value="<?php echo $_smarty_tpl->tpl_vars['bo_query']->value;?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search (e.g.: product reference, customer name…)'),$_smarty_tpl ) );?>
">
    <div class="input-group-append">
      <button type="button" class="btn btn-outline-secondary dropdown-toggle js-dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Everywhere'),$_smarty_tpl ) );?>

      </button>
      <div class="dropdown-menu js-items-list">
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Everywhere'),$_smarty_tpl ) );?>
" href="#" data-value="0" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'What are you looking for?'),$_smarty_tpl ) );?>
" data-icon="icon-search"><i class="material-icons">search</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Everywhere'),$_smarty_tpl ) );?>
</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Catalog'),$_smarty_tpl ) );?>
" href="#" data-value="1" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product name, SKU, reference...'),$_smarty_tpl ) );?>
" data-icon="icon-book"><i class="material-icons">store_mall_directory</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Catalog'),$_smarty_tpl ) );?>
</a>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by name'),$_smarty_tpl ) );?>
" href="#" data-value="2" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email, name...'),$_smarty_tpl ) );?>
" data-icon="icon-group"><i class="material-icons">group</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by name'),$_smarty_tpl ) );?>
</a>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by ip address'),$_smarty_tpl ) );?>
" href="#" data-value="6" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'123.45.67.89'),$_smarty_tpl ) );?>
" data-icon="icon-desktop"><i class="material-icons">desktop_mac</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'by IP address'),$_smarty_tpl ) );?>
</a>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Orders'),$_smarty_tpl ) );?>
" href="#" data-value="3" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order ID'),$_smarty_tpl ) );?>
" data-icon="icon-credit-card"><i class="material-icons">shopping_basket</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Orders'),$_smarty_tpl ) );?>
</a>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoices'),$_smarty_tpl ) );?>
" href="#" data-value="4" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice Number'),$_smarty_tpl ) );?>
" data-icon="icon-book"><i class="material-icons">book</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoices'),$_smarty_tpl ) );?>
</a>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carts'),$_smarty_tpl ) );?>
" href="#" data-value="5" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cart ID'),$_smarty_tpl ) );?>
" data-icon="icon-shopping-cart"><i class="material-icons">shopping_cart</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carts'),$_smarty_tpl ) );?>
</a>
        <a class="dropdown-item" data-item="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Modules'),$_smarty_tpl ) );?>
" href="#" data-value="7" data-placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Module name'),$_smarty_tpl ) );?>
" data-icon="icon-puzzle-piece"><i class="material-icons">extension</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Modules'),$_smarty_tpl ) );?>
</a>
      </div>
      <button class="btn btn-primary" type="submit"><span class="d-none"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SEARCH'),$_smarty_tpl ) );?>
</span><i class="material-icons">search</i></button>
    </div>
  </div>
</form>

<?php echo '<script'; ?>
 type="text/javascript">
 $(document).ready(function(){
  <?php if (isset($_smarty_tpl->tpl_vars['search_type']->value) && $_smarty_tpl->tpl_vars['search_type']->value) {?>
    $('.search-option a[data-value='+<?php echo intval($_smarty_tpl->tpl_vars['search_type']->value);?>
+']').click();
  <?php }?>
  $('#bo_query').one('click', function() {
    $(this).closest('form').removeClass('collapsed');
  });
});
<?php echo '</script'; ?>
>
<?php }
}
