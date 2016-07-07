<?php

use yii\db\Schema;
use yii\db\Migration;

class m160707_115242_project_bonuses extends Migration
{
    public function safeUp()
    {
	$this->createTable('project2bonus', [
	    'project_id' => Schema::TYPE_INTEGER,
	    'bonus_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('project2bonus_project_id_bonus_id', 'project2bonus', ['project_id', 'bonus_id'], True);
	$this->addForeignKey('project2bonus_bonus_id', 'project2bonus', 'bonus_id', 'bonus', 'id');
	$this->addForeignKey('project2bonus_project_id', 'project2bonus', 'project_id', 'project', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('project2bonus_project_id', 'project2bonus');
	$this->dropForeignKey('project2bonus_bonus_id',  'project2bonus');
	$this->dropTable('project2bonus');
        return true;
    }
}
