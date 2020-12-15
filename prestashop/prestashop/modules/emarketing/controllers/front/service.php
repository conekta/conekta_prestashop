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

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

/**
 * Class EmarketingServiceModuleFrontController
 */
class EmarketingServiceModuleFrontController extends ModuleFrontController
{
    /**
     * @var \Emarketing\ErrorHandler
     */
    private $errorHandler;

    /**
     * EmarketingServiceModuleFrontController constructor.
     */
    public function __construct()
    {
        $this->errorHandler = new Emarketing\ErrorHandler();
    }

    /**
     *
     */
    public function init()
    {
        header('Content-Type: application/json; charset=utf-8', true);

        $module = \Module::getInstanceByName('emarketing');
        header('X-Plugin-Version: ' . $module->version, true);

        $this->handleErrors();
    }

    /**
     * @return bool
     */
    public function display()
    {
        return true;
    }

    /**
     * @throws Exception
     */
    public function initContent()
    {
        $postData = json_decode(\Tools::file_get_contents('php://input'), true);

        try {
            if (!$this->authenticate($postData)) {
                return $this->errorHandler->outputError(401, array('errors' => 'Invalid token'));
            }

            $result = $this->handleActions($postData);
        } catch (\PrestaShopException $exception) {
            throw new \Exception($exception->getMessage(), 0, $exception);
        }

        $result = array('result' => $result, 'errors' => $this->errorHandler->getErrors());

        echo json_encode($result, JSON_FORCE_OBJECT);
    }

    /**
     *
     */
    private function handleErrors()
    {
        ini_set('display_errors', 'Off');
        set_exception_handler(array($this->errorHandler, 'handleExceptions'));
        set_error_handler(array($this->errorHandler, 'handleErrors'));
    }

    /**
     * @param $postData
     * @return bool
     */
    private function authenticate($postData)
    {
        $token = \Configuration::get('EMARKETING_SHOPTOKEN');

        if (empty($postData['authorization']) || empty($token)) {
            return false;
        }

        if (strpos($token, ':') !== false) {
            $tokenParts = explode(':', $token);
            $token = $tokenParts[1];
        }

        if ($postData['authorization'] == $token) {
            return true;
        }

        return false;
    }

    /**
     * @param $postData
     * @return array|bool
     * @throws \Emarketing\ClientError
     * @throws Exception
     */
    private function handleActions($postData)
    {
        switch ($postData['action']) {
            case 'categories':
                $action = new \Emarketing\Action\Categories;
                return $action->fetchCategory($postData);
            case 'countries':
                $action = new \Emarketing\Action\Countries;
                return $action->fetchCountries();
            case 'attributes':
                $action = new \Emarketing\Action\Attributes;
                return $action->fetchAttributes($postData);
            case 'products':
                $action = new \Emarketing\Action\Products;
                return $action->fetchProducts($postData);
            case 'tracker':
            case 'google':
                $action = new \Emarketing\Action\GoogleTracker;
                return $action->receiveTracker($postData);
            case 'verification':
                $action = new \Emarketing\Action\Verification;
                return $action->receiveTag($postData);
            case 'facebook':
                $action = new \Emarketing\Action\FacebookPixel;
                return $action->receivePixel($postData);
            default:
                throw new \Emarketing\ClientError('Not a valid action');
        }
    }
}
