<?php

namespace app\models;

class Job extends \yii\base\Object
{
    public $_job;
    private static $jobs = [
        '100' => [
            'id' => '100',
            'image' => "150/150",
	    'url' => "#",
	    'workspace' => "2 этаж",
	    'position' => "Менеджер по теплым звонкам",
	    'responsibilities' => "Увеличивать количество клиентов на девятом этапе воронки продаж",
	],
    ];

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$avatar = sprintf("http://lorempixel.com/%s?seed=%s", $this->_job["image"], rand());
	return $avatar;
    }

    /**
     * Forms url
     *
     * @return string
     */
    public function getUrl()
    {
        return "#";
    }

    /**
     * Workspace name
     *
     * @return string
     */
    public function getWorkspace()
    {
	return $this->_job["workspace"];
    }

    /**
     * Work position
     *
     * @return string
     */
    public function getPosition()
    {
	return $this->_job["position"];
    }

    /**
     * Responsibilities
     *
     * @return string
     */
    public function getResponsibilities()
    {
	return $this->_job["responsibilities"];
    }

    /**
     * Finds by ID
     *
     * @return Job
     */
    public static function findByProfileId($profile_id)
    {
	$job = new Job();
	return $job->load($profile_id);
    }

    /**
     * Loads by ID
     *
     * @return Job
     */
    public function load($profile_id)
    {
	$this->_job = self::$jobs[$profile_id];
	return $this;
    }
}
