<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:45:05
  from 'module:pswirepaymentviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc6731187a064_91412053',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac93800f7c79e4effac1051becf76659826f5560' => 
    array (
      0 => 'module:pswirepaymentviewstemplat',
      1 => 1593027171,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
    'module:ps_wirepayment/views/templates/hook/_partials/payment_infos.tpl' => 1,
  ),
),false)) {
function content_5fc6731187a064_91412053 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/html/modules/ps_wirepayment/views/templates/hook/ps_wirepayment_intro.tpl -->
<section>
  <p>
    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please transfer the invoice amount to our bank account. You will receive our order confirmation by email containing bank details and order number.','d'=>'Modules.Wirepayment.Shop'),$_smarty_tpl ) );?>

    <?php if ($_smarty_tpl->tpl_vars['bankwireReservationDays']->value) {?>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Goods will be reserved %s days for you and we\'ll process the order immediately after receiving the payment.','sprintf'=>array($_smarty_tpl->tpl_vars['bankwireReservationDays']->value),'d'=>'Modules.Wirepayment.Shop'),$_smarty_tpl ) );?>

    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['bankwireCustomText']->value) {?>
        <a data-toggle="modal" data-target="#bankwire-modal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'More information','d'=>'Modules.Wirepayment.Shop'),$_smarty_tpl ) );?>
</a>
    <?php }?>
  </p>

  <div class="modal fade" id="bankwire-modal" tabindex="-1" role="dialog" aria-labelledby="Bankwire information" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Bankwire','d'=>'Modules.Wirepayment.Shop'),$_smarty_tpl ) );?>
</h2>
        </div>
        <div class="modal-body">
          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payment is made by transfer of the invoice amount to the following account:','d'=>'Modules.Wirepayment.Shop'),$_smarty_tpl ) );?>
</p>
          <?php $_smarty_tpl->_subTemplateRender('module:ps_wirepayment/views/templates/hook/_partials/payment_infos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php echo $_smarty_tpl->tpl_vars['bankwireCustomText']->value;?>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- end /var/www/html/modules/ps_wirepayment/views/templates/hook/ps_wirepayment_intro.tpl --><?php }
}
