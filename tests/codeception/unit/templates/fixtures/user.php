<?php
return [
    'username' => ($index == 1) ? 'admin' : substr($faker->unique()->userName, 0, 16),
    'password' => ($index == 1) ? 'admin' : $faker->password,
    'accessToken' => $faker->md5,
];

