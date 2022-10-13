<?php

class CnkConfig
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return Configuration::get($key);
    }

    /**
     * @param array $key
     * @return mixed
     */
    public function getMultiple(array $key)
    {
        return Configuration::getMultiple($key);
    }

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function update(string $key, $value)
    {
        return Configuration::updateValue($key, $value);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function delete(string $key)
    {
        return Configuration::deleteByName($key);
    }
}