<?php

use Illuminate\Database\Seeder;

class PicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\productosboca\Picture::class, 100)->create();
    }
}
