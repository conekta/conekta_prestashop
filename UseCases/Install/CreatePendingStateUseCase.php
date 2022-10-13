<?php

class CreatePendingStateUseCase
{
    private $config;

    public function __construct()
    {
        $this->config = new CnkConfig();
    }

    public function __invoke(string $pluginName, string $templateName, string $configName)
    {
        $state = new OrderState();
        $languages = Language::getLanguages();
        $state->name = $this->setLanguages($languages, 'En espera de pago');
        $state->color = '#4169E1';
        $state->send_email = true;
        $state->module_name = 'conekta';
        $state->template = $this->setLanguages($languages, $templateName);

        if (! $state->save()) {
            return false;
        }

        $this->config->update($configName, $state->id);
        $mailDirectory = _PS_MAIL_DIR_;
        $pluginDirectory = sprintf('%s%s/mails/', _PS_MODULE_DIR_, $pluginName);
        if ($dhValue = opendir($mailDirectory)) {
            while (($file = readdir($dhValue)) !== false) {
                if (is_dir($mailDirectory . $file) && $file[0] != '.') {
                    $newHtmlFile = $this->getTemplate($pluginDirectory, $file, $templateName);
                    $newTxtFile = $this->getTemplate($pluginDirectory, $file, $templateName, 'text');

                    $htmlFolder = $this->getTemplate($mailDirectory, $file, $templateName);
                    $txtFolder = $this->getTemplate($mailDirectory, $file, $templateName, 'text');

                    $this->copyTemplate($newHtmlFile, $htmlFolder);
                    $this->copyTemplate($newTxtFile, $txtFolder);
                }
            }
            closedir($dhValue);
        }

        return true;
    }

    /**
     * @param array $languages
     * @param string $text
     * @return array
     */
    private function setLanguages(array $languages, string $text): array
    {
        $data = [];
        foreach ($languages as $lang) {
            $data[$lang['id_lang']] = $text;
        }

        return $data;
    }

    /**
     * @param string $dir
     * @param string $subDir
     * @param string $fileName
     * @param string $type
     * @return string
     */
    private function getTemplate(string $dir, string $subDir, string $fileName, string $type = 'html')
    {
        return $type == 'html' ? sprintf('%s%s/%s.html', $dir, $subDir, $fileName) :
            sprintf('%s%s/%s.txt', $dir, $subDir, $fileName);
    }

    /**
     * @param string $newFile
     * @param string $oldFile
     * @return void
     */
    private function copyTemplate(string $newFile, string $oldFile)
    {
        try {
            Tools::copy($newFile, $oldFile);
        } catch (\Exception $e) {
            if (class_exists('Logger')) {
                Logger::addLog(json_encode($e->getMessage()), 1, null, null, null, true);
            }
        }
    }
}