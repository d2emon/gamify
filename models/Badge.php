<?php

namespace app\models;

class Badge extends \yii\base\Object
{
    private $_badge;
    private static $badges = [
        '100' => [
	    [
		'id' => 1,
		'image' => "150/150/",
		'text' => "Лучший чебурек недели",
		'description' => 'Вручается лучшему чебуреку недели',
	    ],
	    [
		'id' => 2,
		'image' => "150/150/",
		'text' => "Почетный гвоздь",
		'description' => 'Вручается лучшему чебуреку недели',
	    ],
	    [
		'id' => 3,
		'image' => "150/150/",
		'text' => "3 года в компании",
		'description' => 'Вручается лучшему чебуреку недели',
	    ],
	    [
		'id' => 4,
		'image' => "150/150/",
		'text' => "Просто космос",
		'description' => 'Вручается лучшему чебуреку недели',
	    ],
	],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->_badge["id"];
    }

    /**
     * Returns text
     * @return string
     */
    public function getText()
    {
	return $this->_badge["text"];
    }

    /**
     * Returns description
     * @return string
     */
    public function getDescription()
    {
	return $this->_badge["description"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getImage()
    {
	return "http://lorempixel.com/".$this->_badge["image"]."?seed=".rand();
    }

    /**
     * Finds by Profile
     *
     * @return array
     */
    public static function find($options)
    {
	if(isset($options['badge_id']) && $options['badge_id'])
	{
	    $badge_id = $options['badge_id'];
	    $badge = new Badge();
	    $badge->load(self::$badges[100][$badge_id - 1]);
	    return [$badge];
        }
		
	$badgelist = [];
	if(isset($options['user_id']) && $options['user_id'])
	{    
	    $user_id = $options['user_id'];

	    if(!isset(self::$badges[$user_id]))
	    {
	        return [];
	    }
	    $badgelist = self::$badges[$user_id];
	}
	else
	{
	    $badgelist = self::$badges[100];
	}

	$badges = [];
	foreach($badgelist as $badge_data)
	{
	    $badge = new Badge();
	    $badge->load($badge_data);
	    $badges[] = $badge;
	}
	return $badges;
    }

    /**
     * Loads by ID
     *
     * @return Profile
     */
    public function load($badge_data)
    {
	$this->_badge = $badge_data;
	return $this;
    }
}
