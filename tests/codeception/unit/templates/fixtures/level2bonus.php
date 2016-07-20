<?php
return [
    'level_id' => $faker->numberBetween(1, 20),
    'bonus_id' => $faker->numberBetween(1, 300),
    'megabonus' => $faker->optional()->numberBetween(0, 1),
];

