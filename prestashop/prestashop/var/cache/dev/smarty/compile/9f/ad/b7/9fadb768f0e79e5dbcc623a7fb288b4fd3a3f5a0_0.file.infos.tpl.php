<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:43:21
  from '/var/www/html/modules/conektapaymentsprestashop/views/templates/hook/infos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc672a9f23285_74450352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fadb768f0e79e5dbcc623a7fb288b4fd3a3f5a0' => 
    array (
      0 => '/var/www/html/modules/conektapaymentsprestashop/views/templates/hook/infos.tpl',
      1 => 1606840983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc672a9f23285_74450352 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   	<span aria-hidden="true">&times;</span>
  </button>
  <img src="../modules/conektapaymentsprestashop/logo.png" style="float:left; margin-right:15px;" width="86" height="49">
  <p><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This module allows you to accept payments by check.','d'=>'Modules.Checkpayment.Admin','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</strong></p>
  <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If the client chooses this payment method, the order status will change to Waiting for payment.','d'=>'Modules.Checkpayment.Admin','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</p>
  <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You will need to manually confirm the order as soon as you receive a check.','d'=>'Modules.Checkpayment.Admin','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</p>
</div>
<?php if ($_smarty_tpl->tpl_vars['error_webhook_message']->value) {?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		 </button>
		<p><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['error_webhook_message']->value,'htmlall','UTF-8' ));?>
</p>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['config_check']->value) {?>
	<div class="alert alert-success"><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['msg_show']->value,'htmlall','UTF-8' ));?>
</strong></div>
<?php } else { ?>
	<div class="alert alert-danger">
		<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['msg_show']->value,'htmlall','UTF-8' ));?>
</strong>
		<ul style="margin-top: 10px;">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['requirements']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value != 'result') {?>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['result'] == 0) {?>
						<li><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['item']->value['name'],'htmlall','UTF-8' ));?>
</li>
					<?php }?>
				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	</div>
<?php }
}
}
