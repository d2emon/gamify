<?php
$image = $faker->optional()->image('web/images/group', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/group/%s.jpg", $filename));
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

