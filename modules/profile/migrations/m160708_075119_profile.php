<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_075119_profile extends Migration
{
    public function safeUp()
    {
	$this->createTable('profile', [
	    'user_id' => Schema::TYPE_INTEGER,
	    'firstname' => Schema::TYPE_STRING,
	    'middlename' => Schema::TYPE_STRING,
	    'lastname' => Schema::TYPE_STRING,
	    'hobby' => Schema::TYPE_TEXT,
	    'education' => Schema::TYPE_TEXT,
	    'image' => 'varchar(6)',
	    'rating' => Schema::TYPE_INTEGER,
	    // 'level_id' => Schema::TYPE_INTEGER,
	    // 'job_id' => Schema::TYPE_INTEGER,

	]);
	$this->createIndex('profile_user_id', 'profile', 'user_id', True);
	$this->addForeignKey('profile_user_id', 'profile', 'user_id', 'user', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('profile_user_id', 'profile');
	$this->dropTable('profile');
        return true;
    }
}
