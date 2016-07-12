<?php
$image = $faker->optional()->image('web/images/workspaces', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/workspaces/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'title' => $faker->word,
    'description' => $faker->realText,
    'image' => $filename,
];

