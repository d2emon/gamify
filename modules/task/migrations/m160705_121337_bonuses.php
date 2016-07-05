<?php

use yii\db\Schema;
use yii\db\Migration;

class m160705_121337_bonuses extends Migration
{
    public function safeUp()
    {
	$this->createTable('bonus', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
	    'image' => 'varchar(6) NOT NULL',
	    'description' => Schema::TYPE_TEXT,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('bonus');
        return true;
    }
}
