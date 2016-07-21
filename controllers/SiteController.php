<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;
use app\modules\profile\models\Profile;
use app\modules\shop\models\ShopItem;
use app\modules\task\models\TaskGroup;
use app\modules\task\models\Project;
use app\modules\task\models\Bonus;
use app\modules\level\models\Level;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays user profile page.
     *
     * @return string
     */
    public function actionProfile($id=1)
    {
	$profile = Profile::findOne($id);
        $random_item = ShopItem::randomItem($profile->wallet->value);
	return $this->render('profile', [
	    'profile' => $profile,
	    'random_item' => [
		'count' => (int) ($profile->wallet->value / $random_item->cost), 
		'item' => $random_item
	    ],	
        ]);
    }

    /**
     * Displays user quests page.
     *
     * @return string
     */
    public function actionQuests($id=1)
    {
	$campaigns = Project::find()->all();
	return $this->render('quests', [
	    'campaigns' => $campaigns,
        ]);
    }

    /**
     * Displays user tests page.
     *
     * @return string
     */
    public function actionTests($id=1)
    {
	$profile = Profile::findOne($id);
	return $this->render('tests', [
	    'tests' => $profile->tasks,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionUserlist($id=100)
    {
	$profiles = Profile::find()->all();
	return $this->render('userlist', [
	    'profiles' => $profiles,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionLevels($id=1, $level_id=0)
    {
	if($level_id == 0)
	{
	    $profile = Profile::findOne($id);
            $level = $profile->level;
	}
	else
	{
	    $level = Level::findOne($level_id);
	}
	$levels = Level::find()->all();
	return $this->render('level', [
	    'level' => $level,
            'levels' => $levels,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionShop($id=1)
    {
	$profile = Profile::findOne($id);
	$items = ShopItem::find()->where(['<=', 'cost', $profile->wallet->value])->all();
	return $this->render('score', [
	    'profile' => $profile,
            'items' => $items,
        ]);
    }
}
