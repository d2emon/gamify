<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property integer $completed
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['description'], 'string'],
            [['completed'], 'integer'],
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
            'completed' => Yii::t('task', 'Completed'),
        ];
    }
}
