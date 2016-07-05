<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "task_group".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 *
 * @property Task2group[] $task2groups
 * @property Task[] $tasks
 */
class TaskGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_group';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getTask2groups()
    {
        return $this->hasMany(Task2group::className(), ['group_id' => 'id']);
    }
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'task_id'])->viaTable('task2group', ['group_id' => 'id']);
    }
}
