<?php

namespace app\modules\profile\models;

use Yii;
use app\modules\job\models\Job;
use app\modules\badge\models\Badge;
use app\modules\task\models\TaskGroup;
use app\modules\level\models\Level;
use app\modules\shop\models\Wallet;
use app\modules\stat\models\Stat;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $hobby
 * @property string $education
 * @property string $image
 * @property integer $rating
 *
 * @property Contact[] $contacts
 * @property Job[] $jobs
 * @property User $user
 * @property Profile2badge[] $profile2badges
 * @property Badge[] $badges
 * @property Profile2level $profile2level
 * @property Profile2task[] $profile2tasks
 * @property Badge[] $tasks
 * @property Wallet[] $wallets
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'rating'], 'integer'],
            [['hobby', 'education'], 'string'],
            [['firstname', 'middlename', 'lastname'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 6],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('profile', 'User ID'),
            'firstname' => Yii::t('profile', 'Firstname'),
            'middlename' => Yii::t('profile', 'Middlename'),
            'lastname' => Yii::t('profile', 'Lastname'),
            'hobby' => Yii::t('profile', 'Hobby'),
            'education' => Yii::t('profile', 'Education'),
            'image' => Yii::t('profile', 'Image'),
            'rating' => Yii::t('profile', 'Rating'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadges()
    {
        return $this->hasMany(Badge::className(), ['id' => 'badge_id'])->viaTable('profile2badge', ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id'])->viaTable('profile2level', ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(TaskGroup::className(), ['id' => 'task_id'])->viaTable('profile2task', ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStats()
    {
        return $this->hasMany(Stat::className(), ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallet()
    {
        return $this->hasOne(Wallet::className(), ['profile_id' => 'user_id']);
    }

    public static function primaryKey()
    {
	return ['user_id'];
    }

    /**
     * Forms full name
     * @return string
     */
    public function getFullname()
    {
        return join(' ', [
            $this->firstname,
            $this->middlename,
            $this->lastname,
        ]);
    }

    /**
     * Forms avatar
     *
     * @return string
     */
    public function getAvatar()
    {
	return sprintf("/images/users/%s.jpg", $this->image, $this->user_id);
    }
}
