<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "profile2task".
 *
 * @property integer $profile_id
 * @property integer $task_id
 *
 * @property Profile $profile
 * @property Badge $task
 */
class Profile2Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile2task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'task_id'], 'integer'],
            [['profile_id', 'task_id'], 'unique', 'targetAttribute' => ['profile_id', 'task_id'], 'message' => 'The combination of Profile ID and Task ID has already been taken.'],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'user_id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Badge::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => Yii::t('task', 'Profile ID'),
            'task_id' => Yii::t('task', 'Task ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Badge::className(), ['id' => 'task_id']);
    }
}
