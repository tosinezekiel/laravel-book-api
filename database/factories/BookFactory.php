<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use App\Author;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 7, $variableNbWords = true),
        'Description' => $faker->text($maxNbChars = 50),
        'isbn' => $faker->ean8
    ];
});
