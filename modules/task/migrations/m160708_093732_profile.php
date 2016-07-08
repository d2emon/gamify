<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_093732_profile extends Migration
{
    public function safeUp()
    {
	$this->createTable('profile2task', [
	    'profile_id' => Schema::TYPE_INTEGER,
	    'task_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('profile2task_profile_id_task_id', 'profile2task', ['profile_id', 'task_id'], True);
	$this->addForeignKey('profile2task_profile_id', 'profile2task', 'profile_id', 'profile', 'user_id');
	$this->addForeignKey('profile2task_task_id', 'profile2task', 'task_id', 'badge', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('profile2task_task_id', 'profile2task');
	$this->dropForeignKey('profile2task_profile_id', 'profile2task');
	$this->dropTable('profile2task');
        return true;
    }
}
