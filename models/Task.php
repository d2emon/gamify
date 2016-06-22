<?php

namespace app\models;

class Task extends \yii\base\Object
{
    public $_task;
    private static $tasks = [
        ['done' => False, 'task' => 'Сдать тест на знание библии.',],
	['done' => False, 'task' => 'Сделать 7 успешных теплых звонков.',],
	['done' => False, 'task' => 'Сделать прививку.',],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->_task["id"];
    }

    /**
     * Returns task
     *
     * @return string
     */
    public function getTask()
    {
	return $this->_task["task"];
    }

    /**
     * Finds by Id
     *
     * @return Task
     */
    public static function findById($task_id)
    {
	$task = new Task();
	$task->load(self::$tasks[$task_id]);
	return $task;
    }

    /**
     * Loads by ID
     *
     * @return Profile
     */
    public function load($task_data)
    {
	$this->_task = $task_data;
	return $this;
    }
}
