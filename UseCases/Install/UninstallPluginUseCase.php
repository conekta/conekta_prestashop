<?php

class UninstallPluginUseCase
{
    const ConfigKeys = [
        'CONEKTA_PRESTASHOP_VERSION',
        'CONEKTA_MSI',
        'CONEKTA_CARDS',
        'PAYMENT_METHS_CASH',
        'PAYMENT_METHS_SPEI',
        'CONEKTA_PUBLIC_KEY_TEST',
        'CONEKTA_PUBLIC_KEY_LIVE',
        'CONEKTA_MODE',
        'CONEKTA_PRIVATE_KEY_TEST',
        'CONEKTA_PRIVATE_KEY_LIVE',
        'CONEKTA_SIGNATURE_KEY_LIVE',
        'CONEKTA_SIGNATURE_KEY_TEST',
        'CONEKTA_PAYMENT_ORDER_STATUS',
        'CONEKTA_WEBHOOK',
        'CONEKTA_WEBHOOK_FAILED_ATTEMPTS',
        'CONEKTA_WEBHOOK_ERROR_MESSAGE',
        'CONEKTA_WEBHOOK_FAILED_URL'
    ];
    /**
     * @var CnkConfig
     */
    private $config;
    /**
     * @var Database
     */
    private $database;

    public function __construct()
    {
        $this->config = new CnkConfig();
        $this->database = new Database();
    }

    /**
     * @return bool
     */
    public function __invoke()
    {
        return $this->deleteConfigs()
            && $this->dropTables();
    }

    /**
     * @return bool
     */
    private function deleteConfigs(): bool
    {
        foreach (self::ConfigKeys as $key) {
            if (! $this->config->delete($key)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    private function dropTables(): bool
    {
        return $this->database->removeTables();
    }
}