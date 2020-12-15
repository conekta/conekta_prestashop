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

namespace Emarketing\Service\Snippets;

/**
 * Class Snippets
 * @package Emarketing\Service\Snippets
 */
class Snippets
{
    /**
     * @param $key
     * @param $code
     * @return bool
     * @throws \Exception
     */
    protected function saveInConfiguration($key, $code)
    {
        if (is_null($code) || !is_string($code)) {
            return false;
        }

        $code = htmlentities($code, ENT_QUOTES);

        $saved = \Configuration::updateValue('EMARKETING_' . $key, $code);

        if (!$saved) {
            throw new \Exception('Error while saving ' . $key);
        }

        return true;
    }

    /**
     * @param $key
     * @return string
     */
    protected function getFromConfiguration($key)
    {
        $code = \Configuration::get('EMARKETING_' . $key);

        return html_entity_decode($code, ENT_QUOTES);
    }
}
