{**
* NOTICE OF LICENSE
*
* This file is licenced under the GNU General Public License, version 3 (GPL-3.0).
* With the purchase or the installation of the software in your application
* you accept the licence agreement.
*
* @author    emarketing www.emarketing.com <integrations@emarketing.com>
* @copyright 2020 emarketing AG
* @license   https://opensource.org/licenses/GPL-3.0 GNU General Public License version 3
*}

<div>
    <div class="panel emarketing informations col-lg-10 col-lg-offset-1">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row emarketing_header">
                <div class="presentation col-lg-6">
                    <div class="col-lg-12">
                        <div class="row">
                            <p style="font-size: 40px; font-weight: bold; margin-top: 55px; margin-bottom: 20px; margin-left: -10px;"><img src="{$module_dir|escape:'html':'UTF-8'}views/img/ps-logo.png" alt="Prestashop Ads" style="width: 440px; height: 110px;" /></p>
                            <p style="margin-bottom: 20px;">
                                <b>{l s='Welcome to PrestaShop Ads.' mod='emarketing'}</b> {l s='This plugin generates a product data feed for Google Shopping and Facebook / Instagram. Furthermore it generates Conversion Tracking and installs it to your Webshop.' mod='emarketing'}
                            </p>
                            {if $emptyShopToken}
                                <p>{l s='Click [1]Sign up[/1] to create your PrestaShop Ads account.' tags=['<b>'] mod='emarketing'}<br>
                                    {l s='To connect your existing PrestaShop Ads account, click [1]Merge account[/1].' tags=['<b>'] mod='emarketing'}</p>
                                <p>
                                    <a href="{$signupUrl|escape:'html':'UTF-8'}" target="_blank" rel="noopener noreferrer" onclick="setTimeout(refresh, 5000);">{l s='Sign up' mod='emarketing'}</a>
                                    <a href="{$linkUrl|escape:'html':'UTF-8'}" target="_blank" rel="noopener noreferrer" onclick="setTimeout(refresh, 5000);">{l s='Merge account' mod='emarketing'}</a>
                                </p>
                            {else}
                                <p>{l s='Click [1]Login[/1] to log in to your PrestaShop Ads account.' tags=['<b>'] mod='emarketing'}</p>
                                <p><a href="{$loginUrl|escape:'html':'UTF-8'}" target="_blank" rel="noopener noreferrer">{l s='Login' mod='emarketing'}</a></p>
                            {/if}
                            <p>
                                <a href="https://intercom.help/prestashop-ads/" target="_blank" class="faqbutton" rel="noopener noreferrer">FAQ</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bgimage col-lg-6 text-center">
                    <img src="{$module_dir|escape:'html':'UTF-8'}views/img/shape_bg_img.png" style="width: 434px; height: 255px; position: absolute;" />
                    <img src="{$module_dir|escape:'html':'UTF-8'}views/img/PS_ads_img.png" style="width: 296px; height: 224px; position: relative; left: 75px; top: 35px;" />
                </div>
            </div>
            <div class="row emarketing-content">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{$module_dir|escape:'html':'UTF-8'}views/img/catalog_upload_img.png"/>
                        </div>
                        <div class="col-lg-10">
                            <p class="title">{l s='Simplified catalog upload' mod='emarketing'}</p>
                            <p class="content">{l s='We help you create an account, generate your product feed and upload it to Google Merchant Center. With a new account, Google will credit back what you spend in the first 30 days, up to 120€.' mod='emarketing'}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{$module_dir|escape:'html':'UTF-8'}views/img/google_smart_shopping_campaign_img.png"/>
                        </div>
                        <div class="col-lg-10">
                            <p class="title">{l s='Smart Shopping campaigns on Google' mod='emarketing'}</p>
                            <p class="content">{l s='On PrestaShop Ads, you only need to set your budget to launch a Smart Shopping campaign on Google. Your products will appear on Google Search, Display, Gmail and YouTube, on mobile and desktop.' mod='emarketing'}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{$module_dir|escape:'html':'UTF-8'}views/img/competitors_analysis_img.png"/>
                        </div>
                        <div class="col-lg-10">
                            <p class="title">{l s='Competitors Analysis' mod='emarketing'}</p>
                            <p class="content">{l s='If you sell products that others are selling, you can monitor competitors\' prices on Amazon, eBay and Shopping ads. Create alerts to reprice your articles and focus your ads on your most promising products.' mod='emarketing'}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;">&nbsp;</div>
</div>

<style type="text/css">
    .informations {
        font-family: OpenSans-Regular, sans-serif;
        font-size: 16px;
        color: #363A41;
        letter-spacing: 0;
        line-height: 24px;
    }
    .emarketing {
        padding: 0 16px 20px !important;
    }
    .emarketing img {
        display: block;
        height: 257px;
        margin: 0;
    }
    .emarketing a, .emarketing a:hover, .emarketing a:active, .emarketing a:focus {
        display: inline-block;
        background-color: #24B9D7;
        border: 1px solid #24B9D7;
        border-radius: 1px;
        padding: 5px 12px;
        margin-right: 20px;
        text-decoration: none;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
    }
    a.faqbutton {
        color: #24B9D7 !important;
        background-color: #fff !important;
    }
    .emarketing_header {
        border-bottom: 1px solid #ccc;
        height: 435px;
    }
    .emarketing-content {
        margin: 20px 0;
    }
    .emarketing-content img {
        width: 90px;
        height: 90px;
        margin-bottom: 15px;
    }
    .emarketing-content .row {
        margin: 15px 0 35px 0;
    }
    .emarketing-content .row:last-child{
        margin-bottom: 0;
    }
    .emarketing-content .row i{
        font-size: 34px;
    }
    .emarketing-content .row .title{
        color: #363A41;
        font-family: "Open Sans";
        font-size: 28px;
        line-height: 19px;
        font-weight: normal;
        margin-top: 6px;
        margin-bottom: 20px;
    }
    .emarketing-content .row .content{
        color: #6C868E;
        font-family: "Open Sans";
        font-size: 14px;
        line-height: 19px;
    }
    .emarketing-content .material-icons.green {
        color: #00b555;
    }
    .emarketing-content .material-icons.red {
        color: #f9001a;
    }
    .emarketing-content .material-icons.yellow {
        color: #ffc100;
    }

    @media only screen and (max-width: 1240px) {
        .bgimage {
            display: none;
        }
    }
</style>
<script type="application/javascript">
    function refresh()
    {
        location.reload();
        return false;
    }
</script>
