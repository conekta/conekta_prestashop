{*
 * 2007-2021 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
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
 * @author    Conekta <support@conekta.io>
 * @copyright 2007-2021 PrestaShop SA and Contributors
 * @version v1.0.0
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div class="form-group mb-3">
    <h2>Conekta Subscriptions</h2>
    <div class="row">
        <div class="col-md-6 checkbox" style="line-height: 3.5rem;">
            <label class="form-control-label">
                <input type="checkbox" id="is_subscription" name="is_subscription" {$is_subscription|escape:'htmlall':'UTF-8'} style="margin: 0 1rem">
                Enable subscriptions
            </label>
        </div>
        <div class="col-md-6" id="conekta_plan_select">
            <label class="form-control-label">Plan</label>
            <select class ="custom-select" name="subscription_plan">
                {foreach $plans as $plan}
                    <option value="{$plan['id']|escape:'htmlall':'UTF-8'}" {($subscription_plan == $plan['id']) ? 'selected' : ''}>{$plan['name']|escape:'htmlall':'UTF-8'}</option>
                {/foreach}
            </select>
        </div>
    </div>
</div>
<script type="text/javascript">
	let enable_subscription = document.getElementById('is_subscription');
    function updateCheck() {
        let plan_select = document.getElementById('conekta_plan_select');
        if(enable_subscription && plan_select){
            plan_select.style.display = (enable_subscription.checked) ? 'block' : 'none'
        }
    }
    enable_subscription.onclick = updateCheck;
    updateCheck();
</script> 