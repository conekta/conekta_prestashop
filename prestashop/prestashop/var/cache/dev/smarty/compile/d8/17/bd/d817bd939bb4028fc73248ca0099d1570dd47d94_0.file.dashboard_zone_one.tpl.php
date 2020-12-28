<?php
/* Smarty version 3.1.33, created on 2020-12-01 19:38:26
  from '/var/www/html/modules/psaddonsconnect/views/templates/hook/dashboard_zone_one.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc68da22dc220_34425826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd817bd939bb4028fc73248ca0099d1570dd47d94' => 
    array (
      0 => '/var/www/html/modules/psaddonsconnect/views/templates/hook/dashboard_zone_one.tpl',
      1 => 1606833899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc68da22dc220_34425826 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="psaddonsconnect" class="panel widget">
	<div class="panel-heading">
		<i class="icon-puzzle-piece"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'TIPS & UPDATES','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>

	</div>

    <?php if ($_smarty_tpl->tpl_vars['logged_on_addons17']->value == 0 && $_smarty_tpl->tpl_vars['logged_on_addons']->value == 0) {?>
    	<span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connect to your account right now to enjoy updates (security and features) on all of your modules.','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 </span>  <p><br>
		<span> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Once you are connected, you will also enjoy weekly tips directly from your back office.','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 </span> <p><br>

		<!-- Check PS VERSION TO SHOW OR NOT THE MODAL-->
	    <?php if ($_smarty_tpl->tpl_vars['ps_version']->value == 1) {?>
			<!-- PS17 MODAL-->
		    <div align="center">
		        <a class="btn btn-primary" style="white-space: unset;" href="#" data-toggle="modal" data-target="#ps-module-modal-addons-connect">
		            <i class="icon-unlock"> </i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CONNECT TO PRESTASHOP MARKETPLACE','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>

		        </a>
		    </div>
		    <div id="ps-module-modal-addons-connect" class="modal  modal-vcenter fade" role="dialog">
		        <div class="modal-dialog">
		            <!-- Modal content-->
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                    <h2 class="modal-title module-modal-title"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connect to PrestaShop marketplace','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 </h2>
		                </div>
		                <div class="modal-body">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <p>
		                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Link your shop to your Addons account to automatically receive important updates for the modules you purchased. Don\'t have an account yet ?','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>

		                                <a href="http://addons.prestashop.com/authentication.php?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-<?php echo $_smarty_tpl->tpl_vars['currentLangIsoCode']->value;?>
&utm_content=signup" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign up now','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
</a>
		                            </p><br>
		                            <form id="ps-addons-connect-form"  action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url_connexion']->value,'htmlall','UTF-8' ));?>
" method="POST">
		                                <div class="form-group">
		                                    <label for="ps-module-addons-connect-email"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email address','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
</label>
		                                    <input name="username_addons" type="email" class="form-control" id="ps-module-addons-connect-email" placeholder="Email">
		                                </div><br>
		                                <div class="form-group">
		                                    <label for="ps-module-addons-connect-password"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
</label>
		                                    <input name="password_addons" type="password" class="form-control" id="ps-module-addons-connect-password" placeholder="Password">
		                                </div><br>
		                                <div class="checkbox">
		                                    <label>
		                                        <input name="addons_remember_me" type="checkbox"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Remember me','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>

		                                    </label>
		                                </div>
		                                <button type="submit" class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'LET\'S GO !','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
</button>
		                                <button id="ps-addons_login_btn" class="btn btn-primary-reverse btn-lg onclick" style="display:none;"></button>
		                            </form>
		                            <p>
		                                <a href="http://addons.prestashop.com/password.php?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-<?php echo $_smarty_tpl->tpl_vars['currentLangIsoCode']->value;?>
&utm_content=password" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Forgot your password?','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
</a>
		                            </p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    <?php } else { ?>
	    	<!-- SHOW 1.6 MODAL -->
			<div align="center">
				<a class="btn btn-info" style="white-space: unset;" href="#" onclick="psGetModal();">
					<i class="icon-unlock"> </i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'CONNECT TO PRESTASHOP MARKETPLACE','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>

				</a>
			</div>
		<?php }?>
    <?php } else { ?>
    	<!-- CONNECTED TO ADDONS -->
      <?php if ($_smarty_tpl->tpl_vars['advice']->value) {?>
        <header>
          <h4> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tip of the moment','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 </h4><p><br>
        </header>
        <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['img_path']->value,'htmlall','UTF-8' ));?>
lamp-selection-moment.jpg" alt="lamp" class="pull-left">

        <div class="row">
          <div class="col-md-10">
            <p>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['advice']->value,'quotes','UTF-8' ));?>

            </p>
          </div>
        </div>

        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_advice']->value,'htmlall','UTF-8' ));?>
" target="_blank" class="pull-right"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'See the entire selection','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 > </a> <p><br>
      <?php }?>
      <h4> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Practical links','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 </h4>

      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Modules to','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['practical_links']->value['traffic'],'htmlall','UTF-8' ));?>
" target="_blank"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'increase your traffic','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 ></a><br>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Modules to','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['practical_links']->value['conversion'],'htmlall','UTF-8' ));?>
" target="_blank"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'boost your conversions','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 ></a><br>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Modules to','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['practical_links']->value['averageCart'],'htmlall','UTF-8' ));?>
" target="_blank"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'increase your clients\' average cart','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 ></a><br>
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Selection of modules recommended for','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['practical_links']->value['businessSector'],'htmlall','UTF-8' ));?>
" target="_blank"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'your business sector','mod'=>'psaddonsconnect'),$_smarty_tpl ) );?>
 ></a><br>
    <?php }?>
</section>

<?php }
}
