<?php

use yii\db\Schema;
use yii\db\Migration;

class m160708_092536_profile extends Migration
{
    public function safeUp()
    {
	$this->createTable('profile2badge', [
	    'profile_id' => Schema::TYPE_INTEGER,
	    'badge_id' => Schema::TYPE_INTEGER,
	]);
	$this->createIndex('profile2badge_profile_id_badge_id', 'profile2badge', ['profile_id', 'badge_id'], True);
	$this->addForeignKey('profile2badge_profile_id', 'profile2badge', 'profile_id', 'profile', 'user_id');
	$this->addForeignKey('profile2badge_badge_id', 'profile2badge', 'badge_id', 'badge', 'id');
        return true;
    }

    public function safeDown()
    {
	$this->dropForeignKey('profile2badge_badge_id', 'profile2badge');
	$this->dropForeignKey('profile2badge_profile_id', 'profile2badge');
	$this->dropTable('profile2badge');
        return true;
    }
}
