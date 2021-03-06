<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "bonus".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 */
class Bonus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bonus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 6],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('task', 'ID'),
            'title' => Yii::t('task', 'Title'),
            'image' => Yii::t('task', 'Image'),
            'description' => Yii::t('task', 'Description'),
        ];
    }
}
