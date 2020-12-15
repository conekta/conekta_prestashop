{*
* 2007-2018 PrestaShop
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://addons.prestashop.com/en/content/12-terms-and-conditions-of-use
* International Registered Trademark & Property of PrestaShop SA
*}

<div id="psthemecusto" class="container-fluid clearfix">
    {if $isPsReady}
        {include file="./ps_ready.tpl"}
    {/if}

    <div class="panel row">
        <div class="panel-heading text-center">
            <button class="btn btn-primary btn-lg selected" data-id-modal="homepageModal">{l s='Homepage' mod='ps_themecusto'}</button>
            <button class="btn btn-primary btn-lg" data-id-modal="categoryModal">{l s='Category page' mod='ps_themecusto'}</button>
            <button class="btn btn-primary btn-lg" data-id-modal="productModal">{l s='Product page' mod='ps_themecusto'}</button>
        </div>

        {include file="./dropdownList.tpl" elementsList=$homePageList idModal='homepage' defaultModalClass='' }
        {include file="./dropdownList.tpl" elementsList=$categoryPageList idModal='category' defaultModalClass='hide'}
        {include file="./dropdownList.tpl" elementsList=$productPageList idModal='product' defaultModalClass='hide'}
    </div>

    {include file="./elem/modal.tpl"}
</div>

