<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;
use App\User;
use App\Book;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'book_id' => Book::all()->random()->id,
        'comment' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'review' => rand(1,10),
        'user_id' => User::all()->random()->id
    ];
});
