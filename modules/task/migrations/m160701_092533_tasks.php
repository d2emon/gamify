<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_092533_tasks extends Migration
{
    public function safeUp()
    {
	$this->createTable('task', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
	    'image' => 'varchar(6) NOT NULL',
	    'description' => Schema::TYPE_TEXT,
	    'completed' => Schema::TYPE_BOOLEAN,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('task');
        return true;
    }
}
