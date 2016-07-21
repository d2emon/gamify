<?php
$image = $faker->optional()->image('web/images/stats', 40, 40, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/stats/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'title' => $faker->sentence,
    'description' => $faker->realText,
    'image' => $filename,
    'value' => $faker->numberBetween(1, 1000),
];

