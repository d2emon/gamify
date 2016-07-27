<?php
$image = $faker->optional()->image('web/images/advices', 420, 340, false);
if($image)
{
    $group = Yii::$app->getModule('advice')->imageGroup;
    $filename = Yii::$app->security->generateRandomString(6);
    rename($image, $group->getRaw_filename($filename));
    $group->makeThumbs($filename);
}
else
{
    $filename = '';
}

return [
    'title' => $faker->sentence,
    'description' => $faker->realText,
    'image' => $filename,
];

