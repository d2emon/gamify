<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_061338_stat extends Migration
{
    public function safeUp()
    {
	$this->createTable('stat', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL',
	    'image' => 'varchar(6)',
	    'value' => Schema::TYPE_INTEGER,
	    'description' => Schema::TYPE_TEXT,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('stat');
        return true;
    }
}
