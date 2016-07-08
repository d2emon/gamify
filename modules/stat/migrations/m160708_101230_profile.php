<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_101230_profile extends Migration
{
    public function safeUp()
    {
	$this->addForeignKey('stat_profile_id', 'stat', 'profile_id', 'profile', 'user_id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('stat_profile_id', 'stat');
        return true;
    }
}
