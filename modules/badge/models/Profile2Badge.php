<?php

namespace app\modules\badge\models;

use Yii;

/**
 * This is the model class for table "profile2badge".
 *
 * @property integer $profile_id
 * @property integer $badge_id
 *
 * @property Badge $badge
 * @property Profile $profile
 */
class Profile2Badge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile2badge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'badge_id'], 'integer'],
            [['profile_id', 'badge_id'], 'unique', 'targetAttribute' => ['profile_id', 'badge_id'], 'message' => 'The combination of Profile ID and Badge ID has already been taken.'],
            [['badge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Badge::className(), 'targetAttribute' => ['badge_id' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => Yii::t('badge', 'Profile ID'),
            'badge_id' => Yii::t('badge', 'Badge ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadge()
    {
        return $this->hasOne(Badge::className(), ['id' => 'badge_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'profile_id']);
    }
}
