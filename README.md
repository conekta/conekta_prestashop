Prestashop Compatibility
=======================
Prestashop [8.x.x] - Plugin v3.0.0
If you're using Prestashop version 8.x.x, you should install Conekta Plugin version 3.0.0.

Prestashop [7.x.x] - Plugin v2.x.x
If you're using Prestashop version 7.x.x, you should install Conekta Plugin version 2.x.x.
=======================
This plugin is an official and stable version of the Conekta Prestashop extension. It bundles functionality to process credit cards, SPEI and Conekta efectivo payments securely as well as send email notifications to your customers when they complete a successful purchase.

Don't worry about managing the status of your orders, the plugin will automatically change orders to pay as long as your webhooks are properly configured.

Features
--------
Current version features:

*   Online and offline payments.
*   Automatic order status management.
*   Sandbox testing capability.
*   Client side validation for credit cards.
*   All card data is sent directly to Conekta's servers so you don't have to be PCI compliant.

Installation
-----------

  Clone the module using <pre>git clone --recursive git@github.com:conekta/conekta_prestashop.git ./conekta</pre>

There is no custom installation for this plugin, just the default:

*   Compress the folder conekta.
*   Go to the modules section and clic on 'Add a new module'.
*   Select the compressed folder.
*   Search for conekta in the modules list.
*   Clic on 'install'.
*   Add your API keys.
*   Modify if necessary your webhook url.

License
-------
Developed by [Conekta](https://www.conekta.io). Available under [MIT License](LICENSE).
