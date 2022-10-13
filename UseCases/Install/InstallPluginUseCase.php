<?php

class InstallPluginUseCase
{
    private $cnkConfig;

    public function __construct()
    {
        $this->cnkConfig = new CnkConfig();
    }

    public function __invoke(string $pluginName, int $pluginVersion)
    {
        $updateConfig = array(
            'PS_OS_CHEQUE'      => 1,
            'PS_OS_PAYMENT'     => 2,
            'PS_OS_PREPARATION' => 3,
            'PS_OS_SHIPPING'    => 4,
            'PS_OS_DELIVERED'   => 5,
            'PS_OS_CANCELED'    => 6,
            'PS_OS_REFUND'      => 7,
            'PS_OS_ERROR'       => 8,
            'PS_OS_OUTOFSTOCK'  => 9,
            'PS_OS_BANKWIRE'    => 10,
            'PS_OS_PAYPAL'      => 11,
            'PS_OS_WS_PAYMENT'  => 12
        );

        foreach ($updateConfig as $u => $v) {
            if (! $this->cnkConfig->get($u) || (int)$this->cnkConfig->get($u) < 1) {
                if (defined('_' . $u . '_') && (int)constant('_' . $u . '_') > 0) {
                    $this->cnkConfig->update($u, constant('_' . $u . '_'));
                } else {
                    $this->cnkConfig->update($u, $v);
                }
            }
        }

        $createPendingCashState = (new CreatePendingStateUseCase()) (
            $pluginName,
            'conektaefectivo',
            'waiting_cash_payment'
        );

        $createPendingSpeiState = (new CreatePendingStateUseCase()) (
            $pluginName,
            'conektaspei',
            'waiting_spei_payment'
        );

        $createTables = (new CreateTablesUseCase())();

        if (! parent::install()
            || ! $createPendingCashState
            || ! $createPendingSpeiState
            || ! $createTables
            || (
                $this->cnkConfig->update('PAYMENT_METHS_CARD', 1)
                && $this->cnkConfig->update('PAYMENT_METHS_INSTALLMET', 1)
                && $this->cnkConfig->update('PAYMENT_METHS_CASH', 1)
                && $this->cnkConfig->update('PAYMENT_METHS_SPEI', 1)
                && $this->cnkConfig->update('MODE', 0)
            )
        ) {
            return false;
        }

        $this->cnkConfig->update('CONEKTA_PRESTASHOP_VERSION', $pluginVersion);

        return true;
    }
}