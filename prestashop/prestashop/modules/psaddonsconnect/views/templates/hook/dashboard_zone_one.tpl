{**
* 2007-2019 PrestaShop SA and Contributors
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* https://opensource.org/licenses/AFL-3.0
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to https://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2019 PrestaShop SA and Contributors
* @license   https://opensource.org/licenses/AFL-3.0  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

<section id="psaddonsconnect" class="panel widget">
	<div class="panel-heading">
		<i class="icon-puzzle-piece"></i> {l s='TIPS & UPDATES' mod='psaddonsconnect'}
	</div>

    {if $logged_on_addons17 == 0 && $logged_on_addons == 0}
    	<span> {l s='Connect to your account right now to enjoy updates (security and features) on all of your modules.' mod='psaddonsconnect'} </span>  <p><br>
		<span> {l s='Once you are connected, you will also enjoy weekly tips directly from your back office.' mod='psaddonsconnect'} </span> <p><br>

		<!-- Check PS VERSION TO SHOW OR NOT THE MODAL-->
	    {if	$ps_version == 1}
			<!-- PS17 MODAL-->
		    <div align="center">
		        <a class="btn btn-primary" style="white-space: unset;" href="#" data-toggle="modal" data-target="#ps-module-modal-addons-connect">
		            <i class="icon-unlock"> </i> {l s='CONNECT TO PRESTASHOP MARKETPLACE' mod='psaddonsconnect'}
		        </a>
		    </div>
		    <div id="ps-module-modal-addons-connect" class="modal  modal-vcenter fade" role="dialog">
		        <div class="modal-dialog">
		            <!-- Modal content-->
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                    <h2 class="modal-title module-modal-title"> {l s='Connect to PrestaShop marketplace' mod='psaddonsconnect'} </h2>
		                </div>
		                <div class="modal-body">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <p>
		                                {l s='Link your shop to your Addons account to automatically receive important updates for the modules you purchased. Don\'t have an account yet ?' mod='psaddonsconnect'}
		                                <a href="http://addons.prestashop.com/authentication.php?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-{$currentLangIsoCode}&utm_content=signup" target="_blank">{l s='Sign up now' mod='psaddonsconnect'}</a>
		                            </p><br>
		                            <form id="ps-addons-connect-form"  action="{$url_connexion|escape:'htmlall':'UTF-8'}" method="POST">
		                                <div class="form-group">
		                                    <label for="ps-module-addons-connect-email">{l s='Email address' mod='psaddonsconnect'}</label>
		                                    <input name="username_addons" type="email" class="form-control" id="ps-module-addons-connect-email" placeholder="Email">
		                                </div><br>
		                                <div class="form-group">
		                                    <label for="ps-module-addons-connect-password">{l s='Password' mod='psaddonsconnect'}</label>
		                                    <input name="password_addons" type="password" class="form-control" id="ps-module-addons-connect-password" placeholder="Password">
		                                </div><br>
		                                <div class="checkbox">
		                                    <label>
		                                        <input name="addons_remember_me" type="checkbox"> {l s='Remember me' mod='psaddonsconnect'}
		                                    </label>
		                                </div>
		                                <button type="submit" class="btn btn-primary">{l s='LET\'S GO !' mod='psaddonsconnect'}</button>
		                                <button id="ps-addons_login_btn" class="btn btn-primary-reverse btn-lg onclick" style="display:none;"></button>
		                            </form>
		                            <p>
		                                <a href="http://addons.prestashop.com/password.php?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-{$currentLangIsoCode}&utm_content=password" target="_blank">{l s='Forgot your password?' mod='psaddonsconnect'}</a>
		                            </p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    {else}
	    	<!-- SHOW 1.6 MODAL -->
			<div align="center">
				<a class="btn btn-info" style="white-space: unset;" href="#" onclick="psGetModal();">
					<i class="icon-unlock"> </i> {l s='CONNECT TO PRESTASHOP MARKETPLACE' mod='psaddonsconnect'}
				</a>
			</div>
		{/if}
    {else}
    	<!-- CONNECTED TO ADDONS -->
      {if $advice }
        <header>
          <h4> {l s='Tip of the moment' mod='psaddonsconnect'} </h4><p><br>
        </header>
        <img src="{$img_path|escape:'htmlall':'UTF-8'}lamp-selection-moment.jpg" alt="lamp" class="pull-left">

        <div class="row">
          <div class="col-md-10">
            <p>
              {$advice|escape:'quotes':'UTF-8'}
            </p>
          </div>
        </div>

        <a href="{$link_advice|escape:'htmlall':'UTF-8'}" target="_blank" class="pull-right"> {l s='See the entire selection' mod='psaddonsconnect'} > </a> <p><br>
      {/if}
      <h4> {l s='Practical links' mod='psaddonsconnect'} </h4>

      {l s='Modules to' mod='psaddonsconnect'} <a href="{$practical_links['traffic']|escape:'htmlall':'UTF-8'}" target="_blank"> {l s='increase your traffic' mod='psaddonsconnect'} ></a><br>
      {l s='Modules to' mod='psaddonsconnect'} <a href="{$practical_links['conversion']|escape:'htmlall':'UTF-8'}" target="_blank"> {l s='boost your conversions' mod='psaddonsconnect'} ></a><br>
      {l s='Modules to' mod='psaddonsconnect'} <a href="{$practical_links['averageCart']|escape:'htmlall':'UTF-8'}" target="_blank"> {l s='increase your clients\' average cart' mod='psaddonsconnect'} ></a><br>
      {l s='Selection of modules recommended for' mod='psaddonsconnect'} <a href="{$practical_links['businessSector']|escape:'htmlall':'UTF-8'}" target="_blank"> {l s='your business sector' mod='psaddonsconnect'} ></a><br>
    {/if}
</section>

