<?php

use Illuminate\Database\Seeder;

class TableBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Benefit::create([
            'benefit_category_id'=>'1',
            'name'=>'Job training'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'1',
            'name'=>'Diversity programming'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'1',
            'name'=>'professional Development'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'1',
            'name'=>'Tuition assistance'
        ]);


        \App\Benefit::create([
            'benefit_category_id'=>'2',
            'name'=>'Satisfying salaries'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'2',
            'name'=>'Work supplemental'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'2',
            'name'=>'Retirement plane'
        ]);\App\Benefit::create([
            'benefit_category_id'=>'2',
            'name'=>'performance bonus'
        ]);



        \App\Benefit::create([
            'benefit_category_id'=>'3',
            'name'=>'Health Insurance'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'3',
            'name'=>'Dental Insurance'
        ]);


        \App\Benefit::create([
            'benefit_category_id'=>'4',
            'name'=>'Paid Holidays'
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'4',
            'name'=>'2 Days a week '
        ]);
        \App\Benefit::create([
            'benefit_category_id'=>'4',
            'name'=>'Sick Days '
        ]);
\App\Benefit::create([
            'benefit_category_id'=>'4',
            'name'=>'1 hour Rest in a Day  '
        ]);



    }
}
