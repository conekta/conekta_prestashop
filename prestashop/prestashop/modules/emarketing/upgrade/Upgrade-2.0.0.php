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

function upgrade_module_2_0_0()
{
    $oldSignupToken = \Configuration::get('EMARKETING_SIGNUP_TOKEN');
    $oldShoptoken = \Configuration::get('EMARKETING_SHOP_TOKEN');

    if (empty($oldShoptoken) || empty($oldSignupToken)) {
        return true;
    }

    $response = sendRequest(
        '/merchant',
        'Origin: ' . \Context::getContext()->shop->getBaseURL(true),
        array('sso_token' => $oldSignupToken)
    );

    if ($response['code'] !== 200 || empty($response['body']->token)) {
        return true;
    }

    $newToken = $response['body']->token;

    \Configuration::updateValue('EMARKETING_SHOPTOKEN', $newToken);

    sleep(2);

    sendRequest(
        '/shopsystem_connection',
        'Authorization: ' . $newToken,
        array('shop_token' => $oldShoptoken)
    );
    
    return true;
}

/**
 * @param $path
 * @param string $additionalHeader
 * @param array $data
 * @return array
 */
function sendRequest($path, $additionalHeader = "", $data = array())
{
    $curlHandle = curl_init('https://gateway.emarketing.com/prestashop_api/upgrade' . $path);

    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

    $dataJson = "";

    if (!empty($data)) {
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'POST');

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
