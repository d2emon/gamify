<?php

namespace app\models;

class Contact extends \yii\base\Object
{
    public $_contact;
    private static $contacts = [
        '100' => [
	    ['contact_type' => 'email', 'value' => 'margarin_240@gmail.com', ],
	    ['contact_type' => 'phone', 'value' => '89072415396',            ],
	    ['contact_type' => 'skype', 'value' => 'marg_240',               ],
	],
    ];

    /**
     * Returns value
     * @return string
     */
    public function getValue()
    {
	return $this->_contact["value"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getImage()
    {
	return "http://lorempixel.com/24/24/?seed=".rand();
    }

    /**
     * Finds by Profile
     *
     * @return array
     */
    public static function findByProfileId($profile_id)
    {
	$contacts = [];
	if(!isset(self::$contacts[$profile_id]))
	{
	    return [];
	}
	foreach(self::$contacts[$profile_id] as $contact_data)
	{
	    $contact = new Contact();
	    $contact->load($contact_data);
	    $contacts[] = $contact;
	}
	return $contacts;
    }

    /**
     * Loads by ID
     *
     * @return Profile
     */
    public function load($contact_data)
    {
	$this->_contact = $contact_data;
	return $this;
    }
}
