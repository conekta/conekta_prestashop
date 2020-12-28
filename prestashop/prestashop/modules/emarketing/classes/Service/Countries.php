<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the GNU General Public License, version 3 (GPL-3.0).
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * @author    emarketing www.emarketing.com <integrations@emarketing.com>
 * @copyright 2020 emarketing AG
 * @license   https://opensource.org/licenses/GPL-3.0 GNU General Public License version 3
 */

namespace Emarketing\Service;

/**
 * Class Countries
 * @package Emarketing\Service
 */
class Countries
{
    /**
     * @return array
     */
    public function buildCountryInformation()
    {
        $context = \Context::getContext();

        $countryData = array(
            'default' => array(
                'id_country' => \Configuration::get('PS_COUNTRY_DEFAULT'),
                'id_language' => \Configuration::get('PS_LANG_DEFAULT'),
                'id_currency' => \Configuration::get('PS_CURRENCY_DEFAULT')
            ),
            'active' => array(
                'countries' => \Country::getCountries($context->language->id, true, false, false),
                'languages' => \Language::getLanguages(true, $context->shop->id),
                'currencies' => $this->getCurrencies($context->shop->id)
            )
        );

        return $countryData;
    }

    /**
     * @param $shopId
     * @return array
     */
    private function getCurrencies($shopId)
    {
        $currencyData = array();

        $currencies = \Currency::getCurrenciesByIdShop($shopId);
        foreach ($currencies as $currency) {
            if ($currency['deleted'] == 1 || $currency['active'] == 0) {
                continue;
            }

            $currencyData[] = array(
                'id_currency' => (string)$currency['id_currency'],
                'name' => $currency['name'],
                'iso_code' => $currency['iso_code'],
                'conversion_rate' => $currency['conversion_rate'],
                'active' => $currency['active'],
                'deleted' => $currency['deleted'],
                'sign' => $currency['sign'],
                'iso_code_num' => $currency['iso_code_num'],
                'format' => $currency['format']
            );
        }

        return $currencyData;
    }
}
