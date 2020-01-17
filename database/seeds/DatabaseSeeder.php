<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(AuthorBookSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
