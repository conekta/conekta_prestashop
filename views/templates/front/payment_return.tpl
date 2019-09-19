{*
 * 2007-2019 PrestaShop and Contributors
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
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @version v1.0.0
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}



{extends "$layout"}

{block name="content"}
  <section>
    <p>{l s='You have successfully submitted your payment form.' mod='conekta_prestashop'}</p>
    <p>{l s='Here are the params:' mod='conekta_prestashop'}</p>
    <ul>
      {foreach from=$params key=name item=value}
        <li>{$name|escape:'htmlall':'UTF-8'}: {$value|escape:'htmlall':'UTF-8'}</li>
      {/foreach}
    </ul>
    <p>{l s='Now, you just need to proceed the payment and do what you need to do.' mod='conekta_prestashop'}</p>
  </section>
{/block}
