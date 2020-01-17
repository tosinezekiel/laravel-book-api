<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RoleUser;
use Faker\Generator as Faker;
use App\Role;
use App\User;

$factory->define(RoleUser::class, function (Faker $faker) {
    return [
        'role_id' => Role::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
