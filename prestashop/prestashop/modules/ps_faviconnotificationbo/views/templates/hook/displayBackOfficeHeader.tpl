{**
 * 2007-2020 PrestaShop and Contributors
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

<script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '{$bofaviconBgColor|escape:'javascript'}',
      textColor: '{$bofaviconTxtColor|escape:'javascript'}',
      notificationGetUrl: '{$bofaviconUrl|escape:'javascript'}',
      CHECKBOX_ORDER: {$bofaviconOrder|intval},
      CHECKBOX_CUSTOMER: {$bofaviconCustomer|intval},
      CHECKBOX_MESSAGE: {$bofaviconMsg|intval},
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
