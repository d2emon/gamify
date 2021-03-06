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
    'profile_id' => $index + 1, //$faker->unique()->numberBetween(1, 100),
    'workspace_id' => $faker->numberBetween(1, 10),
    'title' => $faker->sentence,
    'responsibilities' => $faker->realText,
    'image' => $filename,
];

