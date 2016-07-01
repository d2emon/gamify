<?php

namespace app\models;

use app\modules\task\models\Task;

class Campaign extends \yii\base\Object
{
    private $_campaign;
    private $_tasks;
    private static $campaigns = [
	'100' => [
	'1' => [
	    'id' => 1,
	    'image' => "40/40",
            'title' => "Пульт оператора",
	    'tasks' => [4,5],
	    'bonuses' => [],
	],
	'2' => [
	    'id' => 2,
	    'image' => "40/40",
            'title' => "CRM",
	    'tasks' => [6,7],
	    'bonuses' => [],
	],
	'3' => [
	    'id' => 3,
	    'image' => "40/40",
	    'tasks' => [8,9],
            'title' => "Компания",
	    'bonuses' => [
		'Хорошее настроение у начальства',
		'3 к хмурению бровок',
	    ]
    	],
	],
    ];

    /**
     * Returns id
     *
     * @return integer
     */
    public function getId()
    {
	return $this->_campaign["id"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$avatar = sprintf("http://lorempixel.com/%s?seed=%s", $this->_campaign["image"], rand());
	return $avatar;
    }

    /**
     * Campaign name
     *
     * @return string
     */
    public function getTitle()
    {
	return $this->_campaign["title"];
    }

    /**
     * Campaign bonuses
     *
     * @return array
     */
    public function getBonuses()
    {
	return $this->_campaign["bonuses"];
    }

    /**
     * Tasks for next campaign
     *
     * @return array
     */
    public function getTasks()
    {
	if(isset($this->_tasks))
	{
	    return $this->_tasks;
	}

	$this->_tasks = [];
	foreach($this->_campaign["tasks"] as $task_id)
	{
	    $this->_tasks[] = Task::findOne($task_id);
	}
	return $this->_tasks;
    }

    /**
     * Finds by ID
     *
     * @return Campaign
     */
    public static function findByProfileId($profile_id)
    {
	$campaigns = [];
	foreach(array_keys(self::$campaigns[$profile_id]) as $campaign_id)
	{
	    $campaign = new Campaign();
	    $campaigns[] = $campaign->load($campaign_id);
	}
	return $campaigns;
    }

    /**
     * Loads by ID
     *
     * @return Campaign
     */
    public function load($campaign_id)
    {
	$this->_campaign = self::$campaigns[100][$campaign_id];
	return $this;
    }
}
