<?php

use Illuminate\Database\Seeder;

class TableExperienceYearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ExperienceYear::create([
            'name'=>'No Experience',
            'years'=>'0'
        ]);
        \App\ExperienceYear::create([
            'name'=>'Less Than 1',
            'years'=>'0'
        ]);
        \App\ExperienceYear::create([
            'name'=>'1 Year',
            'years'=>'1'
        ]);
        \App\ExperienceYear::create([
            'name'=>'2 Years',
            'years'=>'2'
        ]);
        \App\ExperienceYear::create([
            'name'=>'3 Years',
            'years'=>'3'
        ]);
        \App\ExperienceYear::create([
            'name'=>'4 Years',
            'years'=>'4'
        ]);
        \App\ExperienceYear::create([
            'name'=>'5 Years',
            'years'=>'5'
        ]);
        \App\ExperienceYear::create([
            'name'=>'6 Years',
            'years'=>'6'
        ]);
        \App\ExperienceYear::create([
            'name'=>'7 Years',
            'years'=>'7'
        ]);
        \App\ExperienceYear::create([
            'name'=>'8 Years',
            'years'=>'8'
        ]);
        \App\ExperienceYear::create([
            'name'=>'9 Years',
            'years'=>'9'
        ]);
        \App\ExperienceYear::create([
            'name'=>'10 Years',
            'years'=>'10'
        ]);
        \App\ExperienceYear::create([
            'name'=>'larger than 10 Years',
            'years'=>'11'
        ]);

    }
}
