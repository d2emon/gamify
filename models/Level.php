<?php

namespace app\models;

class Level extends \yii\base\Object
{
    private $_level;
    private $_tasks;
    private static $levels = [
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
