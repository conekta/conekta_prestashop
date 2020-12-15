<?php

use PHPUnit\Framework\TestCase;

class AdviceTest extends TestCase
{
    /**
     * @var array the list of expected properties of Advice model
     */
    const ADVICE_PROPERTIES = [
        'table',
        'primary',
        'multilang',
        'fields',
    ];

    /**
     * @var array the list of fields of Advice model
     */
    const ADVICE_FIELDS = [
        'id_ps_advice',
        'id_tab',
        'selector',
        'location',
        'validated',
        'start_day',
        'stop_day',
        'weight',
        'html',
    ];

    /**
     * @var array the Advice
     */
    private $advice;

    protected function setUp()
    {
        $this->advice = new Advice();
    }

    public function testAdviceDefinitionIsValid()
    {
        $definition = Advice::$definition;

        $this->assertInternalType('array', $definition);

        foreach (self::ADVICE_PROPERTIES as $property) {
            $this->assertArrayHasKey($property, $definition);
        }

        $fieldsProperty = $definition['fields'];

        foreach (self::ADVICE_FIELDS as $field) {
            $this->assertArrayHasKey($field, $fieldsProperty);
        }
    }
}
