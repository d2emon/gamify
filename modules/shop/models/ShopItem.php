<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "shop_item".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $cost
 * @property string $description
 */
class ShopItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['cost'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'title' => Yii::t('shop', 'Title'),
            'image' => Yii::t('shop', 'Image'),
            'cost' => Yii::t('shop', 'Cost'),
            'description' => Yii::t('shop', 'Description'),
        ];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	return sprintf("/images/shop_items/%s.jpg", $this->image, $this->id);
    }
}
