<?php

namespace app\modules\profile\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property integer $profile_id
 * @property integer $type_id
 * @property string $value
 * @property string $description
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'type_id'], 'integer'],
            [['description'], 'string'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('profile', 'ID'),
            'profile_id' => Yii::t('profile', 'Profile ID'),
            'type_id' => Yii::t('profile', 'Type ID'),
            'value' => Yii::t('profile', 'Value'),
            'description' => Yii::t('profile', 'Description'),
        ];
    }

    public function getImage()
    {
	$types = [
	    'unknown',
	    'mail',
	    'phone',
            'skype',
	];
	$type_text = isset($types[$this->type_id]) ? $types[$this->type_id] : $types[0];
	return $type_text.'.jpg';
    }
}
