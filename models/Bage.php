<?php

namespace app\models;

class Bage extends \yii\base\Object
{
    public $_bage;
    private static $bages = [
        '100' => [
	    [
		'image' => "150/150/",
		'text' => "Лучший чебурек недели",
	    ],
	    [
		'image' => "150/150/",
		'text' => "Почетный гвоздь",
	    ],
	    [
		'image' => "150/150/",
		'text' => "3 года в компании",
	    ],
	    [
		'image' => "150/150/",
		'text' => "Просто космос",
	    ],
	],
    ];

    /**
     * Returns text
     * @return string
     */
    public function getText()
    {
	return $this->_bage["text"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getImage()
    {
	return "http://lorempixel.com/".$this->_bage["image"]."?seed=".rand();
    }

    /**
     * Finds by Profile
     *
     * @return array
     */
    public static function findByProfileId($profile_id)
    {
	$bages = [];
	if(!isset(self::$bages[$profile_id]))
	{
	    return [];
	}
	foreach(self::$bages[$profile_id] as $bage_data)
	{
	    $bage = new Bage();
	    $bage->load($bage_data);
	    $bages[] = $bage;
	}
	return $bages;
    }

    /**
     * Loads by ID
     *
     * @return Profile
     */
    public function load($bage_data)
    {
	$this->_bage = $bage_data;
	return $this;
    }
}
