<?php

use Illuminate\Database\Seeder;

class NewsLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\bocaamerica\NewsLetter::class, 40)->create();
    }
}
