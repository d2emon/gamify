<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_085702_profile extends Migration
{
    public function safeUp()
    {
	$this->addForeignKey('wallet_profile_id', 'wallet', 'profile_id', 'profile', 'user_id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('wallet_profile_id', 'wallet');
        return true;
    }
}
