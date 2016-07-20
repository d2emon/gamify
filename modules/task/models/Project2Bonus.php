<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "project2bonus".
 *
 * @property integer $project_id
 * @property integer $bonus_id
 *
 * @property Bonus $bonus
 * @property Project $project
 */
class Project2Bonus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project2bonus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'bonus_id'], 'integer'],
            [['project_id', 'bonus_id'], 'unique', 'targetAttribute' => ['project_id', 'bonus_id'], 'message' => 'The combination of Project ID and Bonus ID has already been taken.'],
            [['bonus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bonus::className(), 'targetAttribute' => ['bonus_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('task', 'Project ID'),
            'bonus_id' => Yii::t('task', 'Bonus ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonus()
    {
        return $this->hasOne(Bonus::className(), ['id' => 'bonus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
