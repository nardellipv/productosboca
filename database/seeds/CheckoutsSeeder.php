<?php

use Illuminate\Database\Seeder;

class CheckoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\productosboca\Checkout::class, 40)->create();
    }
}
