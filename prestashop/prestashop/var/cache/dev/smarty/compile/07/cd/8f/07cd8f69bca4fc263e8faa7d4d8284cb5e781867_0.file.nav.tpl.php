<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:43:22
  from '/var/www/html/backoffice/themes/default/template/nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc672aa462a84_77738532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07cd8f69bca4fc263e8faa7d4d8284cb5e781867' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/nav.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc672aa462a84_77738532 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="nav-bar d-none d-md-block" role="navigation" id="nav-sidebar">
	<span class="menu-collapse" data-toggle-url="<?php echo $_smarty_tpl->tpl_vars['toggle_navigation_url']->value;?>
">
		<i class="material-icons">chevron_left</i>
		<i class="material-icons">chevron_left</i>
	</span>

	<ul class="main-menu">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabs']->value, 'level_1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_1']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['level_1']->value['active']) {?>
								<?php if ($_smarty_tpl->tpl_vars['level_1']->value['class_name'] == 'AdminDashboard') {?>
					<li class="link-levelone <?php if ($_smarty_tpl->tpl_vars['level_1']->value['current']) {?>-active<?php }?>" id="tab-<?php echo $_smarty_tpl->tpl_vars['level_1']->value['class_name'];?>
" data-submenu="<?php echo $_smarty_tpl->tpl_vars['level_1']->value['id_tab'];?>
">
						<a href="<?php if (count($_smarty_tpl->tpl_vars['level_1']->value['sub_tabs']) && isset($_smarty_tpl->tpl_vars['level_1']->value['sub_tabs'][0]['href'])) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_1']->value['sub_tabs'][0]['href'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_1']->value['href'],'html','UTF-8' ));
}?>" class="link" >
							<i class="material-icons"><?php echo $_smarty_tpl->tpl_vars['level_1']->value['icon'];?>
</i>
							<span><?php if ($_smarty_tpl->tpl_vars['level_1']->value['name'] == '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_1']->value['class_name'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_1']->value['name'],'html','UTF-8' ));
}?></span>
						</a>
					</li>
				<?php } else { ?>
					<li class="category-title <?php if ($_smarty_tpl->tpl_vars['level_1']->value['current']) {?>-active<?php }?>" id="tab-<?php echo $_smarty_tpl->tpl_vars['level_1']->value['class_name'];?>
" data-submenu="<?php echo $_smarty_tpl->tpl_vars['level_1']->value['id_tab'];?>
">
						<span class="title">
							<span><?php if ($_smarty_tpl->tpl_vars['level_1']->value['name'] == '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_1']->value['class_name'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_1']->value['name'],'html','UTF-8' ));
}?></span>
						</span>
					</li>

					<?php if (count($_smarty_tpl->tpl_vars['level_1']->value['sub_tabs'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level_1']->value['sub_tabs'], 'level_2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_2']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['level_2']->value['active']) {?>
								<?php $_smarty_tpl->_assignInScope('mainTabClass', '');?>

								<?php if ($_smarty_tpl->tpl_vars['level_2']->value['current'] && !$_smarty_tpl->tpl_vars['collapse_menu']->value) {?>
									<?php $_smarty_tpl->_assignInScope('mainTabClass', " -active open ul-open");?>
								<?php } elseif ($_smarty_tpl->tpl_vars['level_2']->value['current'] && $_smarty_tpl->tpl_vars['collapse_menu']->value) {?>
									<?php $_smarty_tpl->_assignInScope('mainTabClass', " -active");?>
								<?php }?>
								<li class="link-levelone<?php if (count($_smarty_tpl->tpl_vars['level_2']->value['sub_tabs'])) {?> has_submenu<?php }
echo $_smarty_tpl->tpl_vars['mainTabClass']->value;?>
" id="subtab-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_2']->value['class_name'],'html','UTF-8' ));?>
" data-submenu="<?php echo $_smarty_tpl->tpl_vars['level_2']->value['id_tab'];?>
">
									<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_2']->value['href'],'html','UTF-8' ));?>
" class="link">
										<i class="material-icons mi-<?php echo $_smarty_tpl->tpl_vars['level_2']->value['icon'];?>
"><?php echo $_smarty_tpl->tpl_vars['level_2']->value['icon'];?>
</i>
										<span>
											<?php if ($_smarty_tpl->tpl_vars['level_2']->value['name'] == '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_2']->value['class_name'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_2']->value['name'],'html','UTF-8' ));
}?>
										</span>
										<?php if (count($_smarty_tpl->tpl_vars['level_2']->value['sub_tabs'])) {?>
											<i class="material-icons sub-tabs-arrow">
												<?php if ($_smarty_tpl->tpl_vars['level_2']->value['current']) {?>
													keyboard_arrow_up
												<?php } else { ?>
													keyboard_arrow_down
												<?php }?>
											</i>
										<?php }?>
									</a>

									<?php if (count($_smarty_tpl->tpl_vars['level_2']->value['sub_tabs'])) {?>
										<ul id="collapse-<?php echo $_smarty_tpl->tpl_vars['level_2']->value['id_tab'];?>
" class="submenu panel-collapse">

											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['level_2']->value['sub_tabs'], 'level_3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['level_3']->value) {
?>
												<?php if ($_smarty_tpl->tpl_vars['level_3']->value['active']) {?>
													<li class="link-leveltwo <?php if ($_smarty_tpl->tpl_vars['level_3']->value['current']) {?>-active<?php }?>" id="subtab-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_3']->value['class_name'],'html','UTF-8' ));?>
" data-submenu="<?php echo $_smarty_tpl->tpl_vars['level_3']->value['id_tab'];?>
">
														<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_3']->value['href'],'html','UTF-8' ));?>
" class="link">
															<?php if ($_smarty_tpl->tpl_vars['level_3']->value['name'] == '') {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_3']->value['class_name'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['level_3']->value['name'],'html','UTF-8' ));
}?>
														</a>
													</li>
												<?php }?>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</ul>
									<?php }?>
								</li>
							<?php }?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
				<?php }?>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAdminNavBarBeforeEnd'),$_smarty_tpl ) );?>

	</nav>
<?php }
}
