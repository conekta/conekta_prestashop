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

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_2_0()
{
    \Configuration::updateValue('EMARKETING_ROUTETOKEN', \Tools::passwdGen());

    $token = \Configuration::get('EMARKETING_SHOPTOKEN');

    if (empty($token)) {
        return true;
    }

    sendRequest(
        'https://gateway.emarketing.com/gateway_api/sso/version',
        'PUT',
        'Authorization: ' . $token,
        array('version' => '2.2.0')
    );

    sendRequest(
        'https://gateway.emarketing.com/prestashop_api/upgrade/facebook_pixel_endpoint',
        'POST',
        'Authorization: ' . $token
    );
    
    return true;
}

/**
 * @param $path
 * @param $method
 * @param string $additionalHeader
 * @param array $data
 * @return array
 */
function sendRequest($path, $method, $additionalHeader = "", $data = array())
{
    $curlHandle = curl_init($path);

    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

    $dataJson = "";

    if ($method == 'POST' || $method == 'PUT') {
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $method);

        $dataJson = json_encode($data);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $dataJson);
    }

    $header = array(
        'Content-Type: application/json; charset=utf-8',
        'Content-Length: ' . \Tools::strlen($dataJson),
        $additionalHeader
    );

    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curlHandle);

    $return = array(
        'body' => json_decode($response),
        'code' => curl_getinfo($curlHandle, CURLINFO_HTTP_CODE)
    );

    curl_close($curlHandle);

    return $return;
}
