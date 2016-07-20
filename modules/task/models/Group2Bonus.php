<?php

namespace app\modules\task\models;

use Yii;

/**
 * This is the model class for table "group2bonus".
 *
 * @property integer $group_id
 * @property integer $bonus_id
 *
 * @property Bonus $bonus
 * @property TaskGroup $group
 */
class Group2Bonus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group2bonus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'bonus_id'], 'integer'],
            [['group_id', 'bonus_id'], 'unique', 'targetAttribute' => ['group_id', 'bonus_id'], 'message' => 'The combination of Group ID and Bonus ID has already been taken.'],
            [['bonus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bonus::className(), 'targetAttribute' => ['bonus_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => Yii::t('task', 'Group ID'),
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
    public function getGroup()
    {
        return $this->hasOne(TaskGroup::className(), ['id' => 'group_id']);
    }
}
