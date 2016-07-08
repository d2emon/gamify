<?php

namespace app\modules\stat\models;

use Yii;

/**
 * This is the model class for table "stat".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $value
 * @property string $description
 */
class Stat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['value'], 'integer'],
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
            'id' => Yii::t('stat', 'ID'),
            'title' => Yii::t('stat', 'Title'),
            'image' => Yii::t('stat', 'Image'),
            'value' => Yii::t('stat', 'Value'),
            'description' => Yii::t('stat', 'Description'),
        ];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	return sprintf("/images/stats/%s.jpg", $this->image, $this->id);
    }
}
