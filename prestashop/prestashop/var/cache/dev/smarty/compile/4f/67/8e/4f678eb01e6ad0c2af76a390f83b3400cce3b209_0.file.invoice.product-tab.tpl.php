<?php
/* Smarty version 3.1.33, created on 2020-12-02 14:12:02
  from '/var/www/html/pdf/invoice.product-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc792a2de9da3_08496045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f678eb01e6ad0c2af76a390f83b3400cce3b209' => 
    array (
      0 => '/var/www/html/pdf/invoice.product-tab.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc792a2de9da3_08496045 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<table class="product" width="100%" cellpadding="4" cellspacing="0">

	<thead>
	<tr>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['reference']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reference','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['product']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['tax_code']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tax Rate','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>

		<?php if (isset($_smarty_tpl->tpl_vars['layout']->value['before_discount'])) {?>
			<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['unit_price_tax_excl']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Base price','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
 <br /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<?php }?>

		<th class="product header-right small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['unit_price_tax_excl']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unit Price','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
 <br /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="product header small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['quantity']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Qty','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
		<th class="product header-right small" width="<?php echo $_smarty_tpl->tpl_vars['layout']->value['total_tax_excl']['width'];?>
%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
 <br /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(Tax excl.)','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</th>
	</tr>
	</thead>

	<tbody>

	<!-- PRODUCTS -->
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_details']->value, 'order_detail');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order_detail']->value) {
?>
		<?php echo smarty_function_cycle(array('values'=>array("color_line_even","color_line_odd"),'assign'=>'bgcolor_class'),$_smarty_tpl);?>

		<tr class="product <?php echo $_smarty_tpl->tpl_vars['bgcolor_class']->value;?>
">

			<td class="product center">
				<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_reference'];?>

			</td>
			<td class="product left">
				<?php if ($_smarty_tpl->tpl_vars['display_product_images']->value) {?>
					<table width="100%">
						<tr>
							<td width="15%">
								<?php if (isset($_smarty_tpl->tpl_vars['order_detail']->value['image']) && $_smarty_tpl->tpl_vars['order_detail']->value['image']->id) {?>
									<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['image_tag'];?>

								<?php }?>
							</td>
							<td width="5%">&nbsp;</td>
							<td width="80%">
								<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_name'];?>

							</td>
						</tr>
					</table>
				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_name'];?>

				<?php }?>

			</td>
			<td class="product center">
				<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['order_detail_tax_label'];?>

			</td>

			<?php if (isset($_smarty_tpl->tpl_vars['layout']->value['before_discount'])) {?>
				<td class="product center">
					<?php if (isset($_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl_before_specific_price'])) {?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl_before_specific_price']),$_smarty_tpl ) );?>

					<?php } else { ?>
						--
					<?php }?>
				</td>
			<?php }?>

			<td class="product right">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl_including_ecotax']),$_smarty_tpl ) );?>

				<?php if ($_smarty_tpl->tpl_vars['order_detail']->value['ecotax_tax_excl'] > 0) {?>
					<br>
					<small><?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['ecotax_tax_excl']),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'ecotax: %s','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );
$_prefixVariable2 = ob_get_clean();
echo sprintf($_prefixVariable2,$_prefixVariable1);?>
</small>
				<?php }?>
			</td>
			<td class="product center">
				<?php echo $_smarty_tpl->tpl_vars['order_detail']->value['product_quantity'];?>

			</td>
			<td  class="product right">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order_detail']->value['total_price_tax_excl_including_ecotax']),$_smarty_tpl ) );?>

			</td>
		</tr>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_detail']->value['customizedDatas'], 'customizationPerAddress');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customizationPerAddress']->value) {
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customizationPerAddress']->value, 'customization', false, 'customizationId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customizationId']->value => $_smarty_tpl->tpl_vars['customization']->value) {
?>
				<tr class="customization_data <?php echo $_smarty_tpl->tpl_vars['bgcolor_class']->value;?>
">
					<td class="center"> &nbsp;</td>

					<td>
						<?php if ((($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_TEXTFIELD_')] !== null )) && count($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_TEXTFIELD_')]) > 0) {?>
							<table style="width: 100%;">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_TEXTFIELD_')], 'customization_infos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customization_infos']->value) {
?>
									<tr>
										<td style="width: 30%;">
											<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%s:','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );
$_prefixVariable3 = ob_get_clean();
echo sprintf($_prefixVariable3,$_smarty_tpl->tpl_vars['customization_infos']->value['name']);?>

										</td>
										<td><?php if ((int)$_smarty_tpl->tpl_vars['customization_infos']->value['id_module']) {
echo $_smarty_tpl->tpl_vars['customization_infos']->value['value'];
} else {
echo $_smarty_tpl->tpl_vars['customization_infos']->value['value'];
}?></td>
									</tr>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</table>
						<?php }?>

						<?php if ((($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_FILE_')] !== null )) && count($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_FILE_')]) > 0) {?>
							<table style="width: 100%;">
								<tr>
									<td style="width: 70%;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'image(s):','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
									<td><?php echo count($_smarty_tpl->tpl_vars['customization']->value['datas'][@constant('_CUSTOMIZE_FILE_')]);?>
</td>
								</tr>
							</table>
						<?php }?>
					</td>

					<td class="center">
						(<?php if ($_smarty_tpl->tpl_vars['customization']->value['quantity'] == 0) {?>1<?php } else {
echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];
}?>)
					</td>

					<?php $_smarty_tpl->_assignInScope('end', ($_smarty_tpl->tpl_vars['layout']->value['_colCount']-3));?>
					<?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['end']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['end']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration === 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration === $_smarty_tpl->tpl_vars['var']->total;?>
						<td class="center">
							--
						</td>
					<?php }
}
?>

				</tr>
				<!--if !$smarty.foreach.custo_foreach.last-->
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<!-- END PRODUCTS -->

	<!-- CART RULES -->

	<?php $_smarty_tpl->_assignInScope('shipping_discount_tax_incl', "0");?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_rules']->value, 'cart_rule', false, NULL, 'cart_rules_loop', array (
  'first' => true,
  'index' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cart_rule']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_cart_rules_loop']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_cart_rules_loop']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_cart_rules_loop']->value['index'];
?>
		<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_cart_rules_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_cart_rules_loop']->value['first'] : null)) {?>
		<tr class="discount">
			<th class="header" colspan="<?php echo $_smarty_tpl->tpl_vars['layout']->value['_colCount'];?>
">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Discounts','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>

			</th>
		</tr>
		<?php }?>
		<tr class="discount">
			<td class="white right" colspan="<?php echo $_smarty_tpl->tpl_vars['layout']->value['_colCount']-1;?>
">
				<?php echo $_smarty_tpl->tpl_vars['cart_rule']->value['name'];?>

			</td>
			<td class="right white">
				- <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['cart_rule']->value['value_tax_excl']),$_smarty_tpl ) );?>

			</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	</tbody>

</table>
<?php }
}
