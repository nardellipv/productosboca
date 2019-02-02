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
        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(CheckoutsSeeder::class);
        $this->call(PicturesSeeder::class);
        $this->call(NewsLettersSeeder::class);
    }
}
