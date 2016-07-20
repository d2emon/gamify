<?php
$image = $faker->optional()->image('web/images/shop_items', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/shop_items/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'title' => $faker->sentence,
    'description' => $faker->realText,
    'image' => $filename,
    'cost' => $faker->numberBetween(1, 1000),
];
