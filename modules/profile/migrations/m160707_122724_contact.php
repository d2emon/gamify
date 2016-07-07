<?php

use yii\db\Schema;
use yii\db\Migration;

class m160707_122724_contact extends Migration
{
    public function safeUp()
    {
	$this->createTable('contact', [
	    'id' => Schema::TYPE_PK,
	    'profile_id' => Schema::TYPE_INTEGER,
	    'type_id' => Schema::TYPE_INTEGER,
	    'value' => Schema::TYPE_STRING,
	    'description' => Schema::TYPE_TEXT,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('contact');
        return true;
    }
}
