<?php

use yii\db\Schema;
use yii\db\Migration;

class m160707_134009_level extends Migration
{
    public function safeUp()
    {
	$this->createTable('level', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
	    'image' => 'varchar(6) NOT NULL',
	    'description' => Schema::TYPE_TEXT,
	    'bonus_score' => Schema::TYPE_INTEGER,
	]);
	$this->createTable('task2level', [
	    'task_id' => Schema::TYPE_INTEGER,
	    'level_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('task2level_task_id_level_id', 'task2level', ['task_id', 'level_id'], True);
	$this->addForeignKey('task2level_task_id', 'task2level', 'task_id', 'task', 'id');
	$this->addForeignKey('task2level_level_id', 'task2level', 'level_id', 'level', 'id');
	$this->createTable('level2bonus', [
	    'level_id' => Schema::TYPE_INTEGER,
	    'bonus_id' => Schema::TYPE_INTEGER,
	    'megabonus' => Schema::TYPE_BOOLEAN,
	]);
	$this->createIndex('level2bonus_level_id_bonus_id', 'level2bonus', ['level_id', 'bonus_id'], True);
	$this->addForeignKey('level2bonus_level_id', 'level2bonus', 'level_id', 'level', 'id');
	$this->addForeignKey('level2bonus_bonus_id', 'level2bonus', 'bonus_id', 'bonus', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('level2bonus_bonus_id',  'level2bonus');
	$this->dropForeignKey('level2bonus_level_id', 'level2bonus');
	$this->dropTable('level2bonus');
	$this->dropForeignKey('task2level_level_id', 'task2level');
	$this->dropForeignKey('task2level_task_id',  'task2level');
	$this->dropTable('task2level');
	$this->dropTable('level');
        return true;
    }
}
