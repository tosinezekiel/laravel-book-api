<?php

use Illuminate\Database\Seeder;
use App\AuthorBook;
class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AuthorBook::class,10)->create();
    }
}
