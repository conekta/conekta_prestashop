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

namespace Emarketing;

/**
 * Class CurlRequest
 * @package Emarketing
 */
class CurlRequest
{
    /**
     * @var false|resource|null
     */
    private $handle = null;

    /**
     * CurlRequest constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->handle = curl_init($url);

        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * @param $name
     * @param $value
     */
    public function setOption($name, $value)
    {
        curl_setopt($this->handle, $name, $value);
    }

    /**
     * @return bool|string
     */
    public function execute()
    {
        return curl_exec($this->handle);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getInfo($name)
    {
        return curl_getinfo($this->handle, $name);
    }

    /**
     *
     */
    public function close()
    {
        curl_close($this->handle);
    }
}
