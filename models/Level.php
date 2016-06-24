<?php

namespace app\models;

class Level extends \yii\base\Object
{
    private $_level;
    private $_tasks;
    private static $levels = [
	'1' => [
	    'id' => 1,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'2' => [
	    'id' => 2,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'3' => [
	    'id' => 3,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'4' => [
	    'id' => 4,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'5' => [
	    'id' => 5,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'6' => [
	    'id' => 6,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
        '7' => [
            'id' => 7,
	    'image' => "40/40/",
            'title' => "Warmaster",
	    'tasks' => [0, 1, 2],
	    /*
		    ['done' => False, 'task' => 'Сдать тест на знание библии.',],
		    ['done' => False, 'task' => 'Сделать 7 успешных теплых звонков.',],
		    ['done' => False, 'task' => 'Сделать прививку.',],
	     */
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'8' => [
	    'id' => 8,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'9' => [
	    'id' => 9,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
	'10' => [
	    'id' => 10,
	    'image' => "40/40",
	    'bonus_score' => 10,
	    'bonus' => 'Повышение количества одновременно съедаемых печенек на 2',
	    'megabonus' => 'Отгул в любой день',
	],
    ];

    /**
     * Returns id
     *
     * @return integer
     */
    public function getId()
    {
	return $this->_level["id"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$avatar = sprintf("http://lorempixel.com/%s?seed=%s", $this->_level["image"], rand());
	return $avatar;
    }

    /**
     * Level name
     *
     * @return string
     */
    public function getTitle()
    {
	return $this->_level["title"];
    }

    /**
     * Level bonus
     *
     * @return string
     */
    public function getBonus()
    {
	return $this->_level["bonus"];
    }

    /**
     * Level bonus score
     *
     * @return integer
     */
    public function getBonus_score()
    {
	return $this->_level["bonus_score"];
    }

    /**
     * Level megabonus
     *
     * @return string
     */
    public function getMegabonus()
    {
	return $this->_level["megabonus"];
    }

    /**
     * Tasks for next level
     *
     * @return array
     */
    public function getTasks()
    {
	if(isset($this->_tasks))
	{
	    return $this->_tasks;
	}

	$this->_tasks = [];
	foreach($this->_level["tasks"] as $task_id)
	{
	    $this->_tasks[] = Task::findById($task_id);
	}
	return $this->_tasks;
    }

    /**
     * Finds by ID
     *
     * @return Level
     */
    public static function findById($level_id)
    {
	$level = new Level();
	return $level->load($level_id);
    }

    /**
     * Finds all
     *
     * @return array
     */
    public static function findAll()
    {
	$levels = [];
	foreach(array_keys(self::$levels) as $level_id)
	{
	    $level = new Level();
	    $levels[] = $level->load($level_id);
	}
	return $levels;
    }

    /**
     * Loads by ID
     *
     * @return Level
     */
    public function load($level_id)
    {
	$this->_level = self::$levels[$level_id];
	return $this;
    }
}
