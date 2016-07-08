<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_062628_stat_profile_id extends Migration
{
    public function safeUp()
    {
	$this->addColumn('stat', 'profile_id', Schema::TYPE_INTEGER);
	return true;
    }

    public function safeDown()
    {
	$this->dropColumn('stat', 'profile_id');
        return true;
    }
}
