<?php

namespace app\modules\level\models;

use Yii;
use app\modules\task\models\Task;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property integer $bonus_score
 *
 * @property Level2bonus[] $level2bonuses
 * @property Bonus[] $bonuses
 * @property Task2level[] $task2levels
 * @property Task[] $tasks
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['description'], 'string'],
            [['bonus_score'], 'integer'],
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
            'id' => Yii::t('level', 'ID'),
            'title' => Yii::t('level', 'Title'),
            'image' => Yii::t('level', 'Image'),
            'description' => Yii::t('level', 'Description'),
            'bonus_score' => Yii::t('level', 'Bonus Score'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonuses()
    {
       	return $this->hasMany(Level2Bonus::className(), ['level_id' => 'id'])->where(['megabonus' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMegabonuses()
    {
       	return $this->hasMany(Level2Bonus::className(), ['level_id' => 'id'])->where(['megabonus' => 1]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'task_id'])->viaTable('task2level', ['level_id' => 'id']);
    }

    public function getAvatar()
    {
    	return sprintf("/images/levels/%s.jpg", $this->image);
    }
}
