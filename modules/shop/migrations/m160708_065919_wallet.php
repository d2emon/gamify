<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_065919_wallet extends Migration
{
    public function safeUp()
    {
	$this->createTable('wallet', [
	    'id' => Schema::TYPE_PK,
	    'profile_id' => Schema::TYPE_INTEGER . ' NOT NULL',
	    'value' => Schema::TYPE_INTEGER,
	]);
        return true;
    }

    public function safeDown()
    {
	$this->dropTable('wallet');
        return true;
    }
}
