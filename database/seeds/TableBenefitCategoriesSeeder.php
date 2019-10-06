<?php

use Illuminate\Database\Seeder;

class TableBenefitCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\BenefitCategory::create([
            'name'=>'Experience and professional support'
        ]);
        \App\BenefitCategory::create([
            'name'=>'Financial'
        ]);
        \App\BenefitCategory::create([
            'name'=>'Insurance'
        ]);
        \App\BenefitCategory::create([
            'name'=>'Vacation and time out'
        ]);
    }
}
