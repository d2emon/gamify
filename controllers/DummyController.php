<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Profile;
use app\models\Score;
use app\models\Stats;

class DummyController extends Controller
{
    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionWorkspace($id=100)
    {
	$profiles = Profile::findAll();
	return $this->render('workspace', [
	    'profiles' => $profiles,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionBuy($id=100)
    {
	$score = Score::findById($id);
	return $this->render('score', [
	    'score' => $score,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionShop_random($id=100)
    {
	$score = Score::findById($id);
	return $this->render('score', [
	    'score' => $score,
        ]);
    }

    /**
     * Displays workspace profile page.
     *
     * @return string
     */
    public function actionStats($id=100)
    {
	$stat = Stats::findByProfileId($id);
	return $this->render('stat', [
	    'stat' => $stat,
        ]);
    }
}
