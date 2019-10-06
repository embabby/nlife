<?php

use Illuminate\Database\Seeder;

class TableJobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\JobIndustry::class,8)->create();


    }
}
