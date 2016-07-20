<?php
$image = $faker->optional()->image('web/images/project', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/project/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'title' => $faker->sentence,
    'description' => $faker->realText,
    'image' => $filename,
    'path' => $faker->domainWord,
];

