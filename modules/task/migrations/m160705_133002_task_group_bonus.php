<?php

use yii\db\Schema;
use yii\db\Migration;

class m160705_133002_task_group_bonus extends Migration
{
    public function safeUp()
    {
	$this->createTable('group2bonus', [
	    'group_id' => Schema::TYPE_INTEGER,
	    'bonus_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('group2bonus_group_id_bonus_id', 'group2bonus', ['group_id', 'bonus_id'], True);
	$this->addForeignKey('group2bonus_group_id', 'group2bonus', 'group_id', 'task_group', 'id');
	$this->addForeignKey('group2bonus_bonus_id', 'group2bonus', 'bonus_id', 'bonus', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('group2bonus_group_id', 'group2bonus');
	$this->dropForeignKey('group2bonus_bonus_id',  'group2bonus');
	$this->dropTable('group2bonus');
        return true;
    }
}
