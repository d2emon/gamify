<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_085923_profile extends Migration
{
    public function safeUp()
    {
	$this->createTable('profile2level', [
	    'profile_id' => Schema::TYPE_INTEGER,
	    'level_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('profile2level_profile_id_level_id', 'profile2level', 'profile_id', True);
	$this->addForeignKey('profile_profile_id', 'profile2level', 'profile_id', 'profile', 'user_id');
	$this->addForeignKey('profile_level_id', 'profile2level', 'level_id', 'level', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('profile_level_id', 'profile2level');
	$this->dropForeignKey('profile_profile_id', 'profile2level');
	$this->dropTable('profile2level');
        return true;
    }
}
