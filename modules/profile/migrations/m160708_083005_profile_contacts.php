<?php

use yii\db\Migration;

class m160708_083005_profile_contacts extends Migration
{
    public function safeUp()
    {
	$this->addForeignKey('contact_profile_id', 'contact', 'profile_id', 'profile', 'user_id');
        return True;
    }

    public function safeDown()
    {
	$this->dropForeignKey('contact_profile_id', 'contact');
        return True;
    }
}
