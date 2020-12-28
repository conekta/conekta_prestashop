<?php
/* Smarty version 3.1.33, created on 2020-12-02 14:12:02
  from '/var/www/html/mails/en/order_conf_product_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc792a279e6e1_22920606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c729d419d2bc34c5b85ba537ace402f325fa1a3' => 
    array (
      0 => '/var/www/html/mails/en/order_conf_product_list.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc792a279e6e1_22920606 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
<tr>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="5">&nbsp;</td>
				<td>
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['reference'];?>

					</font>
				</td>
				<td width="5">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="5">&nbsp;</td>
				<td>
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<strong><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</strong>
						<?php if (count($_smarty_tpl->tpl_vars['product']->value['customization']) == 1) {?>
							<br>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['customization'], 'customization');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->value) {
?>
								<?php echo $_smarty_tpl->tpl_vars['customization']->value['customization_text'];?>

							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>

						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl ) );?>

					</font>
				</td>
				<td width="5">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="5">&nbsp;</td>
				<td align="right">
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['unit_price'];?>

					</font>
				</td>
				<td width="5">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="5">&nbsp;</td>
				<td align="right">
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>

					</font>
				</td>
				<td width="5">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="5">&nbsp;</td>
				<td align="right">
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

					</font>
				</td>
				<td width="5">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>
  <?php if (count($_smarty_tpl->tpl_vars['product']->value['customization']) > 1) {?>
  	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['customization'], 'customization');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->value) {
?>
  		<tr>
  		<td colspan="3" style="border:1px solid #D6D4D4;">
  			<table class="table">
  				<tr>
  					<td width="5">&nbsp;</td>
  					<td>
  						<font size="2" face="Open-sans, sans-serif" color="#555454">
  							<?php echo $_smarty_tpl->tpl_vars['customization']->value['customization_text'];?>

  						</font>
  					</td>
  					<td width="5">&nbsp;</td>
  				</tr>
  			</table>
  		</td>
  		<td style="border:1px solid #D6D4D4;">
  			<table class="table">
  				<tr>
  					<td width="5">&nbsp;</td>
  					<td align="right">
  						<font size="2" face="Open-sans, sans-serif" color="#555454">
  							<?php if (count($_smarty_tpl->tpl_vars['product']->value['customization']) > 1) {?>
  								<?php echo $_smarty_tpl->tpl_vars['customization']->value['customization_quantity'];?>

  							<?php }?>
  						</font>
  					</td>
  					<td width="5">&nbsp;</td>
  				</tr>
  			</table>
  		</td>
  		<td style="border:1px solid #D6D4D4;"></td>
  	</tr>
  	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
