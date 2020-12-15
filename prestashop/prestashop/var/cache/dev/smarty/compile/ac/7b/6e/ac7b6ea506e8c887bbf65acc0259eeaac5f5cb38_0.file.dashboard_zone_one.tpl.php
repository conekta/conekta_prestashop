<?php
/* Smarty version 3.1.33, created on 2020-12-01 19:38:26
  from '/var/www/html/modules/dashactivity/views/templates/hook/dashboard_zone_one.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc68da2385b44_77936890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac7b6ea506e8c887bbf65acc0259eeaac5f5cb38' => 
    array (
      0 => '/var/www/html/modules/dashactivity/views/templates/hook/dashboard_zone_one.tpl',
      1 => 1512731161,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc68da2385b44_77936890 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="dashactivity" class="panel widget<?php if ($_smarty_tpl->tpl_vars['allow_push']->value) {?> allow_push<?php }?>">
	<div class="panel-heading">
		<i class="icon-time"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Activity overview','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>

		<span class="panel-heading-action">
			<a class="list-toolbar-btn" href="#" onclick="toggleDashConfig('dashactivity'); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
">
				<i class="process-icon-configure"></i>
			</a>
			<a class="list-toolbar-btn" href="#" onclick="refreshDashboard('dashactivity'); return false;" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Refresh','d'=>'Admin.Actions'),$_smarty_tpl ) );?>
">
				<i class="process-icon-refresh"></i>
			</a>
		</span>
	</div>
	<section id="dashactivity_config" class="dash_config hide">
		<header><i class="icon-wrench"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configuration','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</header>
		<?php echo $_smarty_tpl->tpl_vars['dashactivity_config_form']->value;?>

	</section>
	<section id="dash_live" class="loading">
		<ul class="data_list_large">
			<li>
				<span class="data_label size_l">
					<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8' ));?>
&amp;module=statslive"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Online Visitors','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a>
					<small class="text-muted"><br/>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'in the last %d minutes','sprintf'=>intval($_smarty_tpl->tpl_vars['DASHACTIVITY_VISITOR_ONLINE']->value),'d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>

					</small>
				</span>
				<span class="data_value size_xxl">
					<span id="online_visitor"></span>
				</span>
			</li>
			<li>
				<span class="data_label size_l">
					<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCarts'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Active Shopping Carts','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a>
					<small class="text-muted"><br/>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'in the last %d minutes','sprintf'=>intval($_smarty_tpl->tpl_vars['DASHACTIVITY_CART_ACTIVE']->value),'d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>

					</small>
				</span>
				<span class="data_value size_xxl">
					<span id="active_shopping_cart"></span>
				</span>
			</li>
		</ul>
	</section>
	<section id="dash_pending" class="loading">
		<header><i class="icon-time"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Currently Pending','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</header>
		<ul class="data_list">
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Orders','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_l">
					<span id="pending_orders"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminReturn'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return/Exchanges','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_l">
					<span id="return_exchanges"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCarts'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Abandoned Carts','d'=>'Admin.Global'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_l">
					<span id="abandoned_cart"></span>
				</span>
			</li>
			<?php if (isset($_smarty_tpl->tpl_vars['stock_management']->value) && $_smarty_tpl->tpl_vars['stock_management']->value) {?>
				<li>
					<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminTracking'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Out of Stock Products','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
					<span class="data_value size_l">
						<span id="products_out_of_stock"></span>
					</span>
				</li>
			<?php }?>
		</ul>
	</section>
	<section id="dash_notifications" class="loading">
		<header><i class="icon-exclamation-sign"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Notifications','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl ) );?>
</header>
		<ul class="data_list_vertical">
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New Messages','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_l">
					<span id="new_messages"></span>
				</span>
			</li>
			<?php if (Module::isInstalled('productcomments')) {?>
				<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&amp;configure=productcomments&amp;tab_module=front_office_features&amp;module_name=productcomments"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product Reviews','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
					<span class="data_value size_l">
						<span id="product_reviews"></span>
					</span>
				</li>
			<?php }?>
		</ul>
	</section>
	<section id="dash_customers" class="loading">
		<header><i class="icon-user"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customers & Newsletters','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
 <span class="subtitle small" id="customers-newsletters-subtitle"></span></header>
		<ul class="data_list">
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers'),'html','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New Customers','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_md">
					<span id="new_customers"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8' ));?>
&amp;module=statsnewsletter"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'New Subscriptions','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_md">
					<span id="new_registrations"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&amp;configure=ps_emailsubscription&amp;module_name=ps_emailsubscription"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total Subscribers','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_md">
					<span id="total_suscribers"></span>
				</span>
			</li>
		</ul>
	</section>
	<section id="dash_traffic" class="loading">
		<header>
			<i class="icon-globe"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Traffic','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
 <span class="subtitle small" id="traffic-subtitle"></span>
		</header>
		<ul class="data_list">
			<?php if ($_smarty_tpl->tpl_vars['gapi_mode']->value) {?>
				<li>
					<span class="data_label">
						<img src="../modules/dashactivity/gapi-logo.gif" width="16" height="16" alt=""/> <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8' ));?>
&amp;<?php echo $_smarty_tpl->tpl_vars['gapi_mode']->value;?>
=gapi"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Link to your Google Analytics account','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a>
					</span>
				</li>
			<?php }?>
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8' ));?>
&amp;module=statsforecast"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Visits','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_md">
					<span id="visits"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8' ));?>
&amp;module=statsvisits"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unique Visitors','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</a></span>
				<span class="data_value size_md">
					<span id="unique_visitors"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Traffic Sources','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl ) );?>
</span>
				<ul class="data_list_small" id="dash_traffic_source">
				</ul>
				<div id="dash_traffic_chart2" class='chart with-transitions'>
					<svg></svg>
				</div>
			</li>
		</ul>
	</section>
</section>
<?php echo '<script'; ?>
 type="text/javascript">
	date_subtitle = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_subtitle']->value,'html','UTF-8' ));?>
";
	date_format   = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['date_format']->value,'html','UTF-8' ));?>
";
<?php echo '</script'; ?>
>
<?php }
}
