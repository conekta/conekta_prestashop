<?php
/* Smarty version 3.1.33, created on 2020-12-02 14:14:08
  from '/var/www/html/modules/conektapaymentsprestashop/views/templates/hook/admin-order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc79320efe592_79455555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b73878de146417913c0eb804f987ea71046f7a6' => 
    array (
      0 => '/var/www/html/modules/conektapaymentsprestashop/views/templates/hook/admin-order.tpl',
      1 => 1606840983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc79320efe592_79455555 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-md-12">
	<div class="panel">
		<h3><i class="icon-money"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Conekta Payment Details','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</h3>

		<ul class="nav nav-tabs" id="tabConekta">
			<li class="active">
				<a href="#conekta_details">
					<i class="icon-money"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Details','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['conekta_transaction_details']->value['id_transaction'],'htmlall','UTF-8' ));?>
</span>
				</a>
			</li>
		</ul>

		<div class="tab-content panel">
			<div class="tab-pane active" id="conekta_details">
			<?php if (isset($_smarty_tpl->tpl_vars['conekta_transaction_details']->value['id_transaction'])) {?>
				<p>
					<strong>Status</strong> <span style="font-weight: bold; color: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['color_status']->value,'htmlall','UTF-8' ));?>
;"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message_status']->value,'htmlall','UTF-8' ));?>
</span>
					<br>
					<strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount:','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['display_price']->value,'htmlall','UTF-8' ));?>

					<br>
					<strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Processed on:','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</strong> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['processed_on']->value,'htmlall','UTF-8' ));?>

					<br>
					<strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mode:','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</strong> <span style="font-weight: bold; color: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['color_mode']->value,'htmlall','UTF-8' ));?>
};"><?php echo mb_convert_encoding($_smarty_tpl->tpl_vars['txt_mode']->value, 'UTF-8', 'HTML-ENTITIES');?>
</span>
				</p>
			<?php } else { ?>
				<span style="color: #CC0000;"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Warning:','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</strong></span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The customer paid using Conekta and an error occured (check details at the bottom of this page)','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>

			<?php }?>
			</div>
		</div>
	</div>
</div><?php }
}
