<?php

namespace app\modules\badge\controllers;

use yii\web\Controller;
use app\modules\badge\models\Badge;

/**
 * Default controller for the `badge` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($user_id=0, $badge_id=0)
    {
	// User badges
	$badges = Badge::find()->all();
	$selected = Badge::findOne($badge_id);
	return $this->render('badge', [
	    'badges' => $badges,
	    'badge_id' => $badge_id,
	    'selected' => $selected,
        ]);
    }
}
