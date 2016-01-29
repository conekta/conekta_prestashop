Prestashop Plugin v0.1.0
=======================
This plugin is an official and stable version of the Conekta Prestashop extension. It bundles functionality to process credit cards, bank and OXXO payments securely as well as send email notifications to your customers when they complete a successful purchase.

Don't worry about managing the status of your orders, the plugin will automatically changes orders to paid as long as your webhooks are properly configured.

Features
--------
Current version features:

* Online and offline payments.
* Automatic order status management.
* Sandbox testing capability.
* Client side validation for credit cards.
* All card data is sent directly to Conekta's servers so you don't have to be PCI compliant.

Installation
-----------

  Clone the module using git clone --recursive git@github.com:conekta/conektaprestashop.git

There is no custom installation for this plugin, just the default:

  * Compress the folder conektaprestashop.
  * Go to the modules section and clic on 'Add a new module'.
  * Select the compressed folder.
  * Search for conektaprestashop in the modules list.
  * Clic on 'install'.
  * Add your API keys.
  * Modify if necessary your webhook url.

License
-------
Developed by [Conekta](https://www.conekta.io). Available under [MIT License](LICENSE).