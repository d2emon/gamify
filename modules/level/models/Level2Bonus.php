<?php

namespace app\modules\level\models;

use Yii;
use app\modules\task\models\Bonus;

/**
 * This is the model class for table "level2bonus".
 *
 * @property integer $level_id
 * @property integer $bonus_id
 * @property integer $megabonus
 *
 * @property Bonus $bonus
 * @property Level $level
 */
class Level2Bonus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level2bonus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id', 'bonus_id', 'megabonus'], 'integer'],
            [['level_id', 'bonus_id'], 'unique', 'targetAttribute' => ['level_id', 'bonus_id'], 'message' => 'The combination of Level ID and Bonus ID has already been taken.'],
            [['bonus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bonus::className(), 'targetAttribute' => ['bonus_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => Yii::t('level', 'Level ID'),
            'bonus_id' => Yii::t('level', 'Bonus ID'),
            'megabonus' => Yii::t('level', 'Megabonus'),
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
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }
}
