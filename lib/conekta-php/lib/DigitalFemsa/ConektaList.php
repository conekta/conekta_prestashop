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
 * @version   GIT: @2.3.7@
 *
 * @see       https://conekta.com/
 */

namespace DigitalFemsa;

class ConektaList extends ConektaObject
{
    public const LIMIT = 5;

    public function __construct($elements_type, $params = [])
    {
        parent::__construct();
        $this->elements_type = $elements_type;
        $this->params = $params;
        $this->total = 0;
    }

    public function addElement($element)
    {
        $element = Util::convertToConektaObject($element);
        $this[$this->total] = $element;
        $this->_values[$this->total] = $element;
        $this->total = $this->total + 1;

        return $this;
    }

    public function loadFromArray($values = null)
    {
        if (isset($values)) {
            $this->has_more = $values['has_more'];
            $this->total = $values['total'];

            foreach ($this as $key => $value) {
                $this->_unsetKey($key);
            }
        }

        if (isset($values['data'])) {
            return parent::loadFromArray($values['data']);
        }
    }

    public function next($options = ['limit' => self::LIMIT])
    {
        if (sizeof($this) > 0) {
            $this->params['next'] = end($this)->id;
        }

        $this->params['previous'] = null;

        return $this->_moveCursor($options['limit']);
    }

    public function previous($options = ['limit' => self::LIMIT])
    {
        if (sizeof($this) > 0) {
            $this->params['previous'] = $this[0]->id;
        }

        $this->params['next'] = null;

        return $this->_moveCursor($options['limit']);
    }

    protected function _moveCursor($limit)
    {
        if (isset($limit)) {
            $this->params['limit'] = $limit;
        }

        $class = Util::$types[strtolower($this->elements_type)];
        $url = ConektaResource::classUrl($class);
        $requestor = new Requestor();
        $response = $requestor->request('get', $url, $this->params);

        return $this->loadFromArray($response);
    }
}
