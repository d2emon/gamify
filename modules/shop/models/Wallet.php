<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property integer $id
 * @property integer $profile_id
 * @property integer $value
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id'], 'required'],
            [['profile_id', 'value'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'profile_id' => Yii::t('shop', 'Profile ID'),
            'value' => Yii::t('shop', 'Value'),
        ];
    }
}
