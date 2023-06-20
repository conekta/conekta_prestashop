<?php
/**
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
 *
 * @category  Conekta
 *
 * @version   GIT: @2.3.6@
 *
 * @see       https://conekta.com/
 */

namespace Conekta\Payments\UseCases;

use Tools;
use Validate;

class ValidateAdminForm
{
    public function __invoke(array $orderAttributes, array $productAttributes): array
    {
        $arrayErrors = [];

        if (empty(Tools::getValue('CONEKTA_PAYEE_NAME'))
            || !Validate::isString(Tools::getValue('CONEKTA_PAYEE_NAME'))) {
            $arrayErrors[] = 'The "Payee name" field is required.';
        }

        if (empty(Tools::getValue('CONEKTA_PAYEE_ADDRESS'))
            || !Validate::isString(Tools::getValue('CONEKTA_PAYEE_ADDRESS'))) {
            $arrayErrors[] = 'The "Payee address" field is required.';
        }

        if (empty(Tools::getValue('CONEKTA_PUBLIC_KEY_TEST'))
            || !Validate::isString(Tools::getValue('CONEKTA_PUBLIC_KEY_TEST'))) {
            $arrayErrors[] = 'The "Test Public Key" field is required.';
        }

        if (empty(Tools::getValue('CONEKTA_PUBLIC_KEY_LIVE'))
            || !Validate::isString(Tools::getValue('CONEKTA_PUBLIC_KEY_LIVE'))) {
            $arrayErrors[] = 'The "Live Public Key" field is required.';
        }

        if (empty(Tools::getValue('CONEKTA_PRIVATE_KEY_TEST'))
            || !Validate::isString(Tools::getValue('CONEKTA_PRIVATE_KEY_TEST'))) {
            $arrayErrors[] = 'The "Test Private Key" field is required.';
        }

        if (empty(Tools::getValue('CONEKTA_PRIVATE_KEY_LIVE'))
            || !Validate::isString(Tools::getValue('CONEKTA_PRIVATE_KEY_LIVE'))) {
            $arrayErrors[] = 'The "Live Private Key" field is required.';
        }

        if (empty(Tools::getValue('CONEKTA_WEBHOOK'))
            || !Validate::isAbsoluteUrl(Tools::getValue('CONEKTA_WEBHOOK'))) {
            $arrayErrors[] = 'The "Webhook" field is required or must be an url';
        }

        if (empty(Tools::getValue('CONEKTA_METHOD_CARD'))
            && empty(Tools::getValue('CONEKTA_METHOD_CASH'))
            && empty(Tools::getValue('CONEKTA_METHOD_SPEI'))) {
            $arrayErrors[] = 'You need select almost one payment method.';
        }

        $conektaExpirationDateLimit = (int) Tools::getValue('CONEKTA_EXPIRATION_DATE_LIMIT');
        $conektaExpirationDateType = (int) Tools::getValue('CONEKTA_EXPIRATION_DATE_TYPE');

        if (!empty(Tools::getValue('CONEKTA_METHOD_CASH'))
            && empty($conektaExpirationDateLimit)) {
            $arrayErrors[] = 'The "Expiration date limit" field is required.';
        }

        if (!empty(Tools::getValue('CONEKTA_METHOD_CASH'))
            && !Validate::isInt($conektaExpirationDateLimit)) {
            $arrayErrors[] = 'The "Expiration date limit" must be a number.';
        }

        if (!empty(Tools::getValue('CONEKTA_METHOD_CASH'))
            && $conektaExpirationDateType === 0
            && ($conektaExpirationDateLimit < 0 || $conektaExpirationDateLimit > 31)) {
            $arrayErrors[] = 'The "Expiration date limit" is out of range. must be a number between 0 and 31';
        }

        if (!empty(Tools::getValue('CONEKTA_METHOD_CASH'))
            && $conektaExpirationDateType === 1
            && ($conektaExpirationDateLimit < 0 || $conektaExpirationDateLimit > 24)) {
            $arrayErrors[] = 'The "Expiration date limit" is out of range. must be a number between 0 and 24';
        }

        if (Tools::getValue('CONEKTA_METHOD_CARD')
            && Tools::getValue('CONEKTA_MSI') === 'YES'
            && !Tools::getValue('CONEKTA_MSI_3_MONTHS')
            && !Tools::getValue('CONEKTA_MSI_6_MONTHS')
            && !Tools::getValue('CONEKTA_MSI_9_MONTHS')
            && !Tools::getValue('CONEKTA_MSI_12_MONTHS')
            && !Tools::getValue('CONEKTA_MSI_18_MONTHS')
        ) {
            $arrayErrors[] = 'Almost one installment, must be selected.';
        }

        $productAttributesFiltered = array_filter($productAttributes, function ($attribute) {
            $key = sprintf('PRODUCT_%s', Tools::strtoupper($attribute));

            return !empty(Tools::getValue($key));
        });

        $orderAttributesFiltered = array_filter($orderAttributes, function ($attribute) {
            $key = sprintf('ORDER_%s', Tools::strtoupper($attribute));

            return !empty(Tools::getValue($key));
        });

        if ((count($productAttributesFiltered) + count($orderAttributesFiltered)) > METADATA_LIMIT) {
            $arrayErrors[] = 'No more than 12 ("Additional Order Metadata" or "Additional Product Metadata") attributes can be sent as metadata';
        }

        return $arrayErrors;
    }
}
