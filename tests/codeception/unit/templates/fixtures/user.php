<?php
return [
    'username' => substr($faker->unique()->userName, 0, 16),
    'password' => $faker->password,
    'accessToken' => $faker->md5,
];

