<?php

namespace app\models;

class Item extends \yii\base\Object
{
    private $_item;
    private $_tasks;
    private static $items = [
	'1' => [
	    'id' => 1,
	    'image' => "40/40",
	    'score' => 10,
	    'title' => 'Футболка',
	],
	'2' => [
	    'id' => 2,
	    'image' => "40/40",
	    'score' => 10,
	    'title' => 'Чашка с лого компании',
	],
	'3' => [
	    'id' => 3,
	    'image' => "40/40",
	    'score' => 30,
	    'title' => 'Заказ пиццы',
	],
	'4' => [
	    'id' => 4,
	    'image' => "40/40",
	    'score' => 50,
	    'title' => 'IPad Air',
	],
    ];

    /**
     * Returns id
     *
     * @return integer
     */
    public function getId()
    {
	return $this->_item["id"];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$avatar = sprintf("http://lorempixel.com/%s?seed=%s", $this->_item["image"], rand());
	return $avatar;
    }

    /**
     * Item name
     *
     * @return string
     */
    public function getTitle()
    {
	return $this->_item["title"];
    }

    /**
     * Item bonus score
     *
     * @return integer
     */
    public function getScore()
    {
	return $this->_item["score"];
    }

    /**
     * Finds by ID
     *
     * @return Item
     */
    public static function findById($item_id)
    {
	$item = new Item();
	return $item->load($item_id);
    }

    /**
     * Finds all
     *
     * @return array
     */
    public static function findAll()
    {
	$items = [];
	foreach(array_keys(self::$items) as $item_id)
	{
	    $item = new Item();
	    $items[] = $item->load($item_id);
	}
	return $items;
    }

    /**
     * Loads by ID
     *
     * @return Item
     */
    public function load($item_id)
    {
	$this->_item = self::$items[$item_id];
	return $this;
    }
}
