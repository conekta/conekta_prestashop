{*
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2016 PrestaShop SA
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 *}
<script>
    var current_level_percent_tab = {$current_level_percent|intval};
    var current_level_tab = '{$current_level|intval}';
    var gamification_level_tab = '{l s='Level' mod='gamification' js=1}';
    $(document).ready(function () {
        $('.gamification_badges_img').tooltip();
        $('#gamification_progressbar_tab').progressbar({
            change: function() {
                if ({$current_level_percent})
                    $( "#gamification_progress-label_tab" ).html( '{l s='Level' mod='gamification' js=1}'+' '+{$current_level|intval}+' : '+$('#gamification_progressbar_tab').progressbar( "value" ) + "%" );
                else
                    $( "#gamification_progress-label_tab" ).html('');
              },
        });
        $('#gamification_progressbar_tab').progressbar("value", {$current_level_percent|intval} );
    });
    var admintab_gamification = true;
</script>

<div class="panel">
    <div id="intro_gamification">
        <div class="left_intro">
            <img src="{$base_url}modules/gamification/views/img/checklist.png" alt="{l s='Email' mod='gamification'}" />
        </div>
        <div class="central_intro">
            <h2>{l s="Become an e-commerce expert in leaps and bounds!" mod='gamification'}</h2>
            <p>
                {l s="In order to make you succeed in the e-commerce world, we have created a system of badges and points to help you monitor your progress as a merchant. The system has three levels:" mod='gamification'}

            </p>
            <ol class="central_intro_list">
                <li>{l s="Your use of key e-commerce features on your store" mod='gamification'}</li>
                <li>{l s="Your sales performances" mod='gamification'}</li>
                <li>{l s="Your presence in international markets" mod='gamification'}</li>
            </ol>
            <p>{l s="The more progress your store makes, the more badges and points you earn. Take advantage and check it out below!" mod='gamification'}</p>
        </div>
        <div class="right_intro">
            <img src="{$base_url}modules/gamification/views/img/persona.png" alt="{l s="Employee" mod='gamification'}">
            <h3 class="text-center right_intro_title">{l s="Our team of experts is available to help, feel free to contact them!" mod='gamification'}</h3>
            <a class="text-center right_intro_btn-contact" href="https://www.prestashop.com/en/experts?utm_source=gamification">{l s="Find an expert" mod='gamification'}</a>
        </div>
    </div>

    <div id="completion_gamification">
        <h2>{l s='Completion level' mod='gamification'}</h2>
        <div id="gamification_progressbar_tab"></div>
        <p class="gamification_progress-label">{l
            s="Level %s:"
            sprintf=[
                $current_level|intval
            ]
            mod='gamification'
        }

        <span class="gamification_progress-label_percent">
            {$current_level_percent|intval}%
        </span>
        </p>
    </div>
    &nbsp;
</div>
<div class="clear"><br/></div>

{foreach from=$badges_type key=key item=type}
    <div class="panel">
        <h3><i class="icon-bookmark"></i> {$type.name|escape:html:'UTF-8'}</h3>
        <div class="row">
            <div class="col-lg-2">
                {include file='./filters_bt.tpl' type=$key}
            </div>
            <div class="col-lg-10">
                <ul class="badge_list" id="list_{$key}" style="">
                    {foreach from=$type.badges item=badge}
                    <li class="badge_square badge_all {if $badge->validated}validated {else} not_validated{/if} group_{$badge->id_group} level_{$badge->group_position} " id="{$badge->id|intval}">
                        <div class="gamification_badges_img" data-placement="top" data-toggle="tooltip" data-original-title="{$badge->description|escape:html:'UTF-8'}"><img src="{$badge->getBadgeImgUrl()}" alt="{$badge->name|escape:html:'UTF-8'}" /></div>
                        <div class="gamification_badges_name">{$badge->name|escape:html:'UTF-8'}</div>
                    </li>
                    {foreachelse}
                    <li>
                        <div class="gamification_badges_name">{l s="No badge in this section" mod='gamification'}</div>
                    </li>
                    {/foreach}
                </ul>
            </div>
            <p id="no_badge_{$key}" class="gamification_badges_name" style="display:none;text-align:center">{l s="No badge in this section" mod='gamification'}</p>
        </div>
    </div>
    <div class="clear"><br/></div>
{/foreach}
