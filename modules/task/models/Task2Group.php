<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "task2group".
 *
 * @property integer $task_id
 * @property integer $group_id
 *
 * @property TaskGroup $group
 * @property Task $task
 */
class Task2Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'group_id'], 'integer'],
            [['task_id', 'group_id'], 'unique', 'targetAttribute' => ['task_id', 'group_id'], 'message' => 'The combination of Task ID and Group ID has already been taken.'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => Yii::t('task', 'Task ID'),
            'group_id' => Yii::t('task', 'Group ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(TaskGroup::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
