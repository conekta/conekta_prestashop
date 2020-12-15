<?php
/* Smarty version 3.1.33, created on 2020-12-01 19:38:26
  from '/var/www/html/backoffice/themes/default/template/helpers/calendar/calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc68da24832b0_64853571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bc50c113339cac68d0f1c6d1ca463d67b7d2cc1' => 
    array (
      0 => '/var/www/html/backoffice/themes/default/template/helpers/calendar/calendar.tpl',
      1 => 1600952248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc68da24832b0_64853571 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="datepicker" class="row row-padding-top hide">
	<div class="col-lg-12">
		<div class="daterangepicker-days">
			<div class="row">
				<?php if ($_smarty_tpl->tpl_vars['is_rtl']->value) {?>
				<div class="col-sm-6 col-lg-4">
					<div class="datepicker2" data-date="<?php echo $_smarty_tpl->tpl_vars['date_to']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
"></div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="datepicker1" data-date="<?php echo $_smarty_tpl->tpl_vars['date_from']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
"></div>
				</div>
				<?php } else { ?>
				<div class="col-sm-6 col-lg-4">
					<div class="datepicker1" data-date="<?php echo $_smarty_tpl->tpl_vars['date_from']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
"></div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="datepicker2" data-date="<?php echo $_smarty_tpl->tpl_vars['date_to']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
"></div>
				</div>
				<?php }?>
				<div class="col-xs-12 col-sm-6 col-lg-4 pull-right">
					<div id='datepicker-form' class='form-inline'>
						<div id='date-range' class='form-date-group'>
							<div  class='form-date-heading'>
								<span class="title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Date range'),$_smarty_tpl ) );?>
</span>
								<?php if (isset($_smarty_tpl->tpl_vars['actions']->value) && count($_smarty_tpl->tpl_vars['actions']->value) > 0) {?>
									<?php if (count($_smarty_tpl->tpl_vars['actions']->value) > 1) {?>
									<button class='btn btn-default btn-xs pull-right dropdown-toggle' data-toggle='dropdown' type="button">
										<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom'),$_smarty_tpl ) );?>

										<i class='icon-angle-down'></i>
									</button>
									<ul class='dropdown-menu'>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['actions']->value, 'action');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['action']->value) {
?>
										<li><a<?php if (isset($_smarty_tpl->tpl_vars['action']->value['href'])) {?> href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
"<?php }
if (isset($_smarty_tpl->tpl_vars['action']->value['class'])) {?> class="<?php echo $_smarty_tpl->tpl_vars['action']->value['class'];?>
"<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['action']->value['icon'])) {?><i class="<?php echo $_smarty_tpl->tpl_vars['action']->value['icon'];?>
"></i> <?php }
echo $_smarty_tpl->tpl_vars['action']->value['label'];?>
</a></li>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</ul>
									<?php } else { ?>
									<a<?php if (isset($_smarty_tpl->tpl_vars['actions']->value[0]['href'])) {?> href="<?php echo $_smarty_tpl->tpl_vars['actions']->value[0]['href'];?>
"<?php }?> class="btn btn-default btn-xs pull-right<?php if (isset($_smarty_tpl->tpl_vars['actions']->value[0]['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['actions']->value[0]['class'];
}?>"><?php if (isset($_smarty_tpl->tpl_vars['actions']->value[0]['icon'])) {?><i class="<?php echo $_smarty_tpl->tpl_vars['actions']->value[0]['icon'];?>
"></i> <?php }
echo $_smarty_tpl->tpl_vars['actions']->value[0]['label'];?>
</a>
									<?php }?>
								<?php }?>
							</div>
							<div class='form-date-body'>
								<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From'),$_smarty_tpl ) );?>
</label>
								<input class='date-input form-control' id='date-start' placeholder='Start' type='text' name="date_from" value="<?php echo $_smarty_tpl->tpl_vars['date_from']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
" tabindex="1" />
								<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to'),$_smarty_tpl ) );?>
</label>
								<input class='date-input form-control' id='date-end' placeholder='End' type='text' name="date_to" value="<?php echo $_smarty_tpl->tpl_vars['date_to']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
" tabindex="2" />
							</div>
						</div>
						<div id="date-compare" class='form-date-group'>
							<div class='form-date-heading'>
								<span class="checkbox-title">
									<label >
										<input type='checkbox' id="datepicker-compare" name="datepicker_compare"<?php if (isset($_smarty_tpl->tpl_vars['compare_date_from']->value) && isset($_smarty_tpl->tpl_vars['compare_date_to']->value)) {?> checked="checked"<?php }?> tabindex="3">
										<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Compare to'),$_smarty_tpl ) );?>

									</label>
								</span>
								<select id="compare-options" class="form-control fixed-width-lg pull-right" name="compare_date_option"<?php if (is_null($_smarty_tpl->tpl_vars['compare_date_from']->value) || is_null($_smarty_tpl->tpl_vars['compare_date_to']->value)) {?> disabled="disabled"<?php }?>>
									<option value="1" <?php if ($_smarty_tpl->tpl_vars['compare_option']->value == 1) {?>selected="selected"<?php }?> label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Previous period'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Previous period'),$_smarty_tpl ) );?>
</option>
									<option value="2" <?php if ($_smarty_tpl->tpl_vars['compare_option']->value == 2) {?>selected="selected"<?php }?> label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Previous Year'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Previous year'),$_smarty_tpl ) );?>
</option>
									<option value="3" <?php if ($_smarty_tpl->tpl_vars['compare_option']->value == 3) {?>selected="selected"<?php }?> label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Custom'),$_smarty_tpl ) );?>
</option>
								</select>
							</div>
							<div class="form-date-body" id="form-date-body-compare"<?php if (is_null($_smarty_tpl->tpl_vars['compare_date_from']->value) || is_null($_smarty_tpl->tpl_vars['compare_date_to']->value)) {?> style="display: none;"<?php }?>>
								<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'From'),$_smarty_tpl ) );?>
</label>
								<input id="date-start-compare" class="date-input form-control" type="text" placeholder="Start" name="compare_date_from" value="<?php echo $_smarty_tpl->tpl_vars['compare_date_from']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
" tabindex="4" />
								<label><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to'),$_smarty_tpl ) );?>
</label>
								<input id="date-end-compare" class="date-input form-control" type="text" placeholder="End" name="compare_date_to" value="<?php echo $_smarty_tpl->tpl_vars['compare_date_to']->value;?>
" data-date-format="<?php echo $_smarty_tpl->tpl_vars['date_format']->value;?>
"
								tabindex="5" />
							</div>
						</div>
						<div class='form-date-actions'>
							<button class='btn btn-link' type='button' id="datepicker-cancel" tabindex="7">
								<i class='icon-remove'></i>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

							</button>
							<button class='btn btn-default pull-right' type='submit' name="submitDateRange" tabindex="6">
								<i class='icon-ok text-success'></i>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Apply','d'=>'Admin.Actions'),$_smarty_tpl ) );?>

							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
	translated_dates = {
		days: ['<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sunday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Monday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tuesday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wednesday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Thursday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Friday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Saturday','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sunday','js'=>1),$_smarty_tpl ) );?>
'],
		daysShort: ['<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sun','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mon','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tue','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Wed','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Thu','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fri','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sat','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sun','js'=>1),$_smarty_tpl ) );?>
'],
		daysMin: ['<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Su','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mo','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tu','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'We','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Th','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fr','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sa','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Su','js'=>1),$_smarty_tpl ) );?>
'],
		months: ['<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'January','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'February','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'March','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'April','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'May','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'June','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'July','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'August','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'September','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'October','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'November','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'December','js'=>1),$_smarty_tpl ) );?>
'],
		monthsShort: ['<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Jan','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Feb','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Mar','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Apr','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'May ','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Jun','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Jul','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Aug','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sep','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Oct','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Nov','js'=>1),$_smarty_tpl ) );?>
', '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Dec','js'=>1),$_smarty_tpl ) );?>
']
	};
<?php echo '</script'; ?>
>
<?php }
}
