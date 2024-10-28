<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.4
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2024 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @3.0.0@
 *
 * @see       https://conekta.com/
 */

namespace Conekta\Payments\UseCases;

use Conekta\Api\WebhooksApi;
use Conekta\Configuration as ConektaConfiguration;
use Conekta\Model\WebhookRequest;
use Configuration;
use Exception;
use Tools;

class CreateWebhook
{
    public const webhookSetting = 'CONEKTA_WEBHOOK';

    public const webhookFailedUrlSetting = 'CONEKTA_WEBHOOK_FAILED_URL';

    public const webhookErrorSetting = 'CONEKTA_WEBHOOK_ERROR_MESSAGE';

    public const webhookAttemptsSetting = 'CONEKTA_WEBHOOK_FAILED_ATTEMPTS';

    public const MaxFailedAttempts = 5;

    public function __invoke(
        bool $conektaMode,
        string $privateKey,
        string $isoCode,
        string $pluginVersion,
        string $oldWebhook
    ): bool {
        $webhookApi = $this->getApiWebHookInstance($privateKey);

        $newWebhook = Tools::safeOutput(Tools::getValue(self::webhookSetting));
        Configuration::deleteByName(self::webhookErrorSetting);

        if ($oldWebhook === $newWebhook) {
            return true;
        }

        $failedAttempts = (int) Configuration::get(self::webhookAttemptsSetting);
        $failedWebhook = Configuration::get(self::webhookFailedUrlSetting);

        if ($newWebhook === $failedWebhook && $failedAttempts >= self::MaxFailedAttempts) {
            Configuration::updateValue(
                self::webhookErrorSetting,
                'Webhook register was fail some times, try changing webhook!'
            );
            Configuration::deleteByName(self::webhookAttemptsSetting);

            return false;
        }

        if ($failedAttempts < self::MaxFailedAttempts) {
            try {

                $webhooks = $webhookApi->getWebhooks($isoCode,null, 1,null, $newWebhook)->getData();

                if (count($webhooks) <= 0) {
                    $webhookApi->createWebhook(new WebhookRequest(['url' => $newWebhook, 'synchronous'=> false]), $isoCode);

                    Configuration::updateValue(self::webhookSetting, $newWebhook);

                    // delete error variables

                    Configuration::deleteByName(self::webhookAttemptsSetting);
                    Configuration::deleteByName(self::webhookFailedUrlSetting);
                    Configuration::deleteByName(self::webhookErrorSetting);
                }

                return true;
            } catch (Exception $e) {
                ++$failedAttempts;
                Configuration::updateValue(self::webhookErrorSetting, $e->getMessage());
                Configuration::updateValue(self::webhookAttemptsSetting, $failedAttempts);
                Configuration::updateValue(self::webhookFailedUrlSetting, $newWebhook);

                return false;
            }
        }

        return true;
    }
    public function getApiWebHookInstance(string $apiKey): WebhooksApi
    {
        $config = ConektaConfiguration::getDefaultConfiguration()->setAccessToken($apiKey);

        return  new WebhooksApi(null, $config);
    }

}
