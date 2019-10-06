<?php

use Illuminate\Database\Seeder;

class TableCareerLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\CareerLevel::create([
            'name'=>"Student",
            'font_icon'=>'fa fa-user'
        ]);
        \App\CareerLevel::create([
            'name'=>"Senior",
            'font_icon'=>'fa fa-user'
        ]);
        \App\CareerLevel::create([
            'name'=>"Experienced",
            'font_icon'=>'fa fa-user'
        ]);
        \App\CareerLevel::create([
            'name'=>"Manager",
            'font_icon'=>'fa fa-user'
        ]);
    }
}
