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

namespace Emarketing\Action;

/**
 * Class Countries
 * @package Emarketing\Action
 */
class Countries
{
    /**
     * @return array
     */
    public function fetchCountries()
    {
        $serviceCountries = new \Emarketing\Service\Countries;

        return $serviceCountries->buildCountryInformation();
    }
}
