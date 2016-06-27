<?php

use yii\db\Schema;
use yii\db\Migration;

class m160627_053154_user extends Migration
{
    public function safeUp()
    {
	$this->createTable('user', [
	    'id' => Schema::TYPE_PK,
	    'username' => 'varchar(16) NOT NULL UNIQUE',
	    'password' => Schema::TYPE_STRING,
	    'accessToken' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
	    'accessKey' => Schema::TYPE_STRING,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('user');
        return true;
    }
}
