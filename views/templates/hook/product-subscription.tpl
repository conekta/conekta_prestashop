{**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @category  Conekta
 * @version   GIT: @2.3.7@
 * @see       https://conekta.com/
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
                    <option 
                        value="{$plan['id']|escape:'htmlall':'UTF-8'}"
                        {($subscription_plan == $plan['id']) ? 'selected' : ''|escape:'htmlall':'UTF-8'}
                    >
                        {$plan['name']|escape:'htmlall':'UTF-8'}
                    </option>
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