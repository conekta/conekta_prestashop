<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:43:22
  from '/var/www/html/backoffice/themes/default/template/controllers/modules/content-legacy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc672aa36f877_79995791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8def2dc68b026ff65ef7648f0d10b23d8cf01be8' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/controllers/modules/content-legacy.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:controllers/modules/js.tpl' => 1,
    'file:controllers/modules/page.tpl' => 1,
  ),
),false)) {
function content_5fc672aa36f877_79995791 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['module_content']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['module_content']->value;?>

<?php } else { ?>

	<?php if (isset($_GET['addnewmodule']) && ($_smarty_tpl->tpl_vars['context_mode']->value == Context::MODE_HOST)) {?>

		<div class="defaultForm form-horizontal">

			<?php if ($_smarty_tpl->tpl_vars['logged_on_addons']->value) {?>

				<div class="panel">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
							<img class="img-responsive" alt="PrestaShop Addons" src="themes/default/img/prestashop-addons-logo.png">
						</div>
						<div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-7 col-xs-12 addons-style-search-bar">
							<form id="addons-search-form" method="get" action="https://addons.prestashop.com/<?php echo $_smarty_tpl->tpl_vars['iso_code']->value;?>
/search" class="float">
							<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Search on PrestaShop Marketplace:'),$_smarty_tpl ) );?>
</label>
							<div class="input-group">
								<input id="addons-search-box" class="form-control" type="text" autocomplete="off" name="query" value="" placeholder="Search on PrestaShop Marketplace">
								<div id="addons-search-btn" class="btn btn-primary input-group-addon">
									<i class="icon-search"></i>
								</div>
							</div>
							</form>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 addons-see-all-themes">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Or'),$_smarty_tpl ) );?>
<a href="https://addons.prestashop.com/<?php echo $_smarty_tpl->tpl_vars['iso_code']->value;?>
/2-modules-prestashop" class="btn btn-primary" onclick="return !window.open(this.href)"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'See all modules'),$_smarty_tpl ) );?>
</a>
						</div>
					</div>
				</div>

			<?php } else { ?>

				<div class="panel" id="">
					<div class="panel-heading">
						<i class="icon-picture"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a new module'),$_smarty_tpl ) );?>

					</div>

					<div class="form-wrapper">
						<div class="form-group">
							<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To add a new module, simply connect to your PrestaShop Addons account and all your purchases will be automatically imported.'),$_smarty_tpl ) );?>
</p>
						</div>
					</div><!-- /.form-wrapper -->

					<div class="panel-footer">
						<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules',true),'html','UTF-8' ));?>
" class="btn btn-default">
							<i class="process-icon-cancel"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

						</a>
						<a href="#" data-toggle="modal" data-target="#modal_addons_connect" class="btn btn-default pull-right">
							<i class="process-icon-next"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next','d'=>'Admin.Global'),$_smarty_tpl ) );?>

						</a>
					</div>
				</div>

			<?php }?>

				<div class="alert alert-info">
					<h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Can I add my own modules?'),$_smarty_tpl ) );?>
</h4>
					<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please note that for security reasons, you can only add modules that are being distributed on PrestaShop Addons, the official marketplace.'),$_smarty_tpl ) );?>
</p>
				</div>

		</div>

	<?php } elseif (!isset($_GET['configure'])) {?>
		<?php $_smarty_tpl->_subTemplateRender('file:controllers/modules/js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php $_smarty_tpl->_subTemplateRender('file:controllers/modules/page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php }
}
}
}
