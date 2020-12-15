{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
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
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 *}

{block name="page_title"}
  {l s='Customer service - Contact us' d='Modules.Contactform.Shop'}
{/block}

<section class="login-form">
  <form action="{$urls.pages.contact|escape:'htmlall':'UTF-8'}" method="post" {if $contact.allow_file_upload}enctype="multipart/form-data"{/if}>

    <header>
      <h1 class="h3">{l s='Send a message' d='Modules.Contactform.Shop'}</h1>
      <p>{l s='If you would like to add a comment about your order, please write it in the field below.' d='Modules.Contactform.Shop'}</p>
    </header>

    {if $notifications}
      <div class="notification {if $notifications.nw_error}notification-error{else}notification-success{/if}">
        <ul>
          {foreach $notifications.messages as $notif}
            <li>{$notif|escape:'htmlall':'UTF-8'}</li>
          {/foreach}
        </ul>
      </div>
    {/if}

    {if !$notifications || $notifications.nw_error}
      <section class="form-fields">

        <label>
          <span>{l s='Subject Heading' d='Modules.Contactform.Shop'}</span>
          <select name="id_contact">
            {foreach from=$contact.contacts item=contact_elt}
              <option value="{$contact_elt.id_contact|escape:'htmlall':'UTF-8'}">{$contact_elt.name}</option>
            {/foreach}
          </select>
        </label>

        <label>
          <span>{l s='Email address' d='Modules.Contactform.Shop'}</span>
          <input type="email" name="from" value="{$contact.email|escape:'htmlall':'UTF-8'}" />
        </label>

        {if $contact.orders}
          <label>
            <span>{l s='Order reference' d='Modules.Contactform.Shop'}</span>
            <select name="id_order">
              <option value="">{l s='Select reference' d='Modules.Contactform.Shop'}</option>
              {foreach from=$contact.orders item=order}
                <option value="{$order.id_order|escape:'htmlall':'UTF-8'}">{$order.reference|escape:'htmlall':'UTF-8'}</option>
              {/foreach}
            </select>
          </label>
        {/if}

        {if $contact.allow_file_upload}
          <label>
            <span>{l s='Attach File' d='Modules.Contactform.Shop'}</span>
            <input type="file" name="fileUpload" />
          </label>
        {/if}

        <label>
          <span>{l s='Message' d='Modules.Contactform.Shop'}</span>
          <textarea cols="67" rows="3" name="message">{if $contact.message}{$contact.message|escape:'htmlall':'UTF-8'}{/if}</textarea>
        </label>
        
        {hook h='displayGDPRConsent' id_module=$id_module}

      </section>

      <footer class="form-footer">
        <style>
          input[name=url] {
            display: none !important;
          }
        </style>
        <input type="text" name="url" value=""/>
        <input type="hidden" name="token" value="{$token|escape:'htmlall':'UTF-8'}" />
        <button type="submit" name="submitMessage">
          {l s='Send' d='Modules.Contactform.Shop'}
        </button>
      </footer>
    {/if}
  </form>
</section>
