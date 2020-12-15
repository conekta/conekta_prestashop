<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:45:05
  from '/var/www/html/modules/conektapaymentsprestashop/views/templates/hook/hook-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc6731170c867_71952978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ff3cbab7ce5a264296ca1ecf7d98340c315764a' => 
    array (
      0 => '/var/www/html/modules/conektapaymentsprestashop/views/templates/hook/hook-header.tpl',
      1 => 1606840983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc6731170c867_71952978 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.conekta.io/iframe/latest/conekta-iframe.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['path']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/js/tokenize.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	var conekta_public_key = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['api_key']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
<?php echo '</script'; ?>
><?php }
}
