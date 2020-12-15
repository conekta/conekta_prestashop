<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:45:05
  from 'module:conektapaymentsprestashop' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc673118a0aa9_39645167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c66172a702c5cec1134fc0f29d0cd7f0b4ce433a' => 
    array (
      0 => 'module:conektapaymentsprestashop',
      1 => 1606840983,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc673118a0aa9_39645167 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin /var/www/html/modules/conektapaymentsprestashop/views/templates/front/payment_form.tpl -->
<?php if (isset($_GET['message'])) {?>
<div class="conekta-payment-errors" style="display:block;"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['message'],'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</div>
<?php }?>

<form action="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" id="conekta-payment-form">
<?php if (isset($_GET['conekta_error'])) {?><div class="conekta-payment-errors"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There was a problem processing your credit card, please double check your data and try again.','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</div><?php }?>
  <p>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Nombre del Tarjetahabiente','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</label>
    <input type="text" autocomplete="off" class="conekta-card-name" data-conekta="card[name]">
  </p>

  <div>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Número de Tarjeta','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</label>
    <div id="conekta-card-number" class="conekta-card-number" style="height: 50px;"></div>
  </div>

  <div>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CVC','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</label>
    <div id="conekta-card-cvc" class="conekta-card-cvc" style="height: 50px;"></div>
  </div>

  <p>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Expiration (MM/AAAA)','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</label>
    <select class="conekta-card-expiry-month" id="conekta-card-expiry-month" data-conekta="card[exp_month]" data-encrypted-name="month">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
?>
        <option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['month']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['month']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</option>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <span> / </span>
    <select class="conekta-card-expiry-year" id="conekta-card-expiry-year" data-conekta="card[exp_year]" data-encrypted-name="year">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['years']->value, 'year');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
?>
        <option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['year']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['year']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</option>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
  </p>
  <?php if ($_smarty_tpl->tpl_vars['msi']->value == 1) {?>
    <p>
    <label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Monthly Installments','mod'=>'conektapaymentsprestashop'),$_smarty_tpl ) );?>
</label>
    <select class="conekta-card-msi" id="conekta-card-msi" name="monthly_installments">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msi_jumps']->value, 'msi');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msi']->value) {
?>
          <option value="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['msi']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['msi']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    </p>
  <?php }?>
</form><!-- end /var/www/html/modules/conektapaymentsprestashop/views/templates/front/payment_form.tpl --><?php }
}
