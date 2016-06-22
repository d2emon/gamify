<?php

namespace app\models;

class Stat extends \yii\base\Object
{
    private $_stat;
    private static $stats = [
        '100' => [
	        [
		    'image' => "36/36/",
		    'value' => 121,
		    'text' => 'теплых звонков',
		],
	        [
		    'image' => "36/36/",
		    'value' => 63,
		    'text' => 'привлеченных клиента',
		],
	        [
		    'image' => "36/36/",
		    'value' => 3,
		    'text' => 'отказа от печенек',
		],
	        [
		    'image' => "36/36/",
		    'value' => 1315,
		    'text' => 'дней проработано',
		],
	],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->_stat["id"];
    }

    /**
     * Returns text
     *
     * @return string
     */
    public function getText()
    {
	return $this->_stat["text"];
    }

    /**
     * Returns value
     * @return string
     */
    public function getValue()
    {
	return $this->_stat["value"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getImage()
    {
	return "http://lorempixel.com/".$this->_stat["image"]."?seed=".rand();
    }

    /**
     * Finds by Profile
     *
     * @return array
     */
    public static function findByProfileId($profile_id)
    {
	$stats = [];
	if(!isset(self::$stats[$profile_id]))
	{
	    return [];
	}
	foreach(self::$stats[$profile_id] as $stat_data)
	{
	    $stat = new Stat();
	    $stat->load($stat_data);
	    $stats[] = $stat;
	}
	return $stats;
    }

    /**
     * Loads by ID
     *
     * @return Profile
     */
    public function load($stat_data)
    {
	$this->_stat = $stat_data;
	return $this;
    }
}
