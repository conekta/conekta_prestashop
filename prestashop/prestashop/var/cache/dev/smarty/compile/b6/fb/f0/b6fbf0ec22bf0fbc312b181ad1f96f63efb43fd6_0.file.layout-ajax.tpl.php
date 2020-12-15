<?php
/* Smarty version 3.1.33, created on 2020-12-02 14:11:45
  from '/var/www/html/backoffice/themes/default/template/layout-ajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc79291cef679_34642242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6fbf0ec22bf0fbc312b181ad1f96f63efb43fd6' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/layout-ajax.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc79291cef679_34642242 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['json']->value)) {?>
{<?php if (isset($_smarty_tpl->tpl_vars['status']->value) && is_string($_smarty_tpl->tpl_vars['status']->value) && trim($_smarty_tpl->tpl_vars['status']->value) != '') {
$_smarty_tpl->_assignInScope('hasresult', 'ok');?>"status" : "<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
"<?php }
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) > 0) {
if ($_smarty_tpl->tpl_vars['hasresult']->value == 'ok') {?>,<?php }
$_smarty_tpl->_assignInScope('hasresult', 'ok');?>"confirmations" : <?php echo $_smarty_tpl->tpl_vars['confirmations']->value;
}
if (isset($_smarty_tpl->tpl_vars['informations']->value) && count($_smarty_tpl->tpl_vars['informations']->value) > 0) {
if ($_smarty_tpl->tpl_vars['hasresult']->value == 'ok') {?>,<?php }
$_smarty_tpl->_assignInScope('hasresult', 'ok');?>"informations" : <?php echo $_smarty_tpl->tpl_vars['informations']->value;
}
if (isset($_smarty_tpl->tpl_vars['errors']->value) && count($_smarty_tpl->tpl_vars['errors']->value) > 0) {
if ($_smarty_tpl->tpl_vars['hasresult']->value == 'ok') {?>,<?php }
$_smarty_tpl->_assignInScope('hasresult', 'ok');?>"error" : <?php echo $_smarty_tpl->tpl_vars['errors']->value;
}
if (isset($_smarty_tpl->tpl_vars['warnings']->value) && count($_smarty_tpl->tpl_vars['warnings']->value) > 0) {
if ($_smarty_tpl->tpl_vars['hasresult']->value == 'ok') {?>,<?php }
$_smarty_tpl->_assignInScope('hasresult', 'ok');?>"warnings" : <?php echo $_smarty_tpl->tpl_vars['warnings']->value;
}
if ($_smarty_tpl->tpl_vars['hasresult']->value == 'ok') {?>,<?php }
$_smarty_tpl->_assignInScope('hasresult', 'ok');?>"content" : <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
}
<?php } else { ?>
	<?php if (isset($_smarty_tpl->tpl_vars['conf']->value)) {?>
		<div class="alert alert-success">
			<?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

		</div>
	<?php }?>

	<?php if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php if (count($_smarty_tpl->tpl_vars['errors']->value) == 1) {?>
				<?php echo $_smarty_tpl->tpl_vars['errors']->value[0];?>

			<?php } else { ?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%d errors','sprintf'=>array(count($_smarty_tpl->tpl_vars['errors']->value))),$_smarty_tpl ) );?>

				<br/>
				<ul>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
						<li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</ul>
			<?php }?>
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['informations']->value) && count($_smarty_tpl->tpl_vars['informations']->value) && $_smarty_tpl->tpl_vars['informations']->value) {?>
		<div class="alert alert-info" style="display:block;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['informations']->value, 'info');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
?>
				<?php echo $_smarty_tpl->tpl_vars['info']->value;?>
<br/>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
		<div class="alert alert-success" style="display:block;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'confirm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['confirm']->value) {
?>
				<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
<br />
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	<?php }?>

	<?php if (count($_smarty_tpl->tpl_vars['warnings']->value)) {?>
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php if (count($_smarty_tpl->tpl_vars['warnings']->value) > 1) {?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There are %d warnings.','sprintf'=>count($_smarty_tpl->tpl_vars['warnings']->value)),$_smarty_tpl ) );?>

				<span style="margin-left:20px;" id="labelSeeMore">
					<a id="linkSeeMore" href="#" style="text-decoration:underline"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click here to see more'),$_smarty_tpl ) );?>
</a>
					<a id="linkHide" href="#" style="text-decoration:underline;display:none"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hide warning'),$_smarty_tpl ) );?>
</a>
				</span>
			<?php } else { ?>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There is %d warning.','sprintf'=>count($_smarty_tpl->tpl_vars['warnings']->value)),$_smarty_tpl ) );?>

			<?php }?>
			<ul style="display:<?php if (count($_smarty_tpl->tpl_vars['warnings']->value) > 1) {?>none<?php } else { ?>block<?php }?>;" id="seeMore">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warnings']->value, 'warning');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->value) {
?>
				<li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		</div>
	<?php }?>
	<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

<?php }
}
}
