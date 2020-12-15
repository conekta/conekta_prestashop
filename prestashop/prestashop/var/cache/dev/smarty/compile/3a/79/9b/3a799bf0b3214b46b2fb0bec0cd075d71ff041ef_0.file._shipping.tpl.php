<?php
/* Smarty version 3.1.33, created on 2020-12-02 14:11:00
  from '/var/www/html/backoffice/themes/default/template/controllers/orders/_shipping.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc79264117f22_64122957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a799bf0b3214b46b2fb0bec0cd075d71ff041ef' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/controllers/orders/_shipping.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc79264117f22_64122957 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
<div class="table-responsive">
	<table class="table" id="shipping_table">
		<thead>
			<tr>
				<th>
					<span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
				</th>
				<th>
					<span class="title_box ">&nbsp;</span>
				</th>
				<th>
					<span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Weight','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping cost','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</span>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value->getShipping(), 'line');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['line']->value) {
?>
			<tr>
				<td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['line']->value['date_add'],'full'=>true),$_smarty_tpl ) );?>
</td>
				<td>&nbsp;</td>
				<td><?php echo $_smarty_tpl->tpl_vars['line']->value['carrier_name'];?>
</td>
				<td class="weight"><?php echo sprintf("%.3f",$_smarty_tpl->tpl_vars['line']->value['weight']);?>
 <?php echo Configuration::get('PS_WEIGHT_UNIT');?>
</td>
				<td class="price_carrier_<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_carrier']);?>
" class="center">
					<span>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_INC')) {?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['line']->value['shipping_cost_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

					<?php } else { ?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['line']->value['shipping_cost_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

					<?php }?>
					</span>
				</td>
				<td>
					<span class="shipping_number_show"><?php if ($_smarty_tpl->tpl_vars['line']->value['url'] && $_smarty_tpl->tpl_vars['line']->value['tracking_number']) {?><a class="_blank" href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['line']->value['url'],'@',$_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];
}?></span>
				</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['line']->value['can_edit']) {?>
						<a href="#" class="edit_shipping_link btn btn-default"
						data-id-order-carrier="<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_order_carrier']);?>
"
						data-id-carrier="<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_carrier']);?>
"
						data-tracking-number="<?php echo htmlentities($_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>
"
						>
 							<i class="icon-pencil"></i>
 							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

 						</a>
					<?php }?>
				</td>
			</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</tbody>
	</table>

	<!-- shipping update modal -->
	<div class="modal fade" id="modal-shipping">
		<div class="modal-dialog">
			<form method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id),'vieworder'=>1)),'html','UTF-8' ));?>
">
				<input type="hidden" name="submitShippingNumber" id="submitShippingNumber" value="1" />
				<input type="hidden" name="id_order_carrier" id="id_order_carrier" />
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Close','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit shipping details','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<?php if (!$_smarty_tpl->tpl_vars['recalculate_shipping_cost']->value) {?>
							<div class="alert alert-info">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please note that carrier change will not recalculate your shipping costs, if you want to change this please visit Shop Parameters > Order Settings','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

							</div>
							<?php }?>
							<div class="form-group">
								<div class="col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</div>
								<div class="col-lg-7"><input type="text" name="shipping_tracking_number" id="shipping_tracking_number" /></div>
							</div>
							<div class="form-group">
								<div class="col-lg-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</div>
								<div class="col-lg-7">
									<select name="shipping_carrier" id="shipping_carrier">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carrier_list']->value, 'carrier');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->value) {
?>
											<option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['name'],'html','UTF-8' ));?>
 <?php if (isset($_smarty_tpl->tpl_vars['carrier']->value['delay'])) {?>(<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carrier']->value['delay'],'html','UTF-8' ));?>
)<?php }?></option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</button>
						<button type="submit" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- END shipping update modal -->
</div>
<?php }
}
