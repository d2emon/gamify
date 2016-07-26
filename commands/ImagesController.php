<?php
namespace app\commands;

use yii\console\Controller;
use uxappetite\yii2image\components\ImageGroup;
use d2emon\advice\models\Advice;

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
}
