<?php
/*
$image = $faker->optional()->image('web/images/levels', 40, 40, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/levels/%s.jpg", $filename));
}
else
{
    $filename = '';
}
 */

return [
    'title' => $faker->sentence,
    'description' => $faker->realText,
    'image' => $index, // $filename,
    'bonus_score' => $faker->randomNumber(),
];

