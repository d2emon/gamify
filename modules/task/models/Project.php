<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $title
 * @property string $path
 * @property string $image
 * @property string $description
 *
 * @property Group2project[] $group2projects
 * @property TaskGroup[] $groups
 * @property Project2bonus[] $project2bonuses
 * @property Bonus[] $bonuses
 * @property Task2project[] $task2projects
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['description'], 'string'],
            [['title', 'path'], 'string', 'max' => 255],
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
            'path' => Yii::t('task', 'Path'),
            'image' => Yii::t('task', 'Image'),
            'description' => Yii::t('task', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(TaskGroup::className(), ['id' => 'group_id'])->viaTable('group2project', ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonuses()
    {
        return $this->hasMany(Bonus::className(), ['id' => 'bonus_id'])->viaTable('project2bonus', ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'task_id'])->viaTable('task2project', ['project_id' => 'id']);
    }
}
