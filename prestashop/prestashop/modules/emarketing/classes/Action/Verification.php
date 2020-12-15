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

use Emarketing\ClientError;

/**
 * Class Verification
 * @package Emarketing\Action
 */
class Verification
{
    /**
     * @param $postData
     * @return bool
     * @throws \Exception
     */
    public function receiveTag($postData)
    {
        $serviceVerification = new \Emarketing\Service\Verification;

        if (!isset($postData['tag'])) {
            throw new ClientError('Missing tag');
        }

        return $serviceVerification->saveTag($postData['tag']);
    }
}
