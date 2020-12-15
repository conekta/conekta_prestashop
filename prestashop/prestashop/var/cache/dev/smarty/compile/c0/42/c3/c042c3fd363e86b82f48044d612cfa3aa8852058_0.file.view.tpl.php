<?php
/* Smarty version 3.1.33, created on 2020-12-02 14:11:00
  from '/var/www/html/backoffice/themes/default/template/controllers/orders/helpers/view/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc79264013407_35044120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c042c3fd363e86b82f48044d612cfa3aa8852058' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/controllers/orders/helpers/view/view.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:controllers/orders/_documents.tpl' => 1,
    'file:controllers/orders/_shipping.tpl' => 1,
    'file:controllers/orders/_customized_data.tpl' => 1,
    'file:controllers/orders/_product_line.tpl' => 1,
    'file:controllers/orders/_new_product.tpl' => 1,
    'file:controllers/orders/_discount_form.tpl' => 1,
  ),
),false)) {
function content_5fc79264013407_35044120 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2040016855fc79263d1e798_42462647', "override_tpl");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/view/view.tpl");
}
/* {block "override_tpl"} */
class Block_2040016855fc79263d1e798_42462647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'override_tpl' => 
  array (
    0 => 'Block_2040016855fc79263d1e798_42462647',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),1=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.regex_replace.php','function'=>'smarty_modifier_regex_replace',),));
?>

  <?php echo '<script'; ?>
 type="text/javascript">
  var admin_order_tab_link = "<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'));?>
";
  var id_order = <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
;
  var id_lang = <?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
;
  var id_currency = <?php echo $_smarty_tpl->tpl_vars['order']->value->id_currency;?>
;
  var id_customer = <?php echo intval($_smarty_tpl->tpl_vars['order']->value->id_customer);?>
;
  <?php $_smarty_tpl->_assignInScope('PS_TAX_ADDRESS_TYPE', Configuration::get('PS_TAX_ADDRESS_TYPE'));?>
  var id_address = <?php echo $_smarty_tpl->tpl_vars['order']->value->{$_smarty_tpl->tpl_vars['PS_TAX_ADDRESS_TYPE']->value};?>
;
  var currency_sign = "<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
";
  var currency_format = "<?php echo $_smarty_tpl->tpl_vars['currency']->value->format;?>
";
  var currency_blank = "<?php echo $_smarty_tpl->tpl_vars['currency']->value->blank;?>
";
  var priceDisplayPrecision = <?php echo intval(@constant('_PS_PRICE_DISPLAY_PRECISION_'));?>
;
  var use_taxes = <?php if ($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_INC')) {?>true<?php } else { ?>false<?php }?>;
  var stock_management = <?php echo intval($_smarty_tpl->tpl_vars['stock_management']->value);?>
;
  var txt_add_product_stock_issue = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure you want to add this quantity?','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl ) );?>
";
  var txt_add_product_new_invoice = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure you want to create a new invoice?','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl ) );?>
";
  var txt_add_product_no_product = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Error: No product has been selected','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl ) );?>
";
  var txt_add_product_no_product_quantity = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Error: Quantity of products must be set','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl ) );?>
";
  var txt_add_product_no_product_price = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Error: Product price must be set','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl ) );?>
";
  var txt_confirm = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Are you sure?','d'=>'Admin.Notifications.Warning','js'=>1),$_smarty_tpl ) );?>
";
  var statesShipped = new Array();
  var has_voucher = <?php if (count($_smarty_tpl->tpl_vars['discounts']->value)) {?>1<?php } else { ?>0<?php }?>;
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['states']->value, 'state');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['currentState']->value->shipped) && !$_smarty_tpl->tpl_vars['currentState']->value->shipped && $_smarty_tpl->tpl_vars['state']->value['shipped'])) {?>
      statesShipped.push(<?php echo $_smarty_tpl->tpl_vars['state']->value['id_order_state'];?>
);
    <?php }?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  var order_discount_price = <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_EXC'))) {?>
                  <?php echo $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl;?>

                <?php } else { ?>
                  <?php echo $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl;?>

                <?php }?>;

  var errorRefund = "<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Error. You cannot refund a negative amount.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>
";
  <?php echo '</script'; ?>
>

  <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayInvoice",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('hook_invoice', $_prefixVariable1);?>
  <?php if (($_smarty_tpl->tpl_vars['hook_invoice']->value)) {?>
  <div><?php echo $_smarty_tpl->tpl_vars['hook_invoice']->value;?>
</div>
  <?php }?>

  <?php $_smarty_tpl->_assignInScope('order_documents', $_smarty_tpl->tpl_vars['order']->value->getDocuments());?>
  <?php $_smarty_tpl->_assignInScope('order_shipping', $_smarty_tpl->tpl_vars['order']->value->getShipping());?>
  <?php $_smarty_tpl->_assignInScope('order_return', $_smarty_tpl->tpl_vars['order']->value->getReturn());?>

  <div class="panel kpi-container">
    <div class="row">
      <div class="col-xs-6 col-sm-3 box-stats color3" >
        <div class="kpi-content">
          <i class="icon-calendar-empty"></i>
          <span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
          <span class="value"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>false),$_smarty_tpl ) );?>
</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 box-stats color4" >
        <div class="kpi-content">
          <i class="icon-money"></i>
          <span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
          <span class="value"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>
</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 box-stats color2" >
        <div class="kpi-content">
          <i class="icon-comments"></i>
          <span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Messages','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
          <span class="value"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads',true,array(),array('id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id))),'html','UTF-8' ));?>
"><?php echo sizeof($_smarty_tpl->tpl_vars['customer_thread_message']->value);?>
</a></span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 box-stats color1" >
        <a href="#start_products">
          <div class="kpi-content">
            <i class="icon-book"></i>
            <span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Products','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
            <span class="value"><?php echo sizeof($_smarty_tpl->tpl_vars['products']->value);?>
</span>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-7">
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-credit-card"></i>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order','d'=>'Admin.Global'),$_smarty_tpl ) );?>

          <span class="badge"><?php echo $_smarty_tpl->tpl_vars['order']->value->reference;?>
</span>
          <span class="badge"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"#",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );
echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</span>
          <div class="panel-heading-action">
            <div class="btn-group">
              <a class="btn btn-default<?php if (!$_smarty_tpl->tpl_vars['previousOrder']->value) {?> disabled<?php }?>" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('vieworder'=>1,'id_order'=>intval($_smarty_tpl->tpl_vars['previousOrder']->value))),'html','UTF-8' ));?>
">
                <i class="icon-backward"></i>
              </a>
              <a class="btn btn-default<?php if (!$_smarty_tpl->tpl_vars['nextOrder']->value) {?> disabled<?php }?>" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('vieworder'=>1,'id_order'=>intval($_smarty_tpl->tpl_vars['nextOrder']->value))),'html','UTF-8' ));?>
">
                <i class="icon-forward"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Orders Actions -->
        <div class="well hidden-print">
          <a class="btn btn-default" href="javascript:window.print()">
            <i class="icon-print"></i>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Print order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

          </a>
          &nbsp;
          <?php if (Configuration::get('PS_INVOICE') && count($_smarty_tpl->tpl_vars['invoices_collection']->value) && $_smarty_tpl->tpl_vars['order']->value->invoice_number) {?>
            <a data-selenium-id="view_invoice" class="btn btn-default _blank" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf',true,array(),array('submitAction'=>'generateInvoicePDF','id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id))),'html','UTF-8' ));?>
">
              <i class="icon-file"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </a>
          <?php } else { ?>
            <span class="span label label-inactive">
              <i class="icon-remove"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </span>
          <?php }?>
          &nbsp;
          <?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_number) {?>
            <a class="btn btn-default _blank"  href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf',true,array(),array('submitAction'=>'generateDeliverySlipPDF','id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id))),'html','UTF-8' ));?>
">
              <i class="icon-truck"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View delivery slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </a>
          <?php } else { ?>
            <span class="span label label-inactive">
              <i class="icon-remove"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No delivery slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </span>
          <?php }?>
          &nbsp;
          <?php if (Configuration::get('PS_ORDER_RETURN')) {?>
            <a id="desc-order-standard_refund" class="btn btn-default" href="#refundForm">
              <i class="icon-exchange"></i>
              <?php if ($_smarty_tpl->tpl_vars['order']->value->hasBeenShipped()) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid()) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Standard refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              <?php } else { ?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              <?php }?>
            </a>
            &nbsp;
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['order']->value->hasInvoice()) {?>
            <a id="desc-order-partial_refund" class="btn btn-default" href="#refundForm">
              <i class="icon-exchange"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partial refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </a>
          <?php }?>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayBackOfficeOrderActions','id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id)),$_smarty_tpl ) );?>

        </div>
        <!-- Tab nav -->
        <ul class="nav nav-tabs" id="tabOrder">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_TAB_ORDER']->value;?>

          <li class="active">
            <a href="#status">
              <i class="icon-time"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['history']->value);?>
</span>
            </a>
          </li>
          <li>
            <a href="#documents">
              <i class="icon-file-text"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Documents','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order_documents']->value);?>
</span>
            </a>
          </li>
        </ul>
        <!-- Tab content -->
        <div class="tab-content panel">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_CONTENT_ORDER']->value;?>

          <!-- Tab status -->
          <div class="tab-pane active" id="status">
            <h4 class="visible-print"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl ) );?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['history']->value);?>
)</span></h4>
            <!-- History of status -->
            <div class="table-responsive">
              <table class="table history-status row-margin-bottom">
                <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['history']->value, 'row', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
?>
                    <?php if (($_smarty_tpl->tpl_vars['key']->value == 0)) {?>
                      <tr>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><img src="../img/os/<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']);?>
.gif" width="16" height="16" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['ostate_name']);?>
" /></td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['ostate_name']);?>
</td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
"><?php if ($_smarty_tpl->tpl_vars['row']->value['employee_lastname']) {
echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_firstname']);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_lastname']);
}?></td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['row']->value['date_add'],'full'=>true),$_smarty_tpl ) );?>
</td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
" class="text-right">
                          <?php if (intval($_smarty_tpl->tpl_vars['row']->value['send_email'])) {?>
                            <a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('vieworder'=>1,'id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id),'sendStateEmail'=>intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']),'id_order_history'=>intval($_smarty_tpl->tpl_vars['row']->value['id_order_history']))),'html','UTF-8' ));?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Resend this email to the customer','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl ) );?>
">
                              <i class="icon-mail-reply"></i>
                              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Resend email','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                            </a>
                          <?php }?>
                        </td>
                      </tr>
                    <?php } else { ?>
                      <tr>
                        <td><img src="../img/os/<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']);?>
.gif" width="16" height="16" /></td>
                        <td><?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['ostate_name']);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['employee_lastname']) {
echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_firstname']);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_lastname']);
} else { ?>&nbsp;<?php }?></td>
                        <td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['row']->value['date_add'],'full'=>true),$_smarty_tpl ) );?>
</td>
                        <td class="text-right">
                          <?php if (intval($_smarty_tpl->tpl_vars['row']->value['send_email'])) {?>
                            <a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('vieworder'=>1,'id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id),'sendStateEmail'=>intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']),'id_order_history'=>intval($_smarty_tpl->tpl_vars['row']->value['id_order_history']))),'html','UTF-8' ));?>
" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Resend this email to the customer','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl ) );?>
">
                              <i class="icon-mail-reply"></i>
                              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Resend email','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                            </a>
                          <?php }?>
                        </td>
                      </tr>
                    <?php }?>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
              </table>
            </div>
            <!-- Change status form -->
            <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&amp;vieworder&amp;token=<?php echo $_GET['token'];?>
" method="post" class="form-horizontal well hidden-print">
              <div class="row">
                <div class="col-lg-9">
                  <select id="id_order_state" class="chosen form-control" name="id_order_state">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['states']->value, 'state');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
?>
                    <option value="<?php echo intval($_smarty_tpl->tpl_vars['state']->value['id_order_state']);?>
"<?php if (isset($_smarty_tpl->tpl_vars['currentState']->value) && $_smarty_tpl->tpl_vars['state']->value['id_order_state'] == $_smarty_tpl->tpl_vars['currentState']->value->id) {?> selected="selected" disabled="disabled"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['state']->value['name'] ));?>
</option>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                  <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
                </div>
                <div class="col-lg-3">
                  <button type="submit" name="submitState" id="submit_state" class="btn btn-primary">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update status','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- Tab documents -->
          <div class="tab-pane" id="documents">
            <h4 class="visible-print"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Documents','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['order_documents']->value);?>
)</span></h4>
                        <?php $_smarty_tpl->_subTemplateRender('file:controllers/orders/_documents.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          </div>
        </div>
        <?php echo '<script'; ?>
>
          $('#tabOrder a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        <?php echo '</script'; ?>
>
        <hr />
        <!-- Tab nav -->
        <ul class="nav nav-tabs" id="myTab">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_TAB_SHIP']->value;?>

          <li class="active">
            <a href="#shipping">
              <i class="icon-truck "></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping','d'=>'Admin.Catalog.Feature'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order_shipping']->value);?>
</span>
            </a>
          </li>
          <li>
            <a href="#returns">
              <i class="icon-undo"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Merchandise Returns','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order_return']->value);?>
</span>
            </a>
          </li>
        </ul>
        <!-- Tab content -->
        <div class="tab-content panel">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_CONTENT_SHIP']->value;?>

          <!-- Tab shipping -->
          <div class="tab-pane active" id="shipping">
            <h4 class="visible-print"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping','d'=>'Admin.Catalog.Feature'),$_smarty_tpl ) );?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['order_shipping']->value);?>
)</span></h4>
            <!-- Shipping block -->
            <?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
            <div class="form-horizontal">
              <?php if ($_smarty_tpl->tpl_vars['order']->value->gift_message) {?>
              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Message','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                <div class="col-lg-9">
                  <p class="form-control-static"><?php echo nl2br($_smarty_tpl->tpl_vars['order']->value->gift_message);?>
</p>
                </div>
              </div>
              <?php }?>
              <?php $_smarty_tpl->_subTemplateRender('file:controllers/orders/_shipping.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
              <?php if ($_smarty_tpl->tpl_vars['carrierModuleCall']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['carrierModuleCall']->value;?>

              <?php }?>
              <hr />
              <?php if ($_smarty_tpl->tpl_vars['order']->value->recyclable) {?>
                <span class="label label-success"><i class="icon-check"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Recycled packaging','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span>
              <?php } else { ?>
                <span class="label label-inactive"><i class="icon-remove"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Recycled packaging','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['order']->value->gift) {?>
                <span class="label label-success"><i class="icon-check"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Gift wrapping','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span>
              <?php } else { ?>
                <span class="label label-inactive"><i class="icon-remove"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Gift wrapping','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span>
              <?php }?>
            </div>
            <?php }?>
          </div>
          <!-- Tab returns -->
          <div class="tab-pane" id="returns">
            <h4 class="visible-print"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Merchandise Returns','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['order_return']->value);?>
)</span></h4>
            <?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
            <!-- Return block -->
              <?php if (count($_smarty_tpl->tpl_vars['order_return']->value) > 0) {?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span></th>
                      <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Type','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span></th>
                      <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</span></th>
                      <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl ) );?>
</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_return']->value, 'line');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['line']->value) {
?>
                    <tr>
                      <td><?php echo $_smarty_tpl->tpl_vars['line']->value['date_add'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['line']->value['type'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['line']->value['state_name'];?>
</td>
                      <td class="actions">
                        <span class="shipping_number_show"><?php if (isset($_smarty_tpl->tpl_vars['line']->value['url']) && isset($_smarty_tpl->tpl_vars['line']->value['tracking_number'])) {?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( smarty_modifier_replace($_smarty_tpl->tpl_vars['line']->value['url'],'@',$_smarty_tpl->tpl_vars['line']->value['tracking_number']),'html','UTF-8' ));?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
</a><?php } elseif (isset($_smarty_tpl->tpl_vars['line']->value['tracking_number'])) {
echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];
}?></span>
                        <?php if ($_smarty_tpl->tpl_vars['line']->value['can_edit']) {?>
                        <form method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8' ));?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
&amp;id_order_invoice=<?php if ($_smarty_tpl->tpl_vars['line']->value['id_order_invoice']) {
echo intval($_smarty_tpl->tpl_vars['line']->value['id_order_invoice']);
} else { ?>0<?php }?>&amp;id_carrier=<?php if ($_smarty_tpl->tpl_vars['line']->value['id_carrier']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['line']->value['id_carrier'],'html','UTF-8' ));
} else { ?>0<?php }?>">
                          <span class="shipping_number_edit" style="display:none;">
                            <button type="button" name="tracking_number">
                              <?php echo htmlentities($_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>

                            </button>
                            <button type="submit" class="btn btn-default" name="submitShippingNumber">
                              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                            </button>
                          </span>
                          <button href="#" class="edit_shipping_number_link">
                            <i class="icon-pencil"></i>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                          </button>
                          <button href="#" class="cancel_shipping_number_link" style="display: none;">
                            <i class="icon-remove"></i>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                          </button>
                        </form>
                        <?php }?>
                      </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </tbody>
                </table>
              </div>
              <?php } else { ?>
              <div class="list-empty hidden-print">
                <div class="list-empty-msg">
                  <i class="icon-warning-sign list-empty-icon"></i>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No merchandise returned yet','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

                </div>
              </div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['carrierModuleCall']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['carrierModuleCall']->value;?>

              <?php }?>
            <?php }?>
          </div>
        </div>
        <?php echo '<script'; ?>
>
          $('#myTab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        <?php echo '</script'; ?>
>
      </div>
      <!-- Payments block -->
      <div id="formAddPaymentPanel" class="panel">
        <div class="panel-heading">
          <i class="icon-money"></i>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Payment",'d'=>'Admin.Global'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order']->value->getOrderPayments());?>
</span>
        </div>
        <?php if (count($_smarty_tpl->tpl_vars['order']->value->getOrderPayments()) > 0) {?>
          <p class="alert alert-danger"<?php if (round($_smarty_tpl->tpl_vars['orders_total_paid_tax_incl']->value,2) == round($_smarty_tpl->tpl_vars['total_paid']->value,2) || (isset($_smarty_tpl->tpl_vars['currentState']->value) && $_smarty_tpl->tpl_vars['currentState']->value->id == 6)) {?> style="display: none;"<?php }?>>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Warning','d'=>'Admin.Global'),$_smarty_tpl ) );?>

            <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['total_paid']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>
</strong>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'paid instead of','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

            <strong class="total_paid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['orders_total_paid_tax_incl']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>
</strong>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value->getBrother(), 'brother_order');
$_smarty_tpl->tpl_vars['brother_order']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['brother_order']->value) {
$_smarty_tpl->tpl_vars['brother_order']->index++;
$_smarty_tpl->tpl_vars['brother_order']->first = !$_smarty_tpl->tpl_vars['brother_order']->index;
$__foreach_brother_order_4_saved = $_smarty_tpl->tpl_vars['brother_order'];
?>
              <?php if ($_smarty_tpl->tpl_vars['brother_order']->first) {?>
                <?php if (count($_smarty_tpl->tpl_vars['order']->value->getBrother()) == 1) {?>
                  <br /><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This warning also concerns order ','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

                <?php } else { ?>
                  <br /><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This warning also concerns the next orders:','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

                <?php }?>
              <?php }?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
">
                #<?php echo sprintf('%06d',$_smarty_tpl->tpl_vars['brother_order']->value->id);?>

              </a>
            <?php
$_smarty_tpl->tpl_vars['brother_order'] = $__foreach_brother_order_4_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </p>
        <?php }?>
        <form id="formAddPayment"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Payment method','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Transaction ID','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value->getOrderPaymentCollection(), 'payment');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
?>
                <tr>
                  <td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['payment']->value->date_add,'full'=>true),$_smarty_tpl ) );?>
</td>
                  <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payment']->value->payment_method,'html','UTF-8' ));?>
</td>
                  <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['payment']->value->transaction_id,'html','UTF-8' ));?>
</td>
                  <td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['payment']->value->amount,'currency'=>$_smarty_tpl->tpl_vars['payment']->value->id_currency),$_smarty_tpl ) );?>
</td>
                  <td>
                  <?php $_prefixVariable2 = $_smarty_tpl->tpl_vars['payment']->value->getOrderInvoice($_smarty_tpl->tpl_vars['order']->value->id);
$_smarty_tpl->_assignInScope('invoice', $_prefixVariable2);
if ($_prefixVariable2) {?>
                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

                  <?php } else { ?>
                  <?php }?>
                  </td>
                  <td class="actions">
                    <button class="btn btn-default open_payment_information">
                      <i class="icon-search"></i>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Details','d'=>'Admin.Global'),$_smarty_tpl ) );?>

                    </button>
                  </td>
                </tr>
                <tr class="payment_information" style="display: none;">
                  <td colspan="5">
                    <p>
                      <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Card Number','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_number) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_number;?>

                      <?php } else { ?>
                        <i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</i>
                      <?php }?>
                    </p>
                    <p>
                      <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Card Brand','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_brand) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_brand;?>

                      <?php } else { ?>
                        <i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</i>
                      <?php }?>
                    </p>
                    <p>
                      <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Card Expiration','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_expiration) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_expiration;?>

                      <?php } else { ?>
                        <i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</i>
                      <?php }?>
                    </p>
                    <p>
                      <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Card Holder','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_holder) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_holder;?>

                      <?php } else { ?>
                        <i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</i>
                      <?php }?>
                    </p>
                  </td>
                </tr>
                <?php
}
} else {
?>
                <tr>
                  <td class="list-empty hidden-print" colspan="6">
                    <div class="list-empty-msg">
                      <i class="icon-warning-sign list-empty-icon"></i>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No payment methods are available','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

                    </div>
                  </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <tr class="current-edit hidden-print">
                  <td>
                    <div class="input-group fixed-width-xl">
                      <input type="text" name="payment_date" class="datepicker" value="<?php echo date('Y-m-d');?>
" />
                      <div class="input-group-addon">
                        <i class="icon-calendar-o"></i>
                      </div>
                    </div>
                  </td>
                  <td>
                    <input name="payment_method" list="payment_method" class="payment_method form-control fixed-width-sm">
                    <datalist id="payment_method">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payment_methods']->value, 'payment_method');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->value) {
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['payment_method']->value;?>
">
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </datalist>
                  </td>
                  <td>
                    <input type="text" name="payment_transaction_id" value="" class="form-control fixed-width-sm"/>
                  </td>
                  <td>
                    <input type="text" name="payment_amount" value="" class="form-control fixed-width-sm pull-left" />
                    <select name="payment_currency" class="payment_currency form-control fixed-width-xs pull-left">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'current_currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['current_currency']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['current_currency']->value['id_currency'];?>
"<?php if ($_smarty_tpl->tpl_vars['current_currency']->value['id_currency'] == $_smarty_tpl->tpl_vars['currency']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['current_currency']->value['sign'];?>
</option>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                  </td>
                  <td>
                    <?php if (count($_smarty_tpl->tpl_vars['invoices_collection']->value) > 0) {?>
                      <select name="payment_invoice" id="payment_invoice">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoices_collection']->value, 'invoice');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['invoice']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>
</option>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      </select>
                    <?php }?>
                  </td>
                  <td class="actions">
                    <button class="btn btn-primary" type="submit" name="submitAddPayment">
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
        <?php if ((!$_smarty_tpl->tpl_vars['order']->value->valid && sizeof($_smarty_tpl->tpl_vars['currencies']->value) > 1)) {?>
          <form class="form-horizontal well" method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8' ));?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
">
            <div class="row">
              <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change currency','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</label>
              <div class="col-lg-6">
                <select name="new_currency">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency_change');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency_change']->value) {
?>
                  <?php if ($_smarty_tpl->tpl_vars['currency_change']->value['id_currency'] != $_smarty_tpl->tpl_vars['order']->value->id_currency) {?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['currency_change']->value['id_currency'];?>
"><?php echo $_smarty_tpl->tpl_vars['currency_change']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['currency_change']->value['sign'];?>
</option>
                  <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do not forget to update your exchange rate before making this change.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl ) );?>
</p>
              </div>
              <div class="col-lg-3">
                <button type="submit" class="btn btn-default" name="submitChangeCurrency"><i class="icon-refresh"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</button>
              </div>
            </div>
          </form>
        <?php }?>
      </div>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayAdminOrderLeft",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl ) );?>

    </div>
    <div class="col-lg-5">
      <!-- Customer informations -->
      <div class="panel">
        <?php if ($_smarty_tpl->tpl_vars['customer']->value->id) {?>
          <div class="panel-heading">
            <i class="icon-user"></i>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer','d'=>'Admin.Global'),$_smarty_tpl ) );?>

            <span class="badge">
              <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers',true,array(),array('id_customer'=>$_smarty_tpl->tpl_vars['customer']->value->id,'viewcustomer'=>1));?>
">
                <?php if (Configuration::get('PS_B2B_ENABLE')) {
echo $_smarty_tpl->tpl_vars['customer']->value->company;?>
 - <?php }?>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['gender']->value->name,'html','UTF-8' ));?>

                <?php echo $_smarty_tpl->tpl_vars['customer']->value->firstname;?>

                <?php echo $_smarty_tpl->tpl_vars['customer']->value->lastname;?>

              </a>
            </span>
            <span class="badge">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'#','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );
echo $_smarty_tpl->tpl_vars['customer']->value->id;?>

            </span>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <?php if (($_smarty_tpl->tpl_vars['customer']->value->isGuest())) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This order has been placed by a guest.','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                <?php if ((!Customer::customerExists($_smarty_tpl->tpl_vars['customer']->value->email))) {?>
                  <form method="post"
                        action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers',true,array(),array('guesttocustomer'=>1,'id_customer'=>$_smarty_tpl->tpl_vars['customer']->value->id,'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id));?>
">
                    <input type="hidden" name="id_lang" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id_lang;?>
" />
                    <input class="btn btn-default" type="submit" name="submitGuestToCustomer" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Transform a guest into a customer'),$_smarty_tpl ) );?>
" />
                    <p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This feature will generate a random password and send an email to the customer.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl ) );?>
</p>
                  </form>
                <?php } else { ?>
                  <div class="alert alert-warning">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A registered customer account has already claimed this email address','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

                  </div>
                <?php }?>
              <?php } else { ?>
                <dl class="well list-detail">
                  <dt><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</dt>
                    <dd><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['customer']->value->email;?>
"><i class="icon-envelope-o"></i> <?php echo $_smarty_tpl->tpl_vars['customer']->value->email;?>
</a></dd>
                  <dt><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Account registered','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</dt>
                    <dd class="text-muted"><i class="icon-calendar-o"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['customer']->value->date_add,'full'=>true),$_smarty_tpl ) );?>
</dd>
                  <dt><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Valid orders placed','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</dt>
                    <dd><span class="badge"><?php echo intval($_smarty_tpl->tpl_vars['customerStats']->value['nb_orders']);?>
</span></dd>
                  <dt><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total spent since registration','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</dt>
                    <dd><span class="badge badge-success"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>Tools::ps_round(Tools::convertPrice($_smarty_tpl->tpl_vars['customerStats']->value['total_orders'],$_smarty_tpl->tpl_vars['currency']->value),2),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>
</span></dd>
                  <?php if (Configuration::get('PS_B2B_ENABLE')) {?>
                    <dt><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SIRET','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</dt>
                      <dd><?php echo $_smarty_tpl->tpl_vars['customer']->value->siret;?>
</dd>
                    <dt><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'APE','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</dt>
                      <dd><?php echo $_smarty_tpl->tpl_vars['customer']->value->ape;?>
</dd>
                  <?php }?>
                </dl>
              <?php }?>
            </div>

            <div class="col-xs-6">
              <div class="form-group hidden-print">
                <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers',true,array(),array('id_customer'=>$_smarty_tpl->tpl_vars['customer']->value->id,'viewcustomer'=>1));?>
" class="btn btn-default btn-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View full details...','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</a>
              </div>
              <div class="panel panel-sm">
                <div class="panel-heading">
                  <i class="icon-eye-slash"></i>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Private note','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </div>
                <form id="customer_note"
                      class="form-horizontal"
                      action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers',true,array(),array('updateCustomerNote'=>1,'id_customer'=>$_smarty_tpl->tpl_vars['customer']->value->id));?>
"
                      method="post" onsubmit="saveCustomerNote();return false;" >
                  <div class="form-group">
                    <div class="col-lg-12">
                      <textarea name="note" id="noteContent" class="textarea-autosize" onkeyup="$(this).val().length > 0 ? $('#submitCustomerNote').removeAttr('disabled') : $('#submitCustomerNote').attr('disabled', 'disabled')"><?php echo $_smarty_tpl->tpl_vars['customer']->value->note;?>
</textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <button type="submit" id="submitCustomerNote" class="btn btn-default pull-right" disabled="disabled">
                        <i class="icon-save"></i>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Save','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                      </button>
                    </div>
                  </div>
                  <span id="note_feedback"></span>
                </form>
              </div>
            </div>
          </div>
        <?php }?>
        <!-- Tab nav -->
        <div class="row">
          <ul class="nav nav-tabs" id="tabAddresses">
            <li class="active">
              <a href="#addressShipping">
                <i class="icon-truck"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </a>
            </li>
            <li>
              <a href="#addressInvoice">
                <i class="icon-file-text"></i>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </a>
            </li>
          </ul>
          <!-- Tab content -->
          <div class="tab-content panel">
            <!-- Tab status -->
            <div class="tab-pane  in active" id="addressShipping">
              <!-- Addresses -->
              <h4 class="visible-print"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</h4>
              <?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
              <!-- Shipping address -->
                <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                  <form class="form-horizontal hidden-print" method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('vieworder'=>1,'id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id))),'html','UTF-8' ));?>
">
                    <div class="form-group">
                      <div class="col-lg-9">
                        <select name="id_address">
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_addresses']->value, 'address');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['address']->value) {
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['address']->value['id_address'];?>
"
                            <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] == $_smarty_tpl->tpl_vars['order']->value->id_address_delivery) {?>
                              selected="selected"
                            <?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['alias'];?>
 -
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>

                            <?php echo $_smarty_tpl->tpl_vars['address']->value['postcode'];?>

                            <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>

                            <?php if (!empty($_smarty_tpl->tpl_vars['address']->value['state'])) {?>
                              <?php echo $_smarty_tpl->tpl_vars['address']->value['state'];?>

                            <?php }?>,
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['country'];?>

                          </option>
                          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <button class="btn btn-default" type="submit" name="submitAddressShipping"><i class="icon-refresh"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</button>
                      </div>
                    </div>
                  </form>
                <?php }?>
                <div class="well">
                  <div class="row">
                    <div class="col-sm-6">
                      <a class="btn btn-default pull-right" href="?tab=AdminAddresses&amp;id_address=<?php echo $_smarty_tpl->tpl_vars['addresses']->value['delivery']->id;?>
&amp;addaddress&amp;realedit=1&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;address_type=1&amp;token=<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminAddresses'),$_smarty_tpl ) );?>
&amp;back=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
">
                        <i class="icon-pencil"></i>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                      </a>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayAddressDetail'][0], array( array('address'=>$_smarty_tpl->tpl_vars['addresses']->value['delivery'],'newLine'=>'<br />'),$_smarty_tpl ) );?>

                      <?php if ($_smarty_tpl->tpl_vars['addresses']->value['delivery']->other) {?>
                        <hr /><?php echo $_smarty_tpl->tpl_vars['addresses']->value['delivery']->other;?>
<br />
                      <?php }?>
                    </div>
                    <div class="col-sm-6 hidden-print">
                      <div id="map-delivery-canvas" style="height: 190px"></div>
                    </div>
                  </div>
                </div>
              <?php }?>
            </div>
            <div class="tab-pane " id="addressInvoice">
              <!-- Invoice address -->
              <h4 class="visible-print"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Invoice address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</h4>
              <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                <form class="form-horizontal hidden-print" method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders',true,array(),array('vieworder'=>1,'id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id))),'html','UTF-8' ));?>
">
                  <div class="form-group">
                    <div class="col-lg-9">
                      <select name="id_address">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer_addresses']->value, 'address');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['address']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['address']->value['id_address'];?>
"
                          <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address'] == $_smarty_tpl->tpl_vars['order']->value->id_address_invoice) {?>
                          selected="selected"
                          <?php }?>>
                          <?php echo $_smarty_tpl->tpl_vars['address']->value['alias'];?>
 -
                          <?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>

                          <?php echo $_smarty_tpl->tpl_vars['address']->value['postcode'];?>

                          <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>

                          <?php if (!empty($_smarty_tpl->tpl_vars['address']->value['state'])) {?>
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['state'];?>

                          <?php }?>,
                          <?php echo $_smarty_tpl->tpl_vars['address']->value['country'];?>

                        </option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      </select>
                    </div>
                    <div class="col-lg-3">
                      <button class="btn btn-default" type="submit" name="submitAddressInvoice"><i class="icon-refresh"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</button>
                    </div>
                  </div>
                </form>
              <?php }?>
              <div class="well">
                <div class="row">
                  <div class="col-sm-6">
                    <a class="btn btn-default pull-right" href="?tab=AdminAddresses&amp;id_address=<?php echo $_smarty_tpl->tpl_vars['addresses']->value['invoice']->id;?>
&amp;addaddress&amp;realedit=1&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;address_type=2&amp;back=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
&amp;token=<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminAddresses'),$_smarty_tpl ) );?>
">
                      <i class="icon-pencil"></i>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                    </a>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayAddressDetail'][0], array( array('address'=>$_smarty_tpl->tpl_vars['addresses']->value['invoice'],'newLine'=>'<br />'),$_smarty_tpl ) );?>

                    <?php if ($_smarty_tpl->tpl_vars['addresses']->value['invoice']->other) {?>
                      <hr /><?php echo $_smarty_tpl->tpl_vars['addresses']->value['invoice']->other;?>
<br />
                    <?php }?>
                  </div>
                  <div class="col-sm-6 hidden-print">
                    <div id="map-invoice-canvas" style="height: 190px"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php echo '<script'; ?>
>
          $('#tabAddresses a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        <?php echo '</script'; ?>
>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-envelope"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Messages','d'=>'Admin.Global'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo sizeof($_smarty_tpl->tpl_vars['customer_thread_message']->value);?>
</span>
        </div>
        <?php if ((sizeof($_smarty_tpl->tpl_vars['messages']->value))) {?>
          <div class="panel panel-highlighted">
            <div class="message-item">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
                <div class="message-avatar">
                  <div class="avatar-md">
                    <i class="icon-user icon-2x"></i>
                  </div>
                </div>
                <div class="message-body">

                  <span class="message-date">&nbsp;<i class="icon-calendar"></i>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['message']->value['date_add']),$_smarty_tpl ) );?>
 -
                  </span>
                  <h4 class="message-item-heading">
                    <?php if ((call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value['elastname'],'html','UTF-8' )))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value['efirstname'],'html','UTF-8' ));?>

                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value['elastname'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value['cfirstname'],'html','UTF-8' ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value['clastname'],'html','UTF-8' ));?>

                    <?php }?>
                    <?php if (($_smarty_tpl->tpl_vars['message']->value['private'] == 1)) {?>
                      <span class="badge badge-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Private','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span>
                    <?php }?>
                  </h4>
                  <p class="message-item-text">
                    <?php echo nl2br(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['message']->value['message'],'html','UTF-8' )));?>

                  </p>
                </div>
                              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
          </div>
        <?php }?>
        <div id="messages" class="well hidden-print">
          <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_SERVER['REQUEST_URI'],'html','UTF-8' ));?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
" method="post" onsubmit="if (getE('visibility').checked == true) return confirm('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to send this message to the customer?','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>
');">
            <div id="message" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose a standard message','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</label>
                <div class="col-lg-9">
                  <select class="chosen form-control" name="order_message" id="order_message" onchange="orderOverwriteMessage(this, '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you want to overwrite your existing message?','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>
')">
                    <option value="0" selected="selected">-</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderMessages']->value, 'orderMessage');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['orderMessage']->value) {
?>
                    <option value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['orderMessage']->value['message'],'html','UTF-8' ));?>
"><?php echo $_smarty_tpl->tpl_vars['orderMessage']->value['name'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                  <p class="help-block">
                    <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrderMessage'),'html','UTF-8' ));?>
">
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure predefined messages','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                      <i class="icon-external-link"></i>
                    </a>
                  </p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Display to customer?','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</label>
                <div class="col-lg-9">
                  <span class="switch prestashop-switch fixed-width-lg">
                    <input type="radio" name="visibility" id="visibility_on" value="0" />
                    <label for="visibility_on">
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl ) );?>

                    </label>
                    <input type="radio" name="visibility" id="visibility_off" value="1" checked="checked" />
                    <label for="visibility_off">
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl ) );?>

                    </label>
                    <a class="slide-button btn"></a>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Message','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</label>
                <div class="col-lg-9">
                  <textarea id="txt_msg" class="textarea-autosize" name="message"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( Tools::getValue('message'),'html','UTF-8' ));?>
</textarea>
                  <p id="nbchars"></p>
                </div>
              </div>


              <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
              <input type="hidden" name="id_customer" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id_customer;?>
" />
              <button type="submit" id="submitMessage" class="btn btn-primary pull-right" name="submitMessage">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Send message','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </button>
              <a class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads',true,array(),array('id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id))),'html','UTF-8' ));?>
">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Show all messages','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                <i class="icon-external-link"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayAdminOrderRight",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl ) );?>

    </div>
  </div>
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>"displayAdminOrder",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl ) );?>

  <div class="row" id="start_products">
    <div class="col-lg-12">
      <form class="container-command-top-spacing" action="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
" method="post" onsubmit="return orderDeleteProduct('<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This product cannot be returned.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quantity to cancel is greater than quantity available.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>
');">
        <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
        <div style="display: none">
          <input type="hidden" value="<?php echo implode($_smarty_tpl->tpl_vars['order']->value->getWarehouseList());?>
" id="warehouse_list" />
        </div>

        <div class="panel">
          <div class="panel-heading">
            <i class="icon-shopping-cart"></i>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Products','d'=>'Admin.Global'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
</span>
          </div>
          <div id="refundForm">
          <!--
            <a href="#" class="standard_refund"><img src="../img/admin/add.gif" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Process a standard refund'),$_smarty_tpl ) );?>
" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Process a standard refund'),$_smarty_tpl ) );?>
</a>
            <a href="#" class="partial_refund"><img src="../img/admin/add.gif" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Process a partial refund'),$_smarty_tpl ) );?>
" /> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Process a partial refund'),$_smarty_tpl ) );?>
</a>
          -->
          </div>

          <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "TaxMethod", null, null);?>
            <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_EXC'))) {?>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tax excluded','d'=>'Admin.Global'),$_smarty_tpl ) );?>

            <?php } else { ?>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tax included','d'=>'Admin.Global'),$_smarty_tpl ) );?>

            <?php }?>
          <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
          <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_EXC'))) {?>
            <input type="hidden" name="TaxMethod" value="0">
          <?php } else { ?>
            <input type="hidden" name="TaxMethod" value="1">
          <?php }?>
          <div class="table-responsive">
            <table class="table" id="orderProducts">
              <thead>
                <tr>
                  <th></th>
                  <th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span></th>
                  <th>
                    <span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price per unit','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl ) );?>
</span>
                    <small class="text-muted"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'TaxMethod');?>
</small>
                  </th>
                  <th class="text-center"><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Qty','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span></th>
                  <?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?><th><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Warehouse'),$_smarty_tpl ) );?>
</span></th><?php }?>
                  <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?><th class="text-center"><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refunded'),$_smarty_tpl ) );?>
</span></th><?php }?>
                  <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() || $_smarty_tpl->tpl_vars['order']->value->hasProductReturned())) {?>
                    <th class="text-center"><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Returned','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span></th>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['stock_location_is_available']->value) {?><th class="text-center"><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Stock location','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span></th><?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><th class="text-center"><span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Available quantity','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span></th><?php }?>
                  <th>
                    <span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</span>
                    <small class="text-muted"><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'TaxMethod');?>
</small>
                  </th>
                  <th style="display: none;" class="add_product_fields"></th>
                  <th style="display: none;" class="edit_product_fields"></th>
                  <th style="display: none;" class="standard_refund_fields">
                    <i class="icon-minus-sign"></i>
                    <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() || $_smarty_tpl->tpl_vars['order']->value->hasBeenShipped())) {?>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                    <?php } elseif (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                    <?php } else { ?>
                      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

                    <?php }?>
                  </th>
                  <th style="display:none" class="partial_refund_fields">
                    <span class="title_box "><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partial refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</span>
                  </th>
                  <?php if (!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()) {?>
                  <th></th>
                  <?php }?>
                </tr>
              </thead>
              <tbody>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
                                <?php $_smarty_tpl->_subTemplateRender('file:controllers/orders/_customized_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                <?php $_smarty_tpl->_subTemplateRender('file:controllers/orders/_product_line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:controllers/orders/_new_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
              <?php }?>
              </tbody>
            </table>
          </div>

          <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
          <div class="row-margin-bottom row-margin-top order_action">
          <?php if (!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()) {?>
            <button type="button" id="add_product" class="btn btn-default">
              <i class="icon-plus-sign"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a product','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </button>
          <?php }?>
            <button id="add_voucher" class="btn btn-default" type="button" >
              <i class="icon-ticket"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a new discount','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </button>
          </div>
          <?php }?>
          <div class="clear">&nbsp;</div>
          <div class="row">
            <div class="col-xs-6">
              <div class="alert alert-warning">
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For this customer group, prices are displayed as: [1]%tax_method%[/1]','sprintf'=>array('%tax_method%'=>$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'TaxMethod'),'[1]'=>'<strong>','[/1]'=>'</strong>'),'d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>

                <?php if (!Configuration::get('PS_ORDER_RETURN')) {?>
                  <br/><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Merchandise returns are disabled','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl ) );?>
</strong>
                <?php }?>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="panel panel-vouchers" style="<?php if (!sizeof($_smarty_tpl->tpl_vars['discounts']->value)) {?>display:none;<?php }?>">
                <?php if ((sizeof($_smarty_tpl->tpl_vars['discounts']->value) || $_smarty_tpl->tpl_vars['can_edit']->value)) {?>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>
                          <span class="title_box ">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Discount name','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                          </span>
                        </th>
                        <th>
                          <span class="title_box ">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Value','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                          </span>
                        </th>
                        <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                        <th></th>
                        <?php }?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['discounts']->value, 'discount');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->value) {
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>
</td>
                        <td>
                        <?php if ($_smarty_tpl->tpl_vars['discount']->value['value'] != 0.00) {?>
                          -
                        <?php }?>
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                        <td>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;submitDeleteVoucher&amp;id_order_cart_rule=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_order_cart_rule'];?>
&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
">
                            <i class="icon-minus-sign"></i>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete voucher','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                          </a>
                        </td>
                        <?php }?>
                      </tr>
                      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                  </table>
                </div>
                <div class="current-edit" id="voucher_form" style="display:none;">
                  <?php $_smarty_tpl->_subTemplateRender('file:controllers/orders/_discount_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <?php }?>
              </div>
              <div class="panel panel-total">
                <div class="table-responsive">
                  <table class="table">
                                        <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_EXC'))) {?>
                      <?php $_smarty_tpl->_assignInScope('order_product_price', ($_smarty_tpl->tpl_vars['order']->value->total_products));?>
                      <?php $_smarty_tpl->_assignInScope('order_discount_price', $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl);?>
                      <?php $_smarty_tpl->_assignInScope('order_wrapping_price', $_smarty_tpl->tpl_vars['order']->value->total_wrapping_tax_excl);?>
                      <?php $_smarty_tpl->_assignInScope('order_shipping_price', $_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl);?>
                      <?php $_smarty_tpl->_assignInScope('shipping_refundable', $_smarty_tpl->tpl_vars['shipping_refundable_tax_excl']->value);?>
                    <?php } else { ?>
                      <?php $_smarty_tpl->_assignInScope('order_product_price', $_smarty_tpl->tpl_vars['order']->value->total_products_wt);?>
                      <?php $_smarty_tpl->_assignInScope('order_discount_price', $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl);?>
                      <?php $_smarty_tpl->_assignInScope('order_wrapping_price', $_smarty_tpl->tpl_vars['order']->value->total_wrapping_tax_incl);?>
                      <?php $_smarty_tpl->_assignInScope('order_shipping_price', $_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_incl);?>
                      <?php $_smarty_tpl->_assignInScope('shipping_refundable', $_smarty_tpl->tpl_vars['shipping_refundable_tax_incl']->value);?>
                    <?php }?>
                    <tr id="total_products">
                      <td class="text-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Products:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</td>
                      <td class="amount text-right nowrap">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order_product_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <tr id="total_discounts" <?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl == 0) {?>style="display: none;"<?php }?>>
                      <td class="text-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Discounts','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</td>
                      <td class="amount text-right nowrap">
                        -<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order_discount_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <tr id="total_wrapping" <?php if ($_smarty_tpl->tpl_vars['order']->value->total_wrapping_tax_incl == 0) {?>style="display: none;"<?php }?>>
                      <td class="text-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wrapping','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</td>
                      <td class="amount text-right nowrap">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order_wrapping_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <tr id="total_shipping">
                      <td class="text-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping','d'=>'Admin.Catalog.Feature'),$_smarty_tpl ) );?>
</td>
                      <td class="amount text-right nowrap" >
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order_shipping_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

                          </div>
                          <input type="text" name="partialRefundShippingCost" value="0" />
                        </div>
                        <p class="help-block"><i class="icon-warning-sign"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(Max %s %s)','sprintf'=>array(Tools::displayPrice(Tools::ps_round($_smarty_tpl->tpl_vars['shipping_refundable']->value,2),$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'TaxMethod')),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                        </p>
                      </td>
                    </tr>
                    <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod() == @constant('PS_TAX_EXC'))) {?>
                    <tr id="total_taxes">
                      <td class="text-right"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Taxes','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</td>
                      <td class="amount text-right nowrap" ><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_excl),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>
</td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('order_total_price', $_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl);?>
                    <tr id="total_order">
                      <td class="text-right"><strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</strong></td>
                      <td class="amount text-right nowrap">
                        <strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['order_total_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>
</strong>
                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div style="display: none;" class="standard_refund_fields form-horizontal panel">
            <div class="form-group">
              <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() && Configuration::get('PS_ORDER_RETURN'))) {?>
              <p class="checkbox">
                <label for="reinjectQuantities">
                  <input type="checkbox" id="reinjectQuantities" name="reinjectQuantities" />
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Re-stock products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </label>
              </p>
              <?php }?>
              <?php if (((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() && $_smarty_tpl->tpl_vars['order']->value->hasBeenPaid()) || ($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() && Configuration::get('PS_ORDER_RETURN')))) {?>
              <p class="checkbox">
                <label for="generateCreditSlip">
                  <input type="checkbox" id="generateCreditSlip" name="generateCreditSlip" onclick="toggleShippingCost()" />
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate a credit slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </label>
              </p>
              <p class="checkbox">
                <label for="generateDiscount">
                  <input type="checkbox" id="generateDiscount" name="generateDiscount" onclick="toggleShippingCost()" />
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate a voucher','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </label>
              </p>
              <p class="checkbox" id="spanShippingBack" style="display:none;">
                <label for="shippingBack">
                  <input type="checkbox" id="shippingBack" name="shippingBack" />
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Repay shipping costs','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </label>
              </p>
              <?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl > 0 || $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl > 0) {?>
              <br/><p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This order has been partially paid by voucher. Choose the amount you want to refund:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</p>
              <p class="radio">
                <label id="lab_refund_total_1" for="refund_total_1">
                  <input type="radio" value="0" name="refund_total_voucher_off" id="refund_total_1" checked="checked" />
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Include amount of initial voucher: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </label>
              </p>
              <p class="radio">
                <label id="lab_refund_total_2" for="refund_total_2">
                  <input type="radio" value="1" name="refund_total_voucher_off" id="refund_total_2"/>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Exclude amount of initial voucher: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </label>
              </p>
              <div class="nowrap radio-inline">
                <label id="lab_refund_total_3" class="pull-left" for="refund_total_3">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount of your choice: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                  <input type="radio" value="2" name="refund_total_voucher_off" id="refund_total_3"/>
                </label>
                <div class="input-group col-lg-1 pull-left">
                  <div class="input-group-addon">
                    <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

                  </div>
                  <input type="text" class="input fixed-width-md" name="refund_total_voucher_choose" value="0"/>
                </div>
              </div>
              <?php }?>
            <?php }?>
            </div>
            <?php if ((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() || ($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered() && Configuration::get('PS_ORDER_RETURN')))) {?>
            <div class="row">
              <input type="submit" name="cancelProduct" value="<?php if ($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return products'),$_smarty_tpl ) );
} elseif ($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid()) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refund products'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel products'),$_smarty_tpl ) );
}?>" class="btn btn-default" />
            </div>
            <?php }?>
          </div>
          <div style="display:none;" class="partial_refund_fields">
            <p class="checkbox">
              <label for="reinjectQuantitiesRefund">
                <input type="checkbox" id="reinjectQuantitiesRefund" name="reinjectQuantities" />
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Re-stock products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </label>
            </p>
            <p class="checkbox">
              <label for="generateDiscountRefund">
                <input type="checkbox" id="generateDiscountRefund" name="generateDiscountRefund" onclick="toggleShippingCost()" />
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate a voucher','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </label>
            </p>
            <?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl > 0 || $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl > 0) {?>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This order has been partially paid by voucher. Choose the amount you want to refund: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</p>
            <p class="radio">
              <label id="lab_refund_1" for="refund_1">
                <input type="radio" value="0" name="refund_voucher_off" id="refund_1" checked="checked" />
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product(s) price: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </label>
            </p>
            <p class="radio">
              <label id="lab_refund_2" for="refund_2">
                <input type="radio" value="1" name="refund_voucher_off" id="refund_2"/>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product(s) price, excluding amount of initial voucher: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

              </label>
            </p>
            <div class="nowrap radio-inline">
                <label id="lab_refund_3" class="pull-left" for="refund_3">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount of your choice: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                  <input type="radio" value="2" name="refund_voucher_off" id="refund_3"/>
                </label>
                <div class="input-group col-lg-1 pull-left">
                  <div class="input-group-addon">
                    <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

                  </div>
                  <input type="text" class="input fixed-width-md" name="refund_voucher_choose" value="0"/>
                </div>
              </div>
            <?php }?>
            <br/>
            <button type="submit" name="partialRefund" class="btn btn-default">
              <i class="icon-check"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Partial refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <!-- Sources block -->
      <?php if ((sizeof($_smarty_tpl->tpl_vars['sources']->value))) {?>
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-globe"></i>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sources','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['sources']->value);?>
</span>
        </div>
        <ul <?php if (sizeof($_smarty_tpl->tpl_vars['sources']->value) > 3) {?>style="height: 200px; overflow-y: scroll;"<?php }?>>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sources']->value, 'source');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['source']->value) {
?>
          <li>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0], array( array('date'=>$_smarty_tpl->tpl_vars['source']->value['date_add'],'full'=>true),$_smarty_tpl ) );?>
<br />
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</b><?php if ($_smarty_tpl->tpl_vars['source']->value['http_referer'] != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['source']->value['http_referer'];?>
"><?php echo smarty_modifier_regex_replace(parse_url($_smarty_tpl->tpl_vars['source']->value['http_referer'],@constant('PHP_URL_HOST')),'/^www./','');?>
</a><?php } else { ?>-<?php }?><br />
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'To','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>
</b> <a href="http://<?php echo $_smarty_tpl->tpl_vars['source']->value['request_uri'];?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['source']->value['request_uri'],100,'...' ));?>
</a><br />
            <?php if ($_smarty_tpl->tpl_vars['source']->value['keywords']) {?><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Keywords'),$_smarty_tpl ) );?>
</b> <?php echo $_smarty_tpl->tpl_vars['source']->value['keywords'];?>
<br /><?php }?><br />
          </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
      <?php }?>

      <!-- linked orders block -->
      <?php if (count($_smarty_tpl->tpl_vars['order']->value->getBrother()) > 0) {?>
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-cart"></i>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Linked orders','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order no. ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                </th>
                <th>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl ) );?>

                </th>
                <th>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl ) );?>

                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value->getBrother(), 'brother_order');
$_smarty_tpl->tpl_vars['brother_order']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['brother_order']->value) {
$_smarty_tpl->tpl_vars['brother_order']->index++;
$_smarty_tpl->tpl_vars['brother_order']->first = !$_smarty_tpl->tpl_vars['brother_order']->index;
$__foreach_brother_order_17_saved = $_smarty_tpl->tpl_vars['brother_order'];
?>
              <tr>
                <td>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
">#<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
</a>
                </td>
                <td>
                  <?php echo $_smarty_tpl->tpl_vars['brother_order']->value->getCurrentOrderState()->name[$_smarty_tpl->tpl_vars['current_id_lang']->value];?>

                </td>
                <td>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0], array( array('price'=>$_smarty_tpl->tpl_vars['brother_order']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl ) );?>

                </td>
                <td>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
&amp;token=<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_GET['token'],'html','UTF-8' ));?>
">
                    <i class="icon-eye-open"></i>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl ) );?>

                  </a>
                </td>
              </tr>
              <?php
$_smarty_tpl->tpl_vars['brother_order'] = $__foreach_brother_order_17_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
          </table>
        </div>
      </div>
      <?php }?>
    </div>
  </div>

  <?php echo '<script'; ?>
 type="text/javascript">
    var geocoder = new google.maps.Geocoder();
    var delivery_map, invoice_map;

    $(document).ready(function()
    {
      $(".textarea-autosize").autosize();

      geocoder.geocode({
        address: '<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->address1,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->postcode,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->city,'\'');
if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name) && $_smarty_tpl->tpl_vars['addresses']->value['delivery']->id_state) {?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name,'\'');
}?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->country,'\'');?>
'
        }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK)
        {
          delivery_map = new google.maps.Map(document.getElementById('map-delivery-canvas'), {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: results[0].geometry.location
          });
          var delivery_marker = new google.maps.Marker({
            map: delivery_map,
            position: results[0].geometry.location,
            url: 'http://maps.google.com?q=<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->address1);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->postcode);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->city);
if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name) && $_smarty_tpl->tpl_vars['addresses']->value['delivery']->id_state) {?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name);
}?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->country);?>
'
          });
          google.maps.event.addListener(delivery_marker, 'click', function() {
            window.open(delivery_marker.url);
          });
        }
      });

      geocoder.geocode({
        address: '<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->address1,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->postcode,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->city,'\'');
if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name) && $_smarty_tpl->tpl_vars['addresses']->value['invoice']->id_state) {?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name,'\'');
}?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->country,'\'');?>
'
        }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK)
        {
          invoice_map = new google.maps.Map(document.getElementById('map-invoice-canvas'), {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: results[0].geometry.location
          });
          invoice_marker = new google.maps.Marker({
            map: invoice_map,
            position: results[0].geometry.location,
            url: 'http://maps.google.com?q=<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->address1);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->postcode);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->city);
if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name) && $_smarty_tpl->tpl_vars['addresses']->value['invoice']->id_state) {?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name);
}?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->country);?>
'
          });
          google.maps.event.addListener(invoice_marker, 'click', function() {
            window.open(invoice_marker.url);
          });
        }
      });

      $('.datepicker').datetimepicker({
        prevText: '',
        nextText: '',
        dateFormat: 'yy-mm-dd',
        // Define a custom regional settings in order to use PrestaShop translation tools
        currentText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Now','js'=>1),$_smarty_tpl ) );?>
',
        closeText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Done','js'=>1),$_smarty_tpl ) );?>
',
        ampm: false,
        amNames: ['AM', 'A'],
        pmNames: ['PM', 'P'],
        timeFormat: 'hh:mm:ss tt',
        timeSuffix: '',
        timeOnlyTitle: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose Time','js'=>1),$_smarty_tpl ) );?>
',
        timeText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Time','js'=>1),$_smarty_tpl ) );?>
',
        hourText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hour','js'=>1),$_smarty_tpl ) );?>
',
        minuteText: '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Minute','js'=>1),$_smarty_tpl ) );?>
'
      });
    });

    // Fix wrong maps center when map is hidden
    $('#tabAddresses').click(function(){
      if (delivery_map) {
        x = delivery_map.getZoom();
        c = delivery_map.getCenter();
        google.maps.event.trigger(delivery_map, 'resize');
        delivery_map.setZoom(x);
        delivery_map.setCenter(c);
      }

      if (invoice_map) {
        x = invoice_map.getZoom();
        c = invoice_map.getCenter();
        google.maps.event.trigger(invoice_map, 'resize');
        invoice_map.setZoom(x);
        invoice_map.setCenter(c);
      }
    });
  <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "override_tpl"} */
}
