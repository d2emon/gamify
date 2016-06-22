<?php

namespace app\models;

class Score extends \yii\base\Object
{
    private $_score;
    private $_level;
    private static $scores = [
        '100' => [
            'id' => '100',
	    'score' => 120,
	    'level' => 7,
	    'shop' => '3 отпуска',
	],
    ];

    /**
     * Returns id
     *
     * @return integer
     */
    public function getId()
    {
	return $this->_score["id"];
    }

    /**
     * Score points
     *
     * @return integer
     */
    public function getScore()
    {
	return $this->_score["score"];
    }

    /**
     * Level
     *
     * @return Level
     */
    public function getLevel()
    {
	if(!isset($this->_level))
	{
	    $this->_level = Level::findById($this->_score['level']);
	}
	return $this->_level;
    }

    /**
     * Things to buy
     *
     * @return string
     */
    public function getShop()
    {
	return $this->_score["shop"];
    }

    /**
     * Finds by ID
     *
     * @return Score
     */
    public static function findByProfileId($profile_id)
    {
	$score = new Score();
	return $score->load($profile_id);
    }

    /**
     * Loads by ID
     *
     * @return Score
     */
    public function load($profile_id)
    {
	$this->_score = self::$scores[$profile_id];
	return $this;
    }
}
