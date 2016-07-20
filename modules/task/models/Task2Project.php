<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "task2project".
 *
 * @property integer $task_id
 * @property integer $project_id
 *
 * @property Project $project
 * @property Task $task
 */
class Task2Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task2project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'project_id'], 'integer'],
            [['task_id', 'project_id'], 'unique', 'targetAttribute' => ['task_id', 'project_id'], 'message' => 'The combination of Task ID and Project ID has already been taken.'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
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
            'project_id' => Yii::t('task', 'Project ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
