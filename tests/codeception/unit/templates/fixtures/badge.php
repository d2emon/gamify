<?php
$image = $faker->optional()->image('web/images/badge', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/badge/%s.jpg", $filename));
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

