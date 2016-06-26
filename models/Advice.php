<?php

namespace app\models;

class Advice extends \yii\base\Object
{
    private $_advice;
    private static $advices = [
        '100' => [
		'id' => 1,
		'text' => "Не расстраивайтесь, что вы на 15 месте!\nПусть мама за вас расстраивается, бесполезный вы неудачник.",
	],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->_advice["id"];
    }

    /**
     * Returns text
     * @return string
     */
    public function getText()
    {
	return $this->_advice["text"];
    }

    /**
     * Finds random
     *
     * @return advice
     */
    public static function find()
    {
	$advice = new Advice();
	$advice->load(self::$advices[100]);
	return $advice;
    }

    /**
     * Loads by ID
     *
     * @return Advice
     */
    public function load($advice_data)
    {
	$this->_advice = $advice_data;
	return $this;
    }
}
