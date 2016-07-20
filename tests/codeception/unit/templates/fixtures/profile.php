<?php
$image = $faker->optional()->image('web/images/users', 150, 150, false);
if($image)
{
    $filename = $faker->randomNumber(6);
    rename($image, sprintf("web/images/users/%s.jpg", $filename));
}
else
{
    $filename = '';
}

return [
    'user_id' => $index + 1,
    'firstname' => $faker->firstName,
    'middlename' => $faker->optional()->firstNameMale,
    'lastname' => $faker->optional()->lastName,
    'hobby' => $faker->optional()->sentence,
    'education' => $faker->optional()->realText,
    'image' => $filename,
    'rating' => $faker->numberBetween(0, 32000),
];
