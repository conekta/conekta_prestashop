<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @2.3.6@
 *
 * @see       https://conekta.com/
 */

namespace Conekta;

class Subscription extends ConektaResource
{
    public function instanceUrl()
    {
        $this->apiVersion = Conekta::$apiVersion;
        $id = $this->id;
        parent::idValidator($id);
        $class = get_class($this);
        $base = '/subscription';
        $customerUrl = $this->customer->instanceUrl();

        return $customerUrl . $base;
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function cancel()
    {
        return parent::_customAction('post', 'cancel');
    }

    public function pause()
    {
        return parent::_customAction('post', 'pause');
    }

    public function resume()
    {
        return parent::_customAction('post', 'resume');
    }
}
