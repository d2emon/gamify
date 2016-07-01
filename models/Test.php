<?php

namespace app\models;

use app\modules\task\models\Task;

class Test extends \yii\base\Object
{
    private $_test;
    private $_tasks;
    private static $tests = [
	'100' => [
	'1' => [
	    'id' => 1,
	    'image' => "40/40",
            'title' => "Пульт оператора",
	    'tasks' => [10, 11, 12, 13],
	    'bonuses' => [],
	],
	'2' => [
	    'id' => 3,
	    'image' => "40/40",
	    'tasks' => [10],
            'title' => "Личный кабинет клиента",
	    'bonuses' => [
		'Снисходительная улыбка генерального директора',
		'3 очка',
	    ]
    	],
	],
    ];

    /**
     * Returns id
     *
     * @return integer
     */
    public function getId()
    {
	return $this->_test["id"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$avatar = sprintf("http://lorempixel.com/%s?seed=%s", $this->_test["image"], rand());
	return $avatar;
    }

    /**
     * Test name
     *
     * @return string
     */
    public function getTitle()
    {
	return $this->_test["title"];
    }

    /**
     * Test bonuses
     *
     * @return array
     */
    public function getBonuses()
    {
	return $this->_test["bonuses"];
    }

    /**
     * Tasks for next test
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
	foreach($this->_test["tasks"] as $task_id)
	{
	    $this->_tasks[] = Task::findOne($task_id);
	}
	return $this->_tasks;
    }

    /**
     * Finds by ID
     *
     * @return Test
     */
    public static function findByProfileId($profile_id)
    {
	$tests = [];
	foreach(array_keys(self::$tests[$profile_id]) as $test_id)
	{
	    $test = new Test();
	    $tests[] = $test->load($test_id);
	}
	return $tests;
    }

    /**
     * Loads by ID
     *
     * @return Test
     */
    public function load($test_id)
    {
	$this->_test = self::$tests[100][$test_id];
	return $this;
    }
}
