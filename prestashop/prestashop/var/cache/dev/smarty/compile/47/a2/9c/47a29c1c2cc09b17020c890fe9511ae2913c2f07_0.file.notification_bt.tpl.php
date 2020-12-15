<?php
/* Smarty version 3.1.33, created on 2020-12-01 17:43:23
  from '/var/www/html/modules/gamification/views/templates/hook/notification_bt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc672ab599738_84130152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47a29c1c2cc09b17020c890fe9511ae2913c2f07' => 
    array (
      0 => '/var/www/html/modules/gamification/views/templates/hook/notification_bt.tpl',
      1 => 1606833894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc672ab599738_84130152 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
	var current_id_tab = <?php echo intval($_smarty_tpl->tpl_vars['current_id_tab']->value);?>
;
	var current_level_percent = <?php echo intval($_smarty_tpl->tpl_vars['current_level_percent']->value);?>
;
	var current_level = <?php echo intval($_smarty_tpl->tpl_vars['current_level']->value);?>
;
	var gamification_level = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Level','mod'=>'gamification','js'=>1),$_smarty_tpl ) );?>
';
	var advice_hide_url = '<?php echo $_smarty_tpl->tpl_vars['advice_hide_url']->value;?>
';
	var hide_advice = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do you really want to hide this advice?','mod'=>'gamification','js'=>1),$_smarty_tpl ) );?>
';

	$('#dropdown_gamification .notifs_panel_header, #dropdown_gamification .tab-content').click(function () {
		return false;
	});

	$('#dropdown_gamification .panel-footer').click(function (elt) {
		window.location.href = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminGamification');?>
';
	});

	$('#gamification_tab li').click(function () {
		gamificationDisplayTab($(this).children('a'));
		return false;
	});

	function gamificationDisplayTab(elt)
	{
		$('#gamification_tab li, .gamification-tab-pane').removeClass('active');
		$(elt).parent('li').addClass('active');
		$('#'+$(elt).data('target')).addClass('active');
	}

<?php echo '</script'; ?>
>
<li id="gamification_notif" style="background:none" class="dropdown">
	<a href="javascript:void(0);" class="dropdown-toggle gamification_notif" data-toggle="dropdown">
		<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getBaseLink();?>
modules/gamification/views/img/trophy.png" alt="<?php echo intval($_smarty_tpl->tpl_vars['notification']->value);?>
"/>
		<span id="gamification_notif_number_wrapper" class="notifs_badge">
			<span id="gamification_notif_value"><?php echo intval($_smarty_tpl->tpl_vars['notification']->value);?>
</span>
		</span>
	</a>
	<div class="dropdown-menu notifs_dropdown" id="dropdown_gamification">
		<section id="gamification_notif_wrapper" class="notifs_panel">
			<header class="notifs_panel_header">
				<p>
					<span class="notifs-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your Merchant Expertise','mod'=>'gamification'),$_smarty_tpl ) );?>
</span>
					<span class="notifs-level"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Level','mod'=>'gamification'),$_smarty_tpl ) );?>
 <?php echo intval($_smarty_tpl->tpl_vars['current_level']->value);?>
 : <?php echo intval($_smarty_tpl->tpl_vars['current_level_percent']->value);?>
 %</span>
				</p>
			</header>
			<div class="progress">
				<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo intval($_smarty_tpl->tpl_vars['current_level_percent']->value);?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo intval($_smarty_tpl->tpl_vars['current_level_percent']->value);?>
%;">
					<span></span>
				</div>
			</div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="gamification_tab">
				<li class="nav-item active">
					<a class="nav-link" href="#home" data-toggle="tab" data-target="gamification_1" onclick="gamificationDisplayTab(this); return false;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last badge:','mod'=>'gamification'),$_smarty_tpl ) );?>
</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#profile" data-toggle="tab" data-target="gamification_2" onclick="gamificationDisplayTab(this); return false;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next badge:','mod'=>'gamification'),$_smarty_tpl ) );?>
</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane gamification-tab-pane active" id="gamification_1">
					<ul id="gamification_badges_list" style="<?php if (count($_smarty_tpl->tpl_vars['badges_to_display']->value) <= 2) {?> height:170px;<?php }?> padding-left:0">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unlock_badges']->value, 'badge', false, 'i', 'badge_list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['badge']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['badge']->value->id) {?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?> unlocked <?php } else { ?> locked <?php }?>" style="float:left;">
								<span class="<?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?> unlocked_img <?php } else { ?> locked_img <?php }?>" <?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?>style="left: 12px;"<?php }?>></span>
								<div class="gamification_badges_title"><span><?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last badge:','mod'=>'gamification'),$_smarty_tpl ) );?>
 <?php } else { ?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next badge:','mod'=>'gamification'),$_smarty_tpl ) );?>
 <?php }?></span></div>
								<div class="gamification_badges_img" data-placement="<?php if ($_smarty_tpl->tpl_vars['i']->value <= 1) {?>bottom<?php } else { ?>top<?php }?>" data-original-title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value->description,'html','UTF-8' ));?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['badge']->value->getBadgeImgUrl();?>
"></div>
								<div class="gamification_badges_name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value->name,'html','UTF-8' ));?>
</div>
							</li>
						<?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</ul>
				</div>
				<div class="tab-pane gamification-tab-pane" id="gamification_2">
					<ul id="gamification_badges_list" style="<?php if (count($_smarty_tpl->tpl_vars['badges_to_display']->value) <= 2) {?> height:170px;<?php }?> padding-left:0">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['next_badges']->value, 'badge', false, 'i', 'badge_list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['badge']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['badge']->value->id && !$_smarty_tpl->tpl_vars['badge']->value->awb) {?>
							<li class="<?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?> unlocked <?php } else { ?> locked <?php }?>" style="float:left;">
								<span class="<?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?> unlocked_img <?php } else { ?> locked_img <?php }?>" <?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?>style="left: 12px;"<?php }?>></span>
								<div class="gamification_badges_title"><span><?php if ($_smarty_tpl->tpl_vars['badge']->value->validated) {?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last badge:','mod'=>'gamification'),$_smarty_tpl ) );?>
 <?php } else { ?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Next badge:','mod'=>'gamification'),$_smarty_tpl ) );?>
 <?php }?></span></div>
								<div class="gamification_badges_img" data-placement="<?php if ($_smarty_tpl->tpl_vars['i']->value <= 1) {?>bottom<?php } else { ?>top<?php }?>"data-toggle="tooltip" data-original-title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value->description,'html','UTF-8' ));?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['badge']->value->getBadgeImgUrl();?>
"></div>
								<div class="gamification_badges_name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value->name,'html','UTF-8' ));?>
</div>
							</li>
						<?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</ul>
				</div>
			</div>

			<footer class="panel-footer">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminGamification');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View my complete profile','mod'=>'gamification'),$_smarty_tpl ) );?>
 <i class="icon-chevron-right icon-fw"></i><i class="material-icons">chevron_right</i></a>
			</footer>
		</section>
	</div>
</li>
<?php }
}
