<?php
namespace app\commands;

use yii\console\Controller;
use uxappetite\yii2image\components\ImageGroup;
use d2emon\advice\models\Advice;
use d2emon\workspace\models\Workspace;
use d2emon\workspace\models\Job;

/**
 * This command makes image preparation.
 *
 * @author Dmitry Kutsenko <d2emonium@gmail.com>
 */
class ImagesController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    /**
     * This command makes advice thumbs.
     */
    public function actionAdvice()
    {
	$group = new ImageGroup('advice');
	$advices = Advice::find()->select('image')->where(['not', ['image' => '']])->all();
	foreach($advices as $advice)
	{
	    // echo "... ";
	    $image = $advice->image;
	    echo "Loading ".$image."... ";
	    echo $group->makeThumbs($image) ? "Success" : "Fail";
	    echo "\n";
	}
	// echo "Finish\n";
	return True;
    }

    /**
     * This command makes advice thumbs.
     */
    public function actionWorkspace()
    {
	$models = Workspace::find()->select('image')->where(['not', ['image' => '']])->all();
	return $this->makeThumbs('workspace', $models);
    }

    /**
     * This command makes job thumbs.
     */
    public function actionJob()
    {
	$models = Job::find()->select('image')->where(['not', ['image' => '']])->all();
	return $this->makeThumbs('job', $models);
    }

    private function makeThumbs($group_name, $models)
    {
	$group = new ImageGroup($group_name);
	foreach($models as $model)
	{
	    // echo "... ";
	    $image = $model->image;
	    echo "Loading ".$image."... ";
	    echo $group->makeThumbs($image) ? "Success" : "Fail";
	    echo "\n";
	}
	return True;
    }
}
