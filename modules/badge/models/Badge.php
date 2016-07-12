<?php

namespace app\modules\badge\models;

use Yii;

/**
 * This is the model class for table "badge".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 */
class Badge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'badge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'id' => Yii::t('badge', 'ID'),
            'title' => Yii::t('badge', 'Title'),
            'image' => Yii::t('badge', 'Image'),
            'description' => Yii::t('badge', 'Description'),
        ];
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	$image = $this->image ? $this->image : '0';
	return sprintf("%s.jpg", $image);
    }
}
