<?php

namespace app\modules\level\models;

use Yii;

/**
 * This is the model class for table "task2level".
 *
 * @property integer $task_id
 * @property integer $level_id
 *
 * @property Level $level
 * @property Task $task
 */
class Task2Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task2level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'level_id'], 'integer'],
            [['task_id', 'level_id'], 'unique', 'targetAttribute' => ['task_id', 'level_id'], 'message' => 'The combination of Task ID and Level ID has already been taken.'],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => Yii::t('level', 'Task ID'),
            'level_id' => Yii::t('level', 'Level ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
