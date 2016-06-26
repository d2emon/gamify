<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Profile;
use app\models\Badge;
use app\models\Level;
use app\models\Item;
use app\models\Advice;
use app\models\Campaign;
use app\models\Test;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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
    public function actionProfile($id=100)
    {
	$profile = Profile::findById($id);
	return $this->render('profile', [
	    'profile' => $profile,
        ]);
    }

    /**
     * Displays user quests page.
     *
     * @return string
     */
    public function actionQuests($id=100)
    {
	$campaigns = Campaign::findByProfileId($id);
	return $this->render('quests', [
	    'campaigns' => $campaigns,
        ]);
    }

    /**
     * Displays user tests page.
     *
     * @return string
     */
    public function actionTests($id=100)
    {
	$tests = Test::findByProfileId($id);
	return $this->render('tests', [
	    'tests' => $tests,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionUserlist($id=100)
    {
	$profiles = Profile::findAll();
	$advice = Advice::find();
	return $this->render('userlist', [
	    'profiles' => $profiles,
            'advice' => $advice,
        ]);
    }

    /**
     * Displays badges page.
     *
     * @return string
     */
    public function actionBadges($user_id=0, $badge_id=0)
    {
	$badges = Badge::find(['user_id'=>$user_id]);
	$selected = Badge::find(['badge_id'=>$badge_id])[0];
	return $this->render('badge', [
	    'badges' => $badges,
	    'badge_id' => $badge_id,
	    'selected' => $selected,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionLevels($id=0)
    {
	if($id == 0)
	{
	    $profile = Profile::findById(100);
            $level = $profile->score->level;
	}
	else
	{
	    $level = Level::findById($id);
	}
	$levels = Level::findAll();
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
    public function actionShop()
    {
	$profile = Profile::findById(100);
	$items = Item::findAll();
	return $this->render('score', [
	    'profile' => $profile,
            'items' => $items,
        ]);
    }
}
