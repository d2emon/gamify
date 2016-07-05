<?php

use yii\db\Schema;
use yii\db\Migration;

class m160705_123837_task_group extends Migration
{
    public function safeUp()
    {
	$this->createTable('task_group', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
	    'image' => 'varchar(6) NOT NULL',
	    'description' => Schema::TYPE_TEXT,
	]);
	$this->createTable('task2group', [
	    'task_id' => Schema::TYPE_INTEGER,
	    'group_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('task2group_task_id_group_id', 'task2group', ['task_id', 'group_id'], True);
	$this->addForeignKey('task2group_task_id', 'task2group', 'task_id', 'task', 'id');
	$this->addForeignKey('task2group_group_id', 'task2group', 'group_id', 'task_group', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('task2group_group_id', 'task2group');
	$this->dropForeignKey('task2group_task_id',  'task2group');
	$this->dropTable('task2group');
	$this->dropTable('task_group');
        return true;
    }
}
