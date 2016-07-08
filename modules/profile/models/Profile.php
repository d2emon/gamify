<?php

namespace app\modules\profile\models;

use Yii;

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
    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['profile_id' => 'user_id']);
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
    public function getProfile2badges()
    {
        return $this->hasMany(Profile2badge::className(), ['profile_id' => 'user_id']);
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
    public function getProfile2level()
    {
        return $this->hasOne(Profile2level::className(), ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile2tasks()
    {
        return $this->hasMany(Profile2task::className(), ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Badge::className(), ['id' => 'task_id'])->viaTable('profile2task', ['profile_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallets()
    {
        return $this->hasMany(Wallet::className(), ['profile_id' => 'user_id']);
    }
}
