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
 * Class Verification
 * @package Emarketing\Service
 */
class Verification
{
    /**
     * @var string
     */
    private $configName = 'EMARKETING_VERIFICATION_TAG';

    /**
     * @param $tag
     * @return bool
     * @throws \Exception
     */
    public function saveTag($tag)
    {
        if (is_null($tag) || !is_string($tag)) {
            $tag = "";
        }

        $tag = htmlentities($tag, ENT_QUOTES);

        $saved = \Configuration::updateValue($this->configName, $tag);

        if (!$saved) {
            throw new \Exception('Error while saving tag.');
        }

        return true;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        $tag = \Configuration::get($this->configName);

        if (empty($tag)) {
            return "";
        }

        return html_entity_decode($tag);
    }
}
