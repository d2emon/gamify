<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "group2project".
 *
 * @property integer $group_id
 * @property integer $project_id
 *
 * @property TaskGroup $group
 * @property Project $project
 */
class Group2Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group2project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'project_id'], 'integer'],
            [['group_id', 'project_id'], 'unique', 'targetAttribute' => ['group_id', 'project_id'], 'message' => 'The combination of Group ID and Project ID has already been taken.'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => Yii::t('task', 'Group ID'),
            'project_id' => Yii::t('task', 'Project ID'),
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
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
