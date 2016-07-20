<?php
$image = $faker->optional()->image('web/images/task', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/task/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'title' => $faker->unique->sentence,
    'description' => $faker->realText,
    'image' => $filename,
    'completed' => $faker->numberBetween(0, 1),
];

