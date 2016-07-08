<?php
$type_id = $faker->numberBetween(1, 3);
if($type_id == 1)
{
    $value = $faker->email;
}
elseif($type_id == 2)
{
    $value = $faker->phoneNumber;
}
elseif($type_id == 3)
{
    $value = $faker->userName;
}
else
{
    $value = "";
}
return [
    'profile_id' => $faker->numberBetween(0, 100),
    'type_id' => $type_id,
    'value' => $value,
    'description' => $faker->optional()->realText,
];
