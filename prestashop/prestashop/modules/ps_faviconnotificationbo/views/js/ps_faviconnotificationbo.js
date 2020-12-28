'use strict';
/**
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
 */

let ps_faviconnotificationbo = {};

(function() {
    /**
     * @param {object} config
     * @param {string} config.notificationGetUrl - Url used for request
     * @param {boolean} config.CHECKBOX_ORDER - Use order notifications
     * @param {boolean} config.CHECKBOX_CUSTOMER - Use customer notifications
     * @param {boolean} config.CHECKBOX_MESSAGE - Use message notifications
     * @param {int} config.timer - Refresh time
     * @constructor
     */
    let FaviconNotificationsUpdater = function(config) {
        let refresh = function() {
            let notificationTimer = null;
            let notificationRequest = $.ajax({
                type: 'POST',
                headers: {"cache-control": "no-cache"},
                cache: false,
                dataType: 'json',
                url: `${config.notificationGetUrl}&rand=${new Date().getTime()}`,
            });

            notificationRequest.done(function(data) {
                let total = 0;

                if (config.CHECKBOX_ORDER && undefined !== data.order && undefined !== data.order.total) {
                    total += parseInt(data.order.total, 10);
                }

                if (config.CHECKBOX_CUSTOMER && undefined !== data.customer && undefined !== data.customer.total) {
                    total += parseInt(data.customer.total, 10);
                }

                if (config.CHECKBOX_MESSAGE && undefined !== data.customer_message && undefined !== data.customer_message.total) {
                    total += parseInt(data.customer_message.total, 10);
                }

                window.favicon.badge(total);
                notificationTimer = setTimeout(refresh, config.timer);
            });

            clearTimeout(notificationTimer);
        };

        this.initialize = function() {
            // wait for dom ready
            $(function() {
                refresh();
            });
        };
    };

    /**
     * Initialize ps_faviconnotificationbo
     *
     * @param {object} config
     * @param {string} config.backgroundColor - Favicon badge background color
     * @param {string} config.textColor - Favicon badge text color
     * @param {string} config.notificationGetUrl - Url used for request
     * @param {boolean} config.CHECKBOX_ORDER - Use order notifications
     * @param {boolean} config.CHECKBOX_CUSTOMER - Use customer notifications
     * @param {boolean} config.CHECKBOX_MESSAGE - Use message notifications
     * @param {int} config.timer - Refresh time
     */
    ps_faviconnotificationbo.initialize = function(config) {
        window.favicon = new Favico({
            animation: 'popFade',
            bgColor: config.backgroundColor,
            textColor: config.textColor,
        });

        let refreshFaviconNotifications = new FaviconNotificationsUpdater(config);
        refreshFaviconNotifications.initialize();
    };
})();
