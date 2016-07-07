<?php

use yii\db\Schema;
use yii\db\Migration;

class m160707_113846_project extends Migration
{
    public function safeUp()
    {
	$this->createTable('project', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
	    'path' => Schema::TYPE_STRING,
	    'image' => 'varchar(6) NOT NULL',
	    'description' => Schema::TYPE_TEXT,
	]);
	$this->createTable('task2project', [
	    'task_id' => Schema::TYPE_INTEGER,
	    'project_id' => Schema::TYPE_INTEGER,
	]);
	$this->createTable('group2project', [
	    'group_id' => Schema::TYPE_INTEGER,
	    'project_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('task2project_task_id_project_id', 'task2project', ['task_id', 'project_id'], True);
	$this->addForeignKey('task2project_task_id', 'task2project', 'task_id', 'task', 'id');
	$this->addForeignKey('task2project_project_id', 'task2project', 'project_id', 'project', 'id');
	$this->createIndex('group2project_group_id_project_id', 'group2project', ['group_id', 'project_id'], True);
	$this->addForeignKey('group2project_group_id', 'group2project', 'group_id', 'task_group', 'id');
	$this->addForeignKey('group2project_project_id', 'group2project', 'project_id', 'project', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('group2project_project_id', 'group2project');
	$this->dropForeignKey('group2project_group_id',  'group2project');
	$this->dropForeignKey('task2project_project_id', 'task2project');
	$this->dropForeignKey('task2project_task_id',  'task2project');
	$this->dropTable('group2project');
	$this->dropTable('task2project');
	$this->dropTable('project');
        return true;
    }
}
