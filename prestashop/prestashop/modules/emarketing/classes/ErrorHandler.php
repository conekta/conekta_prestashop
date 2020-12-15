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
 * Class ErrorHandler
 * @package Emarketing
 */
class ErrorHandler
{
    /**
     * @var array
     */
    private $phpErrors = array();

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function handleExceptions($exception)
    {
        $response = array(
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTrace()
        );

        // Catch PrestaShopException
        if (!is_null($exception->getPrevious())) {
            $response['trace'] = $exception->getPrevious()->getTrace();
        }

        if (get_class($exception) == 'Emarketing\ClientError') {
            return $this->outputError(422, $response);
        }

        return $this->outputError(520, $response);
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     *
     * @throws \ErrorException
     */
    public function handleErrors($errno, $errstr, $errfile, $errline)
    {
        if ($errno == E_ERROR || $errno == E_USER_ERROR) {
            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        }

        $this->phpErrors[] = array(
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
            'errno' => $errno
        );
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->phpErrors;
    }

    /**
     * @param $httpCode
     * @param $response
     * @return bool
     */
    public function outputError($httpCode, $response)
    {
        header('X-PHP-Response-Code: ' . $httpCode, true, $httpCode);
        echo json_encode($response);

        return true;
    }
}
