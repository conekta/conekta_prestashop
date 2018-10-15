<div align="center">

Prestashop [1.7] Plugin v1.1.0
=======================

[![Made with PHP](https://img.shields.io/badge/made%20with-php-red.svg?style=for-the-badge&colorA=ED4040&colorB=C12C2D)](http://php.net) [![By Conekta](https://img.shields.io/badge/by-conekta-red.svg?style=for-the-badge&colorA=ee6130&colorB=00a4ac)](https://conekta.com)
</div>

This plugin is an official and stable version of the Conekta Prestashop extension. It bundles functionality to process credit cards, SPEI, Banorte and OXXO payments securely as well as send email notifications to your customers when they complete a successful purchase.

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

  Clone the module using git clone --recursive git@github.com:conekta/conekta_prestashop.git

There is no custom installation for this plugin, just the default:

  * Compress the folder conekta_prestashop.
  * Go to the modules section and clic on 'Add a new module'.
  * Select the compressed folder.
  * Search for conekta_prestashop in the modules list.
  * Clic on 'install'.
  * Add your API keys.
  * Modify if necessary your webhook url.

License
-------
Developed by [Conekta](https://www.conekta.io). Available under [MIT License](LICENSE).

## How to contribute to the project

1. Fork the repository
 
2. Clone the repository
```
    git clone git@github.com:yourUserName/conekta-prestashop.git
```
3. Create a branch
```
    git checkout develop
    git pull origin develop
    # You should choose the name of your branch
    git checkout -b <feature/my_branch>
```    
4. Make necessary changes and commit those changes
```
    git add .
    git commit -m "my changes"
```
5. Push changes to GitHub
```
    git push origin <feature/my_branch>
```
6. Submit your changes for review, create a pull request

   To create a pull request, you need to have made your code changes on a separate branch. This branch should be named like this: **feature/my_feature** or **fix/my_fix**.

   Make sure that, if you add new features to our library, be sure to add the corresponding **unit tests**.

   If you go to your repository on GitHub, you’ll see a Compare & pull request button. Click on that button.

***

## We are always hiring!

If you are a comfortable working with a range of backend languages (Java, Python, Ruby, PHP, etc) and frameworks, you have solid foundation in data structures, algorithms and software design with strong analytical and debugging skills, check our open positions: https://www.conekta.com/careers
