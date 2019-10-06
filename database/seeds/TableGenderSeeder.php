<?php

use Illuminate\Database\Seeder;

class TableGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Gender::create([
            'name'=>'male'
        ]);
        \App\Gender::create([
            'name'=>'female'
        ]);
    }
}
