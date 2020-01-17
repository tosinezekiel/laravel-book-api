<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AuthorBook;
use App\Book;
use App\Author;
use Faker\Generator as Faker;

$factory->define(AuthorBook::class, function (Faker $faker) {
    return [
        'author_id' => Author::all()->random()->id,
        'book_id' => Book::all()->random()->id
    ];
});
