<?php
$image = $faker->optional()->image('web/images/bonus', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/bonus/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'title' => $faker->unique->sentence,
    'description' => $faker->realText,
    'image' => $filename,
];

