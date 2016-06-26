<?php

namespace app\models;

class Task extends \yii\base\Object
{
    private $_task;
    private static $tasks = [
        ['done' => False, 'task' => 'Сдать тест на знание библии.',],
	['done' => False, 'task' => 'Сделать 7 успешных теплых звонков.',],
	['done' => False, 'task' => 'Сделать прививку.',],
	['done' => False, 'task' => 'Принять чат',],
	['done' => False, 'task' => 'Изгнать беса из клиента',],
	['done' => False, 'task' => 'Прикрепить контакт к карточке',],
	['done' => False, 'task' => 'Удалить себя из системы',],
	['done' => False, 'task' => 'Улыбнуться начальнику',],
	['done' => False, 'task' => 'Встать вовремя на работу',],
	['done' => False, 'task' => 'Основной функционал',],
	['done' => False, 'task' => 'Виртуальный ассистент',],
	['done' => False, 'task' => 'Звонок в пульт',],
	['done' => False, 'task' => 'Лиды из чата',],
    ];

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->_task["id"];
    }

    /**
     * Returns done
     *
     * @return boolean
     */
    public function getDone()
    {
	return $this->_task["done"];
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
