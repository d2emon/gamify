<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_052242_shop_item extends Migration
{
    public function safeUp()
    {
	$this->createTable('shop_item', [
	    'id' => Schema::TYPE_PK,
	    'title' => Schema::TYPE_STRING . ' NOT NULL',
	    'image' => 'varchar(6)',
	    'cost' => Schema::TYPE_INTEGER,
	    'description' => Schema::TYPE_TEXT,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('shop_item');
        return true;
    }
}
